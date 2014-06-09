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
                    <h4><?php echo $allEvents->title; ?></h4>
                    <h5 style="color: #5D5D5D;">Date:<?php echo $date ?> Time:<?php echo $time; ?></h5>
                    <h5>Location: <?php echo $allEvents->location; ?></h5>
                    <?php if(strlen($allEvents->details)<=100)                                       
                                       {
                                       ?>
                                        <p><?php echo $allEvents->details; ?></p>
                                       <?php } else { ?>
                                           <p><?php echo mb_strimwidth($allEvents->details, 0, 100, "..."); ?></b></p>
                                     <?php  } ?>
                   
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
                    <h4><?php echo $allEvents->title; ?></h4>
                   <h5 style="color: #5D5D5D;">Date:<?php echo $date ?> Time:<?php echo $time; ?></h5>
                   <h5>Location: <?php echo $allEvents->location; ?></h5>
                    <?php if(strlen($allEvents->details)<=100)                                       
                                       {
                                       ?>
                                        <p><?php echo $allEvents->details; ?></p>
                                       <?php } else { ?>
                                           <p><?php echo mb_strimwidth($allEvents->details, 0, 100, "..."); ?></b></p>
                                     <?php  } ?>
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
                    <h4 ><?php echo $allEvents->title; ?></h4>
                    <h5 style="color: #5D5D5D;">Date:<?php echo $date ?> Time:<?php echo $time; ?></h5>
                    <h5>Location: <?php echo $allEvents->location; ?></h5>
                    <?php if(strlen($allEvents->details)<=100)                                       
                                       {
                                       ?>
                                        <p><?php echo $allEvents->details; ?></p>
                                       <?php } else { ?>
                                           <p><?php echo mb_strimwidth($allEvents->details, 0, 100, "..."); ?></b></p>
                                     <?php  } ?>
                    <a style="color: blue;" href='<?php echo base_url()."index.php/view/eventDetails/".$allEvents->id;?>'>see more</a>
                </div>




    </div>
            
   <?php     }
        
    }
    ?>

    <!-- the slider ends here-->

    

    <div class='clear'></div> 
<?php if(strlen($links)>2){ ?>
<div style="margin: 10px 0px 5px 0px; background-color: #999; color: #3399ff; border-radius:5px; width:95%; ">
    <?php echo $links; ?>
    </div>
<?php } ?>
</div>
</div>
<!-- left side content closed here -->
  <div id='sidebar'>
            <div class="redColouredDiv" id='sidebarContent'><h3>Events</h3></div>
		            <?php if(!empty($event)){
                                
     foreach ($event as $sideEvent){
		                ?>
            <div class='sidebarContentNext' style="z-index: 1;">
                <?php if (strlen($sideEvent->image)>2){ ?>
		                    <div class="cartImage" style="float: left; width: 14%; min-height: 40px; margin: 0px; padding: 0px;">
		                       <img src="<?php echo base_url().'content/uploads/images/'.$sideEvent->image; ?>" width="50" height="50"  /> 
		                    </div>
                <?php } ?>
		                    <div class="cartImage" style="float: left; width: 40%; min-height: 40px; margin: 0px; padding: 0px;">
		                       <?php                                   
                                       if(strlen($sideEvent->title)<=15){
                                       ?>
                                        <p><b><?php echo $sideEvent->title;  ?></b></p>
                                       <?php } else { ?>
                                           <p><b><?php echo mb_strimwidth($sideEvent->title, 0, 15, "..."); ?></b></p>
                                     <?php  } ?>
                                        
                                        
		                    </div> 
                                    
		                     
		                                           
		                </div>
                            <?php } }?>
           
           
            <div class="redColouredDiv" id='sidebarContent'>
                <div id="sideBarImage"><img src="<?php echo base_url() . "content/uploads/images/addtocart.png"; ?>"/> </div>   
                <h3>Shopping Cart</h3>
            </div>
            <div class='sidebarContentNext' id="shopping_cart">