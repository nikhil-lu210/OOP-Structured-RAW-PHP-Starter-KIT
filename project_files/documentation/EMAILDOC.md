
# How to send mail?

> **use App\Config\Mail;**

    $recipient =  'receipt@mail.com';
    $subject =  'Email Subject Here';
    $template =  mail_view('emails.usermail', compact('website'));
        
    Mail::send($recipient, $subject, $template);
