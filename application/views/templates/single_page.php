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
        		                ?>
            <div id="shopping_cart" class="cartItems">
                <a style="color:#000;" href="<?php echo base_url()."index.php/view/events" ?>"><div class='sidebarContentNext' style="z-index: 1;">
                
                <?php if (strlen($sideEvent->image)>2){ ?>
		                    <div class="cartImage" style="float: left; width: 14%; min-height: 40px; margin: -1px; padding: 0px;">
		                       <img src="<?php echo base_url().'content/uploads/images/'.$sideEvent->image; ?>" width="50" height="50"  /> 
		                    </div>
                <?php } ?>
		                    <div  style="float: left; width: auto; height: auto; margin: 0px; padding: 0px 0px 0px 5px;">
		                       
                                        <p style="font-size:12px; margin: 10px 0px 5px 0px; padding: 0px;"><b><?php echo $sideEvent->title;  ?></b> On <?php echo $date;  ?> at <?php echo $time;  ?></p>
                                       
                                       
                                        
		                    </div> 
                                    
		                     
                                          
		                </div></a>
       </div>
                            <?php } }?>
           
           
            <div class="redColouredDiv" id='sidebarContent'>
                <div id="sideBarImage"><img src="<?php echo base_url() . "content/uploads/images/addtocart.png"; ?>"/> </div>   
                <h3>Shopping Cart</h3>
            </div>
            <div class='sidebarContentNext' id="shopping_cart">