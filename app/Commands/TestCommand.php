<?php

namespace App\Commands;

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

class TestCommand extends Command implements ShouldQueue
{
    use InteractsWithQueue, SerializesModels;

    protected $data;



    public function __construct()
    {




    }

    /**
     * Execute the job.
     *
     * @return void
     */

    protected function difftime($start_at, $active_at)
    {
        $datetime1 = strtotime($active_at);
        $datetime2 = strtotime($start_at);
        $interval = abs($datetime2 - $datetime1);
        $minutes = round($interval / 60);
        return $minutes;
    }

    public function handle()
    {
//        Log::info('Job! '.$this->data);
        $userPage = UserPage::all();
        foreach ($userPage as $up) {

            $actived_at = $up->actived_at;
            $startTime = Carbon::now()->format('Y-m-d H:i:s');
            $minutes = $this->difftime($startTime, $actived_at);

            echo "$startTime <BR> $actived_at<BR>";
            echo 'Diff. in minutes is: ' . $minutes . "<BR>";

            if ($minutes <= 5) {
                //--- call if active
                $this->getConversation($up);
            } else {
            }

        }
        //$data = file_get_contents("http://localhost/mastersocial/public/api/facebook/bgConversations") ;
    }

    public function getConversation($up){

        Log::info('start '.$up->page_id);
        $LONGLIVE_ACCESSTOKEN = $up->longlive_token ;
        $url =  "https://graph.facebook.com/v2.5/".$up->page_id."/conversations?access_token=".$LONGLIVE_ACCESSTOKEN ;
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
                $url  = "https://graph.facebook.com/v2.5/".$userId."?fields=name&access_token=".$LONGLIVE_ACCESSTOKEN ;
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

        Log::info('end '.$up->page_id);

        return json_encode($res) ;
    }

    public static function curl_download($Url){

        // is cURL installed yet?
        if (!function_exists('curl_init')){
            die('Sorry cURL is not installed!');
        }

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $Url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_TIMEOUT, 30);
        $output = curl_exec($ch);
        curl_close($ch);

        return $output;
    }

}
