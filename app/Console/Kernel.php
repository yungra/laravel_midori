<?php

namespace App\Console;

// use App\Console\ScheduleObj as ConsoleScheduleObj;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use App\Models\Person;
use App\Jobs\MyJob;
use App\Console\ScheduleObj;
use Illuminate\Support\Facades\Storage;


class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $count = Person::all()->count();
        $id = rand(0, $count) + 1;

        //インスタンス実行
        $schedule->call(new Myjob($id));

        //クロージャ内で実行
        $schedule->call(function() use($id)
        {
            MyJob::dispatch($id);
        });
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}


