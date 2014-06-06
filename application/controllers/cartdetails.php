<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Cartdetails extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library('session');
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

    function remove($rowid) {
        $this->cart->update(array(
            'rowid' => $rowid,
            'qty' => 0
        ));
        redirect('cartdetails');
    }

    function clear() {
        $this->cart->destroy();
        redirect('cartdetails');
    }

    function checkout() {
        $data['headertitle'] = $this->viewmodel->get_header_title();
        $data['headerlogo'] = $this->viewmodel->get_header_logo();
        $data['meta'] = $this->dbmodel->get_meta_data();
        $data['headerdescription'] = $this->viewmodel->get_header_description();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/navigation');

        $this->load->view('templates/checkout_form');

        $this->load->view('templates/footer');
    }

    function update() {

        if ($this->cart->contents()) {
            $cart = $this->cart->contents();

            foreach ($cart as $item) {
                $newqty = 'item_qnt_' . $item['id'];
                $newrow = 'item_row_' . $item['id'];
                $rowid = $_POST[$newrow];
                if (isset($_POST[$newqty])) {
                    if ($item['qty'] != $_POST[$newqty]) {


                        $newQnt = $_POST[$newqty];

                        $this->cart->update(array(
                            'rowid' => $rowid,
                            'qty' => $newQnt
                        ));
                    }
                }
            }
        }
        redirect('cartdetails');
    }

    function login_insert_cart_item() {
        

            

            


            // $this->productmodel->add_new_user($username, $fname, $lname, $email, $pass, $contact,$address,$city,$state,$country,$zip);
            $lastuser = $this->productmodel->get_id_user($email);
            foreach ($lastuser as $userId) {
                $uid = $userId->id;
            }

            $this->productmodel->order_user($s_username, $s_address, $s_city, $s_state, $s_country, $s_zip, $s_email, $s_contact, $uid);
            $orderId = $this->productmodel->get_last_order();
            foreach ($orderId as $oid) {
                $oId = $oid->o_id;
            }
            // die($oId);
            $cart = $this->cart->contents();
            $tr = 0;

            $trans_id = $this->productmodel->getTranId();

            foreach ($trans_id as $tranId) {
                $tr = $tranId->trans_num;
            }

            $a = "TRD";
            $tr = $tr + 1;
            $tid = $a . $tr;


            foreach ($cart as $item) {
                var_dump($item);
                if ($item) {
                    mysql_query("INSERT INTO `product_oder_detail` (o_id,p_id,qty,trans_id,trans_num) 
       VALUES ('" . $oId . "','" . $item['id'] . "', '" . $item['qty'] . "', '$tid', '$tr')");
                }
            }
            
    }

    public function email() {
        $this->load->view('templates/email');
    }

    function insert_cart_item() {
        $this->load->model('dbmodel');
        $this->load->helper('form');
        $this->load->library(array('form_validation', 'session'));
        

        $this->form_validation->set_rules('u_fname', 'First name', 'trim|regex_match[/^[a-z,0-9,A-Z]{5,15}$/]|required|xss_clean|max_length[15]');
        $this->form_validation->set_rules('u_lname', 'Last name', 'trim|regex_match[/^[a-z,0-9,A-Z]{5,15}$/]|required|xss_clean|max_length[15]');
        $this->form_validation->set_rules('street_address', 'Address', 'trim|regex_match[/^[a-z,0-9,A-Z]{5,35}$/]|required|xss_clean|max_length[35]');
        $this->form_validation->set_rules('Town_address', 'City/Town', 'trim|regex_match[/^[a-z,0-9,A-Z]{5,35}$/]|required|xss_clean|max_length[35]');
        $this->form_validation->set_rules('District_address', 'State/District', 'trim|regex_match[/^[a-z,0-9,A-Z]{5,35}$/]|required|xss_clean|max_length[35]');
        $this->form_validation->set_rules('zip', 'Zip', 'trim|regex_match[/^[0-9]{5,15}$/]|required|xss_clean|max_length[15]');
        $this->form_validation->set_rules('country', 'Country', 'trim|regex_match[/^[a-z,0-9,A-Z]{5,35}$/]|required|xss_clean|max_length[35]');
        $this->form_validation->set_rules('u_contact', 'Contact no.', 'trim|regex_match[/^[0-9]{5,15}$/]|required|xss_clean|max_length[15]');
        $this->form_validation->set_rules('user_email', 'Email', 'trim|regex_match[/^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/]|required|xss_clean|max_length[200]');

        

        /* if shipping enabled */
        if (shipenabled and different) {

            $this->form_validation->set_rules('s_fname', 'First name', 'trim|regex_match[/^[a-z,0-9,A-Z]{5,15}$/]|required|xss_clean|max_length[15]');
            $this->form_validation->set_rules('s_lname', 'Last name', 'trim|regex_match[/^[a-z,0-9,A-Z]{5,15}$/]|required|xss_clean|max_length[15]');
            $this->form_validation->set_rules('s_address', 'Address', 'trim|regex_match[/^[a-z,0-9,A-Z]{5,35}$/]|required|xss_clean|max_length[35]');
            $this->form_validation->set_rules('c_city', 'City', 'trim|regex_match[/^[a-z,0-9,A-Z]{5,35}$/]|required|xss_clean|max_length[35]');
            $this->form_validation->set_rules('s_state', 'State', 'trim|regex_match[/^[a-z,0-9,A-Z]{5,35}$/]|required|xss_clean|max_length[35]');
            $this->form_validation->set_rules('s_zip', 'Zip', 'trim|regex_match[/^[0-9]{5,15}$/]|required|xss_clean|max_length[15]');
            $this->form_validation->set_rules('s_country', 'Country', 'trim|regex_match[/^[a-z,0-9,A-Z]{5,35}$/]|required|xss_clean|max_length[35]');
            $this->form_validation->set_rules('s_contact', 'Contact no.', 'trim|regex_match[/^[0-9]{5,15}$/]|required|xss_clean|max_length[15]');
            $this->form_validation->set_rules('s_email', 'Email', 'trim|regex_match[/^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/]|required|xss_clean|max_length[50]');
         
                
        } else {
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

        if ($this->form_validation->run() == FALSE ) {
            $data['user_validation_message'] = validation_errors();
            $this->load->view('templates/header', $data);
            $this->load->view('templates/navigation');
            $this->load->view('templates/userRegistrationAndShipping', $data);
            $this->load->view('templates/footer');
        } else {
            
            /* here are all inputed fields*/
            $fname = $this->input->post('u_lname');
        $lname = $this->input->post('u_lname');
        $street = $this->input->post('street_address');
        $town = $this->input->post('Town_address');
        $district = $this->input->post('District_address');
        $zip = $this->input->post('zip');
        $country = $this->input->post('country');
        $contact = $this->input->post('u_contact');
        $email = $this->input->post('user_email');
                $shipfname = $this->input->post('s_fname');                        
                $shiplname = $this->input->post('s_lname');                         
                $shipstreet = $this->input->post('s_address');                        
                $shiptown = $this->input->post('c_city');                         
                $shipdistrict = $this->input->post('s_state');                          
                $shipzip = $this->input->post('s_zip');                          
                $shipcountry = $this->input->post('s_country');                       
                $shipcontact = $this->input->post('s_contact');                         
                $shipemail = $this->input->post('s_email');
                
            
            $this->dbmodel->add_new_user($name, $fname, $lname, $email, $pass, $status, $user_type, $contact, $address);


            $this->productmodel->add_new_user($username, $fname, $lname, $email, $pass, $contact, $address, $city, $state, $country, $zip);
            $lastuser = $this->productmodel->get_last_user();
            foreach ($lastuser as $userId) {
                $uid = $userId->id;
            }

            $this->productmodel->order_user($s_username, $s_address, $s_city, $s_state, $s_country, $s_zip, $s_email, $s_contact, $uid);
            $orderId = $this->productmodel->get_last_order();
            foreach ($orderId as $oid) {
                $oId = $oid->o_id;
            }
            // die($oId);
            $cart = $this->cart->contents();
            $tr = 0;

            $trans_id = $this->productmodel->getTranId();

            foreach ($trans_id as $tranId) {
                $tr = $tranId->trans_num;
            }

            $a = "TRD";
            $tr = $tr + 1;
            $tid = $a . $tr;


            foreach ($cart as $item) {
                var_dump($item);
                if ($item) {
                    mysql_query("INSERT INTO `product_oder_detail` (o_id,p_id,qty,trans_id,trans_num) 
       VALUES ('" . $oId . "','" . $item['id'] . "', '" . $item['qty'] . "', '$tid', '$tr')");
                }
            }

            $this->load->view('templates/inserted');
        }
    }

    function display() {
        if ($_POST) { //Post Data received from product list page.
            foreach ($_POST['item_name'] as $key => $itmname) {


                //create items for session
                $paypal_product['items'][] = array('itm_name' => $_POST['item_name'][$key],
                    'itm_code' => $_POST['item_code'][$key],
                    'itm_qty' => $_POST['item_qty'][$key]
                );
            }

            var_dump($paypal_product);
        }
    }

    function login() {

        $data['headertitle'] = $this->viewmodel->get_header_title();
        $data['headerlogo'] = $this->viewmodel->get_header_logo();
        $data['meta'] = $this->dbmodel->get_meta_data();
        $data['headerdescription'] = $this->viewmodel->get_header_description();

        $this->load->library('form_validation');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|xss_clean');
        $this->form_validation->set_rules('pass', 'Password', 'trim|regex_match[/^[a-z,0-9,A-Z]{5,35}$/]|required|xss_clean|callback_check_database');

        $validation = TRUE;
        $validation_message = "";

        if (isset($_POST['email'])) {
            $email = trim($_POST['email']);
            if (!preg_match("/^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/", $email)) {
                $validation_message .= "<p>Type valid email address</p>";
                $validation = FALSE;
            }
        }
        if (isset($_POST['pass'])) {
            $pass = trim($_POST['pass']);
            if (!preg_match("/^[a-z,0-9,A-Z]{5,35}$/", $pass)) {
                $validation_message .= "<p>Password must be 5 to 35 character long</p>";
                $validation = FALSE;
            }
        }
        if ($this->form_validation->run() == FALSE || $validation == FALSE) {
            $data['validation_message'] = $validation_message . validation_errors();


            $this->load->view('templates/header', $data);
            $this->load->view('templates/navigation');
            $this->load->view('templates/home_login', $data);
            $this->load->view('templates/login');
            $this->load->view('templates/footer');
        } else {
            $this->load->model('dbmodel');
            $data['detail'] = $this->productmodel->validate();

            if (!empty($data['detail'])) {
                $data['shiping'] = $this->productmodel->getship();
                $this->load->view('templates/header', $data);
                $this->load->view('templates/navigation');
                $this->load->view('templates/userRegistrationAndShipping', $data);
                $this->load->view('templates/footer');
            } else {
                $this->session->set_flashdata('message', 'Username or password incorrect');
                redirect('view/login');
            }
        }
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */