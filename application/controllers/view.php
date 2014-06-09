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
        $this->load->library('session');

        $this->load->helper(array('form', 'url', 'date'));
    }

    public function index() {     //fetching data from database of the product
        $data['username'] = $this->session->userdata('username');
        $data['headertitle'] = $this->viewmodel->get_header_title();
        $data['headerlogo'] = $this->viewmodel->get_header_logo();
        $data['meta'] = $this->dbmodel->get_meta_data();
        $data['headerdescription'] = $this->viewmodel->get_header_description();
        $data['featureItem'] = $this->productmodel->featured_item();
        $data['event']= $this->productmodel->get_max_events();
        $data['offer']= $this->productmodel->get_max_offers();
       
        $config = array();
        $config["base_url"] = base_url() . "index.php/view/index";
        $config["total_rows"] = $this->dbmodel->record_count_product();
        $config["per_page"] = 15;
        $this->pagination->initialize($config);
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

        $data["product_info"] = $this->dbmodel->get_all_product($config["per_page"], $page);
        /* from here */
        $choice = $config["total_rows"] / $config["per_page"];
        $config["num_links"] = round($choice);
        $config['full_tag_open'] = '<ul class="tsc_pagination tsc_paginationA tsc_paginationA01">';
        $config['full_tag_close'] = '</ul>';
        $config['prev_link'] = 'First';
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';
        $config['next_link'] = 'Next';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="current"><a href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
        $config['first_link'] = '&lt;&lt;';
        $config['last_link'] = '&gt;&gt;';
        $this->pagination->initialize($config);

        /* to here */
        $config['display_pages'] = FALSE;
        $data["links"] = $this->pagination->create_links();

        $data['category'] = $this->productmodel->category_list();

        $data['slider_json'] = json_encode($data['featureItem']);
        $this->load->view('templates/header', $data);
        $this->load->view('templates/navigation');

        $this->load->view('templates/content', $data);

        $this->load->view('templates/cart');
        $this->load->view('templates/sidebarview', $data);
        $this->load->view('templates/footer');
    }

    public function user_detail() {
        
    }

    public function error() {
        $data['headertitle'] = $this->viewmodel->get_header_title();
        $data['headerlogo'] = $this->viewmodel->get_header_logo();
        $data['meta'] = $this->dbmodel->get_meta_data();
        $data['headerdescription'] = $this->viewmodel->get_header_description();

        $data['product_info'] = $this->productmodel->product_info();

        $data['featureItem'] = $this->productmodel->featured_item();
        $data['category'] = $this->productmodel->category_list();


        $data['token_error'] = "Sorry the item you are searching in not found";
        $this->load->view('templates/header', $data);
        $this->load->view('templates/navigation');
        $this->load->view('templates/error_landing_page', $data);
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
        if (isset($_POST['email'])) {
            if (preg_match("/^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/", $_POST['email']))
                ; {
                $email = trim($_POST['email']);
                $username = $this->dbmodel->get_selected_user($email);
                if (!empty($username)) {
                    foreach ($username as $dbemail) {
                        $to = $dbemail->user_email;
                        $userName = $dbemail->user_name;
                    }
                    if ($to === $email) {
                        $token = $this->getRandomString(10);
                        $this->dbmodel->update_emailed_user($to, $token);


                        $this->passwordresetemail($to, $userName, $token);
                    }
                } else {
                    $this->session->set_flashdata('message', 'Type valid email address');
                    redirect('view/forgotPassword', 'refresh');
                }
            }
        } else {
            $this->session->set_flashdata('message', 'Type valid email address');
            redirect('view/forgotPassword', 'refresh');
        }
    }

    public function passwordresetemail($to, $userName, $token) {
        $this->load->helper('emailsender_helper');
        $subject = "Password Reset";
        $link = base_url();
        $message = password_reset_email($to, $userName, $token, $link);


        send_password_reset_email($to, $subject, $message);
    }

    public function test($token) {
        $data['headertitle'] = $this->viewmodel->get_header_title();
        $data['headerlogo'] = $this->viewmodel->get_header_logo();
        $data['meta'] = $this->dbmodel->get_meta_data();
        $data['query'] = $this->dbmodel->find_user_auth_key($token);
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

    public function resetPassword() {

        $data['headertitle'] = $this->viewmodel->get_header_title();
        $data['headerlogo'] = $this->viewmodel->get_header_logo();
        $data['meta'] = $this->dbmodel->get_meta_data();
        $data['headerdescription'] = $this->viewmodel->get_header_description();
        $data['token_error'] = "Sorry! Your token has been expired. ";

        if (!empty($_GET['resetPassword'])) {
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
                $this->load->view('templates/error_landing_page', $data);
                $this->load->view('templates/footer');
            }
        }
    }

    public function setpassword() {
        $data['headertitle'] = $this->viewmodel->get_header_title();
        $data['headerlogo'] = $this->viewmodel->get_header_logo();
        $data['meta'] = $this->dbmodel->get_meta_data();
        $data['headerdescription'] = $this->viewmodel->get_header_description();
        $data['token_error'] = "Sorry! Your token has been expired. ";
        if (preg_match("/^[a-z,0-9,A-Z]{5,35}$/", $_POST['user_pass'])) {
            $password = trim($_POST['user_pass']);
        } else {
            $this->session->set_flashdata('message', 'password must be 5 to 35 character long');
            redirect('view/forgotpassword', 'refresh');
        }
        if (preg_match("/^[a-z,0-9,A-Z]{5,35}$/", $_POST['user_confirm_pass'])) {
            $confirmPassword = trim($_POST['user_confirm_pass']);
        } else {
            $this->session->set_flashdata('message', 'password must be 5 to 35 character long');
            redirect('view/forgotpassword', 'refresh');
        }

        if (!empty($_POST['tokenid'])) {
            $token = $_POST['tokenid'];
            if ($password == $confirmPassword) {

                $userPassword = $this->input->post('user_pass');

                $this->dbmodel->update_user_password($token, $userPassword);


                $this->session->set_flashdata('message', 'Your password has been changed successfully');
                redirect('view/index', 'refresh');
            } else {
                $this->session->set_flashdata('message', 'Password didnot match');
                redirect('view/setpassword', 'refresh');
            }
        } else {

            $this->load->view('templates/header', $data);
            $this->load->view('templates/navigation');
            $this->load->view('templates/error_landing_page', $data);
            $this->load->view('templates/footer');
        }
    }

    public function details($id = 0) {

        $data['headertitle'] = $this->viewmodel->get_header_title();
        $data['headerlogo'] = $this->viewmodel->get_header_logo();
        $data['meta'] = $this->dbmodel->get_meta_data();
        $data['headerdescription'] = $this->viewmodel->get_header_description();
$data['event']= $this->productmodel->get_max_events();
        $data['offer']= $this->productmodel->get_max_offers();
        $data['product_info'] = $this->productmodel->product_info();

        $data['featureItem'] = $this->productmodel->featured_item();
        $data['category'] = $this->productmodel->category_list();
        if (isset($id)) {
            $data['product'] = $this->productmodel->getProductById($id);
            foreach ($data['product'] as $page) {
                $data['pageTitle'] = $page->name;
                $data['pageDescription'] = $page->description;
            }
            $this->load->view('templates/header', $data);
            $this->load->view('templates/navigation');
            $this->load->view('templates/details', $data);
            $this->load->view('templates/cart');
            $this->load->view('templates/sidebarview', $data);
            $this->load->view('templates/footer');
        } else {
            $data['token_error'] = "Sorry the item you are searching in not found";
            $this->load->view('templates/header', $data);
            $this->load->view('templates/navigation');
            $this->load->view('templates/error_landing_page', $data);
            $this->load->view('templates/cart');
            $this->load->view('templates/sidebarview', $data);
            $this->load->view('templates/footer');
        }
    }

    public function login() {

        if ($this->session->userdata('logged_in')) {
            $data['headertitle'] = $this->viewmodel->get_header_title();
            $data['headerlogo'] = $this->viewmodel->get_header_logo();
            $data['meta'] = $this->dbmodel->get_meta_data();
            $data['headerdescription'] = $this->viewmodel->get_header_description();
            $name = $this->session->userdata('username');
            $email = $this->session->userdata('useremail');

            $this->load->model('dbmodel');
            $data['detail'] = $this->productmodel->get_user($name, $email);

            if (!empty($data['detail'])) {
                $data['shiping'] = $this->productmodel->getship();
                $this->load->view('templates/header', $data);
                $this->load->view('templates/navigation');
                $this->load->view('templates/userRegistrationAndShipping', $data);
                $this->load->view('templates/footer');
            }
        } else {
            $data['headertitle'] = $this->viewmodel->get_header_title();
            $data['headerlogo'] = $this->viewmodel->get_header_logo();
            $data['meta'] = $this->dbmodel->get_meta_data();
            $data['headerdescription'] = $this->viewmodel->get_header_description();
            $this->load->view('templates/header', $data);
            $this->load->view('templates/navigation');
            $this->load->view('templates/home_login');
            $this->load->view('templates/login');

            $this->load->view('templates/footer');
        }
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
$data['event']= $this->productmodel->get_max_events();
        $data['offer']= $this->productmodel->get_max_offers();
        $data['featureItem'] = $this->productmodel->featured_item();
        $data['category'] = $this->productmodel->category_list();
        $data['categoryId'] = $this->productmodel->category_list_id($id);
        foreach ($data['categoryId'] as $page) {
            $data['pageTitle'] = $page->category_name;
        }
        $data['product'] = $this->productmodel->get_productList($id);
        foreach ($data['product'] as $page) {
            $data['pageDescription'] = $page->description;
        }

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
        $data['event']= $this->productmodel->get_max_events();
        $data['offer']= $this->productmodel->get_max_offers();
        $data['featureItem'] = $this->productmodel->featured_item();
        $data['category'] = $this->productmodel->category_list();

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

        $cart = $this->cart->contents();
        if (!empty($cart)) {
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
        } else {
            redirect('view/index', 'refresh');
        }
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
        $this->form_validation->set_rules('user_email', 'Email', 'trim|regex_match[/^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/]|required|xss_clean');
        $this->form_validation->set_rules('user_pass', 'Password', 'trim|regex_match[/^[a-z,0-9,A-Z]{5,35}$/]|required|xss_clean|callback_check_database');


        if ($this->form_validation->run() == FALSE) {
            $data['login_validation_error'] = validation_errors();


            $this->load->view('templates/header', $data);
            $this->load->view('templates/navigation');
            $this->load->view('templates/home_login', $data);
            $this->load->view('templates/login');
            $this->load->view('templates/footer');
        } else {
            $email = trim($_POST['user_email']);
            $pass = trim($_POST['user_pass']);
            $query = $this->dbmodel->validate_user($email, $pass);

            if (!empty($query)) { // if the user's credentials validated...
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

        $data['headertitle'] = $this->viewmodel->get_header_title();
        $data['headerlogo'] = $this->viewmodel->get_header_logo();
        $data['meta'] = $this->dbmodel->get_meta_data();
        $data['headerdescription'] = $this->viewmodel->get_header_description();
        $data['shiping'] = $this->productmodel->getship();

        $this->load->library('form_validation');
        $this->form_validation->set_rules('u_name', 'Name', 'trim|required|xss_clean');
        $this->form_validation->set_rules('u_email', 'Email', 'trim|required|xss_clean');
        $this->form_validation->set_rules('u_pass', 'Password', 'trim|xss_clean|required|callback_check_database');
        $this->form_validation->set_rules('u_pass_re', 'Confirm Password', 'trim|xss_clean|required|callback_check_database');

        $validation = TRUE;
        $validation_message = "";
        if ($this->form_validation->run()) {
            if (isset($_POST['u_name'])) {


                $name = trim($_POST['u_name']);
                if (!preg_match("/^[a-z,0-9,A-Z]{2,15}$/", $name)) {
                    $validation_message .= "<p>Enter valid name</p>";
                    $validation = FALSE;
                }
            }
            if (isset($_POST['u_email'])) {
                $email = trim($_POST['u_email']);
                if (!preg_match("/^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/", $email)) {
                    $validation_message .= "<p>Enter valid email address</p>";
                    $validation = FALSE;
                }
            }
            if (isset($_POST['u_pass'])) {
                $pass = trim($_POST['u_pass']);
                if (!preg_match("/^[a-z,0-9,A-Z]{5,35}$/", $pass)) {
                    $validation_message .= "<p>Password must be 5 to 35 character long</p>";
                    $validation = FALSE;
                }
            }
            if (isset($_POST['u_pass_re'])) {
                $repass = trim($_POST['u_pass_re']);
            }


            if (isset($_POST['u_pass']) && isset($_POST['u_pass_re'])) {
                if ($pass != $repass) {
                    $validation_message .= "<p>Password did not matched</p>";
                    $validation = FALSE;
                }
            } else {
                $validation_message .= "<p>Password is empty</p>";
                $validation = FALSE;
            }
        }
        if ($this->form_validation->run() == FALSE || $validation == FALSE) {
            $data['validation_message'] = validation_errors() . $validation_message;


            $this->load->view('templates/header', $data);
            $this->load->view('templates/navigation');
            $this->load->view('templates/home_login');
            $this->load->view('templates/footer');
        } else {

            $name = trim($_POST['u_name']);
            $email = trim($_POST['u_email']);
            $pass = trim($_POST['u_pass']);


            //$userName = $this->dbmodel->check_user_name($name);
            $userEmail = $this->dbmodel->check_user_email($email);

            if (!empty($userEmail)) {
                $validation = FALSE;
                $data['validation_message'] = "Email already exsists. Reset you password.";

                $this->load->view('templates/header', $data);
                $this->load->view('templates/navigation');
                $this->load->view('templates/home_login');
                $this->load->view('templates/footer');
            } else {

                if ($this->dbmodel->add_new_user_for($name, $email, $pass))
                    $data = array(
                        'useremail' => $email,
                        'username' => $name,
                        'logged_in' => true);

                $this->session->set_userdata($data);
                $this->registerEmail($email, $name);
                $this->session->set_flashdata('message', 'User Registered Successfully');

                redirect('view/index');
            }
        }
    }

    public function registerEmail($user_email, $user_name) {
        $this->load->helper('emailsender_helper');
        $subject = "Registration Successful";
        $message = register_email($user_email, $user_name);


        send_email($user_email, $subject, $message);
    }

    public function userdetails() {
        $data['headertitle'] = $this->viewmodel->get_header_title();
        $data['headerlogo'] = $this->viewmodel->get_header_logo();
        $data['meta'] = $this->dbmodel->get_meta_data();
        $data['headerdescription'] = $this->viewmodel->get_header_description();
        $data['featureItem'] = $this->productmodel->featured_item();
        $data['product_info'] = $this->productmodel->product_info();
        $data['category'] = $this->productmodel->category_list();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/navigation');
        $this->load->view('templates/user_details');
        $this->load->view('templates/cart');
        $this->load->view('templates/sidebarview', $data);
        $this->load->view('templates/footer');
    }

    public function updateUser() {
        $data['headertitle'] = $this->viewmodel->get_header_title();
        $data['headerlogo'] = $this->viewmodel->get_header_logo();
        $data['meta'] = $this->dbmodel->get_meta_data();
        $data['headerdescription'] = $this->viewmodel->get_header_description();
        $data['featureItem'] = $this->productmodel->featured_item();
        $data['product_info'] = $this->productmodel->product_info();
        $data['category'] = $this->productmodel->category_list();
        
        $this->form_validation->set_rules('u_fname', 'First name', 'trim|regex_match[/^[a-z,0-9,A-Z]{2,15}$/]|xss_clean|max_length[15]');
        $this->form_validation->set_rules('u_lname', 'Last name', 'trim|regex_match[/^[a-z,0-9,A-Z]{2,15}$/]|xss_clean|max_length[15]');
        $this->form_validation->set_rules('street_address', 'Address', 'trim|regex_match[/^[A-Za-z0-9\-\\,.]{2,35}$/]|required|xss_clean|max_length[35]');
        $this->form_validation->set_rules('Town_address', 'suburb/city', 'trim|regex_match[/^[A-Za-z0-9\-\\,.]{2,35}$/]|xss_clean|max_length[35]');
        $this->form_validation->set_rules('District_address', 'State', 'trim|regex_match[/^[A-Za-z0-9\-\\,.]{2,35}$/]|required|xss_clean|max_length[35]');
        $this->form_validation->set_rules('zip', 'Post Code', 'trim|regex_match[/^[0-9]{4,15}$/]|required|xss_clean|max_length[15]');
        $this->form_validation->set_rules('country', 'Country', 'trim|regex_match[/^[A-Za-z0-9\-\\,.]{2,35}$/]|required|xss_clean|max_length[35]');
        $this->form_validation->set_rules('u_contact', 'Contact no.', 'trim|regex_match[/^[0-9]{5,15}$/]|xss_clean|max_length[15]');
        $this->form_validation->set_rules('user_email', 'Email', 'trim|regex_match[/^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/]|required|xss_clean|max_length[200]');
        if ($this->form_validation->run() == FALSE) {
            $data['user_validation_message'] = validation_errors();
            $this->load->view('templates/header', $data);
        $this->load->view('templates/navigation');
        $this->load->view('templates/user_details');
        $this->load->view('templates/cart');
        $this->load->view('templates/sidebarview', $data);
        $this->load->view('templates/footer');
        } else {
            $fname=  trim($_POST['u_fname']);
            $lname=  trim($_POST['u_lname']);
            $street=  trim($_POST['street_address']);
            $town=  trim($_POST['Town_address']);
            $district=  trim($_POST['District_address']);
            $zip=  trim($_POST['zip']);
            $country=  trim($_POST['country']);
            $contact=  trim($_POST['u_contact']);
            $email=  trim($_POST['user_email']);
            $userEmail= $this->session->userdata('useremail');
                        if($userEmail===$email)
            {
            $this->dbmodel->update_user_data($fname,$lname,$street,$town,$district,$zip,$country,$contact,$email); 
            
            
            
            
            
            }else{
            $this->session->set_flashdata('message', 'Your email did not match');
                redirect('view/userdetails');
            }  
        }
        $this->session->set_flashdata('message', 'Your details has been updatedsuccessfully');
                redirect('view/index');
    }

            
            
   //         $this->dbmodel->update_user_data($fname,$lname,$street,$town,$district,$zip,$country,$contact,$email); 
   //          $this->session->set_flashdata('message', 'Your data has been successfully updated');
   //          $this->load->view('templates/header', $data);
//	        $this->load->view('templates/navigation');
//	        $this->load->view('templates/user_details');
//	        $this->load->view('templates/cart');
//	        $this->load->view('templates/sidebarview', $data);
//	        $this->load->view('templates/footer');
            
            
            
            
  //      }
 //   }

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
    
    function contact()
    {
         $data['username'] = $this->session->userdata('username');
        $data['headertitle'] = $this->viewmodel->get_header_title();
        $data['headerlogo'] = $this->viewmodel->get_header_logo();
        $data['meta'] = $this->dbmodel->get_meta_data();
        $data['headerdescription'] = $this->viewmodel->get_header_description();
        $data['featureItem'] = $this->productmodel->featured_item();
        $data['category'] = $this->productmodel->category_list();
        $data['event']= $this->productmodel->get_max_events();
        $data['offer']= $this->productmodel->get_max_offers();
        $data['slider_json'] = json_encode($data['featureItem']);
        $this->load->view('templates/header', $data);
        $this->load->view('templates/navigation');

        $this->load->view('templates/contact', $data);

        $this->load->view('templates/cart');
        $this->load->view('templates/sidebarview', $data);
        $this->load->view('templates/footer');
    }
    
    public function events()
        {
         $data['username'] = $this->session->userdata('username');
        $data['headertitle'] = $this->viewmodel->get_header_title();
        $data['headerlogo'] = $this->viewmodel->get_header_logo();
        $data['meta'] = $this->dbmodel->get_meta_data();
        $data['headerdescription'] = $this->viewmodel->get_header_description();
        $data['featureItem'] = $this->productmodel->featured_item();
        $data['category'] = $this->productmodel->category_list();
        $data['event']= $this->productmodel->get_max_events();
        $data['offer']= $this->productmodel->get_max_offers();
        $data['slider_json'] = json_encode($data['featureItem']);
        $config = array();
        $config["base_url"] = base_url() . "index.php/view/events";
        $config["total_rows"] = $this->productmodel->record_count_events();
        $config["per_page"] = 10;
        
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;        
        $data['events']= $this->productmodel->get_all_events($config["per_page"], $page);
        $choice = $config["total_rows"] / $config["per_page"];
        $config["num_links"] = round($choice);
        $config['full_tag_open'] = '<ul class="tsc_pagination tsc_paginationA tsc_paginationA01">';
        $config['full_tag_close'] = '</ul>';
        $config['prev_link'] = 'First';
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';
        $config['next_link'] = 'Next';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="current"><a href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
        $config['first_link'] = '&lt;&lt;';
        $config['last_link'] = '&gt;&gt;';
        $this->pagination->initialize($config);

        /* to here */
        $config['display_pages'] = FALSE;
        $data["links"] = $this->pagination->create_links();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/navigation');

        $this->load->view('templates/all_events', $data);

        $this->load->view('templates/cart');
        $this->load->view('templates/sidebarview', $data);
        $this->load->view('templates/footer');
    }
     public function eventDetails($id=0)
        {
         $data['username'] = $this->session->userdata('username');
        $data['headertitle'] = $this->viewmodel->get_header_title();
        $data['headerlogo'] = $this->viewmodel->get_header_logo();
        $data['meta'] = $this->dbmodel->get_meta_data();
        $data['headerdescription'] = $this->viewmodel->get_header_description();
        $data['featureItem'] = $this->productmodel->featured_item();
        $data['category'] = $this->productmodel->category_list();
        $data['slider_json'] = json_encode($data['featureItem']);
        $data['events']= $this->productmodel->get_events_by_id($id);
        $data['sideBarevent']= $this->productmodel->get_max_events();
        $data['offer']= $this->productmodel->get_max_offers();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/navigation');

        $this->load->view('templates/single_event', $data);

        $this->load->view('templates/cart');
        $this->load->view('templates/sidebarview', $data);
        $this->load->view('templates/footer');
    }
            
    function comment()
    {
        if($_POST)
        {
            
            $email = $_POST['email'];
            $message = $_POST['message'];
            die($email.$message);
            
        }
        else{
            $this->contact();
        }
    }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */