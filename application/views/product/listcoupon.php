<div class="rightSide">
    <div class="sucessmsg">
  <?php if($this->session->flashdata('message')){echo $this->session->flashdata('message');}?>
    </div>
    <h2 style="float: left;">Product >> List Coupons</h2>
    <p style="float: left; margin: 25px 0px 5px 30px;">
    <?php echo anchor('bnw/addcoupon','Add New Coupon'); ?>
    </p>
    <div class="clear"></div>
 <hr class="hr-gradient"/>
<div class="sucessmsg">
  <?php echo validation_errors(); ?>
</div>
    
    <div>
        <table width="40%">
            <tr>
                <th>Key</th>
                <th>Rate</th>
                <th>Expired Date</th>
            </tr>
            <?php foreach ($coupon as $list) {?>
            <tr style="text-align: center;">
                <td><?php echo $list->key; ?></td>
                <td><?php echo $list->rate; ?></td>
                <td><?php  echo $list->exp_date;?></td>
            </tr>
            <?php } ?>
        </table>
         <?php  echo $links; ?>
    </div>
    
    </div>
<div class="clear"></div>
</div>

