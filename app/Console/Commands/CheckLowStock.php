<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Plant;
use Illuminate\Support\Facades\Notification;
use App\Notifications\LowStockNotification;

class CheckLowStock extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'plants:check-low-stock';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Check all plants and send low-stock notifications if required';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $plants = Plant::where('low_stock_email_sent', false)->get();

        foreach ($plants as $plant) {
            if ($plant->isReorderRequired()) {
                Notification::route('mail', 'nafizirfan03@gmail.com')
                            ->notify(new LowStockNotification($plant));

                $plant->low_stock_email_sent = true;
                $plant->save();

                $this->info("Low stock alert sent for plant: {$plant->name}");
            }
        }

        $this->info('Low stock check completed successfully.');
    }
}
