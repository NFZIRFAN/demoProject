<?php

namespace App\Http\Controllers;

use App\Models\Plant;
use Illuminate\Support\Facades\Notification;
use App\Notifications\LowStockNotification;

class LowStockController extends Controller
{
    // ✅ Check all plants (for cron/job)
    public function checkAll()
    {
        $plants = Plant::where('low_stock_email_sent', false)->get();

        foreach ($plants as $plant) {
            $this->checkSingle($plant);
        }

        return 'Low stock check completed.';
    }

    // ✅ Check and notify a single plant safely
    public function checkSingle(Plant $plant)
    {
        // Stop immediately if already sent
        if ($plant->low_stock_email_sent) {
            return;
        }

        // Only notify if reorder required
        if ($plant->isReorderRequired()) {

            // Send notification (can be queued)
            Notification::route('mail', 'nafizirfan03@gmail.com')
                        ->notify(new LowStockNotification($plant));

            // Save plant without triggering observers to prevent recursion
            Plant::withoutEvents(function() use ($plant) {
                $plant->low_stock_email_sent = true;
                $plant->save();
            });
        }
    }
}
