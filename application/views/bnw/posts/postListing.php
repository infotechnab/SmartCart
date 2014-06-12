<div class="rightSide">
    
<div id="body">
    <p id="sucessmsg">
  <?php echo $this->session->flashdata('message'); ?>
    </p>
    <h2 style="float: left;">Offers >> All Offers</h2>
    <p style="float: left; margin: 25px 0px 5px 30px;">
    <?php echo anchor('bnw/addpost','Add New Offer'); ?>
    </p>
     <div class="clear"></div>
     <hr class="hr-gradient"/>
    
    
    <?php
    
    
         if(!empty($query)){
             ?>
        <table border="1" cellpadding="10">
        <tr>
            
            <th>Offer Title</th>
            <th>Offer Summary</th>
            
           
            <th>Image</th>
            <th>Action</th>
        </tr>
        <?php
            foreach ($query as $data){
            ?>
          <tr>
           
            <td><?php echo wordwrap($data->post_title, 50, "\n", true); ?></td>
            <td><?php echo wordwrap($data->post_summary, 50, "\n", true); ?></td>
            
            
            
            <td><?php if(isset($data->image)== !NULL){?> <img src="<?php echo base_url().'content/uploads/images/'.$data->image ?>" width="50" height="50" alt="<?php echo $data->image; ?>" />  <?php  }else{ echo  "Image not set";}          ?></td>
            <td><?php echo anchor('bnw/editpost/'.$data->id,'Edit'); ?> / 
            <?php echo anchor('bnw/deletepost/'.$data->id,'Delete'); ?></td>
        </tr>
            <?php    
            }
        }
        else{
            echo '<h3>Sorry offer are not available</h3>';
        }
            
    ?>
    </table>
    <?php  echo $links; ?>
</div>
</div>
<div class="clear"></div>
</div><?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
