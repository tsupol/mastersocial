<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Models\Facebook;
use App\Models\FacebookChat;
use App\Models\FacebookChatClose;
use App\Models\FacebookCustomer;
use App\Models\FacebookSession;
use App\Models\UserPage;
use App\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use VG;
use Input;
use Session;


class FacebookController extends Controller
{

    public function __construct()
    {

//        define("LONGLIVE_ACCESSTOKEN", Session::get('fb_longlive_token'));
//        define("PAGE_ID", '919082208176684');


    }


    public function index()
    {
//        $data = User::withTrashed()->orderBy('id','DESC')->with('role', 'group', 'branch')->paginate(10);

        return Facebook::getIndexView();


//        $data = [];
//
////        dd($data);
//        // $data["packages"] = Package::skip(0)->take(20)->get();
//        return [
//            'settings' => VG::getSetting('facebook_inbox'),
//            'val' => $data,
//            'views' => [
//                [
//                    'label' => trans('pos.facebook_inbox'),
//                    'panel' => [
//                        'label' => trans('pos.facebook_inbox'),
//                    ],
//                    'type' => 'custom',
//                    'controller' => '',
//                    'template' => 'gen/tpls/custom/facebook/inbox.html',
//                ]
//            ]
//        ];

//        return json_encode(VG::getTableSchema($data, 'users.index'));
    }

    public function create()
    {
        return Facebook::getCreateView();
    }

    public function store()
    {
        $data = Input::all();

        $post_type = '';
        if (!empty($data['hasphotos'])) {
            $post_type = 'photos';
            $data["post_id"] = Session::get('fb_page_id') . "_" . $data["post_id"];
        } else if (!empty($data['link'])) {
            $post_type = 'link';
        } else if (!empty($data['message'])) {
            $post_type = 'message';
        }
        $chk = Facebook::where('post_id', $data["post_id"])->first();
        if (isset($chk)) {
            return VG::result(false, 'failed! this post has repeat');
        }
        $data = array_diff_key($data, array_flip(['id', '_method', 'deleted_at', 'deleted_by', 'updated_at', 'created_at']));
        $data["created_by"] = 'SYSTEM';
        $data['post_type'] = $post_type;

        $status = Facebook::create($data);

        if ($status === NULL) {
            return VG::result(false, 'failed!');
        }
        return VG::result(true, ['action' => 'create', 'id' => $status->id]);

    }

    public function show($id)
    {

    }

    public function edit($id)
    {
        $user = User::find($id);
        $user->password = '';
        return User::getCreateView($user);
    }

    public function update($id)
    {
        $data = Input::all();
        $data = array_diff_key($data, array_flip(['id', 'confirm_password', '_method', 'deleted_at', 'deleted_by', 'updated_at', 'created_at']));

        if (isset($data["change_pass"]) && $data["change_pass"] == true) {
            if (!empty($data["password"])) {
                $data["password"] = \Hash::make($data["password"]);
            } else {
                unset($data["password"]);
            }
        } else {
            unset($data["password"]);
        }
        unset($data["change_pass"]);

        $data["updated_by"] = Session::get('user_id');
        $status = User::whereId($id)->update($data);
        if ($status == 1) {
            return VG::result(true, ['action' => 'update', 'id' => $id]);
        }
        return VG::result(false, 'failed!');
    }

    public function destroy($id)
    {
        $user = User::find($id);
        if (is_null($user)) {
            User::withTrashed()->whereId($id)->first()->restore();
            return VG::result(true, ['action' => 'restore', 'id' => $id]);
        } else {
            $user->delete();
            return VG::result(true, ['action' => 'delete', 'id' => $id]);
        }
    }

    public function duplicate($id)
    {
        $user = User::find($id);
        if (is_null($user)) return VG::result(false, trans('error.not_found', ['id', $id]));
        try {
            $copy = $user->replicate();
            $email = 'copy_' . $copy->email;
            while (User::whereEmail($email)->count() > 0) {
                $email = 'copy_' . $email;
            }
            $copy->email = $email;
            $copy->save();
        } catch (\Illuminate\Database\QueryException $e) {
            return VG::result(false, $e->errorInfo);
        }
        return VG::result(true, ['redirect' => '/app/users']);
    }

    public function pr($msg)
    {
        echo "<pre>";
        print_r($msg);
        echo "</pre>";

    }

    public function bgConversations($data)
    {
        $page_id = $data->page_id;
        $longlive_token = $data->longlive_token;
        echo "bgConversations<BR>";
        $url = "https://graph.facebook.com/v2.5/$page_id/threads?fields=participants,messages{id,attachments,shares,subject,from,message,created_time}&access_token=$longlive_token";
        $data = @file_get_contents($url);
        $json = json_decode($data);
        $res = [];

        if (!empty($json->data)) {
            foreach ($json->data as $key => $d) {
//            $created_time =  Carbon::parse($d->updated_time)->format('Y-m-d H:i:s');
                //--- ขั้นตอนเก็บข้อมูล user ใหม่ๆ ที่ chat มา
                $section = [];
                $FbChatSection = FacebookSession::where('tid', $d->id)->where('status_id', 1)->first();
                if (empty($FbChatSection)) {
                    $section["tid"] = $d->id;
                    $section["status_id"] = 1;
                    $status = FacebookSession::create($section);
                    $section["section_id"] = $status->id;
                } else {
                    $section["section_id"] = $FbChatSection->id;
                }


//                $d_link = $d->link;
//                $pieces = explode('user%3A', $d_link);
//                $pieces1 = explode('&threadid', $pieces[1]);
                $sendersId = $d->messages->data[0]->from->id;
                $fromName = $d->participants->data[0]->name;
                $fromId = $d->participants->data[0]->id;
                $data = [];
                $data['from_name'] = $fromName;
                $data['snippet'] = $d->messages->data[0]->message;
                $data['lasted_at'] = Carbon::parse($d->messages->data[0]->created_time)->format('Y-m-d H:i:s');
                $status_first_time = false;
                $FbCus = FacebookCustomer::where('tid', $d->id)->first();
                if (empty($FbCus)) {   //--- if hasn't this customer in DB  Call API for get information
//                    $url = "https://graph.facebook.com/v2.5/" . $fromId . "?fields=name&access_token=$longlive_token";
//                    $ajax = file_get_contents($url);
//                    $json = json_decode($ajax);
                    $status_first_time = true;
                    $data['from_id'] = $fromId;
                    $data['tid'] = $d->id;
                    $data['page_id'] = $page_id;
                    $data['status'] = 1;
                    if ($sendersId != $page_id) {
                        unset($data['snippet']);
                        unset($data['lasted_at']);
                    }
                    $status = FacebookCustomer::create($data);
                } else if ($sendersId != $page_id) {
                    FacebookCustomer::where('tid', $d->id)->update($data);
                }

                //---  ขั้นตอน ดึงข้อมูล message
                //$url = "https://graph.facebook.com/v2.5/" . $d->id . "/messages?fields=attachments,shares,subject,from,message,created_time&access_token=$longlive_token";
                // $url = "https://graph.facebook.com/v2.5/t_mid.1453826395510:58e72fa4db22012854/messages?fields=attachments%2Cshares%2Csubject%2Cfrom%2Cmessage%2Ccreated_time&limit=25&until=1453826395&__paging_token=enc_AdDwYcKCHSqK92FxCfi9XAHe4NlIvSZBsk0IgDzCt22icFYc6ZBm8ZCLDMevmfsvGXt5OMfqyxr9f4kYoqwXCnY4yHnSLSuKh9adkG7ogrMg8vmvgZDZD&access_token=$longlive_token";
                $status_get_next_row = true;
                $data = [];
                $url = "";
                $i = 1;
                while ($status_get_next_row) {
                    echo "<HR>Loop # $i From : $fromId <BR>Url : $url<BR>";
                    if (empty($url)) {
                        $message = $d->messages;
                    } else {
                        $data = file_get_contents($url);
                        $message = json_decode($data);
                    }
                    $ins = [];
                    if (!empty($message->data)) {
                        foreach ($message->data as $mkey => $m) {
                            //$this->pr($m);
                            $ins['tid'] = $d->id;
                            $ins['shares_link'] = (!empty($m->shares)) ? $m->shares->data[0]->link : "";
                            $ins['shares_name'] = (!empty($m->shares)) ? $m->shares->data[0]->name : "";
                            $ins['attachments'] = (!empty($m->attachments)) ? $m->attachments->data[0]->image_data->preview_url : "";
                            $ins['fromId'] = (!empty($m->from)) ? $m->from->id : "";
                            $ins['fromName'] = (!empty($m->from)) ? $m->from->name : "";
                            $ins['message'] = (!empty($m->message)) ? $m->message : "";
                            $ins['mid'] = (!empty($m->id)) ? $m->id : "";
                            $ins['chat_at'] = (!empty($m->created_time)) ? $m->created_time : "";
                            $ins['section_id'] = $section["section_id"];
                            //$created_time =  Carbon::parse($m->created_time)->format('Y-m-d H:i:s');
                            $chk = FacebookChat::where('tid', $d->id)->where('mid', $m->id)->first();
                            if (!empty($chk)) {
                                //--- check เจอแสดงว่า มีข้อมูลแล้ว  ออกจาก message ของคนนี้ได้เลย
                                $status_get_next_row = false;
                                break 2;  //--- break while loop
                            } else {
                                $status_get_next_row = true;
                            }
                            FacebookChat::create($ins);
                        }
                    }

                    //Set Url for Call next Pagination
                    if (!empty($message->paging) && $status_get_next_row && !$status_first_time) {
                        $url = $message->paging->next;
                    } else if (empty($message->paging) || $status_first_time) {
                        echo "no paging Or first time<BR>";
                        break;    //--- break while loop
                    }
                    $i++;
                }

            }
        }


        return json_encode($res);
    }


    public function test()
    {
        $userPage = UserPage::all();
        foreach ($userPage as $up) {

            $actived_at = $up->actived_at;
            $startTime = Carbon::now()->format('Y-m-d H:i:s');

            $minutes = VG::DiffMinute($startTime, $actived_at);

            echo "$startTime <BR> $actived_at<BR>";
            echo 'Diff. in minutes is: ' . $minutes . "<BR>";

            if ($minutes <= 5) {
                //--- call if active
                $this->bgConversations($up);
            } else {

            }


        }


    }


    public function ActiveStatus()
    {
        //--- Set User Active Status
        $data = Input::all();
        $update = [];
        $update['actived_at'] = Carbon::now()->format('Y-m-d H:i:s');
        $status = UserPage::where('fb_id', $data['fb_uid'])->where('page_id', $data['page_id'])->update($update);
        //dd(DB::getQueryLog());
        return VG::result(true, ['id' => $status]);
    }


    public function SessionTag(){
        $data = Input::all();

        if($data['section_id']==0){
            $chatClose = FacebookSession::where('tid', $data["tid"])->where('status_id', 1)->orderBy('id', 'desc')->first();
            if(empty($chatClose)){
                return VG::result(false, ['msg' => 'เคสนี้มีการปิดไปแล้วค่ะ ไม่สามารถอัพเดท']);
            }
        }else{
            $chatClose = FacebookSession::where('id', $data["section_id"])->first();
            if(empty($chatClose)){
                return VG::result(false, ['msg' => 'ไม่พบเคสนี้ค่ะ']);
            }
        }
        unset($data['tid']);
        unset($data['section_id']);


        $array =  explode(',', $data['tags']);
        $res = [] ;
        foreach ($array as $key=>$i) {
            array_push($res,$i) ;
        }

        $data['tags'] = $res ;
        $chatClose->tags()->sync($data['tags']);
        return VG::result(true, ['msg' => 'complete']);
    }

    public function ChatStatus()
    {
        $data = Input::all();
//        dd($data);
        $message = FacebookChat::where('mid', $data['mid'])->first();
        if (empty($message)) {
            return VG::result(false, ['msg' => 'ไม่พบข้อมูล']);
        }

        $data["tid"] = $message->tid;
        //$data["chat_at"] = $message->chat_at;
        $section = [];
        //--- เช็คว่ามี สถานะ open อยู่หรือไม่
        $chatClose = FacebookSession::where('tid', $data["tid"])->where('status_id', 1)->orderBy('id', 'desc')->first();
        if (empty($chatClose)) {
            return VG::result(false, ['msg' => 'ไม่สามารถปิดเคสได้ค่ะ']);
        }
        $page_id = Session::get('fb_page_id');
        $startChat = FacebookChat::where('tid', $data["tid"])->where('section_id', $chatClose->id)->orderBy('chat_at', 'asc')->first();
        $countChat = FacebookChat::where('tid', $data["tid"])->where('section_id', $chatClose->id)->select(DB::raw('fromId,count(1) as count_message'))->groupBy('fromId')->get();
        foreach ($countChat as $c) {
            if ($c->fromId == $page_id) {
                $data['count_message_page'] = $c->count_message;
            } else {
                $data['count_message_customer'] = $c->count_message;
            }
        }

        $end_chat_at = $startChat->chat_at;
       // $this->pr(DB::getQueryLog());
        $data['count_time'] = VG::DiffMinute($end_chat_at, $message->chat_at);
        $data['start_chat_id'] = $startChat->id;
        $data['start_chat_at'] = $end_chat_at;
        $data['end_chat_id'] = $message->id;
        $data['end_chat_at'] = $message->chat_at;
        $data['status_id'] = $data['status'];

        unset($data['tid']) ;
        unset($data['status']) ;

//        dd($data);
        $status = FacebookSession::where('id',$chatClose->id)->where('status_id', 1)->update($data);
        return VG::result(true, ['msg' => 'complete']);


//        //--- เช็ค ว่า ก่อนหน้านี้ close ไป ตอนไหน
//        $chatClose = FacebookSession::where('tid', $data["tid"])->orderBy('id', 'desc')->first();
//        if (empty($chatClose)) {
//            //echo "in empty chat Close<BR>" ;
//            //--- ถ้าไม่มีก็ดึง log แรกสุด
//            $page_id = Session::get('fb_page_id');
//            $startChat = FacebookChat::where('tid', $data["tid"])->orderBy('chat_at', 'asc')->first();
//            $countChat = FacebookChat::where('tid', $data["tid"])->where('chat_at','>=',$startChat->chat_at)->where('chat_at','<=',$message->chat_at)->select(DB::raw('fromId,count(1) as count_message'))->groupBy('fromId')->get()  ;
//            foreach ( $countChat as $c ){
//                if($c->fromId==$page_id){
//                    $data['count_message_page']  = $c->count_message ;
//                }else{
//                    $data['count_message_customer']  = $c->count_message ;
//                }
//            }
//            //$this->pr(DB::getQueryLog());
//            $data['count_time'] = VG::DiffMinute($startChat->chat_at,$message->chat_at) ;
//            $data['start_chat_id'] = $startChat->id;
//            $data['start_chat_at'] = $startChat->chat_at;
//        } else {
//            $end_chat_at = $chatClose->end_chat_at ;
////            echo "in chat close<BR>";
////            echo $chatClose->end_chat_id."==".$message->id."<BR>";
//            if ($chatClose->end_chat_id == $message->id ){
////                echo "Have Close in data <BR>" ;
//                return VG::result(false, ['msg' => 'repeat data']);
//            }
//            $countChat = FacebookChat::where('tid', $data["tid"])->where('chat_at','>',$end_chat_at)->where('chat_at','<=',$message->chat_at)->select(DB::raw('fromId,count(1) as count_message'))->groupBy('fromId')->get()  ;
//            foreach ( $countChat as $c ){
//                if($c->fromId==$page_id){
//                    $data['count_message_page']  = $c->count_message ;
//                }else{
//                    $data['count_message_customer']  = $c->count_message ;
//                }
//            }
//            $this->pr(DB::getQueryLog());
//            $data['count_time'] = VG::DiffMinute($end_chat_at,$message->chat_at) ;
//            $data['start_chat_id'] = $chatClose->id;
//            $data['start_chat_at'] = $end_chat_at;
//        }

        //dd(DB::getQueryLog());

    }

    public function inbox()
    {
        //$fb_id =  Session::get('fb_uid');
        $page_id = Session::get('fb_page_id');
        $FC = FacebookCustomer::where('page_id', $page_id)->orderBy('lasted_at', 'desc')->take(25)->get();
        $res = [];
        foreach ($FC as $key => $F) {
            $res[$key]["name"] = $F->from_name;
            $res[$key]["id"] = $F->tid;
        }

//        $url = "https://graph.facebook.com/v2.5/919082208176684/conversations?access_token=" . LONGLIVE_ACCESSTOKEN;
//        $data = file_get_contents($url);
//        $json = json_decode($data);
//        $res = [];
//        foreach ($json->data as $key => $d) {
//            $d_link = $d->link;
//            $pieces = explode('user%3A', $d_link);
//            $pieces1 = explode('&threadid', $pieces[1]);
//            $userId = $pieces1[0];
//            $FbCus = FacebookCustomer::where('fb_uid', $userId)->first();
//
//            if (empty($FbCus)) {   //--- if hasn't this customer in DB  Call API for get information
//                $url = "https://graph.facebook.com/v2.5/" . $userId . "?fields=name&access_token=" . LONGLIVE_ACCESSTOKEN;
//                $data = file_get_contents($url);
//                $json = json_decode($data);
//                $res[$key]["name"] = $json->name;
//                $data = [];
//                $data['fb_uid'] = $d->id;
//                $data['fb_uname'] = $json->name;
//                $data['status'] = 1;
//                $status = FacebookCustomer::create($data);
//            } else {
//                $res[$key]["name"] = $FbCus->fb_uname;
//            }
//            $res[$key]["id"] = $d->id;
//
//        }
        return json_encode($res);
    }

    public function conversation($id)
    {
        // $fb_id =  Session::get('fb_uid');
        $page_id = Session::get('fb_page_id');
        $page_name = Session::get('fb_page_name');
//
//        $url = "https://graph.facebook.com/v2.5/" . $id . "?fields=senders,updated_time&access_token=" . LONGLIVE_ACCESSTOKEN;
//        $data = file_get_contents($url);
//        $sender = json_decode($data);


        $sender = FacebookCustomer::where('tid', $id)->first();
        $from["id"] = $sender->from_id;
        $from["name"] = $sender->from_name;
        $message = FacebookChat::where('tid', $id)->where('chat_at', '<', '2016-02-02 14:47:40')->orderBy('chat_at', 'desc')->take(25)->get();

        foreach ($message as $m) {
//            $this->pr($m) ;
            // echo $m->fromId." : ".$page_id."<BR>" ;
            if ($m->fromId != $page_id) {
                $m->fromName = $from["name"];
            } else {
                $m->fromName = $page_name;
            }
//            $m->fromName =   ($m->fromId != $fb_id) ?  $from["name"]  :  "TEST" ;
        }


//        dd($message) ;

//        //--- get who send message
//        $url = "https://graph.facebook.com/v2.5/" . $id . "?fields=senders,updated_time&access_token=" . LONGLIVE_ACCESSTOKEN;
//        $data = file_get_contents($url);
//        $sender = json_decode($data);
//        $from = [];
//        foreach ($sender->senders->data as $s) {
//            if ($s->id != 919082208176684) {
//                $from["id"] = $s->id;
//                $from["name"] = $s->name;
//            }
//        }
//
//        $url = "https://graph.facebook.com/v2.5/" . $id . "/messages?fields=attachments,shares,subject,from,message,created_time&until=1454424460&access_token=" . LONGLIVE_ACCESSTOKEN;
//        $data = file_get_contents($url);
//        $message = json_decode($data);
////        $user_id = "" ;
////        foreach($json->data as $key=>$j){
////           if($j->from->id!="919082208176684"){
////               echo "in loop<BR>" ;
////                $user_id = $j->from->id ;
////           }
////        }
//        // $url =  "https://graph.facebook.com/$user_id/picture" ;
        $val = [];
        $val['message'] = $message;
        $val['sender'] = $from;
        $val['tid'] = $id;
        //$data['update_time'] = $sender->updated_time ;
        $val['lasted_mid'] = $message[0]->mid;
        $val['update_time'] = "2016-02-02 14:47:40";
        $data = [];
        $data['status'] = [
            '0' => ['id' => 2, 'name' => 'Close'],
            '1' => ['id' => 3, 'name' => 'Pending']
        ];


        // $data["packages"] = Package::skip(0)->take(20)->get();
        return [
            'settings' => VG::getSetting('facebook_inbox'),
            'data' => $data,
            'val' => $val,
            'views' => [
                [
                    'label' => trans('pos.facebook_inbox'),
                    'panel' => [
                        'label' => trans('pos.facebook_inbox'),
                    ],
                    'type' => 'custom',
                    'controller' => '',
                    'template' => 'gen/tpls/custom/facebook/inbox.html',
                ]
            ]
        ];


    }


    public function inboxmessage()
    {
        $page_id = Session::get('fb_page_id');
        $page_name = Session::get('fb_page_name');
        $data = Input::all();

        $sender = FacebookCustomer::where('tid', $data['id'])->first();
        $from["id"] = $sender->from_id;
        $from["name"] = $sender->from_name;
        $data = FacebookChat::where('tid', $data['id'])->where('chat_at', '>', $data['since'])->orderBy('chat_at','DESC')->get();
        //dd($data);
        foreach ($data as $m) {
            //   $this->pr($m->fromId) ;
            // echo $m->fromId." : ".$page_id."<BR>" ;
            if ($m->fromId != $page_id) {
                $m->fromName = $from["name"];
            } else {
                $m->fromName = $page_name;
            }



//            $m->fromName =   ($m->fromId != $fb_id) ?  $from["name"]  :  "TEST" ;
        }
//        $url = "https://graph.facebook.com/v2.5/" . $data['id'] . "/messages?fields=attachments,shares,subject,from,message,created_time&since=" . $data['since'] . "&__previous=1&access_token=" . LONGLIVE_ACCESSTOKEN;
////       dd($url);
//        $data = file_get_contents($url);

//        if(sizeof($data->data)!=0){
//            //---  insert data base
//        }

//        $data = '{"data": [{"message": "20","from": {"name": "Komsan Krasaesin","email": "180617342300780@facebook.com","id": "180617342300780"},"created_time": "2016-02-02T15:19:28+0000","id": "m_mid.1454426368683:ece75f417752c71234"}],"paging": {"previous": "https://graph.facebook.com/v2.5/t_mid.1453826055296:6726c8564763d76e99/messages?fields=message,from,created_time&since=1454426368&format=json&access_token=CAACfguwhIVEBAGJl5DTj6WSLAnhIX5OCNLA3D59m1k2YExqEZBQVn5ZAnF8NQGHRj8W60gs7UoiWIbe5B9odi0TEYxKGxEN2QVUr0YZAZBpJmpdCruBEfXJU0oZA541LsNYOs9PhWcI3h3xZAWVfnv7woH474OVyZBdzSfPWgeZALcNQh9v0mYg0&limit=25&__paging_token=enc_AdDNmCZAMfnPbuVRlLIV1uZA0uoS8Uh2k1I4mJCZCWZCU0OqjqkwpTvQV358nZCkMWhX1ZAZBtAiqUh4KN3BXG3R3ZC3T4JZBi3pnPiGSyal6LZB9ZAmmLQDQZDZD&__previous=1","next": "https://graph.facebook.com/v2.5/t_mid.1453826055296:6726c8564763d76e99/messages?fields=message,from,created_time&since=1454424460&format=json&access_token=CAACfguwhIVEBAGJl5DTj6WSLAnhIX5OCNLA3D59m1k2YExqEZBQVn5ZAnF8NQGHRj8W60gs7UoiWIbe5B9odi0TEYxKGxEN2QVUr0YZAZBpJmpdCruBEfXJU0oZA541LsNYOs9PhWcI3h3xZAWVfnv7woH474OVyZBdzSfPWgeZALcNQh9v0mYg0&limit=25&until=1454426368&__paging_token=enc_AdDNmCZAMfnPbuVRlLIV1uZA0uoS8Uh2k1I4mJCZCWZCU0OqjqkwpTvQV358nZCkMWhX1ZAZBtAiqUh4KN3BXG3R3ZC3T4JZBi3pnPiGSyal6LZB9ZAmmLQDQZDZD"}}' ;
//        $data = '{"data":[]}' ;
//        $json = json_decode($data) ;

        $res = [];
        //$res['data'] = $json->data;
        $res['data'] = $data;


        return $data;

    }

    public function inboxreply()
    {

        $data = Input::all();
        $LONGLIVE_ACCESSTOKEN =  Session::get('fb_longlive_token');
//        dd($data);

        $url = "https://graph.facebook.com/v2.5/" . $data['id'] . "/messages";
        $data = array('message' => $data['replyMessage'], 'access_token' => $LONGLIVE_ACCESSTOKEN);
        $imageurl="http://orig03.deviantart.net/5715/f/2014/362/c/c/phoenix_by_guillaume_phoenix-d7k11t2.jpg";

        if(!empty($imageurl)){
            $source = ['link'=> $imageurl ] ;
            $data = array_merge($data,$source);
        }


        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $return = curl_exec($ch);


        if (!empty($return->id)) {
            return VG::result(true, ['msg' => 'complete']);
        }

    }
}