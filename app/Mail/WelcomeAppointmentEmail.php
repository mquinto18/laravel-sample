<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class WelcomeAppointmentEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $subject;
    public $name;
    public $address;
    public $email;
    public $description;
    public $date;
    public $qrcode;

    public function __construct($subject, $name, $address, $email, $description, $date, $qrcode)
    {
        $this->subject = $subject;
        $this->name = $name;
        $this->address = $address;
        $this->email = $email;
        $this->description = $description;
        $this->date = $date;
        $this->qrcode = $qrcode;
    }

    public function build()
    {
        return $this->view('emails.appointment')
                    ->subject($this->subject);
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'mail-template.appointment-email',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
