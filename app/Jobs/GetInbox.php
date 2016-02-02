<?php namespace App\Jobs;

use Illuminate\Bus\Queueable;

use App\EventMedia;
use App\Fan;
use App\Media;
use App\Mvent;
use Carbon\Carbon;
use Event;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Log;

class GetInbox extends Job implements ShouldQueue {

    use InteractsWithQueue, SerializesModels;

    /**
     * Create a new command instance.
     *
     * @return void
     */
    protected $parameter1;

    public function __construct($parameter1)
    {
        $this->$parameter1 = $parameter1;
    }

    /**
     * Execute the command.
     *
     * @return void
     */
    public function handle()
    {
        $commandName = 'GetInbox';
        $startTime = Carbon::now();
        $nowStr = $startTime->toDateTimeString();
        
        Log::info("begin [{$commandName}]");

        try {

            // Your Code Here!
            Log::info("[{$commandName}]");
//            Log::info("[{$commandName}][{$this->$parameter1}]");


        } catch (\Exception $exception) {

            // Your Error Code Here!

            Log::notice("[Error][{$commandName}] {$exception->getMessage()}");

        }

        // Log finish time

        $dif = $startTime->diff(Carbon::now());
        $runTime = $dif->h.":".$dif->i.":".$dif->s;
        Log::info("finish [{$commandName}] runtime={$runTime}");

    }


}
