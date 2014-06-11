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
         
            
        <iframe src="https://docs.google.com/forms/d/1-ZM5HiNXe4mzqN6W2tvifoogVkfiWT3tTfTeE3llRfY/viewform?embedded=true" width="700" height="600" frameborder="0" marginheight="0" marginwidth="0">Loading...</iframe>

    </div>

   
      <div style="clear:both;"></div>
   <div style="margin-top: 10px; background-color: #fff; color: #3399ff; ">
    
    </div>
</div>
</div>
<!-- left side content closed here -->
 