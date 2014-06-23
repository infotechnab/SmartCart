<?php
 $config = array();
        $config["base_url"] = base_url() . "index.php/view/transactiondetails";
        $config["per_page"] = 6;
        $this->pagination->initialize($config);
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        
if ($this->session->userdata('logged_in')) {
            $userName = $this->session->userdata('username');
          
            $detail = $this->dbmodel->get_logged_in_user($userName);
            

    foreach ($detail as $userdetail) {
        $userID= $userdetail->id;
    }
}
else{
    $userID="";
}
 if(strlen($userID)>0){ 
    
       $productOrder= $this->dbmodel->get_product_order($userID);
    if(!empty($productOrder))  {   ?> 
    <table wid cellpadding="10">
        <tr>
            <th>Transection ID</th>
            <th>Purchase Date</th>
            <th>Product Name</th>
            <th>Quantity</th>
            <th>Price</th>
            <th>Total</th>
        </tr>
    <?php    foreach ($productOrder as $order){
            $product= $order->o_id;
            $date= $order->date;
            $productOrderDetail= $this->dbmodel->get_product_order_detail($product,$config["per_page"], $page); 
   
          foreach ($productOrderDetail as $orders){
                $transId= $orders->trans_id;
                $qty= $orders->qty;
                $price= $orders->price;
                $pid=$orders->p_id;
                $productDetail= $this->dbmodel->get_product_detail($pid);
                foreach ($productDetail as $product){
                    $name= $product->name;
                    $image1= $product->image1;
                     $image2= $product->image2;
                      $image3= $product->image3;
                } ?>
                <tr>
            <td><?php echo $transId; ?></td>
            <td><?php echo $date; ?></td>
            <td><?php echo $name; ?></td>
            <td><?php echo $qty; ?></td>
            <td><?php echo $price; ?></td>
            <td><?php echo $qty*$price; ?></td>
            
        </tr>
    <?php        }
                 } 
    }else{ echo "<h3>Sorry! You have not purchased goods yet.</h3>";}
       }else{}
        ?>
    
     </table>
</div>
<?php if (strlen($links) > 2) { ?>
        <div style="margin: 10px 0px 5px 0px; background-color: #999; color: #3399ff; border-radius:5px; width:95%; ">
            <?php echo $links; ?>
        </div>
    <?php } ?>
</div>