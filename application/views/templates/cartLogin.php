  <?php
$this->load->helper('currency');
?>
<?php
   
 foreach ($shiping as $scost)
 {
     $cost = $scost->price;
 }
?>

<script>
    $(function(){
        var price = parseInt("<?php echo $this->cart->total();?>");

    var shiping = parseInt("<?php echo $cost; ?>");

var total = price + shiping;
      $('#test').html(total);
});

//document.getElementById("test").innerHTML = total;
</script>


<!--<div id="cartDetailsSidebar">
            <div id="order_summary">
                <table width="100%">
                    <tr class='amt_summary'>
                        <td class='txtright' width='50%'>Total: </td>
                        <td><b><?php //get_currency($this->cart->total()); ?></b></td>
                    </tr>
                    <tr class='amt_summary'>
                        <td class='txtright'>Shipping Cost:</td>
                        <td><?php //echo $cost; ?></td>
                    </tr>
                    <tr class='amt_summary'>
                        <td class='txtright'>Discount:</td>
                        <td></td>
                    </tr>
                    <tr class='amt_summary'>
                        <td class='txtright'>Total:</td>
                        <td id="test">   </td>
                    </tr>
                </table>
                <div id="order_checkout"  class="updateBtnStyle">
<?php //echo anchor('view/login', 'Pay Now') ?>
                </div>
            </div>
            </div>-->
   </div>