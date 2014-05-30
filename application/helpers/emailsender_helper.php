<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


function send_email_password_reset($useremail,$subject,$message)
                {
     $headers = 'From: admin<info@smartaservices.com>' ."\r\n" ;
             $headers .="CC: info@salyani.com.np";
    $headers .="MIME-Version: 1.0" . "\r\n";
            $headers .="Content-type:text/html;charset=UTF-8" . "\r\n";

    if (mail($useremail, $subject, $message, $headers)) {
        echo "Email sent successfully...";
    } else {
        echo "Message could not be sent...";
         
   }    
   }

function register_email($to, $userName,$token, $imglink)
{
    $body = '<div style="width: 750px; margin: 0 auto 0 auto; padding: 0px;" >
        <div style="display:table-cell; vertical-align:middle; text-align:center; height: 70px; width: 1000px; alignment-adjust: central; background-color: #ccc; margin: 0 auto 0 auto;">
            <h3>Smart Access Services</h3>
            </div>

   <div style="padding: 10px 20px 10px 20px; background-color: #eee;">
   
    
    <h4>Dear '.$userName.'  !</h4>

    <h3>Your request to reset password is confirmed.</h3>
    
    <p>Click on the given link to reset your password <a href="' . $imglink . 'index.php/view/resetPassword?id=' .$to. '&&resetPassword=' . $token . '">Reset Password</a></p>
</div>
            
            <div style="display:table-cell; vertical-align:middle; text-align:center; height: 70px; width: 1000px; alignment-adjust: central; background-color: #ccc; margin: 0 auto 0 auto;">
           <p>&copy; smartaccessservices</p>

            </div>

</div>';
    return $body;
    
}

 
 