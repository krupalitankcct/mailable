
Mailable packages Run bellow command to install

### Installation

	composer require mailcct/mailablecct 

### Migration

1. php artisan migrate

2. if you send mail in usig this packages added this line in your controller  

		use Mailcct\Mailablecct\Mail\WelcomeMail;

after add this line you can send mail according to pass mailable type and get template data in your db 

import your mailable model 

	use Mailcct\Mailablecct\Models\MailTemplate;

get data in your db template according to your mailable type using this line 

	if(!empty($mail_template)){
        $data['html_template'] = $mail_template['html_template'];
        $data['subject'] = $mail_template['subject'];

        /* send mail  */
        Mail::to($tomail)->send(new WelcomeMail($data));
        }
	

### Configuration
    
Then run bellow command to publish config and resource files

If you want to change these options, you'll have to publish the `views` file.


php artisan vendor:publish --provider="Mailcct\\Mailablecct\\MailEditServiceProvider" --tag="css"


	php artisan vendor:publish --provider="Mailcct\\Mailablecct\\MailEditServiceProvider" --tag="css"

	php artisan vendor:publish --provider="Mailcct\\Mailablecct\\MailEditServiceProvider" --tag="views"
