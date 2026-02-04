<?php

namespace App\Jobs;

use App\Models\Plant;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Notification;
use App\Notifications\LowStockNotification;

class SendLowStockAlert implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $plant;

    public function __construct(Plant $plant)
    {
        $this->plant = $plant;
    }

    public function handle()
    {
        if ($this->plant->isReorderRequired() && !$this->plant->low_stock_email_sent) {
            Notification::route('mail', 'nafizirfan03@gmail.com')
                        ->notify(new LowStockNotification($this->plant));

            $this->plant->low_stock_email_sent = true;
            $this->plant->save();
        }
    }
}
