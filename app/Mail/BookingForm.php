<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Symfony\Component\HttpFoundation\Request;

class BookingForm extends Mailable
{
    use Queueable, SerializesModels;

    public $bookingFormData;
    /**
     * Create a new message instance.
     *
     */
    public function __construct($bookingFormData)
    {
        $this->bookingFormData = $bookingFormData;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $this->replyTo($this->bookingFormData['email'], $this->bookingFormData['name']);
        return $this->view('emails.booking');
    }
}
