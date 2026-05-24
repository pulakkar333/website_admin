<?php

namespace App\Mail;

use App\Models\ConsultationRequest;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Mail\Mailables\Attachment;
use Illuminate\Queue\SerializesModels;

class ConsultationInquiryMail extends Mailable
{
    use Queueable, SerializesModels;

    public $requestData;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(ConsultationRequest $requestData)
    {
        // জব বা কন্ট্রোলার থেকে আসা ডাটা এখানে রিসিভ করা হয়
        $this->requestData = $requestData;
    }

    /**
     * Get the message envelope.
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */
    public function envelope()
    {
        return new Envelope(
            subject: 'New Expert Consultation Request: ' . $this->requestData->full_name,
        );
    }

    /**
     * Get the message content definition.
     *
     * @return \Illuminate\Mail\Mailables\Content
     */
    public function content()
    {
        return new Content(
            view: 'emails.consultation_inquiry', // আমরা এই ভিউটি এখন তৈরি করবো
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array
     */
    public function attachments()
    {
        // যদি ফর্মে ফাইল থাকে, তবে সেটি ইমেইলের সাথে যুক্ত করা হবে
        if ($this->requestData->file && file_exists(public_path($this->requestData->file))) {
            return [
                Attachment::fromPath(public_path($this->requestData->file)),
            ];
        }

        return [];
    }
}