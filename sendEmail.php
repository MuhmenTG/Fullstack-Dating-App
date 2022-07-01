<?php
require "vendor/autoload.php";

class Email
{
    public static function sendMail($to, $subject, $bdoy)
    {
        $email = new \SendGrid\Mail\Mail(); 
        $email->setFrom("muhmenpk@gmail.com", "Aviation Dating LOVE");
        $email->setSubject($subject);
        $email->addTo($to, "Example User");
        $email->addContent("text/plain", $bdoy);
        $sendgrid = new \SendGrid("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");
        try {
            $response = $sendgrid->send($email);
            $response->statusCode() . "\n";
            $response->headers();
            $response->body() . "\n";
        } catch (Exception $e) {
            echo 'Caught exception: '. $e->getMessage() ."\n";
        }
    }    
}
