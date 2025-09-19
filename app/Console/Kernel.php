<?php

namespace App\Console;

use App\Models\ValidasiPerencanaan;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        //
    ];

    /**
     * Define the application's command schedule.
     *
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->command('cache:prune-stale-tags')->hourly();
        $schedule->command('sync:parent-skp')->everyFifteenMinutes();
        $schedule->command('jumlah-output 2023 akhir')->everyTenMinutes();

        // bypass validasi perencanaan BPKAD dan BKD yang sudah divalidasi Bappeda
        $schedule->call(function () {
            ValidasiPerencanaan::tahunKinerja(2024)
                ->where('tahap', 2)
                ->whereNull('status')
                ->update([
                    'tahap' => 3,
                    'status' => true,
                ]);
        })
            ->everyMinute();
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
