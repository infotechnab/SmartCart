<?php
 if(isset($error))
  {
     echo $error;
  }
        if(!empty($query)){
           
            foreach ($query as $navdata){
           
                $id = $navdata->id;
                $name = $navdata->navigation_name;
        }
        
    ?>
<div class="rightSide">
    <div class="sucessmsg">
  <?php echo $this->session->flashdata('message'); ?>
    </div>
    <h2>Dashboard >> Edit Navigation/ <?php echo $name; ?></h2>
<hr class="hr-gradient"/>
    <div id="forLeftPage"> 
 <div class="sucessmsg">
  <?php echo validation_errors(); ?>
 </div>
  
  <?php echo form_open_multipart('bnw/updatenavigation');?>
  <p>Title:<br />
      <input type="hidden" name="id" value="<?php echo $id; ?>" >
      <input type="text" name="navigation_name" value="<?php echo $name; ?>" />
  </p>
  
  <input type="submit" value="Submit" />
  
  <?php echo form_close(); ?>
  

</div></div>

<?php   }
else{ ?>
    <div class="rightSide">
    <h2>Sorry! related navigation item is not found.</h2>
<?php } ?>
<div class="clear"></div>
</div>

