<?php
    require 'vendor/autoload.php';

    class SendEmail{
        public static function sendMail($to, $subject, $content){
            //Key to access the API from SendGrid
            $key = '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';

            //Instance of \SendGrid\Mail\Mail() class, stored at vendor folder.
            $email = new \SendGrid\Mail\Mail();

            //Sender's email / Email - Name
            $email->setFrom('juanpams99@gmail.com', 'Juan Pablo Mora');
            
            //Email's subject
            $email->setSubject($subject);

            //Recipient's email
            $email->addTo($to);

            //Email's content / Type - Content
            $email->addContent('text/plain', $content);
            //$email->addContent('text/html', $content);

            //Instance of \SendGrid class
            $sendgrid = new \SendGrid($key);

            try{
                //Calling function send()
                $response = $sendgrid->send($email);
                return $response;
            }catch(Exception $e){
                echo 'Email exception caught: ' . $e->getMessage() . '\n';
                return false;
            }
        }
    }
?>