<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Mail\Mailables\Attachment;

class OrderInvoiceMail extends Mailable
{
    use Queueable, SerializesModels;

    public $name;
    public $cart;
    public $grandTotal;
    public $fileName;

    /**
     * Create a new message instance.
     */
    public function __construct($name, $cart, $grandTotal, $fileName)
    {
        $this->name = $name;
        $this->cart = $cart;
        $this->grandTotal = $grandTotal;
        $this->fileName = $fileName;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Your Order Invoice',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'mail.orderInvoice',
            with: [
                'name' => $this->name,
                'cart' => $this->cart,
                'grandTotal' => $this->grandTotal,
            ]
        );
    }

    /**
     * Attachments for the email.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [
            Attachment::fromPath(public_path('invoices/' . $this->fileName))
                ->as('invoice.pdf')
                ->withMime('application/pdf'),
        ];
    }
}
