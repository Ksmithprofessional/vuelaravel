<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class Email extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

     public $email;
     public $quote;
     public $price;

    public function __construct($email, $quote, $price)
    {
        //
        $this->email = $email;
        $this->quote = $quote;
        $this->price = $price;
    }

    // public function envelope()
    // {
    //     return new Envelope(
    //         subject: 'My Test Email',
    //     );
    // }

    // public function content()
    // {
    //     return new Content(
    //         view: 'Email',
    //         with: ['email' => $this->email, 'quote' => $this->quote, 'price' => $this->price],
    //     );
    // }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('Email')
                    ->with([
                        'email' => $this->email, 
                        'quote' => $this->quote, 
                        'price' => $this->price
                    ]);
    }
}
