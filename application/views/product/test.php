<div class="rightSide">
   <div id="body">
    <p id="sucessmsg">
  <?php echo $this->session->flashdata('message'); ?>
    </p>
    <h2>Product >> Sales</h2>
     <hr class="hr-gradient"/>
    
    
    <?php
    
    
         if(!empty($query)){
             ?>
        <table cellpadding="10">
        <tr  >
            <th>Transection ID</th>
            <th>Product Detail</th>
             <th>Total</th>
            <th>User Detail</th>
            <th>Shipping Address</th>
            <th>PayPal Information</th>
           
<!--            <th>Action</th>-->
        </tr>
        <?php
            foreach ($query as $data){
            ?>
          <tr>
         
            <td id="userDetail" style="font-size: 14px; vertical-align: top;"> <?php $tid = $data->trans_id ; ?> <a href="<?php echo base_url().'index.php/bnw/viewdetail/?id='.$tid; ?>" Style="color:black; text-decoration: none; " > <div>
                <?php 
               echo "<b>".$tid."</b>";  
             ?>
                    </div>   </a>
          </td>
            <?php $getTransData = $this->dbmodel->TransDetail($tid); ?>
            <td> <div>
                 <?php foreach ($getTransData as $trandetail)
                     { 
                 $pid = $trandetail->p_id;
                 $oid = $trandetail->o_id;
                 $qty = $trandetail->qty;
                 
                 $product_Detail = $this->dbmodel->get_product_id($pid); ?>
                    <table>
                        <?php foreach ($product_Detail as $pdetail) { ?>
                        <tr>
                            <td rowspan="2"> <img src="<?php echo base_url()."content/uploads/images/".$pdetail->image1; ?>" width="60px" height="40px" /></td>
                            <td id="userDetail" style="font-size: 14px; vertical-align: top;">
                            <?php echo "<b>".$pdetail->name."</b>";  ?>
                            </td>
                        </tr>
                        <tr>
<!--                            <td> <?php //echo $pdetail->summary; ?></td>-->
                            <td id="userDetail" style="font-size: 14px; vertical-align: top;"><?php echo "Qnt :".$qty." ($".$pdetail->price.") = $".$qty * $pdetail->price; ?></td>
                        </tr>
                        <?php  } ?>
                    </table> <hr/>
                <?php  } ?>
                </div>
            </td>
            <td> </td>
            <!--<td></td>-->
            <td id="userDetail" style="font-size: 14px; vertical-align: top;"><?php 
//            $oderDetail = $this->dbmodel->get_all_product_order_oid($oid);
//            foreach ($oderDetail as $orderDate)
//            {
//                $oDate = $orderDate->user_name;
//            }
//            echo $oDate;
            $oderDetailUser = $this->dbmodel->get_all_product_order_oid($oid);
             foreach ($oderDetailUser as $orderUserID)
            {
                $UserID = $orderUserID->u_id;
                $country = $orderUserID->country;
                $shpAddress = $orderUserID->deliver_address;
                $city = $orderUserID->city;
                $email = $orderUserID->email;
                $contact = $orderUserID->contact;
                $uName = $orderUserID->user_name;
            }
            $DetailUser = $this->dbmodel->finduser($UserID);
            
                foreach ($DetailUser as $Uname)
                {
                    $userName = $Uname->user_name;
                    $fname = $Uname->user_fname;
                    $lname = $Uname->user_lname;
                    $userEmail = $Uname->user_email;
                }
            
             echo "<b>". $fname." ".$lname."</b><br/>".$email."<br/>".$contact."<br/>".$shpAddress.",".$city."<br/>".$country;
            ?></td>
            <td id="userDetail" style="font-size: 14px; vertical-align: top;">
                <?php echo "<b>".$uName."</b><br/>".$email."<br/>".$contact."<br/>".$shpAddress.",".$city."<br/>".$country;  ?></td>
            <td></td>
            
<!--             <td><?php /*echo anchor('bnw/delProductOrder/'.$tid,'Delete'); */?></td>-->
        </tr>
            <?php    
            }
        }
        else{
            echo '<h3>Sorry product are not available</h3>';
        }
            
    ?>
    </table>
    <?php  echo $links; ?>
</div>
    
    
</div>
<div class="clear"></div>
</div>
