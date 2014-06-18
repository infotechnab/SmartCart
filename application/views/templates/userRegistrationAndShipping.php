<?php
$this->load->helper('currency');
if ($cart = $this->cart->contents()) {
                    $cartInitialize = 0;
                     $productShip=array();
                    foreach ($cart as $key => $item) {
      
                    $product_code = $item["id"];
                        $results = $this->productmodel->get_product_data($product_code);
                       
                      $productShip = array_merge($productShip, $results);
                    
                   
                    
                    $cartInitialize++;
                    }    
}
var_dump($productShip);
foreach ($productShip as $ship){
if($ship->shiping==="enabled"){
    $shippingyes="yes";
}
ELSE{
    $shippingyes="NO";
}
}
var_dump($shippingyes);
IF($shippingyes==="yes"){
$shiping= $this->productmodel->getship();}
if (!empty($shiping)) {
    foreach ($shiping as $scost) {
        $cost = $scost->price;
    }
} else {
    $cost = 0;
}

if ($cart = $this->cart->contents()) {
    foreach ($cart as $item) {

        if (isset($item['shiping']) == 'enabled') {
            $shiping_cost = TRUE;
            break;
        }
    }
}
?>

<script>

    $(document).ready(function() {
        $(function hello() {
           // var shiping = 0;
            // alert(shiping);
           $('#cost').html(shiping);
            ship(shiping);
      });
        $('.ship').click(function() {
            var shiping = parseInt("<?php echo $cost; ?>");
            $('#cost').html(shiping);
            ship(shiping);

        });
      
        $('#continueRegister').click(function() {
            //  alert('work');
            //$('#table_register').css("display","block");
            $('#table_register').toggle();
            // alert('sdfdf');
        });
        
        
        
        if($('#myonoffswitch').is(':checked'))
        {
            var price = parseInt("<?php echo $this->cart->total(); ?>");
            var shiping = parseInt("<?php
if (isset($shiping_cost) == TRUE) {
    echo $cost;
} else {
    echo $cost = 0;
}
?>");
            // alert(shiping);
            if (rate > 0) {
            
                var dis = price * parceInt(rate) / 100;
                var total = price - dis;
                var grandtotal = total + shiping;
                $('#cost').html(shiping);
                $('#rate').html(rate + '%');
                $('#test').html(grandtotal);
                $('.cost').val(shiping);
                $('.rate').val(rate);
                $('.test').val(grandtotal);
            } else {
                rate = 0;
               // alert(shiping);
                //var test = 'hello';
                var grandtotal = price + shiping;
                $('#cost').html(shiping);
                $('#rate').html(rate + '%');
                $('#test').html(grandtotal);
                $('.cost').val(shiping);
                $('.rate').val(rate);
                $('.test').val(grandtotal);
            }
            $('#shippingInfoTable').show();
        }
        else{
            var shiping = 0;
            if (rate > 0) {

                var dis = price * parceInt(rate) / 100;
                var total = price - dis;
                var grandtotal = total + shiping;
                $('#cost').html(shiping);
                $('#rate').html(rate + '%');
                $('#test').html(grandtotal);
                $('.cost').val(shiping);
                $('.rate').val(rate);
                $('.test').val(grandtotal);
            } else {
                rate = 0;
                var grandtotal = price + shiping;
              $('#cost').html(shiping);
                $('#rate').html(rate + '%');
                $('#test').html(grandtotal);
                $('.cost').val(shiping);
                $('.rate').val(rate);
                $('.test').val(grandtotal);
            }
            $('#shippingInfoTable').hide();
        }
            
            
            
        //Toggle for Shipping option
        $('#myonoffswitch').click(function() {
            var price = parseInt("<?php echo $this->cart->total(); ?>");
            if ($(this).is(':checked'))
            {
                
                var shiping = parseInt("<?php
if (isset($shiping_cost) == TRUE) {
    echo $cost;
} else {
    echo $cost = 0;
}
?>");
                if (rate > 0) {

                    var dis = price * parceInt(rate) / 100;
                    var total = price - dis;
                    var grandtotal = total + shiping;
                    $('#cost').html(shiping);
                    $('#rate').html(rate + '%');
                    $('#test').html(grandtotal);
                    $('.cost').val(shiping);
                $('.rate').val(rate);
                $('.test').val(grandtotal);
                } else {
                    rate = 0;
                    var grandtotal = price + shiping;
                    $('#cost').html(shiping);
                    $('#rate').html(rate + '%');
                    $('#test').html(grandtotal);
                    $('.cost').val(shiping);
                $('.rate').val(rate);
                $('.test').val(grandtotal);
                }


            }
            else
            {
                var shiping = 0;
                if (rate > 0) {

                    var dis = price * parceInt(rate) / 100;
                    var total = price - dis;
                    var grandtotal = total + shiping;
                    $('#cost').html(shiping);
                    $('#rate').html(rate + '%');
                    $('#test').html(grandtotal);
                    $('.cost').val(shiping);
                $('.rate').val(rate);
                $('.test').val(grandtotal);
                } else {
                    rate = 0;
                    var grandtotal = price + shiping;
                    $('#cost').html(shiping);
                    $('#rate').html(rate + '%');
                    $('#test').html(grandtotal);
                    $('.cost').val(shiping);
                $('.rate').val(rate);
                $('.test').val(grandtotal);
                }
            }
                
                
                
                
            if($('#myonoffswitch').is(':checked'))
            {
                $('#shippingInfoTable').show();
                if($('.ship').is(':checked'))
            {
                $('#shippingInfoTableList').show();
                
            }
                
            }
            else{
                $('#shippingInfoTable').hide();
                $('#shippingInfoTableList').hide();
            }
           
            

        });
        if($('.ship').is(':checked'))
            {
                $('#shippingInfoTableList').show();
                
            }
         $('.ship').click(function() {
         $('#shippingInfoTableList').show();
         });
         $('.pick').click(function() {
         $('#shippingInfoTableList').hide();
         });
    });
    function ship(shiping) {
        var price = parseInt("<?php echo $this->cart->total(); ?>");
        var total = price + shiping;
        // alert(shiping);
      
                $('.test').val(total);
        $('#test').html(total);

    }

    //document.getElementById("test").innerHTML = total;
</script>

<script>
    var base_url = '<?php echo base_url(); ?>';
    $(document).ready(function() {
        $('.checkkey').click(function() {
            var key = $('#couponkey').val();
            var subtotal = parseInt("<?php echo $this->cart->total(); ?>");

            $.ajax({
                type: "POST",
                url: base_url + 'index.php/bnw/checkcoupon',
                data: {
                    'coupon': key,
                    'subtotal': subtotal
                },
                success: function(msgs)
                {
                    $("#nfcoupon").html(msgs);
                    disrate();
                }

            });
        });

        $('#showcoupon').click(function() {
            $('#coupontext').toggle();
        });
        
        

    });

    function disrate() {

        var shiping = parseInt("<?php
if (isset($shiping_cost) == true) {
    echo $cost;
} else {
    echo $cost = 0;
}
?>");
        var price = parseInt("<?php echo $this->cart->total(); ?>");
        // var total = price + shiping;
         if($('#myonoffswitch').is(':checked'))
             {
              $('#shippingInfoTable').show();
                if($('.ship').is(':checked'))
            {
                $('#shippingInfoTableList').show();
                
            }    
             
        if (rate > 0)
        {
            var dis = price * parseInt(rate) / 100;
            var total = price - dis;
            var grandtotal = total + shiping;
            if(grandtotal < 1)
                {
                    grandtotal = 0;
                }
            // var price = rate+'%';
            $('#rate').html(rate + '%');
           $('#test').html(grandtotal);
            //$('.cost').val(shiping);
                $('.rate').val(rate);
                $('.test').val(grandtotal);
        }
        else
        {
            rate = 0;
            $('#rate').html(rate + '%');
            $('#test').html(total);
          //  $('.cost').val(shiping);
                $('.rate').val(rate);
                $('.test').val(total);
        }
        }
        else{
             $('#shippingInfoTable').hide();
                $('#shippingInfoTableList').hide();
            if (rate > 0)
        {
            shiping = 0;
            var dis = price * parseInt(rate) / 100;
            var total = price - dis;
            var grandtotal = total + shiping;
            if(grandtotal < 1)
                {
                    grandtotal = 0;
                }
            // var price = rate+'%';
            $('#rate').html(rate + '%');
           $('#test').html(grandtotal);
            //$('.cost').val(shiping);
                $('.rate').val(rate);
                $('.test').val(grandtotal);
        }
        else
        {
            rate = 0;
            $('#rate').html(rate + '%');
            $('#test').html(total);
          //  $('.cost').val(shiping);
                $('.rate').val(rate);
                $('.test').val(total);
        }
        }
            
         if($('.ship').is(':checked'))
            {
                $('#shippingInfoTableList').show();
                
            }
         $('.ship').click(function() {
         $('#shippingInfoTableList').show();
         });
         $('.pick').click(function() {
         $('#shippingInfoTableList').hide();
         });



    }


    $(document).ready(function() {
        var base_url = "<?php echo base_url(); ?>";
        $('#userajaxBtn').click(function() {
            var username = $('#u_name').val();
            var email = $('#email').val();
            var pass = $('#u_pass').val();
            var re_pass = $('#u_pass_re').val();
            if (pass !== "" || pass == !null) {
                if (pass == re_pass) {

                    $.ajax({
                        type: "POST",
                        url: base_url + 'index.php/login/userregister',
                        data: {
                            'name': username,
                            'email': email,
                            'pass': pass
                        },
                        success: function(msgs)
                        {
                            if (msgs == "FALSE") {

                                var msg = "Email already registred!";
                                $("#msg").html(msg);
                            }
                            else
                            {
                                $('#table_user').css("display", "none");
                                // var msg = email+" is now registred!";
                                //$("#msg").html(msgs);
                                myFunction();

                            }

                        }
                    });
                }
                else
                {
                    var msg = "Password did not matched!";
                    $('#msg').html(msg);
                }
            }
            else {
                var msg = "Fill up password field!";
                $('#msg').html(msg);
            }
        });
    });

function myFunction() {
    location.reload();
}
    function ajaxEmail()
    {
        // alert('working');
        // alert(email);
    }


</script>
<style>
    .register{
        display: block;
    }
    #showcoupon{
        cursor: pointer;
    }
</style>

<?php if ($this->session->userdata('logged_in')) {
           $userName = $this->session->userdata('username');
          
            $detail = $this->dbmodel->get_logged_in_user($userName);
        

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
 else {
     $username="";
     $fname="";
     $lname="";
     $email="";
     $contact="";
     $address="";
     $city="";
     $state="";
     $zip="";
     $country="";
}
?>

<?php
    echo form_open('payment/do_payment');
?>

<div id="login">
    <div id="leftRegister">
        <div class="sucessmsg">
                <?php if (isset($user_validation_message) && strlen($user_validation_message)>2) {
                    echo $user_validation_message;
                }
               
                
                ?> </div>
        <?php if(!$this->session->userdata('logged_in')){?>
        <div class="RegisterLeft" id="optionalRegister">
            <h3 style="margin: 0px 0px 10px 0px; padding: 2px; float: left; width: 55%">User Registration (Optional)</h3>


            <div class="clear"></div>
            <hr>
            
            <div id="table_register" >
                <strong id="msg" style="color:#990000 ;"></strong>
                <table id="table_user" border="0" width="70%" >
                    <tr>
                        <td colspan="2"></td>

                    </tr>
                    <tr>
                        <td colspan="2"><p style="margin: 0px; padding: 2px;">Full Name</p></td>
                    </tr>
                    <tr>
                        <td colspan="2" ><input type="text" id="u_name" name="u_name" placeholder="Full Name" size="47" value="<?php if (isset($username)) { echo $username; } ?>" class="placeholder" /></td>
                    </tr>
                    <tr>
                        <td colspan="2"><p style="margin: 0px; padding: 2px;">Email</p></td>
                    </tr>
                    <tr>
                        <td colspan="2"><input type="email" id="email" name="u_email" placeholder="Email" size="47" class="placeholder" /></td>
                    </tr>
                    <tr>
                        <td colspan="2"><p style="margin: 0px; padding: 2px;">Password</p></td>
                    </tr>
                    <tr>
                        <td><input type="password" name="u_pass" id="u_pass" placeholder="Password"  class="placeholder" /></td>
                        <td ><input type="password" name="u_pass_re" id="u_pass_re" placeholder="Confirm Password"  class="placeholder" /></td>
                    </tr> 
                    <tr>
                        <td colspan="2">

                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">

                            <!-- Add Ajax method to add user into database on this button click  -->
                            <input type="button" value="Register" size="47" id="userajaxBtn" onclick="ajaxcall()" style="padding:12px 125px 12px 125px; text-align: center; background-color: black; font-weight: bold;" class="updateBtnStyle" />

                        </td>
                    </tr>

                </table>

            </div>
        </div>
<?php } ?>
        <div class="RegisterLeft">
            <h3 style="margin: 0px 0px 10px 0px; padding: 2px;">Personal Details</h3>
            <hr>
            <table border="0" width="70%">
                <tr>
                    <td colspan="2"></td>
                </tr>
                <tr>
                    <td colspan="2"><p style="margin: 0px; padding: 2px;">Full Name</p></td>
                </tr>
                <tr >
                    <td><input type="text" name="u_fname" value="<?php if (strlen($fname)>0) { echo $fname; } else { echo set_value('u_fname');} ?>" placeholder="First Name" size="20" class="placeholder" required/></td>
                    <td><input type="text" name="u_lname" value="<?php if (strlen($lname)>0) { echo $lname; } else { echo set_value('u_lname');} ?>" placeholder="Last Name" size="20" class="placeholder" required/></td>
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
                    <td colspan="2"><input type="text" name="country" value="<?php if (strlen($country)>0) { echo $country; } else { echo set_value('country');} ?>" placeholder="Country" size="47" class="placeholder" required/></td>
                </tr>
                <tr>
                    <td colspan="2"><p style="margin: 0px; padding: 2px;">Contact Number</p></td>
                </tr>
                <tr>
                    <td colspan="2"><input type="text" name="u_contact" value="<?php if (strlen($contact)>0) { echo $contact; } else { echo set_value('u_contact');} ?>" placeholder="Contact Number" size="47" class="placeholder" required/></td>
                </tr>

                <tr>
                    <td colspan="2"><p style="margin: 0px; padding: 2px;">Email</p></td>
                </tr>
                <tr>
                    <td colspan="2"><input type="email" name="user_email" value="<?php if (strlen($email)>3) { echo $email; } else { echo set_value('user_email');} ?>" placeholder="Email" size="47" class="placeholder" id="register_email" /></td>
                </tr>


            </table>
        </div> 

        <style>
            .onoffswitch {
                position: relative; width: 85px;
                -webkit-user-select:none; -moz-user-select:none; -ms-user-select: none;
            }
            .onoffswitch-checkbox {
                display: none;
            }
            .onoffswitch-label {
                display: block; overflow: hidden; cursor: pointer;
                border: 2px solid #999999; border-radius: 13px;
            }
            .onoffswitch-inner {
                display: block; width: 200%; margin-left: -100%;
                -moz-transition: margin 0.3s ease-in 0s; -webkit-transition: margin 0.3s ease-in 0s;
                -o-transition: margin 0.3s ease-in 0s; transition: margin 0.3s ease-in 0s;
            }
            .onoffswitch-inner:before, .onoffswitch-inner:after {
                display: block; float: left; width: 50%; height: 25px; padding: 0; line-height: 25px;
                font-size: 17px; color: white; font-family: Trebuchet, Arial, sans-serif; font-weight: bold;
                -moz-box-sizing: border-box; -webkit-box-sizing: border-box; box-sizing: border-box;
            }
            .onoffswitch-inner:before {
                content: "ON";
                padding-left: 8px;
                background-color: #000405; color: #FFFFFF;
            }
            .onoffswitch-inner:after {
                content: "OFF";
                padding-right: 8px;
                background-color: #EEEEEE; color: #999999;
                text-align: right;
            }
            .onoffswitch-switch {
                display: block; width: 17px; margin: 4px;
                background: #FFFFFF;
                border: 2px solid #999999; border-radius: 13px;
                position: absolute; top: 0; bottom: 0; right: 56px;
                -moz-transition: all 0.3s ease-in 0s; -webkit-transition: all 0.3s ease-in 0s;
                -o-transition: all 0.3s ease-in 0s; transition: all 0.3s ease-in 0s;
            }
            .onoffswitch-checkbox:checked + .onoffswitch-label .onoffswitch-inner {
                margin-left: 0;
            }
            .onoffswitch-checkbox:checked + .onoffswitch-label .onoffswitch-switch {
                right: 0px;
            }
        </style>
        <script>
            var currentValue = 0;
            function handleClick(pickup) {
                ('Old value:' + currentValue);
                ('New value:' + pickup.value);
                currentValue = pickup.value;
                if (pickup.value === "shipDifferent") {

                    document.getElementById('RegisterRight').style.display = 'block';
                    document.getElementById('registeres').style.display = 'none';
                    document.getElementById('registereslast').style.display = 'block';
                }
                else
                {
                    document.getElementById('RegisterRight').style.display = 'block';
                    document.getElementById('registeres').style.display = 'block';
                    document.getElementById('registereslast').style.display = 'none';
                }
            }


        </script>


        <div id="RegisterRight">
            <h3 style="width:40%; margin: 0px 0px 10px 0px; padding: 2px; float: left;">Shipping Options
            </h3>
            <div class="onoffswitch" style="float: right; margin-right: 20%">
                <input type="checkbox" name="onoffswitch" value="enableShip" onclick="myOnOffSwitch();" class="onoffswitch-checkbox" id="myonoffswitch" >
                <label class="onoffswitch-label" for="myonoffswitch">
                    <span class="onoffswitch-inner"></span>
                    <span class="onoffswitch-switch"></span>
                </label>
            </div> 
            <div id="shiponoff"></div>


            <div class="clear"></div>


            <hr>
            
            <table id="shippingInfoTable" border="0" width="70%">

                <tr>
                    <td><input type="radio" name="pickup" onclick="handleClick(this);" class="pick" value="pickup" checked>To above address</td>
                    <td id='shipenable' colspan="2">
                        <input type="radio"  name="pickup" class="ship" onclick="handleClick(this);" value="shipDifferent">To different address</td>
                </tr>
            </table  >
            <table id="shippingInfoTableList" border="0" width="70%" style="display:none;" >
                <tr>
                    <td colspan="2"><p style="margin: 0px; padding: 2px;">Full Name</p></td>

                </tr>
                <tr>
                    <td><input type="text" name="s_fname" value="<?php echo set_value('s_fname'); ?>" placeholder="First Name" size="20" class="placeholder" /></td>
                    <td><input type="text" name="s_lname" value="<?php echo set_value('s_lname'); ?>" placeholder="Last Name" size="20" class="placeholder" /></td>
                </tr>
                <tr>
                    <td colspan="2"><p style="margin: 0px; padding: 2px;">Address</p></td>
                </tr>
                <tr>
                    <td colspan="2"><input type="text" name="s_address" value="<?php echo set_value('s_address'); ?>" placeholder="Street Address" size="47" class="placeholder" /></td>
                </tr>
                <tr>
                    <td colspan="2"><input type="text" name="c_city" value="<?php echo set_value('c_city'); ?>" placeholder="Town/ City" size="47" class="placeholder" /></td>

                </tr>
                <tr>
                    <td><input type="text" name="s_state" value="<?php echo set_value('s_state'); ?>" placeholder="District/ State" size="20" class="placeholder" /></td>
                    <td><input type="text" name="s_zip" value="<?php echo set_value('s_zip'); ?>" placeholder="zip" size="20" class="placeholder" /></td>
                </tr>
                <tr>
                    <td colspan="2"><input type="text" name="s_country" value="<?php echo set_value('s_country'); ?>" placeholder="Country" size="47" class="placeholder" /></td>
                </tr>
                <tr>
                    <td colspan="2"><p style="margin: 0px; padding: 2px;">Contact Number</p></td>
                </tr>
                <tr>
                    <td colspan="2"><input type="text" name="s_contact" value="<?php echo set_value('s_contact'); ?>" placeholder="Contact Number" size="47" class="placeholder" /></td>
                </tr>
                <tr>
                    <td colspan="2"><p style="margin: 0px; padding: 2px;">Email</p></td>
                </tr>
                <tr>
                    <td colspan="2"><input type="email" name="s_email" value="<?php echo set_value('s_email'); ?>" placeholder="Email" size="47" class="placeholder" /></td>
                </tr>

            </table>
        </div> 


    </div>
    <div id="verticalline" style="width: 1px; min-height: 460px; background-color: #222; float: left;"></div>
    <div id="RegisterLeftCart">
        <h3 style="width:40%; margin: 0px 0px 10px 0px; padding: 2px; float: left;">Shopping Detail
        </h3>
        <?php if ($this->cart->contents()) { ?>
            <div id="total_item"><h4 style="margin: 0px 0px 5px 0px">Total: <?php echo $this->cart->total_items(); ?> items</h4></div>
        <?php } ?>
        <div class="clear"></div>
        <hr>
        <?php if ($this->cart->contents()) { ?>
            <table width="97%" style="margin: 0px 0px 10px 12px;">
                <tr>
                    <th class="hide" width='55px'>Product</th>
                    <th style="text-align: left; padding: 0px 0px 0px 15px;">Name</th>
                    <th>Price</th>
                    
                    <th>Qty</th>
                    <th>Total</th>
                    <th> </th>

                </tr>
                <?php
                if ($cart = $this->cart->contents()) {
                    $cartInitialize = 0;

                    foreach ($cart as $key => $item) {
                        ?>                               
                        <tr>
                            <td class="hide"><img class="hide" src="<?php echo base_url() . 'content/uploads//images/' . $item['image1']; ?>" height="50" width="50"> </td>
                            <td style="padding: 0px 0px 0px 10px;"><?php if (strlen($item['name']) <= 20) {
                        ?>
                        <?php echo $item['name']; ?></td>
        <?php } else { ?>         
           
                        <?php echo mb_strimwidth($item['name'], 0, 20, "..."); ?></td>
        <?php } ?>
                            <td style="text-align: center;"><?php get_currency($item['price']); ?></td>
                            
                            <td style="text-align: center;"><?php echo $item['qty'] ?></td>                       
                            <td style="text-align: center;"><?php echo $item['price'] * $item['qty']; ?> </td>
                            <td>x</td>
                        </tr>
                        <?php
                        //Data for paypal 

                        $product_code = $item["id"];
                        $results = $this->productmodel->get_product_data_verify($product_code);
                        foreach ($results as $obj) {

                            echo '<input type="hidden" name="item_name[' . $cartInitialize . ']" value="' . $obj->name . '" />';
                            echo '<input type="hidden" name="item_code[' . $cartInitialize . ']" value="' . $product_code . '" />';
                            echo '<input type="hidden" name="item_desc[' . $cartInitialize . ']" value="' . $obj->description . '" />';
                            echo '<input type="hidden" name="item_qty[' . $cartInitialize . ']" value="' . $item["qty"] . '" />';
                        }

                        $cartInitialize++;
                    }
                }
                ?>
                <tr style="border-top: 1px solid #222;">
                    <td style="padding: 0px 0px 0px 15px; "><b>Total</b>:</td>
                    <td class="hide"></td>
                    <td></td>
                    <td></td>
                    <td style="text-align: center; border-top: 1px solid #222;"> <b><?php get_currency($this->cart->total()); ?></b></td>
                    <td></td>
                </tr>

            </table>
        <?php } else {
            ?>
            <div id="total_item"><h4>Your cart is empty</h4></div>
        <?php }
        ?>


        <div id="coupontext" style="width: 96%; margin: 0px; padding: 2%;">
            <div id="nfcoupon"></div>
            <table>
                <tr>
                    <td><input class="placeholder" size="22" type="text" name="couponkey" id="couponkey" placeholder="your coupon here" /></td>
                    <td><input type="button" class="checkkey"  value="Apply Coupon" /></td>
                </tr>
            </table>


        </div>

        <h3 style="width:40%; margin: 0px 0px 10px 0px; padding: 2px; float: left;">Order Summery
        </h3>

        <div class="clear"></div>
        <hr>
        <div id="order_summary">
            <table width="100%">
                <tr class='amt_summary'>
                    <td class='txtright' width='50%'>Total: </td>
                    <td><b><?php get_currency($this->cart->total()); ?></b></td>
                </tr>
                <tr class='amt_summary'>
                    <td class='txtright'>Shipping Cost:</td>
                    <td id="cost">       </td>
                </tr>
                <tr class='amt_summary'>
                    <td class='txtright'>Discount:</td>
                    <td id="rate"></td>
                </tr>
                <tr class='amt_summary'>
                    <td class='txtright'><b>Grand Total:</b></td>
                    <td id="test">   </td>
                </tr>
            </table>
            
            <input type="hidden" class="cost" name="cost" value="" />
            <input type="hidden" class="rate" name="rate" value="" />
            <input type="hidden" class="test" name="grandtotal" value="" />
        </div>
        <input type="button" id="cancelBtn"  value="Cancel" />
        <input type="submit" id="payNowBtn"  value="Pay Now" />

    </div>
    <div class="clear"></div>
</div> 
</div>
<div class="clear"></div>
</div>
<?php echo form_close(); ?>

