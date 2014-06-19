<div class="rightSide">
   <div id="body">
       <div class="sucessmsg">
  <?php echo $this->session->flashdata('message'); ?>
       </div>
    <h2 style="float: left;">Product >> All Products</h2>
    <p style="float: left; margin: 25px 0px 5px 30px;">
    <?php echo anchor('bnw/product','Add New Product'); ?>
    </p>
    <div class="clear"></div>
     <hr class="hr-gradient"/>
        <?php 
     $category = $this->dbmodel->get_category();
    echo form_open('bnw/catproduct'); ?>
     <select name="categoryProduct" id="categoryList">
         <option value="0">All Product</option>
     <?php          foreach ($category as $cName)
              { ?>
         <option value="<?php echo $cName->id; ?>">
                <?php echo $cName->category_name; ?>
         </option> <?php   } ?>
     </select>
     
     <input type="submit" value="Search" />
    <?php 
    echo form_close();

        
         if(!empty($query)){
             ?>
        <table border="1" cellpadding="10" width="100%">
        <tr>
            <th>Product Category</th>
            <th>Product Name</th>
            <th>Description</th>
            <th>Price</th>
            <th>First Image</th>
            <th>Second Image</th>
            <th>Third Image</th>
            <th>Action</th>
        </tr>
        <?php
            foreach ($query as $data){
            ?>
          <tr>
              <td><?php $cid = $data->category;
              $cateID = $this->dbmodel->get_category_id($cid);
              foreach ($cateID as $cName)
              {
                  $categoryName = $cName->category_name;
              }
              echo $categoryName;
              ?></td>
              <td><?php echo wordwrap($data->name, 50, "\n", true); ?></td>
            <td><?php echo wordwrap($data->summary, 50, "\n", true); ?></td>
            <td><?php echo $data->price ?></td>
            <td><img src="<?php echo base_url()."content/uploads/images/".$data->image1; ?>" width="50" height="50" alt="Image not set!" /></td>
             <td><img src="<?php echo base_url()."content/uploads/images/".$data->image2; ?>" width="50" height="50" alt="Image not set!" /></td>
            <td><img src="<?php echo base_url()."content/uploads/images/".$data->image3; ?>" width="50" height="50" alt="Image not set!"/></td>
             
            <td><?php echo anchor('bnw/editproduct/'.$data->id,'Edit'); ?> / 
            <?php echo anchor('bnw/delProduct/'.$data->id,'Delete'); ?></td>
        </tr>
            <?php    
            }
        }
        else{
            echo '<h3>Sorry product are not available</h3>';
        }
            
    ?>
    </table>
    <?php  echo $links; ?>
</div>
    
    
</div>
<div class="clear"></div>
</div>