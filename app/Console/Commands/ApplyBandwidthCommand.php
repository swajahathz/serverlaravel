<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
// use App\Models\User;
use App\Models\RS_service_shuduler;
use App\Models\RS_service;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;

class ApplyBandwidthCommand extends Command
{
    protected $signature = 'bandwidth:apply';
    protected $description = 'Apply bandwidth based on schedule or default service attribute';

    public function handle()
    {
         $now = Carbon::now()->format('H:i:s');

         
 // Get all schedule entries
        $allSchedules = RS_service_shuduler::all();

        foreach ($allSchedules as $schedule) {
            // Check if current time is within the schedule
            if ($now >= $schedule->starttime && $now <= $schedule->endtime) {
                // Set status = 1 (active)
                $schedule->status = 1;
                $schedule->save();

                $this->info("Activated SRVID {$schedule->srvid} with bandwidth: {$schedule->downrate}");
            }
        }

        return 0;
    }
    
}
