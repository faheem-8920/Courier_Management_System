<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class RiderMessageEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $subjectLine;
    public $messageBody;
    public $riderName;

    /**
     * Create a new message instance.
     */
    public function __construct($subjectLine, $messageBody, $riderName)
    {
        $this->subjectLine = $subjectLine;
        $this->messageBody = $messageBody;
        $this->riderName = $riderName;
    }

    /**
     * Build the message.
     */
    public function build()
    {
        return $this->subject($this->subjectLine)
                    ->view('emails.RiderMessageEmail')
                    ->with([
                        'subjectLine' => $this->subjectLine,
                        'messageBody' => $this->messageBody,
                        'riderName' => $this->riderName,
                    ]);
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
