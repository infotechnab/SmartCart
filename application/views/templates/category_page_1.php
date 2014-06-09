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
        <h3><?php
if (!empty($categoryId)) {
    foreach ($categoryId as $pages) {
        $pages_category = $pages->category_name;
        echo $pages_category;
    }
} else {
        echo "<h3> Category not found!</h3>";

}
?></h3>

    </div>
    <div id="itemContent">

<?php
if (!empty($product)) {
    foreach ($product as $product_list) {
        ?>
                <div class='contentContainerBox'>

                    <div class='contentContainerHeader'><a href='<?php echo base_url() . "index.php/view/details/" . $product_list->id ?>'>
                            <?php if ($product_list->like == "enabled") { ?>
                                <div class="fb-like" data-href="<?php echo base_url() . "/index.php/view/details/" . $product_list->id; ?>" data-layout="button_count" data-action="like" data-show-faces="false" data-share="false"></div>
                                <?php
                            } else {
                                
                            }
                            ?> 
                            <?php if ($product_list->share == "enabled") { ?>
                                <div class="fb-share-button" data-href="<?php echo base_url() . "/index.php/view/details/" . $product_list->id; ?>" data-type="button_count"></div>
                                <script src="//connect.facebook.net/en_US/all.js"></script>
            <?php
        } else {
            
        }
        ?>
                       <h3><?php echo $product_list->name; ?></h3>         
                    </div>
                    <div class='contentContainerImage'>
                        <img src="<?php echo base_url() . "content/uploads/images/" . $product_list->image1; ?>" alt="No images" height="150" width="130"/>   
                    </div></a>

                    <div class="contentContainerBottom"> 
                        <div class='contentContainerFooterLeft'><h4><?php get_currency($product_list->price); ?></h4></div>
                        <div class="redColouredDiv" class='contentContainerFooterRight'>

                            <input type="button" value="<?php echo $product_list->id ?>" class="addToCart" id="addToCartBtn">  

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
        $setTime=date("G:i:s", strtotime($sideEvent->date));
         $noTime="0:00:00";		                ?>
            <div id="shopping_cart" class="cartItems">
                <a style="color:#000;" href="<?php echo base_url()."index.php/view/events" ?>"><div class='sidebarContentNext' style="z-index: 1;">
                
                <?php if (strlen($sideEvent->image)>2){ ?>
		                    <div class="cartImage" style="float: left; width: 14%; min-height: 40px; margin: -1px; padding: 0px;">
		                       <img src="<?php echo base_url().'content/uploads/images/'.$sideEvent->image; ?>" width="50" height="50"  /> 
		                    </div>
                <?php } ?>
		                    <div class="eventTitle">
		                       
                                        <p><b><?php echo $sideEvent->title;  ?></b> On <?php echo $date;  ?> <?php if($setTime!==$noTime){ echo'at'. $time;} else{}  ?></p>
                                       
                                        
		                    </div> 
                                    
		                     
                                          
		                </div></a>
       </div>
                            <?php } }?>
           
           
            <div class="redColouredDiv" id='sidebarContent'>
                <div id="sideBarImage"><img src="<?php echo base_url() . "content/uploads/images/addtocart.png"; ?>"/> </div>   
                <h3>Shopping Cart</h3>
            </div>
            <div class='sidebarContentNext' id="shopping_cart">