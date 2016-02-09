<?php

namespace App\Console;

use Carbon\Carbon;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use App\Commands\TestCommand;
use Bus;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        Commands\Inspire::class,
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        function sDiff(Carbon $t1, Carbon $t2) {
            $diff = $t1->diff($t2);
            return ($diff->s + $diff->m*60 + $diff->h*3600);
        }

        $schedule->command('inspire')
                 ->hourly();

        if(true) {
            Bus::dispatch(new TestCommand('555666777'));

            // loop 6 times in 1 minute
            $startTime = Carbon::now();
            $st = Carbon::now();
            $i = 0;
            while (sDiff($startTime, Carbon::now()) < 59 && $i < 15) {
                if ($i == 0 || sDiff($st, Carbon::now()) >= 6) {
                    Bus::dispatch(new TestCommand('in loop - '.$i));
                } else {
                    usleep(1000000);
                }
            }

            // one time
            $schedule->call(function () {
                Log::notice('--- storing media ---');
                Bus::dispatch(new StoreMedia());
            })->dailyAt('1:23')->sendOutputTo(storage_path('logs/output.log'));

        }
    }
}
