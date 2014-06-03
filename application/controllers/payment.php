<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Payment extends CI_Controller {

    function __construct() {
        parent::__construct();

        $this->load->model('productmodel');
        $this->load->helper('url');
        $this->load->library('cart');
        $this->load->helper(array('form', 'url', 'date'));
        $this->load->helper('string');
    }

    public function index() {

        $this->load->view('templates/header');
        $this->load->view('templates/navigation');
        $this->load->view('templates/cartDetails');
        $this->load->view('templates/footer');
    }

    function notify_payment() {

        $received_data = print_r($this->input->post(), TRUE);
        echo '<pre>' . $received_data . '</pre>';
    }

    function cancel_payment() {
        echo "Its canceled";
    }

    function products() {
        $this->load->view('product_listing');
        $results = $this->productmodel->get_product_data_verify(26);
        var_dump($results);
    }

    function do_payment() {

        include_once("paypal_config.php");
        include_once("paypal.class.php");
        $paypalmode = ($PayPalMode == 'sandbox') ? '.sandbox' : '';
        $this->load->library('form_validation');

        $cost = trim($_POST['cost']);
        $rate = trim($_POST['rate']);
        $grandTotal = trim($_POST['grandtotal']);
        
       // die("shipping cost =".$cost."<br/> discount rate =".$rate."<br/> grand total =".$grandTotal);

        if ($_POST['onoffswitch']) {

        //    $this->form_validation->set_rules('s_fname', 'First name', 'trim|required|xss_clean');
        //    $this->form_validation->set_rules('s_lname', 'Last name', 'trim|required|xss_clean');
        //    $this->form_validation->set_rules('s_address', 'Address', 'trim|required|xss_clean');
        //    $this->form_validation->set_rules('c_city', 'City', 'trim|required|xss_clean');
        //   $this->form_validation->set_rules('s_state', 'State', 'trim|required|xss_clean');
         //   $this->form_validation->set_rules('s_zip', 'Zip', 'trim|required|xss_clean');
         //   $this->form_validation->set_rules('s_country', 'Country', 'trim|required|xss_clean');
        //    $this->form_validation->set_rules('s_contact', 'Contact no.', 'trim|required|xss_clean');
        //    $this->form_validation->set_rules('s_email', 'Email', 'trim|required|xss_clean');
        //    if ($this->form_validation->run() == FALSE) {
        //        redirect('view/registeruser');
         //   } else {
                if (preg_match("/^[a-z,0-9,A-Z]{5,35}$/", $_POST['s_fname'])) {
                    $shipfirstname = trim($_POST['s_fname']);
                } else {
                    $this->session->set_flashdata('message', 'First name must be 5 to 35 character long');
                    redirect('view/registeruser', 'refresh');
                }
                if (preg_match("/^[a-z,0-9,A-Z]{5,35}$/", $_POST['s_lname'])) {
                    $shiplastname = trim($_POST['s_lname']);
                } else {
                    $this->session->set_flashdata('message', 'Last name must be 5 to 35 character long');
                    redirect('view/registeruser', 'refresh');
                }
                if (preg_match("/^[a-z,0-9,A-Z]{5,200}$/", $_POST['s_address'])) {
                    $shipstreet = trim($_POST['s_address']);
                } else {
                    $this->session->set_flashdata('message', 'Address must be 5 to 200 character long');
                    redirect('view/registeruser', 'refresh');
                }
                if (preg_match("/^[a-z,0-9,A-Z]{5,200}$/", $_POST['c_city'])) {
                    $shiptown = trim($_POST['c_city']);
                } else {
                    $this->session->set_flashdata('message', 'Town address must be 5 to 200 character long');
                    redirect('view/registeruser', 'refresh');
                }
                if (preg_match("/^[a-z,0-9,A-Z]{5,200}$/", $_POST['s_state'])) {
                    $shipdistrict = trim($_POST['s_state']);
                } else {
                    $this->session->set_flashdata('message', 'District must be 5 to 200 character long');
                    redirect('view/registeruser', 'refresh');
                }
                if (preg_match("/^[a-z,0-9]{5,10}$/", $_POST['s_zip'])) {
                    $shipzip = trim($_POST['s_zip']);
                } else {
                    $this->session->set_flashdata('message', 'Zip must be 5 to 10 character long');
                    redirect('view/registeruser', 'refresh');
                }
                if (preg_match("/^[a-z,0-9,A-Z]{5,200}$/", $_POST['s_country'])) {
                    $shipcountry = trim($_POST['s_country']);
                } else {
                    $this->session->set_flashdata('message', 'Country must be 5 to 2000 character long');
                    redirect('view/registeruser', 'refresh');
                }
                if (preg_match("/^[0-9]{5,15}$/", $_POST['s_contact'])) {
                    $shipcontact = trim($_POST['s_contact']);
                } else {
                    $this->session->set_flashdata('message', 'Contact No. name be 5 to 15 character long');
                    redirect('view/registeruser', 'refresh');
                }
                if (preg_match("/^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/", $_POST['s_email'])) {
                    $shipemail = trim($_POST['s_email']);
                } else {
                    $this->session->set_flashdata('message', 'Type valid email address');
                    redirect('view/registeruser', 'refresh');
                }
            }
        //}

        $this->form_validation->set_rules('u_fname', 'First name', 'trim|required|xss_clean');
        $this->form_validation->set_rules('u_lname', 'Last name', 'trim|required|xss_clean');
        $this->form_validation->set_rules('street_address', 'Address', 'trim|required|xss_clean');
        $this->form_validation->set_rules('Town_city', 'City/Town', 'trim|required|xss_clean');
        $this->form_validation->set_rules('District_state', 'State/District', 'trim|required|xss_clean');
        $this->form_validation->set_rules('zip', 'Zip', 'trim|required|xss_clean');
        $this->form_validation->set_rules('country', 'Country', 'trim|required|xss_clean');
        $this->form_validation->set_rules('u_contact', 'Contact no.', 'trim|required|xss_clean');
        $this->form_validation->set_rules('user_email', 'Email', 'trim|required|xss_clean');
        //if ($this->form_validation->run() == FALSE) {
         //   redirect('view/registeruser');
        //} else {
            if ($this->session->userdata('logged_in')) {
                $userName = $this->session->userdata('username');
                $userEmail = $this->session->userdata('useremail');
            }


            if (preg_match("/^[a-z,0-9,A-Z]{5,35}$/", $_POST['u_fname'])) {
                $firstname = trim($_POST['u_fname']);
            } else {
                $this->session->set_flashdata('message', 'First name must be 5 to 35 character long');
                redirect('view/registeruser', 'refresh');
            }
            if (preg_match("/^[a-z,0-9,A-Z]{5,35}$/", $_POST['u_lname'])) {
                $lastname = trim($_POST['u_lname']);
            } else {
                $this->session->set_flashdata('message', 'Last name must be 5 to 35 character long');
                redirect('view/registeruser', 'refresh');
            }
            if (preg_match("/^[a-z,0-9,A-Z]{5,200}$/", $_POST['street_address'])) {
                $street = trim($_POST['street_address']);
            } else {
                $this->session->set_flashdata('message', 'Street address must be 5 to 200 character long');
                redirect('view/registeruser', 'refresh');
            }
            if (preg_match("/^[a-z,0-9,A-Z]{5,200}$/", $_POST['Town_address'])) {
                $town = trim($_POST['Town_address']);
            } else {
                $this->session->set_flashdata('message', 'Town address must be 5 to 200 character long');
                redirect('view/registeruser', 'refresh');
            }
            if (preg_match("/^[a-z,0-9,A-Z]{5,200}$/", $_POST['District_address'])) {
                $district = trim($_POST['District_address']);
            } else {
                $this->session->set_flashdata('message', 'District must be 5 to 200 character long');
                redirect('view/registeruser', 'refresh');
            }
            if (preg_match("/^[a-z,0-9]{5,10}$/", $_POST['zip'])) {
                $zip = trim($_POST['zip']);
            } else {
                $this->session->set_flashdata('message', 'Zip must be 5 to 10 character long');
                redirect('view/registeruser', 'refresh');
            }
            if (preg_match("/^[a-z,0-9,A-Z]{5,200}$/", $_POST['country'])) {
                $country = trim($_POST['country']);
            } else {
                $this->session->set_flashdata('message', 'Country must be 5 to 200 character long');
                redirect('view/registeruser', 'refresh');
            }
            if (preg_match("/^[0-9]{5,15}$/", $_POST['u_contact'])) {
                $contact = trim($_POST['u_contact']);
            } else {
                $this->session->set_flashdata('message', 'Contact No. name be 5 to 15 character long');
                redirect('view/registeruser', 'refresh');
            }
            if (preg_match("/^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/", $_POST['user_email'])) {
                $email = trim($_POST['user_email']);
            } else {
                $this->session->set_flashdata('message', 'Type valid email address');
                redirect('view/registeruser', 'refresh');
            }
      //  }



        if ($_POST) { //Post Data received from product list page.
            //Other important variables like tax, shipping cost
            $TotalTaxAmount = 2.58;  //Sum of tax for all items in this order. 
            $HandalingCost = 2.00;  //Handling cost for this order.
            $InsuranceCost = 1.00;  //shipping insurance cost for this order.
            $ShippinDiscount = -3.00; //Shipping discount for this order. Specify this as negative number.
            $ShippinCost = 3.00; //Although you may change the value later, try to pass in a shipping amount that is reasonably accurate.
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
            $GrandTotal = ($ItemTotalPrice + $TotalTaxAmount + $HandalingCost + $InsuranceCost + $ShippinCost + $ShippinDiscount);


            $paypal_product['assets'] = array('tax_total' => $TotalTaxAmount,
                'handaling_cost' => $HandalingCost,
                'insurance_cost' => $InsuranceCost,
                'shippin_discount' => $ShippinDiscount,
                'shippin_cost' => $ShippinCost,
                'grand_total' => $GrandTotal);

            //create session array for later use
            $_SESSION["paypal_products"] = $paypal_product;



            //Parameters for SetExpressCheckout, which will be sent to PayPal
            $padata = '&METHOD=SetExpressCheckout' .
                    '&RETURNURL=' . urlencode($PayPalReturnURL) .
                    '&CANCELURL=' . urlencode($PayPalCancelURL) .
                    '&PAYMENTREQUEST_0_PAYMENTACTION=' . urlencode("SALE") .
                    $paypal_data .
                    '&NOSHIPPING=0' . //set 1 to hide buyer's shipping address, in-case products that does not require shipping
                    '&PAYMENTREQUEST_0_ITEMAMT=' . urlencode($ItemTotalPrice) .
                    '&PAYMENTREQUEST_0_TAXAMT=' . urlencode($TotalTaxAmount) .
                    '&PAYMENTREQUEST_0_SHIPPINGAMT=' . urlencode($ShippinCost) .
                    '&PAYMENTREQUEST_0_HANDLINGAMT=' . urlencode($HandalingCost) .
                    '&PAYMENTREQUEST_0_SHIPDISCAMT=' . urlencode($ShippinDiscount) .
                    '&PAYMENTREQUEST_0_INSURANCEAMT=' . urlencode($InsuranceCost) .
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

            foreach ($paypal_product['items'] as $key => $p_item) {
                $paypal_data .= '&L_PAYMENTREQUEST_0_QTY' . $key . '=' . urlencode($p_item['itm_qty']);
                $paypal_data .= '&L_PAYMENTREQUEST_0_AMT' . $key . '=' . urlencode($p_item['itm_price']);
                $paypal_data .= '&L_PAYMENTREQUEST_0_NAME' . $key . '=' . urlencode($p_item['itm_name']);
                $paypal_data .= '&L_PAYMENTREQUEST_0_NUMBER' . $key . '=' . urlencode($p_item['itm_code']);

                // item price X quantity
                $subtotal = ($p_item['itm_price'] * $p_item['itm_qty']);

                //total price
                $ItemTotalPrice = ($ItemTotalPrice + $subtotal);
            }

            $padata = '&TOKEN=' . urlencode($token) .
                    '&PAYERID=' . urlencode($payer_id) .
                    '&PAYMENTREQUEST_0_PAYMENTACTION=' . urlencode("SALE") .
                    $paypal_data .
                    '&PAYMENTREQUEST_0_ITEMAMT=' . urlencode($ItemTotalPrice) .
                    '&PAYMENTREQUEST_0_TAXAMT=' . urlencode($paypal_product['assets']['tax_total']) .
                    '&PAYMENTREQUEST_0_SHIPPINGAMT=' . urlencode($paypal_product['assets']['shippin_cost']) .
                    '&PAYMENTREQUEST_0_HANDLINGAMT=' . urlencode($paypal_product['assets']['handaling_cost']) .
                    '&PAYMENTREQUEST_0_SHIPDISCAMT=' . urlencode($paypal_product['assets']['shippin_discount']) .
                    '&PAYMENTREQUEST_0_INSURANCEAMT=' . urlencode($paypal_product['assets']['insurance_cost']) .
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
                    /*
                      #### SAVE BUYER INFORMATION IN DATABASE ###
                      //see (http://www.sanwebe.com/2013/03/basic-php-mysqli-usage) for mysqli usage
                      //use urldecode() to decode url encoded strings.

                      $buyerName = urldecode($httpParsedResponseAr["FIRSTNAME"]).' '.urldecode($httpParsedResponseAr["LASTNAME"]);
                      $buyerEmail = urldecode($httpParsedResponseAr["EMAIL"]);

                      //Open a new connection to the MySQL server
                      $mysqli = new mysqli('host','username','password','database_name');

                      //Output any connection error
                      if ($mysqli->connect_error) {
                      die('Error : ('. $mysqli->connect_errno .') '. $mysqli->connect_error);
                      }

                      $insert_row = $mysqli->query("INSERT INTO BuyerTable
                      (BuyerName,BuyerEmail,TransactionID,ItemName,ItemNumber, ItemAmount,ItemQTY)
                      VALUES ('$buyerName','$buyerEmail','$transactionID','$ItemName',$ItemNumber, $ItemTotalPrice,$ItemQTY)");

                      if($insert_row){
                      print 'Success! ID of last inserted record is : ' .$mysqli->insert_id .'<br />';
                      }else{
                      die('Error : ('. $mysqli->errno .') '. $mysqli->error);
                      }

                     */

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

}
