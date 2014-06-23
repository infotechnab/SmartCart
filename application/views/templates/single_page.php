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
    <?php 
    if(!empty($get_page)){
    foreach ($get_page as $pages){
        
        $name = $pages->page_name;
        $content = $pages->page_content;
        }}
        else{
            $name = "Sory the page not fount";
            $content = " ";
        }?>
    <h3><?php echo $name; ?></h3>

</div>
<div class="contentContainer">
   <?php echo $content; ?>
</div>
</div>
<!-- left side content closed here -->
