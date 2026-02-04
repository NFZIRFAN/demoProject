<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PaymentSuccessMail extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    public $orderId;
    public $plant;
    public $quantity;

    public function __construct($user, $orderId, $plant, $quantity)
    {
        $this->user = $user;
        $this->orderId = $orderId;
        $this->plant = $plant;
        $this->quantity = $quantity;
    }

    public function build()
    {
        return $this->subject('Your Purchase is Successful!')
                    ->view('payment-success'); // Blade view
    }
}
