<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class UserResetPassword extends Mailable
{
    use Queueable, SerializesModels;


    protected $data = [];

    /**
     * Create a new message instance.
     *
     * @param array $data
     */
    public function __construct(array $data = [])
    {
        //
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('front.email.reset_password')->with('data', $this->data);
    }
}
