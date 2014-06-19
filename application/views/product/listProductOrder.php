<div class="rightSide">
   <div id="body">
    <div class="sucessmsg">
  <?php echo $this->session->flashdata('message'); ?>
    </div>
    <h2>All Product Order </h2>
     <hr class="hr-gradient"/>
    
    
    <?php
    
    
         if(!empty($query)){
             ?>
        <table border="1" cellpadding="10">
        <tr>
            <th>Product Name</th>
            <th>Quantity</th>
            <th>Price</th>
            
           
            <th>Date</th>
            <th>User Name</th>
            <th>Deliver Address</th>
            <th>Action</th>
        </tr>
        <?php
            foreach ($query as $data){
            ?>
          <tr>
            <td><?php $pid = $data->p_id ;
            $pdetail = $this->dbmodel->findproduct($pid);
            foreach ($pdetail as $pname)
            {
                $proName = $pname->name;
            }
                 echo $proName;   ?></td>
            <td><?php echo $data->qty; ?></td>
            <td><?php echo $data->price ?></td>
            <td><?php $oid =  $data->o_id;
            $oderDetail = $this->dbmodel->get_all_product_order_oid($oid);
            foreach ($oderDetail as $orderDate)
            {
                $oDate = $orderDate->date;
            }
            echo $oDate;
            ?></td>
             <td><?php 
             $oderDetailUser = $this->dbmodel->get_all_product_order_oid($oid);
             foreach ($oderDetailUser as $orderUserID)
            {
                $UserID = $orderUserID->u_id;
            }
            $DetailUser = $this->dbmodel->finduser($UserID);
            {
                foreach ($DetailUser as $Uname)
                {
                    $userName = $Uname->user_name;
                }
            }
             echo $userName; ?></td>
             <td><?php 
             $oderDetailAddress = $this->dbmodel->get_all_product_order_oid($oid);
             foreach ($oderDetailAddress as $orderAddress)
            {
                $deliver_address = $orderAddress->deliver_address;
            }
             echo $deliver_address;
             ?></td>
            <td><?php // echo anchor('bnw/delProductOrder/'.$data->od_id,'Delete'); ?></td>
        </tr>
            <?php    
            }
        }
        else{
            echo '<h3>Sorry product are not available</h3>';
        }
            
    ?>
    </table>
    <?php // echo $links; ?>
</div>
    
    
</div>
<div class="clear"></div>
</div>
