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
                                        <p style="margin:0px;"><b><?php echo $sideOffer->post_title;  ?></b></p>  
                                       
                                        
		                    </div> 
                                    </div>
                <?php }else { ?>
		                   <div id="offerImage">
		                                     
                                        <p style="margin:0px; padding: 5px;"><b><?php echo $sideOffer->post_title;  ?></b></p>     
                                        <p style="margin:0px; padding: 5px;"><?php echo $sideOffer->post_content;  ?></p>
		                    </div> 
		                                           
		               
      
    <?php }} }?>
           
           
            <div class="clear"></div>
           
           
           <!--offer ends here-->
           <?php if(!empty($event)){ ?>
           <div class="redColouredDiv" id='sidebarContent'><h3 style="float: left;">Events</h3><div ><a style="float: right; padding: 10px; color: blue; text-decoration: underline;" href="<?php echo base_url()."index.php/view/events" ?>">View all</a></div></div>
           <div class="clear"></div>	            
                                
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
		                       <img src="<?php echo base_url().'content/uploads/images/'.$sideEvent->image; ?>" width="50" height="50"  /> 
		                    </div>
                <?php } ?>
		                    <div class="eventTitle">
		                       
                                        <h4><?php echo mb_strimwidth($sideEvent->title, 0, 40, "..."); ?></h4>
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