<div class="rightSide">
<?php
if(isset($category))
{
    foreach ($category as $data)
    {
        $id = $data->id;
        $name = $data->category_name;
    }
}
?>
    <h2>Are You Sure To Delete <?php echo $name; ?> </h2> <br/> <h3> It will also delete all product associated with this category </h3>
  <?php echo validation_errors(); ?>
 
  <p id="sucessmsg">
  <?php if($this->session->flashdata('message')){echo $this->session->flashdata('message');}?>
    </p>
  <?php echo form_open_multipart('bnw/delete_Product_cat/');?>
  
      <input type="hidden" name="id" value="<?php echo $id; ?>" />
      
      
  </p>
    <input type="submit" value="Yes" />
    <?php echo anchor('bnw/category', 'No');  ?>
  
</div>
<div class="clear"></div>
</div>

