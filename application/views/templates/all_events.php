<?php
$upcommingEvent= TRUE;
$todayEvent=TRUE;
$earlierEvent=TRUE;
foreach($events as $allEvents){
    
}

?>

<div id='content'>
    <!-- from slider starts-->


    <!-- the slider ends here-->

    <div class='contentHeader'>    
            
        <h3> Upcoming Events</h3>
    </div>
    
    <div class="eventContainer">
       <?php if(strlen($allEvents->image)>2){
            echo $allEvents->image; ?>
                        <div class='detailsImage'>
                            <img class="srcimage" src="<?php echo base_url() . "content/uploads/images/" . $productDet->image1; ?>" alt="<?php echo $productDet->name; ?>"/>   
                        </div>
                        
                        <?php }
                        else {echo 'this is it'; }?> 
        
        <div class="detailsImageLargeLeft">
            <h3></h3>
        </div>
        
        
    </div>

   
      
</div>
</div>
<!-- left side content closed here -->
<div id='sidebar'>
    <div class="redColouredDiv" id='sidebarContent'>
        <div id="sideBarImage"><img src="<?php echo base_url() . "content/uploads/images/addtocart.png"; ?>"/> </div>   
        <h3>Shopping Cart</h3>
    </div>
    <div class='cartItems' id="shopping_cart">
