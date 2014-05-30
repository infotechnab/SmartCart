<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class View extends CI_Controller {

    function __construct() {
        parent::__construct();

        $this->load->model('productmodel');
        $this->load->model('viewmodel');
        $this->load->model('dbmodel');
        $this->load->helper('url');
        $this->load->library('cart');
        $this->load->library('pagination');

        $this->load->helper(array('form', 'url', 'date'));
    }

    public function index() {     //fetching data from database of the product
        $data['username'] = Array($this->session->userdata('logged_in'));
        $data['headertitle'] = $this->viewmodel->get_header_title();
        $data['headerlogo'] = $this->viewmodel->get_header_logo();
        $data['meta'] = $this->dbmodel->get_meta_data();
        $data['headerdescription'] = $this->viewmodel->get_header_description();
        //$data['product_info'] = $this->productmodel->product_info();     
        $data['featureItem'] = $this->productmodel->featured_item();

        $config = array();
        $config["base_url"] = base_url() . "index.php/view/index";
        $config["total_rows"] = $this->dbmodel->record_count_product();
        // var_dump($config["total_rows"]);
        $config["per_page"] = 15;
        $this->pagination->initialize($config);
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

        $data["product_info"] = $this->dbmodel->get_all_product($config["per_page"], $page);
        //  $config['first_link'] = 'First';
        //  $config['first_tag_open'] = '<div>';
        // $config['first_tag_close'] = '</div>';
        // $config['last_link'] = 'Last';
        // $config['last_tag_open'] = '<div>';
        // $config['last_tag_close'] = '</div>';
        $config['display_pages'] = FALSE;
        $data["links"] = $this->pagination->create_links();

        $data['category'] = $this->productmodel->category_list();
        //var_dump($data);
        $data['slider_json'] = json_encode($data['featureItem']);
        $this->load->view('templates/header', $data);
        $this->load->view('templates/navigation');

        $this->load->view('templates/content', $data);

        $this->load->view('templates/cart');
        $this->load->view('templates/sidebarview', $data);
        $this->load->view('templates/footer');
    }

    public function error() {
        $data['headertitle'] = $this->viewmodel->get_header_title();
        $data['headerlogo'] = $this->viewmodel->get_header_logo();
        $data['meta'] = $this->dbmodel->get_meta_data();
        $data['headerdescription'] = $this->viewmodel->get_header_description();

        $data['product_info'] = $this->productmodel->product_info();

        $data['featureItem'] = $this->productmodel->featured_item();
        $data['category'] = $this->productmodel->category_list();

        //$data['product'] = $this->productmodel->getProductById($id);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/navigation');
        $this->load->view('templates/error_landing_page');
        $this->load->view('templates/cart');
        $this->load->view('templates/sidebarview', $data);
        $this->load->view('templates/footer');
    }

    public function forgotPassword() {
        $data['headertitle'] = $this->viewmodel->get_header_title();
        $data['headerlogo'] = $this->viewmodel->get_header_logo();
        $data['meta'] = $this->dbmodel->get_meta_data();

        $data['headerdescription'] = $this->viewmodel->get_header_description();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/navigation');
        $this->load->view('templates/forgot_password');
        $this->load->view('templates/footer');
    }

    public function authenticate_user() {
        if (!empty($_POST['email'])) {
            $useremail = $_POST['email'];
        }
        $username = $this->dbmodel->get_selected_user($useremail);

        foreach ($username as $dbemail) {
            $to = $dbemail->user_email;
        }
        if ($to === $useremail) {
            $token = $this->getRandomString(10);
            $this->dbmodel->update_emailed_user($to, $token);
            $this->test($token);

            // $this->mailresetlink($to, $token);
        } else {
            $this->session->set_flashdata('message', 'Please type valid Email Address');
            redirect("view/forgotPassword");
        }
    }

    public function test($token) {

        $data['query'] = $this->dbmodel->find_user_auth_key($token);
        $data['headertitle'] = $this->viewmodel->get_header_title();
        $data['headerlogo'] = $this->viewmodel->get_header_logo();
        $data['meta'] = $this->dbmodel->get_meta_data();
        $data['headerdescription'] = $this->viewmodel->get_header_description();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/navigation');
        $this->load->view('templates/messageSent', $data);
        $this->load->view('templates/footer');
    }

    function getRandomString($length) {
        $validCharacters = "ABCDEFGHIJKLMNPQRSTUXYVWZ123456789";
        $validCharNumber = strlen($validCharacters);
        $result = "";

        for ($i = 0; $i < $length; $i++) {
            $index = mt_rand(0, $validCharNumber - 1);
            $result .= $validCharacters[$index];
        }
        return $result;
    }

    function mailresetlink($to, $token) {
        $to;
        $uri = 'http://' . $_SERVER['HTTP_HOST'];
        $subject = "This is subject";
        $message = '
    <html>
    <head>
    <title>Password reset link</title>
    </head>
    <body>
    <p>Click on the given link to reset your password <a href="' . $uri . '/reset.php?token=' . $token . '">Reset Password</a></p>

    </body>
    </html>';
        $header = 'From: admin<info@smartaservices.com>' . "\r\n";
        $retval = mail($to, $subject, $message, $header);
        if ($retval == true) {
            echo "Email sent successfully...";
        } else {
            echo "Message could not be sent...";
        }
    }

    public function resetPassword() {

        $data['headertitle'] = $this->viewmodel->get_header_title();
        $data['headerlogo'] = $this->viewmodel->get_header_logo();
        $data['meta'] = $this->dbmodel->get_meta_data();
        $data['headerdescription'] = $this->viewmodel->get_header_description();


        if (!empty($_GET['resetPassword']))
            $a = $_GET['resetPassword'];
        $data['query'] = $this->dbmodel->find_user_auth_key($a);
        if ($data['query']) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/navigation');
            $this->load->view("templates/resetPassword", $data);
            $this->load->view('templates/footer');
        } else {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/navigation');
            $this->load->view('templates/error_landing_page');
            $this->load->view('templates/footer');
        }
    }

    public function setpassword() {
        if (!empty($_POST['user_pass']))
            ;
        if (!empty($_POST['tokenid'])) {
            $password = $_POST['user_pass'];

            $token = $_POST['tokenid'];

            $confirmPassword = $_POST['user_confirm_pass'];
            if ($password == $confirmPassword) {

                $userPassword = $this->input->post('user_pass');

                $this->dbmodel->update_user_password($token, $userPassword);


                $this->session->set_flashdata('message', 'Your password has been changed successfully');
                redirect('view/index', 'refresh');
            }
        } else {

            $this->session->set_flashdata('message', 'Password didnot match');
            redirect('view/forgotPassword', 'refresh');
        }
    }

    public function details($id = 0) {

        $data['headertitle'] = $this->viewmodel->get_header_title();
        $data['headerlogo'] = $this->viewmodel->get_header_logo();
        $data['meta'] = $this->dbmodel->get_meta_data();
        $data['headerdescription'] = $this->viewmodel->get_header_description();

        $data['product_info'] = $this->productmodel->product_info();

        $data['featureItem'] = $this->productmodel->featured_item();
        $data['category'] = $this->productmodel->category_list();
        if (isset($id)) {
            $data['product'] = $this->productmodel->getProductById($id);
            foreach ($data['product'] as $page) {
                $data['pageTitle'] = $page->name;
            }
            $this->load->view('templates/header', $data);
            $this->load->view('templates/navigation');
            $this->load->view('templates/details', $data);
            $this->load->view('templates/cart');
            $this->load->view('templates/sidebarview', $data);
            $this->load->view('templates/footer');
        } else {
            redirect();
        }
    }

    public function login() {
        $data['headertitle'] = $this->viewmodel->get_header_title();
        $data['headerlogo'] = $this->viewmodel->get_header_logo();
        $data['meta'] = $this->dbmodel->get_meta_data();
        $data['headerdescription'] = $this->viewmodel->get_header_description();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/navigation');
        $this->load->view('templates/login');
        $this->load->view('templates/footer');
    }

    function add() {   //function to add item to the cart
        $id = $_POST['itemid'];
        $product = $this->productmodel->getProductById($id);


        foreach ($product as $prod) {
            $name = $prod->name;
            $price = $prod->price;
            $desc = $prod->description;
            $image1 = $prod->image1;
            $shiping = $prod->shiping;
        }
        $newQnt = 1;
        if ($this->cart->contents()) {
            $cart = $this->cart->contents();

            foreach ($cart as $item) {
                if (isset($item['id'])) {
                    if ($item['id'] == $id) {

                        $newQnt = 1;
                        $newQnt = $item['qty'] + 1;
                    }
                }
            }
        }

        $insert = array(
            'id' => $id,
            'qty' => $newQnt,
            'price' => $price,
            'name' => $name,
            'desc' => $desc,
            'image1' => $image1,
            'shiping' => $shiping
        );
        $this->cart->insert($insert);
        $this->load->view('templates/cart');
    }

    function remove($rowid) {           //function to remove item from the cart
        $this->cart->update(array(
            'rowid' => $rowid,
            'qty' => 0
        ));
        redirect('view');
    }

    function clear() {          //function to clear the cart
        $this->cart->destroy();
        redirect('view');
    }

    function cart_details() {   //function to goto cart details
        $data['headertitle'] = $this->viewmodel->get_header_title();
        $data['headerlogo'] = $this->viewmodel->get_header_logo();
        $data['meta'] = $this->dbmodel->get_meta_data();
        $data['headerdescription'] = $this->viewmodel->get_header_description();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/navigation');
        $this->load->view('templates/cartDetails');
        $this->load->view('templates/footer');
    }

    function category($id = 0) {
        $data['headertitle'] = $this->viewmodel->get_header_title();
        $data['headerlogo'] = $this->viewmodel->get_header_logo();
        $data['meta'] = $this->dbmodel->get_meta_data();
        $data['headerdescription'] = $this->viewmodel->get_header_description();

        $data['product_info'] = $this->productmodel->product_info();

        $data['featureItem'] = $this->productmodel->featured_item();
        $data['category'] = $this->productmodel->category_list();
        $data['categoryId'] = $this->productmodel->category_list_id($id);
        foreach ($data['categoryId'] as $page) {
            $data['pageTitle'] = $page->category_name;
        }
        $data['product'] = $this->productmodel->get_productList($id);

        // $config = array();
        //   $config["base_url"] = base_url()."index.php/view/category/".$id ;
        //   $config["total_rows"] = $this->dbmodel->record_count_cat($id);
        // var_dump($config["total_rows"]);
        //   $config["per_page"] = 6;
        //   $this->pagination->initialize($config);
        //  $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        //   $data["product"] = $this->productmodel->get_productList($config["per_page"], $page,$id);
        // $config['display_pages'] = FALSE; 
        //  $data["links"] = $this->pagination->create_links();
        //var_dump($data);
        $data['slider_json'] = json_encode($data['featureItem']);
        $this->load->view('templates/header', $data);
        $this->load->view('templates/navigation');

        $this->load->view('templates/category_page', $data);

        $this->load->view('templates/cart');
        $this->load->view('templates/sidebarview', $data);
        $this->load->view('templates/footer');
    }

    function page($id) {
        $data['headertitle'] = $this->viewmodel->get_header_title();
        $data['headerlogo'] = $this->viewmodel->get_header_logo();
        $data['meta'] = $this->dbmodel->get_meta_data();
        $data['headerdescription'] = $this->viewmodel->get_header_description();


        $data['product_info'] = $this->productmodel->product_info();

        $data['featureItem'] = $this->productmodel->featured_item();
        $data['category'] = $this->productmodel->category_list();
        // $data['categoryId'] = $this->productmodel->category_list_id($id);
        //  $data['category'] = $this->productmodel->category_list_id();
        //var_dump($data);
        $data['get_page'] = $this->productmodel->get_page($id);
        foreach ($data['get_page'] as $page) {
            $data['pageTitle'] = $page->page_name;
        }
        $data['slider_json'] = json_encode($data['featureItem']);
        $this->load->view('templates/header', $data);
        $this->load->view('templates/navigation');

        $this->load->view('templates/single_page', $data);

        $this->load->view('templates/cart');
        $this->load->view('templates/sidebarview', $data);
        $this->load->view('templates/footer');
    }

    public function registeruser() {

        $data['headertitle'] = $this->viewmodel->get_header_title();
        $data['headerlogo'] = $this->viewmodel->get_header_logo();
        $data['meta'] = $this->dbmodel->get_meta_data();
        $data['headerdescription'] = $this->viewmodel->get_header_description();
        $data['shiping'] = $this->productmodel->getship();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/navigation');
        $this->load->view('templates/userRegistrationAndShipping', $data);
        $this->load->view('templates/cartLogin');
        $this->load->view('templates/footer');
    }

    function logout() {
        $this->session->sess_destroy();
        $this->index();
        redirect('view/index', 'refresh');
    }

    public function homeLogin() {
        $data['headertitle'] = $this->viewmodel->get_header_title();
        $data['headerlogo'] = $this->viewmodel->get_header_logo();
        $data['meta'] = $this->dbmodel->get_meta_data();
        $data['headerdescription'] = $this->viewmodel->get_header_description();
        $data['shiping'] = $this->productmodel->getship();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/navigation');
        $this->load->view('templates/home_login');
        $this->load->view('templates/footer');
    }

    public function validate_login() {
        $data['headertitle'] = $this->viewmodel->get_header_title();
        $data['headerlogo'] = $this->viewmodel->get_header_logo();
        $data['meta'] = $this->dbmodel->get_meta_data();
        $data['headerdescription'] = $this->viewmodel->get_header_description();

        $this->load->library('form_validation');
        $this->form_validation->set_rules('user_email', 'Email', 'trim|required|xss_clean');
        $this->form_validation->set_rules('user_pass', 'Password', 'trim|required|xss_clean|md5|callback_check_database');
        if ($this->form_validation->run() == FALSE) {
            redirect('view/homeLogin');
        } else {
            $email = $this->input->post('user_email');
            $pass = $this->input->post('user_pass');

            $query = $this->dbmodel->validate_user($email, $pass);

            if ($query) { // if the user's credentials validated...
                foreach ($query as $users) {
                    $userName = $users->user_name;
                }
                $data = array(
                    'useremail' => $this->input->post('user_email'),
                    'username' => $userName,
                    'logged_in' => true);
                $this->session->set_userdata($data);
                redirect('view/index');
            } else {
                $this->session->set_flashdata('message', 'Username or password incorrect');
                redirect('view/homeLogin');
            }
        }
    }

    public function addNewUser() {
        $this->load->library('form_validation');
        $users = $this->dbmodel->get_all_user();

        $this->form_validation->set_rules('u_name', 'Username', 'trim|required|xss_clean');
        $this->form_validation->set_rules('u_email', 'Email', 'trim|required|xss_clean');
        $this->form_validation->set_rules('u_pass', 'Password', 'trim|required|xss_clean|callback_check_database');
        $this->form_validation->set_rules('u_pass_re', 'Password', 'trim|required|xss_clean|callback_check_database');
        if ($this->form_validation->run() == FALSE) {
            $this->homeLogin();
        } else {
            
            if (preg_match("/^[a-z,0-9,A-Z]{5,15}$/", $_POST['u_name'])) {
                $name = trim($_POST['u_name']);
                
            } else {
               
                $this->session->set_flashdata('message', 'User name must be 5 to 15 character long');
                redirect('view/homeLogin', 'refresh');
            }
            if (preg_match("/^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/", $_POST['u_email'])) {
                $email = trim($_POST['u_email']);
            } else {
                $this->session->set_flashdata('message', 'Type valid email address');
                redirect('view/homeLogin', 'refresh');
            }
            if (preg_match("/^[a-z,0-9,A-Z]{5,35}$/", $_POST['u_pass'])) {
                $pass = trim($_POST['u_pass']);
            } else {
                $this->session->set_flashdata('message', 'password must be 5 to 35 character long');
                redirect('view/homeLogin', 'refresh');
            }
            
            $name = $this->input->post('u_name');


            $userName = $this->dbmodel->check_user_name($name);

            if (!empty($userName)) {
                $this->session->set_flashdata('message', 'User Name already exsists');
                redirect('view/homeLogin', 'refresh');
            } else {
                $user_name = $this->input->post('u_name');
            }
            $userEmail = $this->dbmodel->check_user_email($email);

            if ($userEmail) {
                $this->session->set_flashdata('message', 'User Email already exsists');
                redirect('view/homeLogin', 'refresh');
            } else {
                $user_email = $this->input->post('u_email');
            }
            
            if (isset($_POST['u_pass_re']))
                ;
            $re_pass = $_POST['u_pass_re'];
            if ($pass !== $re_pass) {
                $this->session->set_flashdata('message', 'Password did not match');
                redirect('view/homeLogin', 'refresh');
            } else {

                $this->dbmodel->add_new_user_for($user_name, $user_email, $re_pass);
                $this->session->set_flashdata('message', 'User Registered Successfully');
                redirect('view/index');
            }
        }
    }

    public function shippingAddress() {
        $this->load->view('templates/header');
        $this->load->view('templates/navigation');
        $this->load->view('templates/shipping');
        $this->load->view('templates/footer');
    }

    public function adduser() {
        $this->load->model('dbmodel');
        $this->load->helper('form');
        $this->load->library(array('form_validation', 'session'));
        $this->form_validation->set_rules('u_name', 'User Name', 'required|xss_clean|max_length[200]');
        $this->form_validation->set_rules('u_fname', 'First Name', 'required|xss_clean|max_length[200]');
        $this->form_validation->set_rules('u_lname', 'Last Name', 'required|xss_clean|max_length[200]');
        $this->form_validation->set_rules('u_email', 'User email', 'required|xss_clean|max_length[200]');
        $this->form_validation->set_rules('u_contact', 'Contact', 'required|xss_clean|max_length[200]');
        $this->form_validation->set_rules('u_address', 'Address', 'required|xss_clean|max_length[200]');
        $this->form_validation->set_rules('u_pass', 'Password', 'required|xss_clean|md5|max_length[200]');

        if ($this->form_validation->run() == FALSE) {

            redirect('view/registeruser');
        } else {

            //if valid

            $name = $this->input->post('u_name');
            $fname = $this->input->post('u_fname');
            $lname = $this->input->post('u_lname');
            $email = $this->input->post('u_email');
            $address = $this->input->post('u_address');
            $contact = $this->input->post('u_contact');
            $pass = $this->input->post('u_pass');

            $repass = $this->input->post('u_repass');
            $repass = md5($repass);
            $user_type = 1;
            $status = 1;
            if ($pass == $repass) {
                $check = $this->dbmodel->check_data($email);
                if ($check > 0) { //if the data exists show error message
                    $this->session->set_flashdata('message', 'User name already exists. Please type new user name.');
                    redirect('view/registeruser');
                } else {
                    $this->dbmodel->add_new_user($name, $fname, $lname, $email, $pass, $status, $user_type, $contact, $address);

                    echo " User registerd <br/> You may contineu shopping ";

//$this->session->set_flashdata('message', 'User registerd <br/> You may contineu shopping');
                    //  redirect('view/registeruser');               
// redirect('paypal');
                }
            } else {
                $this->session->set_flashdata('message', 'Password din not matched');
                redirect('view/registeruser');
            }
        }
    }

    function shipping() {
        $this->load->model('dbmodel');
        $this->load->helper('form');
        $this->load->library(array('form_validation', 'session'));
        $this->form_validation->set_rules('receiver_name', 'User Name', 'required|xss_clean|max_length[200]');
        $this->form_validation->set_rules('receiver_address', 'Address', 'required|xss_clean|max_length[200]');
        $this->form_validation->set_rules('receiver_city', 'City', 'required|xss_clean|max_length[200]');
        $this->form_validation->set_rules('receiver_state', 'State', 'required|xss_clean|max_length[200]');
        $this->form_validation->set_rules('receiver_country', 'Country', 'required|xss_clean|max_length[200]');
        $this->form_validation->set_rules('receiver_zip', 'Zip', 'required|xss_clean|max_length[200]');
        $this->form_validation->set_rules('receiver_email', 'Email', 'required|xss_clean|md5|max_length[200]');
        $this->form_validation->set_rules('Receiver_contact', 'Contact', 'required|xss_clean|max_length[200]');
        if ($this->form_validation->run() == FALSE) {

            redirect('view/shippingAddress');
        } else {
            $name = $this->input->post('receiver_name');
            $address = $this->input->post('receiver_address');
            $city = $this->input->post('receiver_city');
            $state = $this->input->post('receiver_state');
            $country = $this->input->post('receiver_country');
            $zip = $this->input->post('receiver_zip');
            $email = $this->input->post('receiver_email');
            $contact = $this->input->post('Receiver_contact');

            $this->dbmodel->order_user($name, $address, $city, $state, $country, $zip, $email, $contact);
            echo " enter to the paypal";
        }
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */