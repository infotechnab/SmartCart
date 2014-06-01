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

        $data['headertitle']= $this->viewmodel->get_header_title();          
        $data['headerlogo']= $this->viewmodel->get_header_logo();         
        $data['meta'] = $this->dbmodel->get_meta_data();
        $data['headerdescription']= $this->viewmodel->get_header_description();        
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
        $data['headertitle']= $this->viewmodel->get_header_title();          
        $data['headerlogo']= $this->viewmodel->get_header_logo();         
        $data['meta'] = $this->dbmodel->get_meta_data();
        $data['headerdescription']= $this->viewmodel->get_header_description();
        
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
    
    function login_insert_cart_item()
    {
        $data['headertitle']= $this->viewmodel->get_header_title();          
        $data['headerlogo']= $this->viewmodel->get_header_logo();         
        $data['meta'] = $this->dbmodel->get_meta_data();
        $data['headerdescription']= $this->viewmodel->get_header_description();
        
        
             $this->load->helper('form');
            $this->load->library(array('form_validation', 'session'));
            $this->form_validation->set_rules('u_name', 'User Name', 'required|xss_clean|max_length[200]');
            $this->form_validation->set_rules('u_fname', 'First Name', 'required|xss_clean|max_length[200]');
            $this->form_validation->set_rules('u_lname', 'Last Name', 'required|xss_clean|max_length[200]');
            $this->form_validation->set_rules('street_address', 'Address', 'required|xss_clean|max_length[200]');
            $this->form_validation->set_rules('Town_address', 'City', 'required|xss_clean|max_length[200]');
            $this->form_validation->set_rules('District_address', 'State', 'required|xss_clean|max_length[200]');
            // $this->form_validation->set_rules('country', 'Country', 'required|xss_clean|max_length[200]');           
            $this->form_validation->set_rules('u_email', 'User email', 'required|xss_clean|max_length[200]');
             $this->form_validation->set_rules('u_contact', 'Contact', 'required|xss_clean|max_length[200]');
              
           // $this->form_validation->set_rules('u_pass', 'Password', 'required|xss_clean|md5|max_length[200]');
          //  $this->form_validation->set_rules('u_repass', 'Password', 'required|xss_clean|md5|max_length[200]');
            
            if ($this->form_validation->run() == FALSE) {
              
                $this->load->view('templates/header', $data);
        $this->load->view('templates/navigation');
        $this->load->view('templates/userRegistrationAndShipping');
        $this->load->view('templates/footer');
            } else {
               
                $username = $this->input->post('u_name');
        $fname = $this->input->post('u_fname');
        $lname = $this->input->post('u_lname');
        $address = $this->input->post('street_address');
        $city = $this->input->post('Town_address');
        $state = $this->input->post('District_address');
        $country = $this->input->post('country');
        $contact = $this->input->post('u_contact');
        $email = $this->input->post('u_email');
        $pass = $this->input->post('u_pass');
        $zip = $this->input->post('zip');
        
        if($this->input->post('pickup')== "pickup"){
            
            $s_username = " ";
            $s_address = " ";
            $s_city = " ";
            $s_state = " ";
            $s_zip = " ";
            $s_country = " ";
            $s_email = " ";
            $s_contact = " ";
            
            
        }
        elseif($this->input->post('pickup')== "shipSame")
        { 
            $s_username = $username;
            $s_address = $address;
            $s_city = $city;
            $s_state = $state;
            $s_zip = $zip;
            $s_country = $country;
            $s_email = $email;
            $s_contact = $contact;
        }
        else
        {
             $s_fname = $this->input->post('s_fname');
            $s_lname = $this->input->post('s_lname');
            $name = $s_fname." ".$s_lname;
            
             $s_username = $name;
            $s_address = $this->input->post('s_address');
            $s_city = $this->input->post('s_city');
            $s_state = $this->input->post('s_state');
            $s_zip = $this->input->post('s_zip');
            $s_country = $this->input->post('s_country');
            $s_email = $this->input->post('s_email');
            $s_contact = $this->input->post('s_contact');
        }
        
        
       // $this->productmodel->add_new_user($username, $fname, $lname, $email, $pass, $contact,$address,$city,$state,$country,$zip);
        $lastuser = $this->productmodel->get_id_user($email);
        foreach ($lastuser as $userId)
        {
            $uid = $userId->id;
        }
        
        $this->productmodel->order_user($s_username,$s_address,$s_city,$s_state,$s_country,$s_zip,$s_email,$s_contact,$uid);
        $orderId = $this->productmodel->get_last_order();
        foreach ($orderId as $oid)
        {
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
       VALUES ('".$oId."','" . $item['id'] . "', '" . $item['qty'] . "', '$tid', '$tr')");
            }
        }
        $this->email($tid, $username, $s_username  );
        $this->load->view('templates/inserted');
                
        
            }
    }

    
    public function email(){
     $this->load->view('templates/email');
 }
    function insert_cart_item() {
        $this->load->model('dbmodel');
         $this->load->helper('form');
            $this->load->library(array('form_validation', 'session'));
            $this->form_validation->set_rules('u_name', 'User Name', 'required|xss_clean|max_length[200]');
            $this->form_validation->set_rules('u_fname', 'First Name', 'required|xss_clean|max_length[200]');
            $this->form_validation->set_rules('u_lname', 'Last Name', 'required|xss_clean|max_length[200]');
            $this->form_validation->set_rules('street_address', 'Address', 'required|xss_clean|max_length[200]');
            $this->form_validation->set_rules('Town_address', 'City', 'required|xss_clean|max_length[200]');
            $this->form_validation->set_rules('District_address', 'State', 'required|xss_clean|max_length[200]');
             $this->form_validation->set_rules('country', 'Country', 'required|xss_clean|max_length[200]');           
            $this->form_validation->set_rules('u_email', 'User email', 'required|xss_clean|max_length[200]');
             $this->form_validation->set_rules('u_contact', 'Contact', 'required|xss_clean|max_length[200]');
              
            $this->form_validation->set_rules('u_pass', 'Password', 'required|xss_clean|md5|max_length[200]');
            $this->form_validation->set_rules('u_repass', 'Password', 'required|xss_clean|md5|max_length[200]');
            
            if ($this->form_validation->run() == FALSE) {
                // $data['error'] = $this->upload->display_errors();
                redirect('view/registeruser');
            } else {
                if($this->input->post('u_pass')== $this->input->post('u_repass')){
                     $email = $this->input->post('u_email');
                     $check = $this->dbmodel->check_data($email);
                if ($check > 0) { //if the data exists show error message
                   
                    $this->session->set_flashdata('message', 'Email already exists. Please type new user name.');
                redirect('view/registeruser');
                } else {
                    $this->dbmodel->add_new_user($name, $fname, $lname, $email, $pass, $status, $user_type,$contact,$address);
                $username = $this->input->post('u_name');
        $fname = $this->input->post('u_fname');
        $lname = $this->input->post('u_lname');
        $address = $this->input->post('street_address');
        $city = $this->input->post('Town_address');
        $state = $this->input->post('District_address');
        $country = $this->input->post('country');
        $contact = $this->input->post('u_contact');
        $email = $this->input->post('u_email');
        $pass = $this->input->post('u_pass');
        $zip = $this->input->post('zip');
        die('sdhfdskfh');
        if($this->input->post('pickup')== "pickup"){
            
            $s_username = " ";
            $s_address = " ";
            $s_city = " ";
            $s_state = " ";
            $s_zip = " ";
            $s_country = " ";
            $s_email = " ";
            $s_contact = " ";
            
            
        }
        elseif($this->input->post('pickup')== "shipSame")
        { 
            $s_username = $username;
            $s_address = $address;
            $s_city = $city;
            $s_state = $state;
            $s_zip = $zip;
            $s_country = $country;
            $s_email = $email;
            $s_contact = $contact;
        }
        else
        {
             $s_fname = $this->input->post('s_fname');
            $s_lname = $this->input->post('s_lname');
            $name = $s_fname." ".$s_lname;
            
             $s_username = $name;
            $s_address = $this->input->post('s_address');
            $s_city = $this->input->post('s_city');
            $s_state = $this->input->post('s_state');
            $s_zip = $this->input->post('s_zip');
            $s_country = $this->input->post('s_country');
            $s_email = $this->input->post('s_email');
            $s_contact = $this->input->post('s_contact');
        }
        
        
        $this->productmodel->add_new_user($username, $fname, $lname, $email, $pass, $contact,$address,$city,$state,$country,$zip);
        $lastuser = $this->productmodel->get_last_user();
        foreach ($lastuser as $userId)
        {
            $uid = $userId->id;
        }
        
        $this->productmodel->order_user($s_username,$s_address,$s_city,$s_state,$s_country,$s_zip,$s_email,$s_contact,$uid);
        $orderId = $this->productmodel->get_last_order();
        foreach ($orderId as $oid)
        {
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
       VALUES ('".$oId."','" . $item['id'] . "', '" . $item['qty'] . "', '$tid', '$tr')");
            }
        }

        $this->load->view('templates/inserted');
                
            }
             echo " User registerd <br/> You may contineu shopping ";
                
//$this->session->set_flashdata('message', 'User registerd <br/> You may contineu shopping');
              //  redirect('view/registeruser');               
// redirect('paypal');
                }
            else{
                echo "password not match";
            }
            }
        
    }

    function display() {
        if ($_POST) { //Post Data received from product list page.
            foreach ($_POST['item_name'] as $key => $itmname) {
                
		
		//create items for session
		$paypal_product['items'][] = array('itm_name'=>$_POST['item_name'][$key],
											
											'itm_code'=>$_POST['item_code'][$key], 
											'itm_qty'=>$_POST['item_qty'][$key]
											);
                
               
            }
            
            var_dump($paypal_product);
        }
    }

    function login()
    {
        $data['headertitle']= $this->viewmodel->get_header_title();          
        $data['headerlogo']= $this->viewmodel->get_header_logo();         
        $data['meta'] = $this->dbmodel->get_meta_data();
        $data['headerdescription']= $this->viewmodel->get_header_description();
        
         $this->load->library('form_validation');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|xss_clean');
        $this->form_validation->set_rules('pass', 'Password', 'trim|regex_match[/^[a-z,0-9,A-Z]{5,35}$/]|required|xss_clean|callback_check_database');
        if ($this->form_validation->run() == FALSE) {
            
            redirect('view/login');
        } else {
                     $this->load->model('dbmodel');
                        $data['detail'] = $this->productmodel->validate();
                      
                             if(!empty($data['detail']))
                         { 
                                  $data['shiping']=$this->productmodel->getship();
               $this->load->view('templates/header', $data);
        $this->load->view('templates/navigation');
        $this->load->view('templates/userRegistrationAndShipping',$data);       
        $this->load->view('templates/footer');     
            }else
            {
                $this->session->set_flashdata('message', 'Username or password incorrect');
                redirect('view/login');
            }
        }
    }

    function udetail()
    {
        
    }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */