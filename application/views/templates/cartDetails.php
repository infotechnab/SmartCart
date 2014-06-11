<?php
$this->load->helper('currency');
?>

<script>
    $(document).ready(function() {
        $(".updateQuantity").keyup(function() {                //for sub Total

            var price = $(this).parent().next().find('span.priceTag').text();
            var subTotal = $(this).val() * price;
            if (isNaN(subTotal))
                subTotal = 0;
            //assign subTotal to the td
            $(this).parent().next().next().html(subTotal);
        });

        $('.cart tr').each(function() {
            var sign = '$';
            var qty = $(this).find('input.updateQuantity').val();
            var price = $(this).find('span.priceTag').text();
            var sub_total = sign+(qty * price);
           
            $(this).find('.sub_total_price').html(sub_total);
        }); //END .each

    });
</script>


<div id="msg" style="background: white; width: 98%; padding: 10px 12px 5px 10px; margin: 0px 0px 10px 0px; float: left;">   


    <div>
        <h2 style="float:left; width:80%">Your Shopping Cart - <?php echo $this->cart->total_items(); ?> 
            <?php
            if ($this->cart->total_items() == '0' || $this->cart->total_items() == '1') {
                echo 'item';
            } else {
                echo 'items';
            }
            ?></h2 >  </div>

</div>
<div id="cartDetailsContent">
    <div id="cart_detail">
        <?php if ($this->cart->contents()) { ?>

            <?php echo form_open('cartdetails/update'); ?>
            <table width='100%' class="cart">
                <tr class="forTopBorder">
                    <th class="hide">Product</th>
                    <th style="margin: 0px; padding: 0px;">Title</th>
                    <th>Qty</th>
                    <th id="price" style="margin: 0px; padding: 0px;">Price</th>
                    <th>Sub-Total</th>
                    <th>Remove</th>
                </tr>
                <?php if ($cart = $this->cart->contents()) { ?>
                    <?php foreach ($cart as $item) { ?>   


                        <tr class='forTopBorder'>
                            <td class="hide"><img class="hide" src="<?php echo base_url() . 'content/uploads/images/' . $item['image1']; ?>" height="50" width="50"> </td>
                            <td><?php echo $item['name']; ?> </td>
                            <td><input type="text" value="<?php echo $item['qty'] ?>" id="update_qty" size="3" name="item_qnt_<?php echo $item['id']; ?>" class="updateQuantity"> 
                                <input type="hidden" value="<?php echo $item['rowid']; ?>" name="item_row_<?php echo $item['id']; ?>">
                            </td>
                            <td> <?php get_currency($item['price']); ?></td>
                            <td class="sub_total_price"></td>
                            <td><a href="<?php echo base_url(); ?>index.php/view/remove/<?php echo $item['rowid']; ?>"><div id="closeSymbol">X</div></a></td>
                        </tr>
<?php
                           
                            //echo '<input type="hidden" name="item_name['.$cart_items.']" value="'.$obj->product_name.'" />';
                            //echo '<input type="hidden" name="item_code['.$cart_items.']" value="'.$product_code.'" />';
                            //echo '<input type="hidden" name="item_desc['.$cart_items.']" value="'.$obj->product_desc.'" />';
                            //echo '<input type="hidden" name="item_qty['.$cart_items.']" value="'.$cart_itm["qty"].'" />';
                            ?>



                        <?php
                    }
                }
                ?>
                <tr class='forTopBorder'>
                    <td colspan="6">
                <div style="margin: 0px; padding: 0px; min-width: 145px; width: 25%; float: left;">
                        <a style="text-align: right;  width: 20%;" href="<?php echo base_url() . 'index.php/view' ?>" id="continue_shop">Continue Shopping</a>
                </div>
                    
                   <div style="margin: 0px; padding: 0px; min-width: 90px; width: 25%; float: left;">
                       <input type="submit" class="updateBtnStyle" value="Update Cart"></div>

                <div style="margin: 0px; padding: 0px; min-width: 45px; width: 7%; float: left;"><b>Total</b>:</div>
                    <div style="margin: 0px; padding: 0px; min-width: 45px; width: 7%; float: left;"> <b><?php get_currency($this->cart->total()); ?></b></div>
                    </td>  
                </tr>

                <tr class='forTopBorder'>
                    <td colspan="3"><b><?php echo anchor('cartdetails/clear', 'Empty Your Cart', array('title' => 'Empty cart','id'=>'makeEmptyCart')) ?></b></td>
                   
                    <td colspan="2"><div id="order_checkout"  class="updateBtnStyle">
                            <?php echo anchor('view/login', 'Proceed Payment') ?></div></td>
                    <td></td>


                </tr>
            </table>
        

            <?php echo form_close(); ?>

        <?php } else {
            ?>

            <div id="cart_items"><h3>Your cart is empty</h3></div>

        <?php }
        ?>


    </div>
</div>


<div class="clear"></div>

</div>
<div class="clear"></div>
</div>







