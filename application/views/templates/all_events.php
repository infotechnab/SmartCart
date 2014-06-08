<?php
$upcommingEvent = TRUE;
$todayEvent = TRUE;
$earlierEvent = TRUE;
$currentDate = date("Y/m/d");
?>

<div id='content'>
    <!-- from slider starts-->
    <?php foreach ($events as $allEvents) {
        if ($allEvents->date > $currentDate)
        {
            if($upcommingEvent == TRUE)
            {
           ?>
            <div class='eventHeader'>       
                <h3> Upcoming Events</h3>
            </div>
        <?php
            }
            
            $upcommingEvent = FALSE; ?>
            
            <div class="eventContainer">
<?php if (strlen($allEvents->image) > 2) {
    ?>
            <div class='detailsImage'>
                <img class="srcimage" src="<?php echo base_url() . "content/uploads/images/" . $productDet->image1; ?>" alt="<?php echo $productDet->name; ?>"/>   
            </div>

<?php } ?>





    </div>
            
   <?php     }
           
     /* for today event*/  
       if ($allEvents->date == $currentDate)
        {
            if($todayEvent == TRUE)
            {
           ?>
            <div class='eventHeader'>       
                <h3> Today's Events</h3>
            </div>
        <?php
            }
            $todayEvent = FALSE; ?>
            
            <div class="eventContainer">
<?php if (strlen($allEvents->image) > 2) {
    echo $allEvents->image;
    ?>
            <div class='detailsImage'>
                <img class="srcimage" src="<?php echo base_url() . "content/uploads/images/" . $productDet->image1; ?>" alt="<?php echo $productDet->name; ?>"/>   
            </div>

<?php } ?>





    </div>
            
   <?php     }
        
        /* for earlier events */
   if ($allEvents->date < $currentDate)
        {
            if($earlierEvent == TRUE)
            {
           ?>
            <div class='eventHeader'>       
                <h3> Earlier Events</h3>
            </div>
        <?php
            }
            $earlierEvent = FALSE; ?>
            
            <div class="eventContainer">
<?php if (strlen($allEvents->image) > 2) {
    echo $allEvents->image;
    ?>
            <div class='detailsImage'>
                <img class="srcimage" src="<?php echo base_url() . "content/uploads/images/" . $productDet->image1; ?>" alt="<?php echo $productDet->name; ?>"/>   
            </div>

<?php } ?>





    </div>
            
   <?php     }
        
    }
    ?>

    <!-- the slider ends here-->

    

    



</div>
</div>
<!-- left side content closed here -->
<div id='sidebar'>
    <div class="redColouredDiv" id='sidebarContent'>
        <div id="sideBarImage"><img src="<?php echo base_url() . "content/uploads/images/addtocart.png"; ?>"/> </div>   
        <h3>Shopping Cart</h3>
    </div>
    <div class='cartItems' id="shopping_cart">
