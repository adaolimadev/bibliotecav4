<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class SendMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    public function build ()
    {
       
        $mail =  $this->view('mail')
                    ->from([
                        'address' => $this->data['from']['address'],
                        'name' => $this->data['from']['name'],
                    ])
                    ->replyTo([
                        'address' => 'informatica02@balflex.com.br',
                        'name'  => 'informatica02@balflex.com.br'
                    ])
                    ->subject( $this->data['subject'] )
                    ->with([
                        'borba' => $this->data['borba']
                    ]);

        foreach($this->data['files'] as $file){
            $mail->attachData(
                $file['doc'],
                $file['name'],
                [
                    'mime' => $file['mime'],
                ]
                );
        }

        return $mail;
    }

}
