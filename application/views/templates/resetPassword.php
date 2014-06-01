
<div id="contentBackground">
    <div id="forgotpass" style="min-height: 200px; padding: 20px; margin: 0px;">

       <?php echo form_open_multipart('view/setpassword');?>
  
    <?php $token = $_GET['resetPassword'];
   ?>
     <table id="table_user" border="0" width="30%" >
                    <tr style="text-align: center">
                        <td><h3>Reset Password</h3> </td>       
                    <tr>
                      <input type="hidden" name="tokenid" value="<?php echo $token; ?>" />
                        <td ><p style="margin: 0px; padding: 2px;">New Password</p></td>
                    </tr>
                    <tr>
                        <td ><input type="password" name="user_pass" pattern="[a-z0-9A-Z]{5,15}" size="45" id="newPassword" placeholder="Password" class="placeholder" required/></td>
                    </tr>
                    <tr>
                        <td ><p style="margin: 0px; padding: 2px;">Confirm Password</p></td>
                    </tr>
                    <tr>
                        <td ><input type="password" name="user_confirm_pass" size="45" id="confirmPassword" pattern="[a-z0-9A-Z]{5,15}" placeholder="Confirm Password" class="placeholder" required/></td>
                    </tr> 
                    <tr>
                    <td >
                            <input type="SUBMIT" value="Submit" size="47" style="padding:12px 125px 12px 125px; text-align: center; background-color: black; font-weight: bold;" class="updateBtnStyle" />

                        </td>
                    </tr>
        </table>   
  <?php echo form_close();?>
    </div>
</div>
</div>
</div>


