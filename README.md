
Mailable packages Run bellow command to install

### Installation

	composer require mailcct/mailablecct 

### Migration

	php artisan migrate

if you send mail in usig this packages added this line in your controller  

	use Mailcct\Mailablecct\Mail\CommonMail;
	
	use Mail;

after add this line you can send mail according to pass mailable type and get template data in your db 
		
import your mailable model 

	use Mailcct\Mailablecct\Models\MailTemplate;

get data in your db template according to your mailable type using this line 
	
	// pass mailable type accoding to send mail template 
	
	EX. $mail_type = 'order_view';
	
        $tomail = 'testingtest@yopmail.com';
        $mail_template = MailTemplate::select('id','html_template','subject')->where('mailable_type',$mail_type)->first();

        if(!empty($mail_template)){
            $data['html_template'] = $mail_template['html_template'];
            $data['subject'] = $mail_template['subject'];

            /* send mail  */
            Mail::to($tomail)->send(new CommonMail($data));

            }
	$mail_template = MailTemplate::select('mail_templates.*')->where('mailable_type',$mail_type)->first();

	if(!empty($mail_template)){
        $data['html_template'] = $mail_template['html_template'];
        $data['subject'] = $mail_template['subject'];

        /* send mail  */
        Mail::to($tomail)->send(new CommonMail($data));
        }
	

### Configuration
    
Then run bellow command to publish config and resource files

If you want to change these options, you'll have to publish the `views` file.

	php artisan vendor:publish --provider="Mailcct\Mailablecct\MailEditServiceProvider" --tag="css"

	php artisan vendor:publish --provider="Mailcct\Mailablecct\MailEditServiceProvider" --tag="views"
