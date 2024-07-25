<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ForgetPasswordMail extends Mailable
{
    use Queueable, SerializesModels;

    public $user;

    public function __construct($user)
    {
        $this->user =   $user;
    }

    public function build(){
        return $this->markdown('emails.forgot_password')
                    ->subject(config('app.name'). ',ForgetPasword');
                     
    }
     
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Forget Password Mail',
        );
    }

     
    public function content(): Content
    {
        return new Content(
            view: 'view.name',
        );
    }

     
    public function attachments(): array
    {
        return [];
    }
}
