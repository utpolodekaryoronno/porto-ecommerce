<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Mail\Mailables\Attachment;
use Illuminate\Contracts\Queue\ShouldQueue;

class ContactConfirmMail extends Mailable
{
    use Queueable, SerializesModels;

    private $name;
    private $email;
    private $phone;
    private $address;
    private $user_message;
    private $photo;

    /**
     * Create a new message instance.
     */
    public function __construct($name, $email, $phone, $address, $user_message, $photo)
    {
        $this->name         = $name;
        $this->email        = $email;
        $this->phone        = $phone;
        $this->address      = $address;
        $this->user_message = $user_message;
        $this->photo        = $photo;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Contact Confirm Mail',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'mail.contact',
            with: [
                'name' => $this->name,
                'email' => $this->email,
                'phone' => $this->phone,
                'address' => $this->address,
                'user_message' => $this->user_message,
                'photo'        => $this->photo,
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
            Attachment::fromPath(public_path('attatchment.png'))
        ];
    }
}
