<?php
$this->load->helper('currency');
?>


<?php if ($this->cart->contents()) { ?>
    <div id="total_item"><h4>Total: <?php echo $this->cart->total_items(); ?> items</h4></div>
    <table width="97%" style="margin: 0px 8px 10px 8px;">
        <tr>
            <th class="hide" width='55px'></th>
            <th style="text-align: left; padding: 0px 0px 0px 15px;">Name</th>
            <th>Qty</th>
            <th></th>
            <th>Price</th>

            <th> </th>
        </tr>
        <?php if ($cart = $this->cart->contents()) { ?>
            <?php foreach ($cart as $item) { ?>                                      

                <tr>
                    <td class="hide"><img class="hide" src="<?php echo base_url() . 'content/uploads//images/' . $item['image1']; ?>" height="50" width="50"> </td>
                    <td style="padding: 0px 0px 0px 10px;"><?php echo $item['name']; ?> </td>
                    <td style="text-align: center;"><?php echo $item['qty'] ?></td>
                    <td>x</td>
                    <td style="text-align: center;"><?php get_currency($item['price']); ?></td>

                    <td style="text-align: center;"><a href="<?php echo base_url(); ?>index.php/view/remove/<?php echo $item['rowid']; ?>"><div id="closeSymbol">X</div></a></td>
                </tr>

            <?php }
        }
        ?>
        <tr style="border-top: 1px solid #222;" >
            <td style="padding: 0px 0px 0px 15px;"><b>Total</b>:</td>
            <td class="hide"></td>
            <td></td>
            <td></td>
            <td style="text-align: center; "> <b><?php get_currency($this->cart->total()); ?></b></td>

        </tr>
        <tr style="border-top: 1px solid #222;">

        </tr>
        <tr style="margin-top:20px;">
        <br/>
        <td colspan="2" style="text-align: center; "><b><div class="updateBtnStyle" style="background: black; margin: 20px auto 10px auto;"><?php echo anchor('view/clear', 'Clear', array("style" => "margin-top: 10px;")) ?></div></b></td>
        <td> &nbsp;</td>
        <td colspan="2" style="text-align: center;"> <b><div class="updateBtnStyle" style="background:#CA021E; margin: 20px auto 10px auto;"><?php echo anchor('view/cart_details', 'Check Out') ?></div></b></td>

    </tr>
    </table>
<?php } else {
    ?>
    <div id="total_item"><h4>Your cart is empty</h4></div>
<?php }
?>
</div>