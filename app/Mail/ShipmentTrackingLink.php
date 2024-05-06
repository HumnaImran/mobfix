<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ShipmentTrackingLink extends Mailable
{
    use Queueable, SerializesModels;
    public $trackingLink;
    /**
     * Create a new message instance.
     */
    public function __construct( $trackingLink)
    {
        //
        $this->trackingLink = $trackingLink;
        // $this->data = $data;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Shipment Tracking Link',
        );
    }

    /**
     * Get the message content definition.
     */
    // public function content(): Content
    // {
    //     return new Content(
    //         view: 'view.name',
    //     );
    // }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }

    public function build()
{
    return $this->view('emails.shipment_tracking_link')
                ->with([
                    'trackingLink' => $this->trackingLink,
                ]);
}
}
