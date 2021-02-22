<?php
// 'src/Mail/WelcomeMail.php'

namespace mailcct\mailablecct\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use JohnDoe\BlogPackage\Models\Post;

class WelcomeMail extends Mailable
{
    use Queueable, SerializesModels;

    public $content;
    public $subject;

    public function __construct(Post $post)
    {
        $content = $request->content;
        $subject = $request->subject;
    }

    public function build()
    {
        return $this->view('mailable::sections.templates')->subject($subject)
                 ->with([
                     'content' =>$content,
                 ])
    }
}