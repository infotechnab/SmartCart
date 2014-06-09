<?php if ($this->session->userdata('logged_in')) {
            $userEmail = $this->session->userdata('useremail');
            $detail = $this->dbmodel->get_logged_in_user($userEmail);
        

    foreach ($detail as $userdetail) {
        $username = $userdetail->user_name;
        $fname = $userdetail->user_fname;
        $lname = $userdetail->user_lname;
        $email = $userdetail->user_email;
        $contact = $userdetail->contact;
        $address = $userdetail->address;
        $city = $userdetail->city;
        $state = $userdetail->state;
        $zip = $userdetail->zip;
        $country = $userdetail->country;
    }
}
?>
<div id='content'>
    <div id="userDetail">
        <h3 style="text-align: center">Personal Details</h3>
        <div class="sucessmsg">
                <?php if (isset($user_validation_message) && strlen($user_validation_message)>2) {
                    echo $user_validation_message;
                }
               if($this->session->flashdata('message')){echo $this->session->flashdata('message');}
                
                ?> </div>
        <?php echo form_open_multipart('view/updateUser'); ?>
    <table border="0" width="49%" align="center">
                <tr>
                    <td colspan="2"></td>
                </tr>
                <tr>
                    <td colspan="2"><p style="margin: 0px; padding: 2px;">Full Name</p></td>
                </tr>
                <tr >
                    <td><input type="text" name="u_fname" value="<?php if (strlen($fname)>0) { echo $fname; } else { echo set_value('u_fname');} ?>" placeholder="First Name (min 3 characters)" size="20" class="placeholder" required/></td>
                    <td><input type="text" name="u_lname" value="<?php if (strlen($lname)>0) { echo $lname; } else { echo set_value('u_lname');} ?>" placeholder="Last Name (min 3 characters)" size="20" class="placeholder" required/></td>
                </tr>
                <tr>
                    <td colspan="2"><p style="margin: 0px; padding: 2px;">Address</p></td>
                </tr>
                <tr>
                    <td colspan="2"><input type="text" name="street_address" value="<?php if (strlen($address)>0) { echo $address; } else { echo set_value('street_address');} ?>" placeholder="Street Address" size="47" class="placeholder" required/></td>
                </tr>
                <tr>
                    <td colspan="2"><input type="text" name="Town_address" value="<?php if (strlen($city)>0) { echo $city; } else { echo set_value('Town_address');} ?>" placeholder="Town/ City" size="47" class="placeholder" required/></td>
                </tr>
                <tr>
                    <td><input type="text" name="District_address" value="<?php if (strlen($state)>0) { echo $state; } else { echo set_value('District_address');} ?>" placeholder=" State" size="20" class="placeholder" required/></td>
                    <td><input type="text" name="zip" value="<?php if (strlen($zip)>0) { echo $zip; } else { echo set_value('zip');} ?>" placeholder="Post Code" size="20" class="placeholder" required/></td>
                </tr>
                <tr>
                    <td colspan="2"><input type="text" name="country" value="<?php if (strlen($country)>0) { echo $country; } else { echo set_value('country');} ?>" placeholder="Country " size="47" class="placeholder" required/></td>
                </tr>
                <tr>
                    <td colspan="2"><p style="margin: 0px; padding: 2px;">Contact Number</p></td>
                </tr>
                <tr>
                    <td colspan="2"><input type="text" name="u_contact" value="<?php if (strlen($contact)>0) { echo $contact; } else { echo set_value('u_contact');} ?>" placeholder="Contact Number" size="47" class="placeholder" /></td>
                </tr>

                <tr>
                    <td colspan="2"><p style="margin: 0px; padding: 2px;">Email</p></td>
                </tr>
                <tr>
                    <td colspan="2"><input type="email" name="user_email" value="<?php if (strlen($email)>4) { echo $email; } else { echo set_value('user_email');} ?>" placeholder="Email" size="47" class="placeholder" id="register_email" readonly /></td>
                </tr>
                <tr>
                    <td><input type="submit" id="printBtn" style="float: left; margin: 0px 10px 0px 10px; background: #000; padding:10px; border: none; border-radius: 5px;" value="Update" /></td>
                    <td><div id="goToHomeBtn" style="float: left; margin: 0px 10px 0px 10px; background: #000; padding:10px; border: none; border-radius: 5px; max-width: 100px;"><a href="<?php echo base_url().'index.php/view/index'; ?>" style="color: #fff;">Cancel</a></td>
                </tr>
                

            </table>
    <?php echo form_close(); ?>   
    
    </div>   
 </div>




        <!-- left side details content closed here -->
 <div id='sidebar'>
           
           <!-- for offer -->
            <?php if(!empty($offer)){ ?>
            <div class="redColouredDiv" id='sidebarContent'><h3>Offers</h3></div>
		            
                                
    <?php foreach ($offer as $sideOffer){
        		                ?>
           
           
                <?php if (strlen($sideOffer->image)>2){ ?>
           
		                    <div id="offerImage">
		                       <img src="<?php echo base_url().'content/uploads/images/'.$sideOffer->image; ?>" width="100%" /> 
		                   
                <?php } ?>
		                    <div id="offerContainer">
                                        <p style="margin:0px;"><b><?php echo $sideOffer->post_title;  ?></b></p>  
                                       
                                        
		                    </div> 
                                    </div>
		                                           
		               
      
                            <?php } }?>
           
           
            <div class="clear"></div>
           
           
           <!--offer ends here-->
           <?php if(!empty($event)){ ?>
            <div class="redColouredDiv" id='sidebarContent'><h3>Events</h3></div>
		            
                                
    <?php foreach ($event as $sideEvent){
        $date=date("Y-m-d", strtotime($sideEvent->date));
        $time=date("h:i A", strtotime($sideEvent->date));
        		                ?>
            <div id="shopping_cart" class="cartItems">
                <a style="color:#000;" href="<?php echo base_url()."index.php/view/events" ?>"><div class='sidebarContentNext' style="z-index: 1;">
                
                <?php if (strlen($sideEvent->image)>2){ ?>
		                    <div class="cartImage" style="float: left; width: 14%; min-height: 40px; margin: -1px; padding: 0px;">
		                       <img src="<?php echo base_url().'content/uploads/images/'.$sideEvent->image; ?>" width="50" height="50"  /> 
		                    </div>
                <?php } ?>
		                    <div  style="float: left; width: auto; height: auto; margin: 0px; padding: 0px 0px 0px 5px;">
		                       
                                        <p style="font-size:12px; margin: 10px 0px 5px 0px; padding: 0px;"><b><?php echo $sideEvent->title;  ?></b> On <?php echo $date;  ?> at <?php echo $time;  ?></p>
                                       
                                       
                                        
		                    </div> 
                                    
		                     
                                          
		                </div></a>
       </div>
                            <?php } }?>
           
           
            <div class="redColouredDiv" id='sidebarContent'>
                <div id="sideBarImage"><img src="<?php echo base_url() . "content/uploads/images/addtocart.png"; ?>"/> </div>   
                <h3>Shopping Cart</h3>
            </div>
            <div class='sidebarContentNext' id="shopping_cart">