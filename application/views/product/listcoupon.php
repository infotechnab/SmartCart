<div class="rightSide">
 <h2>Coupons</h2>
 <hr class="hr-gradient"/>

  <?php echo validation_errors(); ?>
<p id="sucessmsg">
  <?php if($this->session->flashdata('message')){echo $this->session->flashdata('message');}?>
    </p>
    <p>
    <?php echo anchor('bnw/addcoupon','Add New Coupon'); ?>
    </p>
    <div>
        <table>
            <tr>
                <th>Key</th>
                <th>Rate</th>
                <th>Expired Date</th>
            </tr>
            <?php foreach ($coupon as $list) {?>
            <tr>
                <td><?php echo $list->key; ?></td>
                <td><?php echo $list->rate; ?></td>
                <td><?php  echo $list->exp_date;?></td>
            </tr>
            <?php } ?>
        </table>
    </div>
    
    </div>
<div class="clear"></div>
</div>

