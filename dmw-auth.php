<?php

/*
Plugin Name: Dmw Auth
Description: A plugin for helping the registering through the api
Version: 1.0
Author: Dreamwear
Author URI: http://dreamwear.co
License: A "Slug" license name e.g. GPL2
*/

use Dreamwear\DreamwearRestEndpoint;

require 'vendor/autoload.php';



defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

add_action('rest_api_init',function (){
   $dmwRestApi = new DreamwearRestEndpoint();
   $dmwRestApi->register_routes();
});



function send_smtp_email( $receiver,$mdp) {
    $body = \Dreamwear\Utils::generateHtmlTemplate($receiver,$mdp);


    try {
        //Create a new PHPMailer instance
        $mail = new  PHPMailer\PHPMailer\PHPMailer();

        //Tell PHPMailer to use SMTP
        $mail->isSMTP();

        //Enable SMTP debugging
        $mail->SMTPDebug = 4;

        //Ask for HTML-friendly debug output
        $mail->Debugoutput = 'html';

        //Set the hostname of the mail server
        $mail->Host = "smtp.mailgun.org";

        //Set the SMTP port number - likely to be 25, 465 or 587
        $mail->Port = 587;

        //Whether to use SMTP authentication
        $mail->SMTPAuth = true;



        //Username to use for SMTP authentication
        $mail->Username ="postmaster@sandbox83a19387ab4340e789dec4842c77204a.mailgun.org";

        //Password to use for SMTP authentication
        $mail->Password = "d6939115eb5d5b21917158132b01856f-2fbe671d-55237d8e";


        $mail->SMTPSecure = 'SSL';

        //Set who the message is to be sent from
        $mail->setFrom('mail@dreamwear.co', 'Dream Wear ');


        //Set who the message is to be sent to
        $mail->addAddress($receiver,$receiver);
        //Set the subject line
        $mail->Subject = 'Votre compte sur Dream Wear a été créé';
        //Read an HTML message body from an external file, convert referenced images to embedded,
        //convert HTML into a basic plain-text alternative body
        //$mail->msgHTML(file_get_contents(dirname(__FILE__) .'/contents.html'));
        $mail->MsgHTML($body);
        //Replace the plain text body with one created manually
        $mail->AltBody = 'This is a plain-text message body';

        $success=$mail->send();
        //send the message, check for errors
        if ($success) {
            return array('mailError' => false, 'message' => 'email sent! ' . $mail->ErrorInfo , 'body'=>$body);
        } else {
            return array('mailError' => true, 'message' => 'email error! ' . $mail->ErrorInfo , 'body'=>$body);
        }
    } catch (phpmailerException $e) {
        return array('mailError' => false, 'message' => 'email error! ' . $e->errorMessage() , 'body'=>$body);  //Pretty error messages from PHPMailer
    } catch (Exception $e) {
        return array('mailError' => false, 'message' => 'email error! ' . $e->getMessage() , 'body'=>$body); //Boring error messages from anything else!
    }
}
