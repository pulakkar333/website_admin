<?php

namespace App\Mail; // Correct namespace declaration

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactFormMail extends Mailable
{
    use Queueable, SerializesModels;

    // The data you want to pass to the email view
    public $data;

    // Constructor to inject the data into the mailable
    public function __construct($data)
    {
        $this->data = $data;
    }

    // Build the message
    public function build()
    {
        return $this->subject('New Contact Form Submission')
                    ->view('emails.contact') // Make sure this view exists
                    ->with('data', $this->data); // Passing the data to the view
    }
}