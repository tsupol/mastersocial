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
use Bus;

class UpdateConversation extends Job implements ShouldQueue
{
    use InteractsWithQueue, SerializesModels;

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
        $userPage = UserPage::where('is_active',1)->get() ;
        foreach ($userPage as $up) {
            $actived_at = $up->actived_at;
            $startTime = Carbon::now()->format('Y-m-d H:i:s');
            $minutes = $this->difftime($startTime, $actived_at);
            echo "$startTime <BR> $actived_at<BR>";
            echo 'Diff. in minutes is: ' . $minutes . "<BR>";
            if ($minutes <= 5) {
//                Bus::dispatch(new GetUserConversation($up));
                Bus::dispatch(new GetUserMessage($up));
            }
        }
        //$data = file_get_contents("http://localhost/mastersocial/public/api/facebook/bgConversations") ;
    }

}
