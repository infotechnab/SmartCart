<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


function send_password_reset_email($to,$subject,$message)
                {
     $headers = 'From: admin<info@smartaservices.com>' ."\r\n" ;
             $headers .="CC: info@salyani.com.np";
    $headers .="MIME-Version: 1.0" . "\r\n";
            $headers .="Content-type:text/html;charset=UTF-8" . "\r\n";

    if (mail($to, $subject, $message, $headers)) {
         redirect('view/index');
    } else {
        echo '<h3>Sorry email could not be sent</h3>';
         
   }    
   }

function password_reset_email ($to, $userName, $token, $link)
{
    $body = '<div style="width: 750px; margin: 0 auto 0 auto; padding: 0px;" >
        <div style="display:table-cell; vertical-align:middle; text-align:center; height: 70px; width: 1000px; alignment-adjust: central; background-color: #ccc; margin: 0 auto 0 auto;">
            <h3>Smart Access Services</h3>
            </div>

   <div style="padding: 10px 20px 10px 20px; background-color: #eee;">
   
    
    <h4>Dear '.$userName.'  !</h4>

    <h3>Your request to reset password for email '.$to.' has been confirmed.</h3>
    
    <p>Click on the given link to reset your password <a href="' . $link . 'index.php/view/resetPassword?id=' .$to. '&&resetPassword=' . $token . '">Reset Password</a></p>
</div>
            
            <div style="display:table-cell; vertical-align:middle; text-align:center; height: 70px; width: 1000px; alignment-adjust: central; background-color: #ccc; margin: 0 auto 0 auto;">
           <p>&copy; smartaccessservices</p>

            </div>

</div>';
    return $body;
    
}

function send_email($user_email,$subject,$message)
                {
     $headers = 'From: admin<info@smartaservices.com>' ."\r\n" ;
             $headers .="CC: info@salyani.com.np";
    $headers .="MIME-Version: 1.0" . "\r\n";
            $headers .="Content-type:text/html;charset=UTF-8" . "\r\n";

    if (mail($user_email, $subject, $message, $headers)) {
         redirect('view/index');
    } else {
        echo '<h3>Sorry email could not be sent</h3>';
         
   }    
   }

function register_email($user_email, $user_name)
{
    $body = '<div style="width: 750px; margin: 0 auto 0 auto; padding: 0px;" >
        <div style="display:table-cell; vertical-align:middle; text-align:center; height: 70px; width: 1000px; alignment-adjust: central; background-color: #ccc; margin: 0 auto 0 auto;">
            <h3>Smart Access Services</h3>

            </div>

   <div style="padding: 10px 20px 10px 20px; background-color: #eee;">
   
    
    <h4>Dear '.$user_name.'  !</h4>

    <h3>Welcome to Smart Access Services.</h3>
    <h4>Your email '.$user_email.' has been successfully registered to our system.</h4>
    <h4>You are almost done with the sign up process </h4>
    <p>Click <a href="#"> here</a> to confirm your account.</p>
</div>
            
            <div style="display:table-cell; vertical-align:middle; text-align:center; height: 70px; width: 1000px; alignment-adjust: central; background-color: #ccc; margin: 0 auto 0 auto;">
           <p>&copy; smartaservices</p>

            </div>

</div>';
    return $body;
    
} 
 