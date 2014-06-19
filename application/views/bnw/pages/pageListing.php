<div class="rightSide">
    
<div id="body">
    <div class="sucessmsg">
  <?php echo $this->session->flashdata('message'); ?>
    </div>
    <h2 style="float: left;">Pages >> All Pages</h2>
    <p style="float: left; margin: 25px 0px 5px 30px;">
    <?php echo anchor('bnw/addpage','Add New Page'); ?>
    </p>
    <div class="clear"></div>
    <hr class="hr-gradient"/>
    
    
    <?php
    
    
        if(!empty($query)){
            ?>
    <table border="1" cellpadding="10" >
        <tr>
           
            <th>Page Title</th>
            <th>Page Summary</th>         
            <th>Status</th>
            <th>Action</th>
        </tr>
    <?php
            foreach ($query as $data){
            ?>
          <tr>
            
            <td><?php echo wordwrap($data->page_name, 50, "\n", true); ?></td>
            <td><?php echo wordwrap($data->page_summary, 50, "\n", true); ?></td>
           
              
            
            <td><?php if($data->page_status=="Active")
            {
                echo "Draft";
            }
                else
            {
                    echo "Published";
                    
            }
            ?></td>
            <td><?php echo anchor('bnw/editpage/'.$data->id,'Edit'); ?> / 
            <?php echo anchor('bnw/deletepage/'.$data->id,'Delete'); ?></td>
        </tr>
            <?php    
            }
        }
 else {
     echo '<h3>Sorry pages are not available</h3>';
 }
    ?>
    </table>
    <?php  echo $links; ?>
</div>
</div>
<div class="clear"></div>
</div>
