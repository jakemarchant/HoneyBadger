<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class VisitEnquiry extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * @param  array{name: string, email: string, phone: ?string, enquiry_type: string, message: ?string}  $enquiry
     */
    public function __construct(public array $enquiry)
    {
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'HoneyBadger Norwich enquiry: '.$this->enquiry['enquiry_type'],
            replyTo: [$this->enquiry['email']],
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.visit-enquiry',
            with: ['enquiry' => $this->enquiry],
        );
    }
}
