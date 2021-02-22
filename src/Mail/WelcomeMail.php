<?php
// 'src/Mail/WelcomeMail.php'

namespace Mailcct\Mailablecct\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class WelcomeMail extends Mailable
{
    use Queueable, SerializesModels;

    public $content;
    public $subject;

    public function __construct(request $request)
    {
        $content = $request->content;
        $subject = $request->subject;
    }

    public function build()
    {
        return $this->view('mailable::sections.templates')
                ->subject($subject)
                ->with([
                     'content' =>$content,
                 ]);
    }
}