<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class LowStockNotification extends Notification implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new notification instance.
     */

    protected $plant;
    public function __construct($plant)
    {
        $this->plant = $plant;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
     public function via($notifiable)
    {
        return ['mail']; // email notification
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
         return (new MailMessage)
            ->subject('⚠️ LOW STOCK ALERTS: ' . $this->plant->name)
            ->greeting('HELLO ADMIN,')
            ->line('The following product has reached its reorder point:')
            ->line('Product: ' . $this->plant->name)
            ->line('Category: ' . $this->plant->category)
            ->line('Current Stock: ' . $this->plant->stock_quantity)
            ->action('Confirm Reorder', url('/admin/dashboard'))
            ->line('Please reorder the product to avoid stock-out.');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
