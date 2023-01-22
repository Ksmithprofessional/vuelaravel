<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

use App\Mail\quotesEmail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;
use App\Models\checkout;


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
        $schedule->call(function() {

            $quotes = DB::select('select * from checkouts where created_at = :created', ['created' => now()->format('Y-m-d')]);
            Mail::to('upsidedownjerry@hotmail.co.uk')->send(new QuotesEmail($quotes));
        })->daily()->at('17:00');
        //hopefully passes the contents of the checkout table to $quotes and then loops over it and sends it
        
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
