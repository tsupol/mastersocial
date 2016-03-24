<?php

namespace App\Jobs;

use App\Http\Controllers\FacebookController;
use App\Models\Facebook;
use App\Models\FacebookChat;
use App\Models\FacebookCustomer;
use App\Models\FacebookSession;
use App\Models\UserPage;
use Carbon\Carbon;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Log;
use Fb;
use Bus;

class GetUserMessage extends Job implements ShouldQueue
{
    use InteractsWithQueue, SerializesModels;

    protected $data ;

    public function __construct($data)
    {
        $this->data = $data ;
    }


    public function handle()
    {
        $page_id = $this->data->page_id;
        $longlive_token = $this->data->longlive_token;
        echo "bgConversations Page : $page_id<BR>";

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

                $fromId = $d->participants->data[0]->id;
                $fromName = $d->participants->data[0]->name;
                if($d->participants->data[0]->id == $page_id ){
                    $fromId = $d->participants->data[1]->id;
                    $fromName = $d->participants->data[1]->name;
                }

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

    }

}
