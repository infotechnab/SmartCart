<?php

class Productmodel extends CI_Model {

    public function __construct() {
        $this->load->database();
    }
    
public function product_info(){
     $this->db->order_by('id','DESC');
         $query = $this->db->get('product');
            return $query->result();
    }
    function getship()
    {
        $query = $this->db->get('shiping_cost');
        return $query->result();
    }


    public function getProductById($id)
    {
          $this->db->where('id', $id);
         
            $query = $this->db->get('product');
           
            return $query->result();
    }
    
    public function featured_item(){
       $status = 0;
        $this->db->where('status',$status);
     $this->db->order_by('id','DESC');
     $query = $this->db->get_where('product', array('featured' => '1'));
      return $query->result();
    }
    
    public function getTranId()
    {
         $this->db->order_by('trans_id','DESC');
     $query = $this->db->get('product_oder_detail', 1);
       return $query->result();
    }
    //method to verify the product info
    public function get_product_data_verify($product_code)
    {
        $this->db->select('name,description,price');
         $this->db->where('id', $product_code);
      $this->db->limit(1);
       $query = $this->db->get('product');
        return $query->result();
    }
    public function get_product_data($product_code)
    {
        $this->db->select('shiping');
         $this->db->where('id', $product_code);
        $this->db->limit(1);
       $query = $this->db->get('product');
        return $query->result();
    }
    function category_list()
    {
        $query = $this->db->get('category');
        return $query->result();
    }
    function category_list_id($id)
    {
        
        $this->db->where('id',$id);
         $query = $this->db->get('category');
        return $query->result();
    }
    public function get_all_events($limit, $start){
        $this->db->limit($limit, $start);
        $this->db->order_by('date','DESC');
         $query = $this->db->get('events');
        return $query->result();
    }
     public function get_events_by_id($id){
        $this->db->where('id',$id);
         $query = $this->db->get('events');
        return $query->result();
    }
    public function get_max_events(){
        $this->db->limit(3);
        $this->db->order_by('date','DESC');
         $query = $this->db->get('events');
        return $query->result();
    }
     public function get_max_offers(){
        $this->db->limit(1);
        $this->db->order_by('id','DESC');
         $query = $this->db->get('post');
        return $query->result();
    }
    
            function record_count_events()
    {  
        return $this->db->count_all("events");
    }
            function get_product($id)
    {
         $this->db->where('category',$id);
         $query = $this->db->get('product',3);
         return $query->result();
                
    }
    
   
    
    function get_productList($catlist,$id, $limit, $start)
    {
        
        //$catlist['id']=$id;
        
        
        $this->db->where('category',$id);
       // foreach ($catlist as $cat)
      //  {
            
      //      $this->db->or_where('category',$cat); 
      //  }
        $this->db->where('status',"0");
        $this->db->limit($limit, $start);
         $query = $this->db->get('product');
   
         return $query->result();
                
    }
    
    function get_page($id)
    {
        $this->db->where('id',$id);
        $query = $this->db->get('page');
        return $query->result();
        
    }
    public function add_new_user($username, $fname, $lname, $email, $pass, $contact,$address,$city,$state,$country,$zip)
    {   
        $user_type = 1;
                
        $data = array(
            'user_name'=>$username,
            'user_fname'=> $fname,
            'user_lname'=> $lname,
            'user_email'=> $email,
            'user_pass'=> $pass,
            'address'=>$address,
            'contact'=>$contact,
            'city'=>$city,
            'state'=>$state,
            'country'=>$country,
            'zip'=>$zip,
            //'user_status'=> $status,
            'user_type'=> $user_type );
         $this->db->insert('user', $data);        
    }
    
    function get_last_user()
    {
       
        $this->db->order_by('id','DESC');
        $query = $this->db->get('user',1);
        return $query->result();
    }
    
    function get_id_user($email)
    {
       
        //$this->db->order_by('id','DESC');
        $this->db->where('user_email',$email);
        $query = $this->db->get('user',1);
        return $query->result();
    }
    
    function get_last_order()
    {
       
        $this->db->order_by('o_id','DESC');
        $query = $this->db->get('product_oder',1);
        return $query->result();
    }
    
    function order_user($name,$address,$city,$state,$country,$zip,$email,$contact,$uid)
    {
        
        $data = array(
            'u_id'=>$uid,
            'user_name'=>$name,
            'deliver_address'=>$address,
            'city'=>$city,
            'state'=>$state,
            'zip'=>$zip,
            'country'=>$country,
            'email'=>$email,
            'contact'=>$contact
        );
        $this->db->insert('product_oder',$data);
    }
    
    function validate() {
       
                
        $this->db->where('user_email', $this->input->post('email'));
        $this->db->where('user_pass', md5($this->input->post('pass')));
        $this->db->where('user_type',1);
        $query = $this->db->get('user');
        return $query->result();
       
    }
    function get_user($name) {
       
                
        //$this->db->where('user_email', $email);
        $this->db->where('user_name', $name);
        $query = $this->db->get('user');
        return $query->result();
       
    }
     function update_shipping_cost($charge) {
        $this->load->database();
        $data = array(
            'price' => $charge);
        $this->db->where('sid', 1);
        $this->db->update('shiping_cost', $data);
    }
    
    function get_fbsorted_prodcuts($key=0)
    {
        $this->db->select('id,image1,name, price');       
        $this->db->where('id', $key);  
        $query = $this->db->get('product');
        
        return $query->result();
    }
}