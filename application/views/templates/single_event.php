<div id='content'>
    <!-- from slider starts-->
<?php
if(!empty($events)){
    foreach($events as $event){
        $title=$event->title;
        $time=$event->date;
        $location= $event->location;
        $details= $event->details;
        $image= $event->image;
        
         $date=date("Y-m-d", strtotime($time));
        $fullTime=date("h:i A", strtotime($time));
         
}}
 else {
    $title="Sorry !";
    $date="";
    $fullTime="";
    $time="";
    $location="";
    $details="The details are not available.";
    $image="";
}

?>

    <!-- the slider ends here-->

    <div class='contentHeader'>    
            
        <h3> <?php echo $title; ?></h3>
    </div>
    
    <div class="eventContainer">
       <?php if (strlen($image)>2) {
    ?>
                <div class='eventSingleImage'>
                <img src="<?php echo base_url() . "content/uploads/images/" .$image; ?>" alt=""/>   
            </div>

<?php } ?> 
        <div class='eventDetails'>
                    <h4 style="color: #5D5D5D;"><?php echo $date; ?> <?php echo $fullTime; ?></h4>
                    <h4><?php echo $location; ?></h4>
                    <p><?php echo $details; ?></p>
    </div>
    </div>

   
      
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
		            
                                
    <?php foreach ($sideBarevent as $sideEvent){
        $Sdate=date("Y-m-d", strtotime($sideEvent->date));
        $Stime=date("h:i A", strtotime($sideEvent->date));
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