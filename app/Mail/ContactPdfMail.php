<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Mail\Mailables\Attachment;
use Illuminate\Contracts\Queue\ShouldQueue;


class ContactPdfMail extends Mailable
{
    use Queueable, SerializesModels;

    private $name;
    private $email;
    private $phone;
    private $address;
    private $file;



    /**
     * Create a new message instance.
     */
    public function __construct($name, $email, $phone, $address, $file)
    {
        $this->name         = $name;
        $this->email        = $email;
        $this->phone        = $phone;
        $this->address      = $address;
        $this->file         = $file;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Contact Pdf Mail',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'mail.contact-pdf',
            with: [
                'name' => $this->name,
                'email' => $this->email,
                'phone' => $this->phone,
                'address' => $this->address
            ]
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [
            Attachment::fromPath(public_path('pdf/' . $this -> file))
        ];
    }
}
