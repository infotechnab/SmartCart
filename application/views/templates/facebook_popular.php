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
           
        <h3>Popular Products</h3>

    </div>
    <div id="itemContent">

<?php
if (!empty($facebookPopular)) {
    foreach ($facebookPopular as $product_list) {
        ?>
                <div class='contentContainerBox'>

                    <div class='contentContainerHeader'><a href='<?php echo base_url() . "index.php/view/details/" . $product_list['id'] ?>'>
       <!--                    <div style="width:100%; margin: 0px; padding: 0px;">        <?php// if ($product_list->like == "enabled") { ?>
                         <div class="fb-like" data-href="<?php //echo base_url() . "/index.php/view/details/".$product_list->id; ?>" data-layout="button_count" data-action="like" data-show-faces="false" data-share="false"></div>
                            <?php
                       // } 
                        ?>      
                        <?php //if ($product_list->share == "enabled") { ?>
                            <div class="fb-share-button"  data-href="<?php //echo base_url() . "/index.php/view/details/".$product_list->id; ?>" data-type="button_count"></div>
                            <script src="//connect.facebook.net/en_US/all.js"></script>
                            <?php
                       // } 
                        ?>
                        </div> -->
                        <?php if(strlen($product_list['name'])<=20)                                       
                                       {
                                       ?>
                                        <h3><?php echo $product_list['name']; ?></h3>
                                       <?php } else { ?>
                                           <h4> <?php $text= wordwrap($product_list['name'], 18, "\n", true); echo mb_strimwidth($text, 0, 36, ".."); ?></h4>
                                     <?php  } ?>         
                    </div>
                    <div class='contentContainerImage'>
                        <img src="<?php echo base_url() . "content/uploads/images/" . $product_list['image']; ?>" alt="" height="150" width="130"/>   
                    </div></a>

                    <div class="contentContainerBottom"> 
                        <div class='contentContainerFooterLeft'><h4><?php get_currency($product_list['price']); ?></h4></div>
                        <div class="redColouredDiv" class='contentContainerFooterRight'>

                            <input type="button" value="<?php echo $product_list['id'] ?>" class="addToCart" id="addToCartBtn">  

                        </div>
                    </div>

                </div>



                    <?php }
                } else {
                    ?>

            <div class="contentContainer">
                <h3>
            <?php
            echo "<h3>The product you are searching is not found! </h3>";
            ?></h3>

            </div>

<?php } ?>
    </div>
      <div style="clear:both;"></div>
   <div style="margin-top: 10px; background-color: #fff; color: #3399ff; ">
    
    </div>
</div>
<!-- left side content closed here -->

 