<div class="rightSide">
 <h2 style="float: left;">Product >> Add New Product</h2>
    <p style="float: left; margin: 25px 0px 5px 30px;">
    <?php echo anchor('bnw/productList','View Products'); ?>
    </p>
    <div class="clear"></div>
 <hr class="hr-gradient"/>

  <?php echo validation_errors(); ?>
<p id="sucessmsg">
  <?php if($this->session->flashdata('message')){echo $this->session->flashdata('message');}?>
    </p>
  <?php echo form_open_multipart('bnw/addproduct');?>
      
    <input type="hidden" name="qty" value="1" />
 <p>Name:<br />
     <input type="text" name="pName" size="66" value="<?php echo set_value('pName'); ?>"/> </p>
 <p> Description : <br/>
<textarea name="pDescription" id="area1" cols="50" rows="5" ><?php echo set_value('pDescription'); ?></textarea> </p>
 <div class="imageUpload">
     <p>Price:<br />
         <input type="number" name="pPrice" value="<?php echo set_value('pPrice'); ?>" min="1" step="0.1"/> </p></div>

<div class="imageUpload">
    <p> Select Category : <br/>
     
     <select name="pCategory">
         <?php foreach ($category as $catName)
         {?>
         <option value="<?php echo $catName->id; ?>"><?php echo $catName->category_name; ?></option>
         <?php } ?>
     </select>
        
     <p>   <input type="checkbox" name="featured" value="1" > Featured Item </p>
     
 </p></div>
 <div class="clear"></div>
 <div class="imageUpload">
     <p> Image 1 : <br/> <input type="file" name="myfile" id="file" /> </p></div>
     <div class="imageUpload">
 <p> Image 2 : <br/> <input type="file" name="myfileTwo" id="file" /> </p></div>
 <div class="imageUpload">
 <p> Image 3 : <br/> <input type="file" name="myfileThree" id="file" /> </p></div>
 <div class="clear"></div>
  <p>
  <input type="checkbox" value="1" name="checkMe"  /> Enable shipping charge </p>
  <p><input type="checkbox" value="1" name="enableLike" checked /> Enable facebook like </p>
  <p><input type="checkbox" value="1" name="enableShare" checked /> Enable facebook share </p>
 <input type="submit" value="Submit" />
  <?php echo form_close();?>
 
 <p><b>Note:</b> Max file size: 500KB, Max Width: 1024px, Max Height: 768px </p>
 </div>
<div class="clear"></div>
</div>