<?php

namespace App\Commands;

use App\Http\Controllers\FacebookController;
use App\Models\Facebook;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Log;
use Fb;

class TestCommand extends Command implements ShouldQueue
{
    use InteractsWithQueue, SerializesModels;

    protected $user;

    public function __construct($data)
    {
        $this->data = $data; // test
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
//        Log::info('Job! '.$this->data);

        //$data = file_get_contents("http://localhost/mastersocial/public/api/facebook/bgConversations") ;
        getConversation();


        Log::info('data! '.$data);

    }

    public function getConversation(){
        $this->data->page_id ;
        $url =  "https://graph.facebook.com/v2.5/919082208176684/conversations?access_token=".LONGLIVE_ACCESSTOKEN ;
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
                $url  = "https://graph.facebook.com/v2.5/".$userId."?fields=name&access_token=".LONGLIVE_ACCESSTOKEN ;
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
