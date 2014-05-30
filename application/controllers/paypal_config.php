<?php
$currency = '$'; //Currency sumbol or code

//paypal settings sandbox
$PayPalMode 			= 'sandbox'; // sandbox or live
$PayPalApiUsername 		= 'infotechnab_api1.yahoo.com'; //PayPal API Username
$PayPalApiPassword 		= '1400209342'; //Paypal API password
$PayPalApiSignature             = 'AFcWxV21C7fd0v3bYYYRCpSSRl31AIicHs2L8N-aSaeIWzH3DX-kQJPv'; //Paypal API Signature
$PayPalCurrencyCode             = 'USD'; //Paypal Currency Code
$PayPalReturnURL 		= base_url().'index.php/payment/notify_payment'; //Point to process.php page
$PayPalCancelURL 		= base_url().'index.php/payment/cancel_payment'; //Cancel URL if user clicks cancel


//Live setting 

//$PayPalMode 			= 'live'; // sandbox or live
//$PayPalApiUsername 		= 'info_api1.salyani.com.np'; //PayPal API Username
//$PayPalApiPassword 		= '3KVRTE4GW75ZN5TS'; //Paypal API password
//$PayPalApiSignature             = 'ApNspTbocvQUrIp3vnyuldmuVJ-bAXmrCrE2FSowIFXKJAkGQ.pKuwKj'; //Paypal API Signature
//$PayPalCurrencyCode             = 'USD'; //Paypal Currency Code
//$PayPalReturnURL 		= base_url().'index.php/payment/notify_payment'; //Point to process.php page
//$PayPalCancelURL 		= base_url().'index.php/payment/cancel_payment'; //Cancel URL if user clicks cancel

?>