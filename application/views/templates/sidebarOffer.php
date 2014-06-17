 <div id='sidebar'>
           
           <!-- for offer -->
            <?php if(!empty($offer)){ ?>
           <div class="redColouredDiv" id='sidebarContent'><h3 style="float: left;">Offers</h3> </div>
		            
                                
    <?php foreach ($offer as $sideOffer){
        		                ?>
           
           
                <?php if (strlen($sideOffer->image)>2){ ?>
           
		                    <div id="offerImage">
		                       <img src="<?php echo base_url().'content/uploads/images/'.$sideOffer->image; ?>" width="100%" /> 
		                   <div id="offerContainer">
                                        <p style="margin:0px;"><b><?php echo wordwrap($sideOffer->post_title, 43, "\n", true); ?></b></p>  
                                       
                                        
		                    </div> 
                                    </div>
                <?php }else { ?>
		                   <div id="offerImage">
		                                     
                                        <p style="margin:0px; padding: 5px;"><b><?php echo wordwrap($sideOffer->post_title, 43, "\n", true); ?></b></p>     
                                        <p style="margin:0px; padding: 5px;"><?php echo wordwrap($sideOffer->post_content, 43, "\n", TRUE);  ?></p>
		                    </div> 
		                                           
		               
      
    <?php }} }?>
           
           
            <div class="clear"></div>
           
           
           <!--offer ends here-->
           <?php if(!empty($event)){ ?>
           <a href="<?php echo base_url()."index.php/view/events" ?>"><div class="redColouredDiv" id='sidebarContent'><h3 style="text-decoration: underline">Events</h3></div></a>
          	            
                                
    <?php foreach ($event as $sideEvent){
        $date=date("Y-m-d", strtotime($sideEvent->date));
        $time=date("h:i A", strtotime($sideEvent->date));
        $setTime=date("G:i:s", strtotime($sideEvent->date));
         $noTime="0:00:00";      
        		                ?>
            <div class="cartItems">
                <a style="color:#000;" href="<?php echo base_url()."index.php/view/eventDetails/".$sideEvent->id ?>"><div class='sidebarContentNext' style="z-index: 1;">
                
                <?php if (strlen($sideEvent->image)>2){ ?>
		                    <div class="cartImage" style="float: left; width: 14%; min-height: 40px; margin: -1px; padding: 0px;">
		                       <img src="<?php echo base_url().'content/uploads/images/'.$sideEvent->image; ?>" width="51" height="51"  /> 
		                    </div>
                <?php } ?>
		                    <div class="eventTitle">
		                       
                                        <h4><?php echo mb_strimwidth($sideEvent->title, 0, 37, "..."); ?></h4>
                                        <p>On <?php echo $date;  ?> <?php if($setTime!==$noTime){ echo'at'. $time;} else{}  ?></p>
                                       
                                       
                                        
		                    </div> 
                                    
		                     
                                          
		                </div></a>
       </div>
                            <?php } }?>
           
           
            <div class="redColouredDiv" id='sidebarContent'>
                <div id="sideBarImage"><img src="<?php echo base_url() . "content/uploads/images/addtocart.png"; ?>"/> </div>   
                <h3>Shopping Cart</h3>
            </div>
            <div class='sidebarContentNext' id="shopping_cart">