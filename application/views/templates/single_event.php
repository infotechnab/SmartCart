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
        $year=date_parse($time);  
        $date='Date:'.$year['year'].'-'.$year['month'].'-'.$year['day']; 
        if ($year['hour']>=12){
            $time=$year['hour']-12;
            $fullTime='Time:'.$time.':'.$year['minute'].'pm';
            } else{
                $time=$year['hour'];
                $fullTime='Time:'.$time.':'.$year['minute'].'am';
                
            } 
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
                <div class='eventImage' style="outline: 1px solid black;">
                <img class="srcimage" src="<?php echo base_url() . "content/uploads/images/" .$image; ?>" alt=""/>   
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
    <div class="redColouredDiv" id='sidebarContent'>
        <div id="sideBarImage"><img src="<?php echo base_url() . "content/uploads/images/addtocart.png"; ?>"/> </div>   
        <h3>Shopping Cart</h3>
    </div>
    <div class='cartItems' id="shopping_cart">
