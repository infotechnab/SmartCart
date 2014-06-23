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
        
        

        /* if shipping enabled */
        

      
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