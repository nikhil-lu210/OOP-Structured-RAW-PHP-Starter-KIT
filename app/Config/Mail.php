<?php

namespace App\Config;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class Mail {
    protected static PHPMailer $mail;
    
    /**
     * Initialize the PHPMailer object and set up the configuration.
     *
     * @return void
     * @throws \PHPMailer\PHPMailer\Exception
     */
    protected static function setUp(): void {
        self::$mail = new PHPMailer(true); // Pass "true" to enable exceptions
        
        // Configuration settings
        self::$mail->isSMTP();
        self::$mail->Mailer = env('MAIL_MAILER', 'smtp');
        self::$mail->SMTPAuth = true;
        self::$mail->SMTPSecure = env('MAIL_ENCRYPTION', 'tls');
        self::$mail->Host = env('MAIL_HOST', 'smtp.mailtrap.io');
        self::$mail->Port = env('MAIL_PORT', '587');
        
        // Debugging settings
        if (env('APP_ENV') === 'local') {
            self::$mail->SMTPDebug = 2;
        } else {
            self::$mail->SMTPDebug = 0; // Set to 0 for production environment
        }
        
        self::$mail->isHTML(true);
        self::$mail->CharSet = 'UTF-8';
        
        // Authentication Information
        self::$mail->Username = env('MAIL_USERNAME');
        self::$mail->Password = env('MAIL_PASSWORD');
        
        // Sender Information
        self::$mail->setFrom(env('MAIL_FROM_ADDRESS', 'admin@mail.com'), env('MAIL_FROM_NAME', 'Admin'));
    }
    
    /**
     * Send an email.
     *
     * @param string $recipient The email recipient.
     * @param string $subject The email subject.
     * @param string $template The email template content.
     * @return void
     * @throws \PHPMailer\PHPMailer\Exception
     */
    public static function send(string $recipient, string $subject, string $template): void {
        try {
            self::$mail = new PHPMailer(true); // Pass "true" to enable exceptions
            self::setUp();
            
            // Email content
            self::$mail->addAddress($recipient);
            self::$mail->Subject = $subject;
            self::$mail->Body = $template;
            
            self::$mail->send();
            echo 'Email sent successfully!';
        } catch (Exception $e) {
            echo 'Error sending email: ' . self::$mail->ErrorInfo;
        }
    }
}
