<div class="rightSide">
    <?php 
if ($query)
    
{
    $i=0;
    foreach ($query as $data)
    {        
       $set_data[$i] = $data->description;
       $i++;      
    }
 }
 ?>
    <div class="sucessmsg">
  <?php if($this->session->flashdata('message')){echo $this->session->flashdata('message');} ?>
    </div>
     <h2 style="float: left;">Offers >> Add New Offer</h2>
    <p style="float: left; margin: 25px 0px 5px 30px;">
    <?php echo anchor('bnw/posts','View all Offers'); ?>
    </p>
     <div class="clear"></div>
<hr class="hr-gradient"/>   
    
    
    <div id="forLeftPage">

<div class="sucessmsg">
  <?php
  echo validation_errors();
  if(isset($error))
  {
      echo $error;
  }
  ?>
</div>
  <?php echo form_open_multipart('bnw/addpost');?>
  
  <p>Offer Title:<br />
      <input type="text" name="post_title" size="66" value="<?php echo set_value('post_title'); ?>" />
  </p>
  <p>Body:<br />
      <textarea name="post_content" id="area1" cols="50" rows="5" ><?php echo set_value('post_content'); ?></textarea>
  
  </p> 
  <p>Image:<br />
      <input type="file" name="offreImage">  
  </p> 
   <input type="submit" value="Submit" />
  <?php echo form_close();?>
    </div>
    
    <div id="forRightPage"> 
    
 
   
 <!--   <input type="checkbox" name="allow_comment" value="1" <?php //if($set_data[0]==1) echo 'checked' ;?> >Allow people to post comment</input>
<br/>
<input type="checkbox" name="allow_like" value="1" <?php // if($set_data[1]==1) echo 'checked' ;?> >Allow people to like </input>
<br/>
<input type="checkbox" name="allow_share" value="1" <?php //if($set_data[2]==1) echo 'checked' ;?> >Allow people to share</input>
<br/> -->
  
 
  </div>
</div>
<div class="clear"></div>
</div>

<!--
  <p>Post Status:<br />
  <?php 
 /* $options = array(
                  '1'  => 'publish',
                  '0'    => 'draft');
  echo form_dropdown('post_status',$options,'1')
  ?>
  </p>
   <p>Post Comment Status:<br />
  <?php 
  $options = array(
                '2'=> 'as defined',
                  '1'  => 'public',
                  '0'    => 'custom');
  echo form_dropdown('comment_status',$options,'1')
  ?>
  </p>   
   <p> Post Tags : <br/>
       <input type="text" name="post_tags" /> </p>
   
   <p>Select Category:<br/>
       <select name="selectCategory">
                <?php
                foreach ($listOfCategory as $data)
                {
                    ?>
                <option value="<?php echo $data->category_name; ?>">
                    <?php echo $data->category_name; ?>
                </option>
                    <?php
                }
                ?> 
          
            </select>
       
   </p>--> */ ?>