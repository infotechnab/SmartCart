<div class="rightSide">
    <?php if(!empty($query)){
            foreach ($query as $data){
           $id = $data->id;
           $menuname = $data->menu_name;
           }
        
    ?>
<h2>Edit Menu/ <?php echo $menuname; ?></h2>
<hr class="hr-gradient"/>
  <?php echo validation_errors(); ?>
 
  <p id="sucessmsg">
  <?php if($this->session->flashdata('message')){echo $this->session->flashdata('message');}?>
    </p>
  <?php echo form_open_multipart('bnw/updatemenu');?>
  
      <input type="hidden" name="id" value="<?php echo $id; ?>" />
 <p>Menu Name:<br />
      <input type="text" name="menu_name" value="<?php echo $menuname; ?>" /> </p> 
 
    <input type="submit" value="Submit" />
  <?php echo form_close();
  }  else {
       echo " <b> Sorry! The related menu item is not found </b> "; 
}
  
  ?>
</div>
<div class="clear"></div>
</div>