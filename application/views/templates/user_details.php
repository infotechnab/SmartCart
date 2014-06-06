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
    <table border="0" width="70%">
                <tr>
                    <td colspan="2"></td>
                </tr>
                <tr>
                    <td colspan="2"><p style="margin: 0px; padding: 2px;">Full Name</p></td>
                </tr>
                <tr >
                    <td><input type="text" name="u_fname" value="<?php if (isset($fname)) { echo $fname; } else { echo set_value('u_fname');} ?>" placeholder="First Name" size="20" class="placeholder" required/></td>
                    <td><input type="text" name="u_lname" value="<?php if (isset($lname)) { echo $lname; } else { echo set_value('u_lname');} ?>" placeholder="Last Name" size="20" class="placeholder" required/></td>
                </tr>
                <tr>
                    <td colspan="2"><p style="margin: 0px; padding: 2px;">Address</p></td>
                </tr>
                <tr>
                    <td colspan="2"><input type="text" name="street_address" value="<?php if (isset($address)) { echo $address; } else { echo set_value('street_address');} ?>" placeholder="Street Address" size="47" class="placeholder" required/></td>
                </tr>
                <tr>
                    <td colspan="2"><input type="text" name="Town_address" value="<?php if (isset($city)) { echo $city; } else { echo set_value('Town_address');} ?>" placeholder="Town/ City" size="47" class="placeholder" required/></td>
                </tr>
                <tr>
                    <td><input type="text" name="District_address" value="<?php if (isset($state)) { echo $state; } else { echo set_value('District_address');} ?>" placeholder=" State" size="20" class="placeholder" required/></td>
                    <td><input type="text" name="zip" value="<?php if (isset($zip)) { echo $zip; } else { echo set_value('zip');} ?>" placeholder="Post Code" size="20" class="placeholder" required/></td>
                </tr>
                <tr>
                    <td colspan="2"><input type="text" name="country" value="<?php if (isset($country)) { echo $country; } else { echo set_value('country');} ?>" placeholder="Country" size="47" class="placeholder" required/></td>
                </tr>
                <tr>
                    <td colspan="2"><p style="margin: 0px; padding: 2px;">Contact Number</p></td>
                </tr>
                <tr>
                    <td colspan="2"><input type="text" name="u_contact" value="<?php if (isset($contact)) { echo $contact; } else { echo set_value('u_contact');} ?>" placeholder="Contact Number" size="47" class="placeholder" required/></td>
                </tr>

                <tr>
                    <td colspan="2"><p style="margin: 0px; padding: 2px;">Email</p></td>
                </tr>
                <tr>
                    <td colspan="2"><input type="email" name="user_email" value="<?php if (isset($email)) { echo $email; } else { echo set_value('user_email');} ?>" placeholder="Email" size="47" class="placeholder" id="register_email" /></td>
                </tr>


            </table>
    
    
    
    
    
    
 </div>




        <!-- left side details content closed here -->

        <div id='sidebar'>
            <div class="redColouredDiv" id='sidebarContent'>
                <div id="sideBarImage"><img src="<?php echo base_url() . "content/uploads/images/addtocart.png"; ?>"/> </div>   
                <h3>Shopping Cart</h3>
            </div>
            <div class='sidebarContentNext' id="shopping_cart">