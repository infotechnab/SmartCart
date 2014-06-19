<div class="rightSide">
   <div id="body">
    <div class="sucessmsg">
  <?php echo $this->session->flashdata('message'); ?>
    </div>
    <h2 style="float: left;">Events >> All Events</h2>
    <p style="float: left; margin: 25px 0px 5px 30px;">
    <?php echo anchor('bnw/addevent','Add New Event'); ?>
    </p>
     <div class="clear"></div>
     <hr class="hr-gradient"/>
    <?php   
         if(!empty($event)){
             ?>
        <table border="1" cellpadding="10">
        <tr>
            
            <th>Event Title</th>
            <th>Description</th>
            <th>location</th>
            <th>Date and Time</th>
            <th>Image</th>
            
            <th>Action</th>
        </tr>
        <?php
            foreach ($event as $data){
            ?>
          <tr>
              <td><?php echo wordwrap($data->title, 50, "\n", true); ?></td>
            
            <td><?php echo wordwrap($data->details, 50, "\n", true); ?></td>
            <td><?php echo $data->location ?></td>
            <td><?php  echo $data->date;?></td>
            <td><?php if(isset($data->image)) { ?><img src="<?php echo base_url()."content/uploads/images/".$data->image; ?>" width="50" height="50" ale="<?php echo $data->image; ?>" /><?php } else { echo 'image not set' ;} ?></td>
            
             
            <td><?php echo anchor('bnw/editevent/'.$data->id,'Edit'); ?> / 
            <?php echo anchor('bnw/delevent/'.$data->id,'Delete'); ?></td>
        </tr>
            <?php    
            }
        }
        else{
            echo '<h3>Sorry events are not available</h3>';
        }
            
    ?>
    </table>
    <?php  echo $links; ?>
</div>
    
    
</div>
<div class="clear"></div>
</div>