
<div id="login">
    <div id="outerBorder">
        <div class="loginLeft">
            <p class="sucessmsg">
                <?php if (strlen($validation_message)>2) {
                    echo $validation_message;
                }
                echo validation_errors();
                ?> </p>
<?php echo form_open('cartdetails/login'); ?>
            <table border="0" width="100%">

                <tr style="text-align: center">
                    <td><h3>Existing Customer?</h3> </td>
                </tr>

                <tr style="text-align: center">
                    <td><input name="email" type="email" pattern="[\w-\.]+@([\w-]+\.)+[\w-]{2,4}" placeholder="Email" size="35" class="placeholder" required/></td>
                </tr>
                <tr style="text-align: center">
                    <td><input name="pass" type="password" placeholder="Password" size="35" class="placeholder" required/></td> 
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
<?php form_close(); ?>
        </div>
        <div class="vertical-line">
            <div class="number" id='verticalOr'>OR</div>  
        </div>
        <div class="loginLeft">
            

            <table border="0" width="100%">
                <tr style="text-align: center">
                    <td><h3>Don't have an account yet?</h3></td>
                </tr>
                <tr style="text-align: center">
                    <td> Register with or</td>
                </tr>
                <tr style="text-align: center">
                    <td> go to checkout as new customer</td>
                </tr>
                <tr><td></td></tr>
                <tr><td></td></tr>
                <tr style="text-align: center">
                    <td><b>
                            <div class="updateBtnStyle" style=" padding: 12px; width: 252px; background:black; text-align: center; margin: 0 auto 0 auto;">
                                <?php echo anchor('view/registeruser', 'Register') ?>
                            </div></b></td>
                </tr>


            </table>
<?php ?>

        </div>    
        <div class="clear"></div>





    </div> 
</div> 
<div class="clear"></div>
</div> 
</div> 






