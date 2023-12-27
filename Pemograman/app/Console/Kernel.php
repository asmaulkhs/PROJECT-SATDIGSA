<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use App\Models\surat;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     */
    protected function schedule(Schedule $schedule): void
    {
        // $schedule->command('inspire')->hourly();
        $schedule->call(function(){
            $now = now();
            $datas = Surat::WhereHas('tamu', function ($query){
                $query->where('datang', null);
                })->where('waktu','<=' ,$now)->get();

            foreach($datas as $data){
                $data->tamu->update(['datang'=>false]);
            }
            // info('Your scheduled task completed.');
        })->everyMinute();
    }

    /**
     * Register the commands for the application.
     */
    protected function commands(): void
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
