<?php

namespace Mailcct\Mailablecct\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CommonMail extends Mailable
{
    use Queueable, SerializesModels;

    
    public $data;

    public function __construct($request)
    {
        $this->data = $request;
      
    }

    public function build()
    {
        return $this->view('mailable::sections.templates')
            ->subject( $this->data['subject'])
            ->with([
                 'html_template' => $this->data['html_template'],
            ]);
    }
}