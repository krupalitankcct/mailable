<?php
// 'src/Mail/WelcomeMail.php'

namespace Mailcct\Mailablecct\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class WelcomeMail extends Mailable
{
    use Queueable, SerializesModels;

    public $html_template;
    public $subject;

    public function __construct($request)
    {
        $html_template = $request['html_template'];
        $subject = $request['subject'];
    }

    public function build()
    {
        return $this->view('mailable::sections.templates')
                ->subject($subject)
                ->with([
                     'html_template' =>$html_template,
                 ]);
    }
}