<div class="rightSide">
 <?php 

 if(isset($getship))
 {
    foreach ($getship as $cost)
    {
        $ship = $cost->price;
    }
 }
 ?>
 <div class="sucessmsg">
  <?php echo $this->session->flashdata('message'); ?>
   </div> 
 

    


<h2>Product >> Shipping </h2>
<hr class="hr-gradient"/>
<div class="sucessmsg">
  <?php echo validation_errors();
  
   if(isset($error))
  {
      echo $error;
  } 
  ?>
</div> 
<?php echo form_open_multipart('bnw/shippingupdate');?>


<p>Shipping Charges:
    <input type="text" name="shipping_charge" size="2" value="<?php if(isset($ship)){ echo $ship;}  ?>" required/> </p>




 <input type="submit" value="Submit" />
  <?php echo form_close();?>
 
 
 
 
 
 
 
 
</div>

<div class="clear"></div>
</div>