<?php

namespace App\Jobs;

use App\Http\Controllers\FacebookController;
use App\Models\Facebook;
use App\Models\FacebookCustomer;
use App\Models\UserPage;
use Carbon\Carbon;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Log;
use Fb;

class GetUserConversation extends Job implements ShouldQueue
{
    use InteractsWithQueue, SerializesModels;

    protected $up;
    
    public function __construct($up)
    {
        $this->up = $up;
    }

    public function handle()
    {
        Log::info('start '.$this->up->page_id);
        $LONGLIVE_ACCESSTOKEN = $this->up->longlive_token ;
        $url =  "https://graph.facebook.com/v2.5/".$this->up->page_id."/conversations?access_token=".$LONGLIVE_ACCESSTOKEN ;
        $data =  file_get_contents($url);
        $json = json_decode($data) ;
        $res = [];
        foreach ($json->data as $key=>$d){

            $d_link =   $d->link ;
            $pieces = explode('user%3A',$d_link) ;
            $pieces1 = explode('&threadid',$pieces[1]) ;
            $userId = $pieces1[0] ;
            $FbCus =  FacebookCustomer::where('tid',$d->id)->first();

            if(empty($FbCus)){   //--- if hasn't this customer in DB  Call API for get information
                $url  = "https://graph.facebook.com/v2.5/".$userId."?fields=name&access_token=".$LONGLIVE_ACCESSTOKEN ;
                $data = file_get_contents($url);
                $json = json_decode($data) ;
                $res[$key]["name"] = $json->name ;
                $data=[];
                $data['tid'] = $d->id ;
                $data['from_id'] = $json->id ;
                $data['from_name'] = $json->name ;
                $data['status'] = 1  ;
                $status = FacebookCustomer::create($data);
            }

            Bus::dispatch(new GetUserMessage($d));


        }

        Log::info('end '.$this->up->page_id);
    }


}
