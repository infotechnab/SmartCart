<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Payment extends CI_Controller {

    function __construct() {
        parent::__construct();

        $this->load->model('productmodel');
        $this->load->model('dbmodel');
        $this->load->model('viewmodel');
        $this->load->helper('url');
        $this->load->library('cart');
        $this->load->helper(array('form', 'url', 'date'));
        $this->load->helper('string');
    }

    public function index() {
        $data['headertitle'] = $this->viewmodel->get_header_title();
        $data['headerlogo'] = $this->viewmodel->get_header_logo();
        $data['meta'] = $this->dbmodel->get_meta_data();
        $data['headerdescription'] = $this->viewmodel->get_header_description();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/navigation');
        $this->load->view('templates/cartDetails');
        $this->load->view('templates/footer');
    }

    function notify_payment() {
       session_start();  
       
      
         include_once("paypal_config.php");
        include_once("paypal.class.php");
        $paypalmode = ($PayPalMode == 'sandbox') ? '.sandbox' : '';
        $received_data = print_r($this->input->post(), TRUE);
        echo '<pre>' . $received_data . '</pre>';
        
        //Paypal redirects back to this page using ReturnURL, We should receive TOKEN and Payer ID
        if (isset($_GET["token"]) && isset($_GET["PayerID"])) {
            //we will be using these two variables to execute the "DoExpressCheckoutPayment"
            //Note: we haven't received any payment yet.
          
         
           
       
            $token = $_GET["token"];
            $payer_id = $_GET["PayerID"];

            //get session variables
            $paypal_product = $_SESSION["paypal_products"];
            $paypal_data = '';
            $ItemTotalPrice = 0;
            
          
           
           $temp = $paypal_product['buyer'][0];
           
                $fname= $temp['buyer_fname'];
                $lname=  $temp['buyer_lname'];
                $street=  $temp['buyer_street'];
                $city=  $temp['buyer_city'];
                $state=  $temp['buyer_state'];
                $post= $temp['buyer_post'];
                $country= $temp['buyer_country'];
                $contact= $temp['buyer_contact'];
                $email= $temp['buyer_email'];
            
                var_dump($contact);    
           $receiver= $paypal_product['receiver'][0];

                $shipfname= $receiver['receiver_fname'];
                $shiplname= $receiver['receiver_lname'];
                
                $shipstreet= $receiver['receiver_street'];
                $shipcity= $receiver['receiver_city'];
                $shipstate= $receiver['receiver_state'];
                $shippost= $receiver['receiver_post'];
                $shipcountry= $receiver['receiver_country'];
                $shipcontact= $receiver['receiver_contact'];
                $shipemail= $receiver['receiver_email'];
                
           
            
            
            
            
            
            
            $padata = '&TOKEN=' . urlencode($token) .
                    '&PAYERID=' . urlencode($payer_id) .
                    '&PAYMENTREQUEST_0_PAYMENTACTION=' . urlencode("SALE") .
                    $paypal_data .
                    '&PAYMENTREQUEST_0_ITEMAMT=' . urlencode($ItemTotalPrice) .
                    //'&PAYMENTREQUEST_0_TAXAMT=' . urlencode($paypal_product['assets']['tax_total']) .
                    '&PAYMENTREQUEST_0_SHIPPINGAMT=' . urlencode($paypal_product['assets']['shippin_cost']) .
                   // '&PAYMENTREQUEST_0_HANDLINGAMT=' . urlencode($paypal_product['assets']['handaling_cost']) .
                    //'&PAYMENTREQUEST_0_SHIPDISCAMT=' . urlencode($paypal_product['assets']['shippin_discount']) .
                    //'&PAYMENTREQUEST_0_INSURANCEAMT=' . urlencode($paypal_product['assets']['insurance_cost']) .
                    '&PAYMENTREQUEST_0_AMT=' . urlencode($paypal_product['assets']['grand_total']) .
                    '&PAYMENTREQUEST_0_CURRENCYCODE=' . urlencode($PayPalCurrencyCode);

            //We need to execute the "DoExpressCheckoutPayment" at this point to Receive payment from user.
            $paypal = new MyPayPal();
            $httpParsedResponseAr = $paypal->PPHttpPost('DoExpressCheckoutPayment', $padata, $PayPalApiUsername, $PayPalApiPassword, $PayPalApiSignature, $PayPalMode);

            //Check if everything went ok..
            if ("SUCCESS" == strtoupper($httpParsedResponseAr["ACK"]) || "SUCCESSWITHWARNING" == strtoupper($httpParsedResponseAr["ACK"])) {

                echo '<h2>Success</h2>';
                echo 'Your Transaction ID : ' . urldecode($httpParsedResponseAr["PAYMENTINFO_0_TRANSACTIONID"]);

                /*
                  //Sometimes Payment are kept pending even when transaction is complete.
                  //hence we need to notify user about it and ask him manually approve the transiction
                 */

                if ('Completed' == $httpParsedResponseAr["PAYMENTINFO_0_PAYMENTSTATUS"]) {
                    echo '<div style="color:green">Payment Received! Your product will be sent to you very soon!</div>';
                } elseif ('Pending' == $httpParsedResponseAr["PAYMENTINFO_0_PAYMENTSTATUS"]) {
                    echo '<div style="color:red">Transaction Complete, but payment is still pending! ' .
                    'You need to manually authorize this payment in your <a target="_new" href="http://www.paypal.com">Paypal Account</a></div>';
                }

                // we can retrive transection details using either GetTransactionDetails or GetExpressCheckoutDetails
                // GetTransactionDetails requires a Transaction ID, and GetExpressCheckoutDetails requires Token returned by SetExpressCheckOut
                $padata = '&TOKEN=' . urlencode($token);
                $paypal = new MyPayPal();
                $httpParsedResponseAr = $paypal->PPHttpPost('GetExpressCheckoutDetails', $padata, $PayPalApiUsername, $PayPalApiPassword, $PayPalApiSignature, $PayPalMode);

                if ("SUCCESS" == strtoupper($httpParsedResponseAr["ACK"]) || "SUCCESSWITHWARNING" == strtoupper($httpParsedResponseAr["ACK"])) {

                    echo '<br /><b>Stuff to store in database :</b><br />';

                    echo '<pre>';

                   

                   
                      #### SAVE BUYER INFORMATION IN DATABASE ###
                      //see (http://www.sanwebe.com/2013/03/basic-php-mysqli-usage) for mysqli usage
                      //use urldecode() to decode url encoded strings.

                     // $buyerName = urldecode($httpParsedResponseAr["FIRSTNAME"]).' '.urldecode($httpParsedResponseAr["LASTNAME"]);
                    //  $buyerEmail = urldecode($httpParsedResponseAr["EMAIL"]);

                      //Open a new connection to the MySQL server
                     // $mysqli = new mysqli('host','username','password','database_name');

                      //Output any connection error
                      //if ($mysqli->connect_error) {
                      //die('Error : ('. $mysqli->connect_errno .') '. $mysqli->connect_error);
                      //}
                                      
                    $lastuser = $this->productmodel->get_id_user($email);
                if(!empty($lastuser)){foreach ($lastuser as $userId) {
                $uid = $userId->id;
                }}else{
                 $uid = 0;
                 } 
                
                        $this->productmodel->order_user($uid, $fname, $lname, $street, $city, $state, $post, $country, $contact, $email,$shipfname, $shiplname, $shipstreet , $shipcity, $shipstate, $shippost, $shipcountry, $shipcontact, $shipemail);
                      
                        $orderId = $this->productmodel->get_last_order();
            foreach ($orderId as $oid) {
                $oId = $oid->o_id;
            }
                    
            $tr = 0;

            $trans_id = $this->productmodel->getTranId();

            foreach ($trans_id as $tranId) {
                $tr = $tranId->trans_num;
            }

            $a = "TRD";
            $tr = $tr + 1;
            $tid = $a . $tr;
             foreach ($paypal_product['items'] as $key => $p_item) {
                $paypal_data .= '&L_PAYMENTREQUEST_0_QTY' . $key . '=' . urlencode($p_item['itm_qty']);
                $paypal_data .= '&L_PAYMENTREQUEST_0_AMT' . $key . '=' . urlencode($p_item['itm_price']);
                $paypal_data .= '&L_PAYMENTREQUEST_0_NAME' . $key . '=' . urlencode($p_item['itm_name']);
                $paypal_data .= '&L_PAYMENTREQUEST_0_NUMBER' . $key . '=' . urlencode($p_item['itm_code']);

                // item price X quantity
                $subtotal = ($p_item['itm_price'] * $p_item['itm_qty']);

                //total price
                $ItemTotalPrice = ($ItemTotalPrice + $subtotal);
                $itemId= $p_item['itm_code'];
                $itemQty= $p_item['itm_qty'];
                $itemPrice= $p_item['itm_price'];
                $this->productmodel->insert_transaction_items($oId, $itemId, $itemQty, $itemPrice, $subtotal, $tid, $tr);
            }
                        
                     // $insert_row = $mysqli->query("INSERT INTO BuyerTable
                     // (BuyerName,BuyerEmail,TransactionID,ItemName,ItemNumber, ItemAmount,ItemQTY)
                     // VALUES ('$buyerName','$buyerEmail','$transactionID','$ItemName',$ItemNumber, $ItemTotalPrice,$ItemQTY)");

                    //  if($insert_row){
                     // print 'Success! ID of last inserted record is : ' .$mysqli->insert_id .'<br />';
                     // }else{
                    //  die('Error : ('. $mysqli->errno .') '. $mysqli->error);
                    //  }

               

                    echo '<pre>';
                    print_r($httpParsedResponseAr);
                    echo '</pre>';
                } else {
                    echo '<div style="color:red"><b>GetTransactionDetails failed:</b>' . urldecode($httpParsedResponseAr["L_LONGMESSAGE0"]) . '</div>';
                    echo '<pre>';
                    print_r($httpParsedResponseAr);
                    echo '</pre>';
                }
            } else {
                echo '<div style="color:red"><b>Error : </b>' . urldecode($httpParsedResponseAr["L_LONGMESSAGE0"]) . '</div>';
                echo '<pre>';
                print_r($httpParsedResponseAr);
                echo '</pre>';
            }
        }
    }

    function cancel_payment() {
     //  if ($cart = $this->cart->contents()) { 
     //       foreach ($cart as $item) {                                      
     //           $item['image1'];     
     //           ($item['name']);                                              
    //            $item['qty'];                   
    //            $item['price'];
    //        }
    //    }
    //    $this->registerEmail($email, $name);
  
        
        
        $this->session->set_flashdata('message', 'Your paypal payment has been cancelled');
                redirect('view/index', 'refresh');
    }
    
//public function registerEmail($user_email, $user_name) {
    //    $this->load->helper('emailsender_helper');
     //   $subject = "Payment cancel Successful";
     //   $message = register_email($user_email, $user_name);


       // send_email($user_email, $subject, $message);
  //  }
    function products() {
        $this->load->view('product_listing');
        $results = $this->productmodel->get_product_data_verify(26);
        var_dump($results);
    }

    function do_payment() {
session_start();
        include_once("paypal_config.php");
        include_once("paypal.class.php");
        $paypalmode = ($PayPalMode == 'sandbox') ? '.sandbox' : '';
        $data['headertitle'] = $this->viewmodel->get_header_title();
        $data['headerlogo'] = $this->viewmodel->get_header_logo();
        $data['meta'] = $this->dbmodel->get_meta_data();
        $data['headerdescription'] = $this->viewmodel->get_header_description();

        $this->load->library('form_validation');

        if (isset($_POST['cost'])) {
            $cost = trim($_POST['cost']);
        }
        if (isset($_POST['rate'])) {
            $rate = trim($_POST['rate']);
        }
        if (isset($_POST['grandtotal'])) {
            $grandTotal = trim($_POST['grandtotal']);
        }
        if (isset($_POST['onoffswitch'])) {
            $switch = $_POST['onoffswitch'];
        } else {
            $switch = "disableShip";
        }

        if (isset($_POST['pickup'])) {
            $radio = $_POST['pickup'];
        } else {
            $radio = NULL;
        }

        $this->form_validation->set_rules('u_fname', 'First name', 'trim|regex_match[/^[a-z,0-9,A-Z_ ]{3,15}$/]|required|xss_clean|max_length[15]');
        $this->form_validation->set_rules('u_lname', 'Last name', 'trim|regex_match[/^[a-z,0-9,A-Z_ ]{3,15}$/]|required|xss_clean|max_length[15]');
        $this->form_validation->set_rules('street_address', 'Address', 'trim|regex_match[/^[A-Za-z0-9\-\\,. ]{2,35}$/]|required|xss_clean|max_length[35]');
        $this->form_validation->set_rules('Town_address', 'City/Town', 'trim|regex_match[/^[A-Za-z0-9\-\\,. ]{2,35}$/]|required|xss_clean|max_length[35]');
        $this->form_validation->set_rules('District_address', 'State', 'trim|regex_match[/^[A-Za-z0-9\-\\,. ]{2,35}$/]|required|xss_clean|max_length[35]');
        $this->form_validation->set_rules('zip', 'Post Code', 'trim|regex_match[/^[0-9]{4,15}$/]|required|xss_clean|max_length[15]');
        $this->form_validation->set_rules('country', 'Country', 'trim|regex_match[/^[A-Za-z0-9\-\\,. ]{2,35}$/]|required|xss_clean|max_length[35]');
        $this->form_validation->set_rules('u_contact', 'Contact no.', 'trim|regex_match[/^[0-9]{5,15}$/]|required|xss_clean|max_length[15]');
        $this->form_validation->set_rules('user_email', 'Email', 'trim|regex_match[/^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/]|required|xss_clean|max_length[200]');
    $tempShipDiff = FALSE;
        if (($switch === "enableShip") && ($radio === "shipDifferent")) {

            $this->form_validation->set_rules('s_fname', 'First name', 'trim|regex_match[/^[a-z,0-9,A-Z_ ]{5,15}$/]|required|xss_clean|max_length[15]');
            $this->form_validation->set_rules('s_lname', 'Last name', 'trim|regex_match[/^[a-z,0-9,A-Z_ ]{5,15}$/]|required|xss_clean|max_length[15]');
            $this->form_validation->set_rules('s_address', 'Address', 'trim|regex_match[/^[A-Za-z0-9\-\\,. ]{5,35}$/]|required|xss_clean|max_length[35]');
            $this->form_validation->set_rules('c_city', 'City', 'trim|regex_match[/^[A-Za-z0-9\-\\,. ]{5,35}$/]|required|xss_clean|max_length[35]');
            $this->form_validation->set_rules('s_state', 'State', 'trim|regex_match[/^[A-Za-z0-9\-\\,. ]{5,35}$/]|required|xss_clean|max_length[35]');
            $this->form_validation->set_rules('s_zip', 'Post Code', 'trim|regex_match[/^[0-9]{5,15}$/]|required|xss_clean|max_length[15]');
            $this->form_validation->set_rules('s_country', 'Country', 'trim|regex_match[/^[A-Za-z0-9\-\\,. ]{5,35}$/]|required|xss_clean|max_length[35]');
            $this->form_validation->set_rules('s_contact', 'Contact no.', 'trim|regex_match[/^[0-9]{5,15}$/]|required|xss_clean|max_length[15]');
            $this->form_validation->set_rules('s_email', 'Email', 'trim|regex_match[/^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/]|required|xss_clean|max_length[50]');
            $tempShipDiff = TRUE;
        }

        if ($this->form_validation->run() == FALSE) {
            $data['user_validation_message'] = validation_errors();
            $data['switch']=$switch;
            $data['radio']= $radio;
            $this->load->view('templates/header', $data);
            $this->load->view('templates/navigation');
            $this->load->view('templates/userRegistrationAndShipping', $data);
            $this->load->view('templates/footer');
        } else {

            /* here are all inputed fields */
            $fname = $this->input->post('u_fname');
            $lname = $this->input->post('u_lname');
            $street = $this->input->post('street_address');
            $town = $this->input->post('Town_address');
            $district = $this->input->post('District_address');
            $zip = $this->input->post('zip');
            $country = $this->input->post('country');
            $contact = $this->input->post('u_contact');
            $email = $this->input->post('user_email');


            //for ship to different address 
            if (($switch === "enableShip")) {
                $pickUp = FALSE;
                if ($tempShipDiff) {
                    $shipfname = $this->input->post('s_fname');
                    $shiplname = $this->input->post('s_lname');
                    $shipstreet = $this->input->post('s_address');
                    $shiptown = $this->input->post('c_city');
                    $shipdistrict = $this->input->post('s_state');
                    $shipzip = $this->input->post('s_zip');
                    $shipcountry = $this->input->post('s_country');
                    $shipcontact = $this->input->post('s_contact');
                    $shipemail = $this->input->post('s_email');
                } else {
                    $shipToSameAddress = TRUE;
                     $shipfname = $fname;
                    
                    $shiplname = $lname;
                    $shipstreet = $street;
                    $shiptown = $town;
                    $shipdistrict = $district;
                    $shipzip = $zip;
                    $shipcountry = $country;
                    $shipcontact = $contact;
                    $shipemail = $email;
                }
            } else {
                $pickUp = TRUE;
            }
    
        if ($_POST) { //Post Data received from product list page.
            //die($cost);
            //Other important variables like tax, shipping cost
            //$TotalTaxAmount = 2.58;  //Sum of tax for all items in this order. 
            //$HandalingCost = 2.00;  //Handling cost for this order.
            //$InsuranceCost = 1.00;  //shipping insurance cost for this order.
            //$ShippinDiscount = $cost;
            // $ShippinDiscount = -3.00; //Shipping discount for this order. Specify this as negative number.
            $ShippinCost = $cost; //Although you may change the value later, try to pass in a shipping amount that is reasonably accurate.
            //we need 4 variables from product page Item Name, Item Price, Item Number and Item Quantity.
            //Please Note : People can manipulate hidden field amounts in form,
            //In practical world you must fetch actual price from database using item id. 
            //eg : $ItemPrice = $mysqli->query("SELECT item_price FROM products WHERE id = Product_Number");
            $paypal_data = '';
            $ItemTotalPrice = 0;
            foreach ($_POST['item_name'] as $key => $itmname) {
                $product_code = filter_var($_POST['item_code'][$key], FILTER_SANITIZE_STRING);
                $results = $this->productmodel->get_product_data_verify($product_code);
                //$mysqli->query("SELECT name, description, price FROM product WHERE product_code='$product_code' LIMIT 1");


                foreach ($results as $obj) {
                    $paypal_data .= '&L_PAYMENTREQUEST_0_NAME' . $key . '=' . urlencode($obj->name);
                    $paypal_data .= '&L_PAYMENTREQUEST_0_NUMBER' . $key . '=' . urlencode($_POST['item_code'][$key]);
                    $paypal_data .= '&L_PAYMENTREQUEST_0_AMT' . $key . '=' . urlencode($obj->price);
                    $paypal_data .= '&L_PAYMENTREQUEST_0_QTY' . $key . '=' . urlencode($_POST['item_qty'][$key]);
                    // item price X quantity
                    $subtotal = ($obj->price * $_POST['item_qty'][$key]);
                    //total price
                    $ItemTotalPrice = $ItemTotalPrice + $subtotal;
                    //create items for session
                    $paypal_product['items'][] = array('itm_name' => $obj->name,
                        'itm_price' => $obj->price,
                        'itm_code' => $_POST['item_code'][$key],
                        'itm_qty' => $_POST['item_qty'][$key]
                    );
                }
            }


            //Grand total including all tax, insurance, shipping cost and discount
            $GrandTotal = ($ItemTotalPrice + $ShippinCost );
            $paypal_product['buyer'][] = array(               
                'buyer_fname' => $fname,
                'buyer_lname' => $lname,
                'buyer_street' => $street,
                'buyer_city' => $town,
                'buyer_state' => $district,
                'buyer_post' => $zip,
                'buyer_country' => $country,
                'buyer_contact' => $contact,
                'buyer_email'=> $email);
 
            $paypal_product['receiver'][] = array(               
                'receiver_fname' => $shipfname,
                'receiver_lname' => $shiplname,
                
                'receiver_street' => $shipstreet,
                'receiver_city' => $shiptown,
                'receiver_state' => $shipdistrict,
                'receiver_post' => $shipzip,
                'receiver_country' => $shipcountry,
                'receiver_contact' => $shipcontact,
                'receiver_email'=> $shipemail);
            
            $paypal_product['assets'] = array(
               
                'shippin_cost' => $ShippinCost,
                'grand_total' => $GrandTotal);

            //create session array for later use
           
            $_SESSION["paypal_products"] = $paypal_product;
           
           // var_dump($_SESSION["paypal_products"]);
          

            //Parameters for SetExpressCheckout, which will be sent to PayPal
            $padata = '&METHOD=SetExpressCheckout' .
                    '&RETURNURL=' . urlencode($PayPalReturnURL) .
                    '&CANCELURL=' . urlencode($PayPalCancelURL) .
                    '&PAYMENTREQUEST_0_PAYMENTACTION=' . urlencode("SALE") .
                    $paypal_data .
                    '&NOSHIPPING=0' . //set 1 to hide buyer's shipping address, in-case products that does not require shipping
                    '&PAYMENTREQUEST_0_ITEMAMT=' . urlencode($ItemTotalPrice) .
                   
                    '&PAYMENTREQUEST_0_SHIPPINGAMT=' . urlencode($ShippinCost) .
                    '&PAYMENTREQUEST_0_AMT=' . urlencode($GrandTotal) .
                    '&PAYMENTREQUEST_0_CURRENCYCODE=' . urlencode($PayPalCurrencyCode) .
                    '&LOCALECODE=GB' . //PayPal pages to match the language on your website.
                    '&LOGOIMG=http://salyani.com.np/web/images/salyaniTech.png' . //site logo
                    '&CARTBORDERCOLOR=FFFFFF' . //border color of cart
                    '&ALLOWNOTE=1';

            //We need to execute the "SetExpressCheckOut" method to obtain paypal token
            $paypal = new MyPayPal();
            $httpParsedResponseAr = $paypal->PPHttpPost('SetExpressCheckout', $padata, $PayPalApiUsername, $PayPalApiPassword, $PayPalApiSignature, $PayPalMode);

            //Respond according to message we receive from Paypal
            if ("SUCCESS" == strtoupper($httpParsedResponseAr["ACK"]) || "SUCCESSWITHWARNING" == strtoupper($httpParsedResponseAr["ACK"])) {
                //Redirect user to PayPal store with Token received.
                $paypalurl = 'https://www' . $paypalmode . '.paypal.com/cgi-bin/webscr?cmd=_express-checkout&token=' . $httpParsedResponseAr["TOKEN"] . '';
                header('Location: ' . $paypalurl);
            } else {
                //Show error message
                echo '<div style="color:red"><b>Error : </b>' . urldecode($httpParsedResponseAr["L_LONGMESSAGE0"]) . '</div>';
                echo '<pre>';
                print_r($httpParsedResponseAr);
                echo '</pre>';
            }
        }
        }


    }

    public function email() {
        $data['user'] = array("tranId" => '5337', "date" => '2014/06/05', "email" => 'info@salyani.com.np', "name" => 'Ramji', "productId" => '1', "productName" => 'Chhadke', "productImage" => '', "qty" => '5', "price" => '$45', "discount" => '5%', "ship" => '');
        $data['headertitle'] = $this->viewmodel->get_header_title();
        $data['headerlogo'] = $this->viewmodel->get_header_logo();
        $data['meta'] = $this->dbmodel->get_meta_data();
        $data['headerdescription'] = $this->viewmodel->get_header_description();
        // var_dump($data['user']);

        $this->load->view('templates/emailTemplate', $data);
    }

}
