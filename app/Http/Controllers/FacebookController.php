<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\User;
use Carbon\Carbon;
use VG;
use Input;
use Session;


class FacebookController extends Controller
{

    public function index()
    {
//        $data = User::withTrashed()->orderBy('id','DESC')->with('role', 'group', 'branch')->paginate(10);


        $data = [];

//        dd($data);
        // $data["packages"] = Package::skip(0)->take(20)->get();
        return [
            'settings' => VG::getSetting('facebook_inbox'),
            'val' => $data,
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

//        return json_encode(VG::getTableSchema($data, 'users.index'));
    }

    public function create()
    {
        return User::getCreateView();
    }

    public function store()
    {
        $data = Input::all();

        if ($data["password"] != $data["confirm_password"] ){
            return VG::result(false, 'failed!');
        }

        $chk = User::where('email', $data["email"])->first();
        if(isset($chk)){
            return VG::result(false, 'failed!'); //--- check email ���
        }


        $data["password"] = bcrypt($data["password"]) ;

        $data = array_diff_key($data, array_flip(['id','_method','deleted_at','deleted_by','updated_at','created_at']));
        $data["created_by"] = Session::get('user_id');
        $status = User::create($data);

        if($status === NULL) {
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
        $data = array_diff_key($data, array_flip(['id','confirm_password', '_method','deleted_at','deleted_by','updated_at','created_at']));

        if(isset($data["change_pass"]) && $data["change_pass"] == true) {
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
        if($status == 1) {
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
        }else{
            $user->delete();
            return VG::result(true, ['action' => 'delete', 'id' => $id]);
        }
    }

    public function duplicate($id)
    {
        $user = User::find($id);
        if(is_null($user)) return VG::result(false, trans('error.not_found', ['id', $id]));
        try {
            $copy = $user->replicate();
            $email = 'copy_'.$copy->email;
            while(User::whereEmail($email)->count() > 0) {
                $email = 'copy_'.$email;
            }
            $copy->email = $email;
            $copy->save();
        } catch(\Illuminate\Database\QueryException $e) {
            return VG::result(false, $e->errorInfo);
        }
        return VG::result(true, ['redirect' => '/app/users']);
    }

    public function pr($msg){
        echo "<pre>" ;
        print_r($msg) ;
        echo "</pre>" ;

    }

    public function inbox(){
        $longLiveAccessToken = "CAACfguwhIVEBAGJl5DTj6WSLAnhIX5OCNLA3D59m1k2YExqEZBQVn5ZAnF8NQGHRj8W60gs7UoiWIbe5B9odi0TEYxKGxEN2QVUr0YZAZBpJmpdCruBEfXJU0oZA541LsNYOs9PhWcI3h3xZAWVfnv7woH474OVyZBdzSfPWgeZALcNQh9v0mYg0" ;
        $url =  "https://graph.facebook.com/v2.5/919082208176684/conversations?access_token=$longLiveAccessToken" ;
        $data =  file_get_contents($url);

        $json = json_decode($data) ;

        $res = [];

        foreach ($json->data as $key=>$d){


            $d_link =   $d->link ;

            $pieces = explode('user%3A',$d_link) ;
            $pieces1 = explode('&threadid',$pieces[1]) ;

            $userId = $pieces1[0] ;
            //$url =  "https://graph.facebook.com/v2.5/".$userId."?fields=picture,name&access_token=$longLiveAccessToken" ;
            $url =  "https://graph.facebook.com/v2.5/".$userId."?fields=name&access_token=$longLiveAccessToken" ;
            $data =  file_get_contents($url);
            $json = json_decode($data) ;
            //$res[$key]["picture"] = $json->picture->data->url ;
            $res[$key]["name"] = $json->name ;
            $res[$key]["id"] =  $d->id ;



//            $this->pr($d) ;
//            $url =  "https://graph.facebook.com/v2.5/".$d->id."?fields=messages.limit(25){id,message}&access_token=$longLiveAccessToken" ;
//            $data =  file_get_contents($url);
//            $json = json_decode($data) ;
//
//            foreach ($json->messages->data as $c)
//            {
//                $this->pr($c) ;
//            }

        }


        return json_encode($res) ;

    }

    public function conversation($id){

        $longLiveAccessToken = "CAACfguwhIVEBAGJl5DTj6WSLAnhIX5OCNLA3D59m1k2YExqEZBQVn5ZAnF8NQGHRj8W60gs7UoiWIbe5B9odi0TEYxKGxEN2QVUr0YZAZBpJmpdCruBEfXJU0oZA541LsNYOs9PhWcI3h3xZAWVfnv7woH474OVyZBdzSfPWgeZALcNQh9v0mYg0" ;

        //--- get who send message
        $url =  "https://graph.facebook.com/v2.5/".$id."?fields=senders,updated_time&access_token=$longLiveAccessToken" ;
        $data =  file_get_contents($url);
        $sender = json_decode($data) ;
        $from = [] ;
        foreach ($sender->senders->data as $s){
            if( $s->id!=919082208176684){
                $from["id"] = $s->id ;
                $from["name"] = $s->name ;
            }
        }


        $url =  "https://graph.facebook.com/v2.5/".$id."/messages?fields=message,from,created_time&access_token=$longLiveAccessToken" ;
        $data =  file_get_contents($url);
        $message = json_decode($data) ;
//        $user_id = "" ;
//        foreach($json->data as $key=>$j){
//           if($j->from->id!="919082208176684"){
//               echo "in loop<BR>" ;
//                $user_id = $j->from->id ;
//           }
//        }
       // $url =  "https://graph.facebook.com/$user_id/picture" ;
        $data = [] ;
        $data['message'] = $message ;
        $data['sender'] = $from ;
        $data['mid'] = $id ;
        //$data['update_time'] = $sender->updated_time ;

        $data['update_time']  = "2016-02-02T14:47:40+0000" ;

        // $data["packages"] = Package::skip(0)->take(20)->get();
        return [
            'settings' => VG::getSetting('facebook_inbox'),
            'val' => $data,
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

    public function inboxmessage(){

        $data = Input::all();

        $longLiveAccessToken = "CAACfguwhIVEBAGJl5DTj6WSLAnhIX5OCNLA3D59m1k2YExqEZBQVn5ZAnF8NQGHRj8W60gs7UoiWIbe5B9odi0TEYxKGxEN2QVUr0YZAZBpJmpdCruBEfXJU0oZA541LsNYOs9PhWcI3h3xZAWVfnv7woH474OVyZBdzSfPWgeZALcNQh9v0mYg0" ;
        $url =  "https://graph.facebook.com/v2.5/".$data['id']."/messages?fields=message,from,created_time&since=".$data['since']."&__previous=1&access_token=$longLiveAccessToken" ;
//       dd($url);
        $data =  file_get_contents($url);

//        if(sizeof($data->data)!=0){
//            //---  insert data base
//        }

//        $data = '{"data": [{"message": "20","from": {"name": "Komsan Krasaesin","email": "180617342300780@facebook.com","id": "180617342300780"},"created_time": "2016-02-02T15:19:28+0000","id": "m_mid.1454426368683:ece75f417752c71234"}],"paging": {"previous": "https://graph.facebook.com/v2.5/t_mid.1453826055296:6726c8564763d76e99/messages?fields=message,from,created_time&since=1454426368&format=json&access_token=CAACfguwhIVEBAGJl5DTj6WSLAnhIX5OCNLA3D59m1k2YExqEZBQVn5ZAnF8NQGHRj8W60gs7UoiWIbe5B9odi0TEYxKGxEN2QVUr0YZAZBpJmpdCruBEfXJU0oZA541LsNYOs9PhWcI3h3xZAWVfnv7woH474OVyZBdzSfPWgeZALcNQh9v0mYg0&limit=25&__paging_token=enc_AdDNmCZAMfnPbuVRlLIV1uZA0uoS8Uh2k1I4mJCZCWZCU0OqjqkwpTvQV358nZCkMWhX1ZAZBtAiqUh4KN3BXG3R3ZC3T4JZBi3pnPiGSyal6LZB9ZAmmLQDQZDZD&__previous=1","next": "https://graph.facebook.com/v2.5/t_mid.1453826055296:6726c8564763d76e99/messages?fields=message,from,created_time&since=1454424460&format=json&access_token=CAACfguwhIVEBAGJl5DTj6WSLAnhIX5OCNLA3D59m1k2YExqEZBQVn5ZAnF8NQGHRj8W60gs7UoiWIbe5B9odi0TEYxKGxEN2QVUr0YZAZBpJmpdCruBEfXJU0oZA541LsNYOs9PhWcI3h3xZAWVfnv7woH474OVyZBdzSfPWgeZALcNQh9v0mYg0&limit=25&until=1454426368&__paging_token=enc_AdDNmCZAMfnPbuVRlLIV1uZA0uoS8Uh2k1I4mJCZCWZCU0OqjqkwpTvQV358nZCkMWhX1ZAZBtAiqUh4KN3BXG3R3ZC3T4JZBi3pnPiGSyal6LZB9ZAmmLQDQZDZD"}}' ;
//        $data = '{"data":[]}' ;
//        $json = json_decode($data) ;

        $res = [];
        //$res['data'] = $json->data;
        $res['data'] = $data;


        return $data ;

    }

    public function inboxreply(){

        $data = Input::all();
        $longLiveAccessToken = "CAACfguwhIVEBAGJl5DTj6WSLAnhIX5OCNLA3D59m1k2YExqEZBQVn5ZAnF8NQGHRj8W60gs7UoiWIbe5B9odi0TEYxKGxEN2QVUr0YZAZBpJmpdCruBEfXJU0oZA541LsNYOs9PhWcI3h3xZAWVfnv7woH474OVyZBdzSfPWgeZALcNQh9v0mYg0" ;
        $url =  "https://graph.facebook.com/v2.5/".$data['id']."/messages" ;
       // $data =  file_put_contents($url);

        $data = array('message' => $data['replyMessage'] , 'access_token' => $longLiveAccessToken );
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $return = curl_exec ($ch);

        dd($return);

        if(!empty($return->id)){
            //---  insert data base
            // reply complete
        }

    }
}