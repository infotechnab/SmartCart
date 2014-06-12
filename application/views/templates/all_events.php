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
       $setTime=date("G:i:s", strtotime($allEvents->date));
         $noTime="0:00:00"; 
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
                <div class='eventImage'>
                <img src="<?php echo base_url() . "content/uploads/images/" . $allEvents->image; ?>" alt=""/>   
            </div>

<?php } ?>
                <div class='eventDetails'>
                    <h4><?php echo $allEvents->title; ?></h4>
                    <h5 style="color: #5D5D5D;">Date:<?php echo $date ?> <?php if($setTime!==$noTime){ echo "Time:".$time; } else{}?></h5>
                    <h5>Location: <?php echo $allEvents->location; ?></h5>
                    <?php if(strlen($allEvents->details)<=100)                                       
                                       {
                                       ?>
                                        <p><?php echo $allEvents->details; ?></p>
                                       <?php } else { ?>
                                           <p><b><?php echo mb_strimwidth($allEvents->details, 0, 90, "..."); ?></b></p>
                                     <?php  } ?>
                   
                    <a style="color: blue; text-decoration: underline;" href='<?php echo base_url()."index.php/view/eventDetails/".$allEvents->id;?>'>View more</a>
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
                <img src="<?php echo base_url() . "content/uploads/images/" . $allEvents->image; ?>" alt=""/>   
            </div>

<?php } ?>
                <div class='eventDetails'>
                    <h4><?php echo $allEvents->title; ?></h4>
                   <h5 style="color: #5D5D5D;">Date:<?php echo $date ?> <?php if($setTime!==$noTime){ echo "Time:".$time; } else{}?></h5>
                   <h5>Location: <?php echo $allEvents->location; ?></h5>
                    <?php if(strlen($allEvents->details)<=100)                                       
                                       {
                                       ?>
                                        <p><?php echo $allEvents->details; ?></p>
                                       <?php } else { ?>
                                           <p><?php echo mb_strimwidth($allEvents->details, 0, 100, "..."); ?></b></p>
                                     <?php  } ?>
                    <a style="color: blue; text-decoration: underline;" href='<?php echo base_url()."index.php/view/eventDetails/".$allEvents->id;?>'>View more</a>
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
                <img src="<?php echo base_url() . "content/uploads/images/" . $allEvents->image; ?>" alt=""/>   
            </div>

<?php } ?>
                <div class='eventDetails'>
                    <h4 ><?php echo $allEvents->title; ?></h4>
                    <h5 style="color: #5D5D5D;">Date:<?php echo $date ?> <?php if($setTime!==$noTime){ echo "Time:".$time; } else{}?></h5>
                    <h5>Location: <?php echo $allEvents->location; ?></h5>
                    <?php if(strlen($allEvents->details)<=100)                                       
                                       {
                                       ?>
                                        <p><?php echo $allEvents->details; ?></p>
                                       <?php } else { ?>
                                           <p><?php echo mb_strimwidth($allEvents->details, 0, 100, "..."); ?></b></p>
                                     <?php  } ?>
                    <a style="color: blue; text-decoration: underline;" href='<?php echo base_url()."index.php/view/eventDetails/".$allEvents->id;?>'>View more</a>
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

<!-- left side content closed here -->
 