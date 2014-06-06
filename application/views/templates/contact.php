<?php
$this->load->helper('currency');
?>




<script type="text/javascript">
    $(document).ready(function() {
           
        //adding item to the cart...
             
        $(".addToCarts").live('click',function() {
           
            $('.slide').css({ opacity: 0.3 });
            var id = $(this).val();
            var dataString = 'itemid=' + id;
            $.ajax({
                type: "POST",
                url: base_url + 'index.php/view/add',
                data: dataString,
                success: function(msgs)
                {
                   
                    $("#shopping_cart").html(msgs);


                },
                complete: function() {
                    $('.slide').css({ opacity: 1 });
                }
            });
            
        });
        // end of add to cart
            
           
		
		

    });
</script>






<script>
    var base_url = '<?php echo base_url(); ?>';
    $(document).ready(function() {
        //adding item to the cart...
        $(".addToCart").click(function() {
            $(this).parent().parent().parent().css({opacity: 0.3});
            var id = $(this).val();
            var dataString = 'itemid=' + id;
            $.ajax({
                type: "POST",
                url: base_url + 'index.php/view/add',
                data: dataString,
                success: function(msgs)
                {

                    $("#shopping_cart").html(msgs);


                },
                complete: function() {
                    $(".contentContainerBox").css({opacity: 1.0});
                    $(".contentContainerBottom").css({opacity: 1.0})
                }
            });

        });

    });

</script>



<div id='content'>
    <!-- from slider starts-->


    <!-- the slider ends here-->

    <div class='contentHeader'>
        <h3>Contact Us</h3>

    </div>
    <div class="contentContainer">
                <h3> Smart Access Services </h3>
                <h4> 35 Tarana Ave ,Glenroy VIC 3046 </h4> 
                
        
<?php 

 include_once('recaptchalib.php');

// Get a key from https://www.google.com/recaptcha/admin/create
$publickey = "6LfbzPQSAAAAAG5p6RmShqg3Y_vLUe5ApMl9DtiO";
$privatekey = "6LfbzPQSAAAAAJn3pPA066E1Mgr-6R8L7lQfRI7V";

# the response from reCAPTCHA
$resp = null;
# the error code from reCAPTCHA, if any
$error = null;

# was there a reCAPTCHA response?
if ($_POST["recaptcha_response_field"]) {
        $resp = recaptcha_check_answer ($privatekey,
                                        $_SERVER["REMOTE_ADDR"],
                                        $_POST["recaptcha_challenge_field"],
                                        $_POST["recaptcha_response_field"]);

        if ($resp->is_valid) {
                echo "You got it!";
            echo form_open('view/comment');
            ?>
                <input type="email" name="email" class="placeholder" placeholder="type your email" /> <br/>
    <textarea class="placeholder" name="message" placeholder="type your comment!"></textarea>
                <?php
        } else {
                # set the error code so that we can display it
                $error = $resp->error;
        }
}
?>
                <div>
    
<?php
echo recaptcha_get_html($publickey, $error);
?>
    <br/>
    <input type="submit" value="submit" />
    </div>
  <?php echo form_close(); ?>
                
                
    </div>


   
      <div style="clear:both;"></div>
   <div style="margin-top: 10px; background-color: #fff; color: #3399ff; ">
    
    </div>
</div>
<!-- left side content closed here -->

<div id='sidebar'>
    <div class="redColouredDiv" id='sidebarContent'>
        <div id="sideBarImage"><img src="<?php echo base_url() . "content/uploads/images/addtocart.png"; ?>"/> </div>   
        <h3>Shopping Cart</h3>
    </div>
    <div class='cartItems' id="shopping_cart">
