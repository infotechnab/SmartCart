<?php
$upcommingEvent = TRUE;
$todayEvent = TRUE;
$earlierEvent = TRUE;
$currentDate = date("Y-m-d");
?>

<div id='content'>
    <!-- from slider starts-->
    <?php foreach ($events as $allEvents) {
        
        //$year=date_parse($allEvents->date);
        
        $date=date("Y-m-d", strtotime($allEvents->date));
        $time=date("h:i A", strtotime($allEvents->date));
       
        if ($date > $currentDate)
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
<?php if (strlen($allEvents->image)>2) {
    ?>
                <div class='eventImage' style="outline: 1px solid black;">
                <img class="srcimage" src="<?php echo base_url() . "content/uploads/images/" . $allEvents->image; ?>" alt=""/>   
            </div>

<?php } ?>
                <div class='eventDetails'>
                    <h4 style="margin: 0px; padding: 0px;"><?php echo $allEvents->title; ?></h4>
                    <h4 style="color: #5D5D5D;">Date:<?php echo $date ?> Time:<?php echo $time; ?></h4>
                    <h4><?php echo $allEvents->location; ?></h4>
                    <p><?php echo $allEvents->details; ?></p>
                    <a style="color: blue;" href='<?php echo base_url()."index.php/view/eventDetails/".$allEvents->id;?>'>see more</a>
                </div>




    </div>
            
   <?php     }
           
     /* for today event*/  
       if ($date == $currentDate)
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
<?php if (strlen($allEvents->image)>2) {
    ?>
                <div class='eventImage' style="outline: 1px solid black;">
                <img class="srcimage" src="<?php echo base_url() . "content/uploads/images/" . $allEvents->image; ?>" alt=""/>   
            </div>

<?php } ?>
                <div class='eventDetails'>
                    <h4 style="margin: 0px; padding: 0px;"><?php echo $allEvents->title; ?></h4>
                   <h4 style="color: #5D5D5D;">Date:<?php echo $date ?> Time:<?php echo $time; ?></h4>
                    <h4><?php echo $allEvents->location; ?></h4>
                    <p><?php echo $allEvents->details; ?></p>
                    <a style="color: blue;" href='<?php echo base_url()."index.php/view/eventDetails/".$allEvents->id;?>'>see more</a>
                </div>




    </div>
            
   <?php     }
        
        /* for earlier events */
   if ( $date < $currentDate)
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
<?php if (strlen($allEvents->image)>2) {
    ?>
                <div class='eventImage' style="outline: 1px solid black;">
                <img class="srcimage" src="<?php echo base_url() . "content/uploads/images/" . $allEvents->image; ?>" alt=""/>   
            </div>

<?php } ?>
                <div class='eventDetails'>
                    <h4 style="margin: 0px; padding: 0px;"><?php echo $allEvents->title; ?></h4>
                    <h4 style="color: #5D5D5D;">Date:<?php echo $date ?> Time:<?php echo $time; ?></h4>
                    <h4><?php echo $allEvents->location; ?></h4>
                    <p><?php echo $allEvents->details; ?></p>
                    <a style="color: blue;" href='<?php echo base_url()."index.php/view/eventDetails/".$allEvents->id;?>'>see more</a>
                </div>




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
