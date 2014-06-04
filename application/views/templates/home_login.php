
<div id="login">
    <div id="outerBorder">
        <div class="loginLeft">
            <div class="sucessmsg">
                <?php if (isset($login_validation_error) && strlen($login_validation_error)>2) {
                    echo $login_validation_error;
                }
               // echo validation_errors();
                
                ?> </div>
<?php echo form_open('view/validate_login'); ?>
            <table border="0" width="30%">

                <tr style="text-align: center">
                    <td><h3>Existing Customer?</h3> </td>
                </tr>
                <tr >
                        <td colspan="2"><p style="margin: 0px; padding: 2px;">Email</p></td>
                    </tr>

                <tr style="text-align: center">
                    <td><input name="user_email" type="email" pattern="[\w-\.]+@([\w-]+\.)+[\w-]{2,4}" placeholder="Email" size="35" class="placeholder" required/></td>
                </tr>
                <tr>
                        <td colspan="2"><p style="margin: 0px; padding: 2px;">Password</p></td>
                    </tr>
                <tr style="text-align: center">
                    <td><input name="user_pass" type="password" pattern="[a-z0-9A-Z]{5,15}" placeholder="Password" size="35" class="placeholder" required/></td> 
                </tr>
                <tr><td></td></tr>
                <tr><td></td></tr>
                <tr style="text-align: center">
                    <td><input type="submit" value="Sign In" style="padding:12px 100px 12px 101px; background-color: black; font-weight: bold;" class="updateBtnStyle" /></td>
                </tr>
                <tr style="text-align: center">
                    <td><a href="forgotPassword"><p style="color: #000;">Forgot Password?</p></a></td>
                </tr>
            </table>
<?php echo form_close(); ?>
        </div>
        <div class="vertical-line">
            <div class="number" id='verticalOr'>OR</div>  
        </div>
        <div class="loginLeft">
            <div class="sucessmsg">
    <?php
 if (isset($validation_message))
                 
                {
     if(strlen($validation_message)>2)  echo $validation_message;
                
     
                }
               
                ?> </div>
        
        <?php echo form_open_multipart('view/addNewUser'); ?>
       
        <table id="table_user" border="0" width="40%" >
                    <tr style="text-align: center">
                        <td colspan="2"><h3>New User?</h3> </td>
                    </tr>
                    <tr >
                        <td colspan="2"><p style="margin: 0px; padding: 2px;">User Name</p></td>
                    </tr>
                    <tr >
                        <td colspan="2" ><input type="text"  id="u_name" name="u_name" value="<?php echo set_value('u_name'); ?>" placeholder="User Name" size="47" class="placeholder" /></td>
                    </tr>
                    <tr >
                        <td colspan="2"><p style="margin: 0px; padding: 2px;">Email</p></td>
                    </tr>
                    <tr>
                        <td colspan="2"><input type="email"  id="email" name="u_email" value="<?php echo set_value('u_email'); ?>" placeholder="Email" size="47" class="placeholder" /></td>
                    </tr>
                    <tr>
                        <td colspan="2"><p style="margin: 0px; padding: 2px;">Password</p></td>
                    </tr>
                    <tr>
                        <td><input type="password" name="u_pass"  id="u_pass" placeholder="Password" class="placeholder" /></td>
                        <td ><input type="password" name="u_pass_re"  id="u_pass_re" placeholder="Confirm Password"  class="placeholder" /></td>
                    </tr> 
                    <tr>
                    <td colspan="2">
                            <input type="SUBMIT" value="Register" size="47" style="padding:12px 125px 12px 125px; text-align: center; background-color: black; font-weight: bold;" class="updateBtnStyle" />

                        </td>
                    </tr>
        </table>
        
<?php echo form_close(); ?>

        </div>    
        <div class="clear"></div>





    </div> 
</div> 
<div class="clear"></div>
</div> 
</div> 






