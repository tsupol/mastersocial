<?php namespace App\FbService;

use App\Models\FacebookCustomer;


use DB;

use Auth;
use Session;
use Redirect;


class FbServiceManager {



    public function bgConversations($session){


        $url =  "https://graph.facebook.com/v2.5/919082208176684/conversations?access_token=".Session::get('fb_longlive_token') ;
        $data =  file_get_contents($url);
        $json = json_decode($data) ;
        $res = [];
        foreach ($json->data as $key=>$d){
            $d_link =   $d->link ;
            $pieces = explode('user%3A',$d_link) ;
            $pieces1 = explode('&threadid',$pieces[1]) ;
            $userId = $pieces1[0] ;
            $FbCus =  FacebookCustomer::where('fb_uid',$userId)->first();

            if(empty($FbCus)){   //--- if hasn't this customer in DB  Call API for get information
                $url  = "https://graph.facebook.com/v2.5/".$userId."?fields=name&access_token=".Session::get('fb_longlive_token') ;
                $data = file_get_contents($url);
                $json = json_decode($data) ;
                $res[$key]["name"] = $json->name ;
                $data=[];
                $data['fb_uid'] = $d->id ;
                $data['fb_uname'] = $json->name ;
                $data['status'] = 1  ;
                $status = FacebookCustomer::create($data);
            }else{
                $res[$key]["name"] = $FbCus->fb_uname ;
            }
            $res[$key]["id"] =  $d->id ;

        }
        return json_encode($res) ;
    }

}