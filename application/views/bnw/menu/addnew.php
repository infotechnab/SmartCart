<div class="rightSide">
 <h2>Dashboard >> Add New Menu</h2>
 <hr class="hr-gradient"/>
  <?php echo validation_errors(); ?>
 
  <p id="sucessmsg">
  <?php if($this->session->flashdata('message')){echo $this->session->flashdata('message');}?>
    </p>
  <?php echo form_open_multipart('bnw/addmenu');?>
      
 <p>Menu Name:<br />
      <input type="text" name="menu_name" value="<?php echo set_value('menu_name'); ?>"  /> </p> 
 
 <input type="submit" value="Submit" />
  <?php echo form_close();?>



<div id="body">
    <p id="sucessmsg">
  <?php if($this->session->flashdata('message')){echo $this->session->flashdata('message');}?>
    </p>
    <h4 style="margin: 15px 0px 5px 5px;">All Menu</h4>
   <hr style="width: 30%; float: left;" />
   <div class="clear"></div>
     <?php    
        if(!empty($query)){
            ?>
    <table border="1" cellpadding="10">
        <tr>
            
            <th>Menu Title</th>
            <th>Action</th>
        </tr>
    
   <?php
            foreach ($query as $data){
                
            ?>
          <tr>
            
            <td><?php echo $data->menu_name; ?></td>
            <td><?php echo anchor('bnw/editmenu/'.$data->id,'Edit'); ?>
           
        </tr>
            <?php    
            }
        }
        else{
            echo '<h3>Sorry menu are not available</h3>';
        }
    ?>
       
    </table>
    <?php echo $links; ?>
</div>
 </div>
<div class="clear"></div>
</div>