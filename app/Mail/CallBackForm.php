<?php
/**
 * Created by PhpStorm.
 * User: neil
 * Date: 19/12/2017
 * Time: 23:14
 */

namespace App\Mail;


use Illuminate\Mail\Mailable;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;

class CallBackForm extends Mailable
{
    use Queueable, SerializesModels;

    public $callBackFormData;
    /**
     * Create a new message instance.
     *
     */
    public function __construct($callBackFormData)
    {
        $this->callBackFormData = $callBackFormData;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.callback');
    }
}