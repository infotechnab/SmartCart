<div class="rightSide">
 <?php
 if(isset($error))
  {
     echo $error;
  }
        if(!empty($query)){
            foreach ($query as $data){
           $id = $data->id;
           $name = $data->user_name;
           $fname = $data->user_fname;
           $lname = $data->user_lname;
           $email= $data->user_email;
           $pass= $data->user_pass;
           $status= $data->user_status;
         
       }
        
    ?>
<h2>Edit user/ <?php echo $name; ?></h2>
<hr class="hr-gradient"/>
  <?php echo validation_errors(); ?>
 
  <p id="sucessmsg">
  <?php echo $this->session->flashdata('message'); ?>
    </p>
  <?php echo form_open_multipart('bnw/updateuser');?>
   <p>Name:<br />
       <input type="hidden" name="id" value="<?php echo $id; ?>" >
       <input type="text" size="66" placeholder="min 2 characters required" name="user_name" value="<?php echo $name; ?>" />
  </p>
  
  <p>First Name:<br />
  <input type="text" size="66" placeholder="min 2 characters required" name="user_fname" value="<?php echo $fname; ?>" />
  </p>
  
  <p>Last Name:<br />
  <input type="text" size="66" placeholder="min 2 characters required" name="user_lname" value="<?php echo $lname; ?>" />
  </p>
  
  <p>E-mail:<br />
  <input type="email" size="66" name="user_email" value="<?php echo $email; ?>" />
  </p>
  
  
   <p> User Status:<br />
  <?php 
  $status = array(
                  '1'  => 'publish',
                  '0'    => 'draft');
  echo form_dropdown('user_status',$status,'1')
  ?>
  </p>
  
  <p> User Type:<br />
  <?php 
  $useroptions = array('0' => 'Administrator', '1' => "User" );
  echo form_dropdown('user_type',$useroptions)
  ?>
  </p>
  
  <input type="submit" value="Submit" />
  <?php echo form_close();
  }
 else {
      echo " <b> Sorry! related user is not found </b> "; 
  }
  ?>
  
</div>
<div class="clear"></div>
</div>