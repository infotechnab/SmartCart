<div class="rightSide">
   <div id="body">
       <div class="sucessmsg">
  <?php echo $this->session->flashdata('message'); ?>
       </div>
    
    <h2>Transaction Detail </h2>
     <hr class="hr-gradient"/>     
    <?php  $getTransData = $this->dbmodel->TransDetail($_GET['id']);
    foreach ($getTransData as $trandetail)
                     {if(strlen($trandetail->p_id)>0){  ?> 
     <?php echo form_open('bnw/updateTrn'); ?>
    <p> <b> Transaction ID : <?php echo $_GET['id']; ?> </b> </p>
    <input type="hidden" name="trnID" value="<?php echo $_GET['id']; ?>" />  
    
    <p> <b> Product Detail : </b>
       
        <div> <table width="80%" style="border-collapse: collapse;">
                <tr><th>Product Id</th>
            <th>Image</th>
        <th>Product Name</th>
        <th>Quantity</th>
        <th>Price</th>
        <th>Sub-total</th>
        <th>Deliver Status</th>
        </tr> 
               <?php  $pid = $trandetail->p_id;
                 $oid = $trandetail->o_id;
                 $qty = $trandetail->qty;
                 $status = $trandetail->status;
                 
                 $product_Detail = $this->dbmodel->get_product_id($pid); ?>
           
                        <?php foreach ($product_Detail as $pdetail) { ?>
                        <tr style="border-bottom: #ccc solid 1px; text-align: center ">
                            <td><?php echo $pdetail->id;?></td>
                            <td> <img src="<?php echo base_url()."content/uploads/images/".$pdetail->image1; ?>" width="60" height="40" /></td>
                            <td>
                            <?php echo "<b>".$pdetail->name."</b>";  ?>
                            </td>
                            <td><?php echo $qty; ?></td>
                            <td><?php echo $pdetail->price; ?></td>
                            <td><?php echo $qty * $pdetail->price; ?></td>
                            <td>
                                <input type="hidden" name="product_<?php echo $pid; ?>" />
                                <select name="status_<?php echo $pid; ?>" >
                                    <option value="0"  <?php if($status == "0") echo"selected"; ?>>Not Deliver</option>
                                    <option value="1"  <?php if($status == "1") echo"selected"; ?>>Deliver</option>
                                    <option value="2"  <?php if($status == "2") echo"selected"; ?>>Refund</option>
                                </select></td>
                        
                             </tr>          <?php  } ?>
                    
                 <?php  } ?>
                              </table>
                </div>
       
    </p>
<?php if(strlen($trandetail->p_id)>0){ $oderDetailUser = $this->dbmodel->get_all_product_order_oid($oid);
             foreach ($oderDetailUser as $orderUserID)
            { ?>
    
 
        <?php
                $UserID = $orderUserID->u_id;
                $country = $orderUserID->country;
                $shpAddress = $orderUserID->deliver_address;
                $city = $orderUserID->city;
                $email = $orderUserID->email;
                $contact = $orderUserID->contact;
}}
            $DetailUser = $this->dbmodel->finduser($UserID);
            
                foreach ($DetailUser as $Uname)
                {
                    $userName = $Uname->user_name;
                    $fname = $Uname->user_fname;
                    $lname = $Uname->user_lname;
                    $userEmail = $Uname->user_email;
                    $userContact = $Uname->contact;
                    $userStreet = $Uname->address;
                    $userCity = $Uname->city;
                    $userState = $Uname->state;
                    $userZip = $Uname->zip;
                } ?>
        <div style="width: 40%; float: left;">
            <p> <b>Customer Detail : </b> 
        <table>
            <tr>
                <td > <b><?php echo $fname." ".$lname ;?></b></td>
            </tr>
            <tr>
                <td ><?php echo $userEmail; ?></td>
            </tr>
            <tr>
                <td  > <?php echo $userContact; ?></td>
            </tr>
            <tr>
                <td><?php echo $userStreet.", ".$userCity.",".$userState; ?></td>
            </tr>
            <tr>
                <td><?php echo $userZip; ?></td>
            </tr>
            <tr>
                <td><?php echo $country; ?></td>
            </tr>
        </table>
        </div>
  
    </p>
    
   
    <div style="width: 40%; float: left;">
         <p> <b>Shipping Address :</b>
        <table>
            <tr>
                <td > <b><?php echo $fname." ".$lname ;?></b></td>
            </tr>
            <tr>
                <td ><?php echo $userEmail; ?></td>
            </tr>
            <tr>
                <td  > <?php echo $contact; ?></td>
            </tr>
            <tr>
                <td><?php echo $shpAddress.", ".$city; ?></td>
            </tr>
            <tr>
                <td><?php echo $country; ?></td>
            </tr>
        </table>
    </div>
    <div class="clear"></div>
    </p>
    <?php echo form_submit('submit','Submit');
echo form_close();?>
   </div>
                     <?php } 
                     
?>
    
</div>
<div class="clear"></div>
</div>
