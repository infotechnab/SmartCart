<div class="rightSide">
<div class="titleArea">
     <h2 style="float: left;">Users >> Add New User</h2>
    <p style="float: left; margin: 25px 0px 5px 30px;">
    <?php echo anchor('bnw/users','View all Users'); ?>
    </p>
     <div class="clear"></div>
<hr class="hr-gradient"/>   
    </div>

  <div id="sucessmsg"><?php echo validation_errors();
  if(isset($error))
  {
      echo $error;
  }
  ?></div>
<p id="sucessmsg">
  <?php if($this->session->flashdata('message')){echo $this->session->flashdata('message');}?>
</p>
  <?php echo form_open_multipart('bnw/adduser');?>
  
  <p>Name:<br />
      <input type="text" size="66" placeholder="min 2 characters required" name="user_name" value="<?php echo set_value('user_name'); ?>" />
  </p>
  
  <p>First Name:<br />
  <input type="text" size="66" placeholder="min 2 characters required" name="user_fname" value="<?php echo set_value('user_fname'); ?>" />
  </p>
  
  <p>Last Name:<br />
  <input type="text" size="66" placeholder="min 2 characters required" name="user_lname" value="<?php echo set_value('user_lname'); ?>" />
  </p>
  
  <p>E-mail:<br />
  <input type="email" size="66" name="user_email" value="<?php echo set_value('user_email'); ?>" />
  </p>
  
  <p>Password:<br />
      <input type="password" size="66" placeholder="min 5 characters required" name="user_pass" value="<?php echo set_value('user_pass'); ?>" />
  </p>
  
  <p> Contact : <br/>
  <input type="text" size="66" placeholder="min 9 digits required" name="phone" value="<?php echo set_value('phone'); ?>" />
  </p>
  
  <p> Address : <br/>
      <textarea style="width: 410px;" name="address"><?php echo set_value('address'); ?></textarea>
<!--  <input type="text" name="address" value="<?php //echo set_value('address'); ?>" />-->
  </p>
  
   <p> User Status:<br />
  <?php 
  $options = array(
                  '1'  => 'publish',
                  '0'    => 'draft');
  echo form_dropdown('user_status',$options)
  ?>
  </p>
  
  <p> User Type:<br />
  <?php 
  $useroptions = array("0" => 'Administrator', "1" => "User" );
  echo form_dropdown('user_type',$useroptions)
  ?>
  </p>
  
  
  <input type="submit" value="Submit" />
  <?php echo form_close();?>
</div>
<div class="clear"></div>
</div>