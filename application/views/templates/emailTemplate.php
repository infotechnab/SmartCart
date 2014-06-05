
<div id="login">
    <div id="outerBorder">
<div style="width: 750px; margin: 0 auto 0 auto; padding: 0px;" >
        <div style="display:table-cell; vertical-align:middle; text-align:center; height: 70px; width: 1000px; alignment-adjust: central; background-color: #ccc; margin: 0 auto 0 auto;">
            <h3>Smart Access Services</h3>
            </div>

   <div style="padding: 10px 20px 10px 20px; background-color: #eee;">
   
    
    <h4>Transaction Id: <?php echo $user['tranId']; ?></h4>

    <h4>Date: <?php echo $user['date']; ?></h4>
    <h4>Dear <?php echo $user['name']; ?> ! Thank You for your shopping.</h4>
    <h4>Your shopping details are as follows:</h4>
    <table width:100>
        <tbody>
        <tr><th>Product Id</th>
            <th>Image</th>
        <th>Product Name</th>
        <th>Quantity</th>
        <th>Price</th>
        <th>Sub-total</th>
        </tr>
        <tr>
        <td><?php echo $user['productId']; ?></td>
        <td><?php echo $user['productImage']; ?></td>
        <td><?php echo $user['productName']; ?></td>
        <td><?php echo $user['qty']; ?></td>
        <td><?php echo $user['price']; ?></td>
       
        <td><?php echo $user['qty'] * $user['price']; ?></td>
        
        </tr>
        </tbody>
    </table>
</div>
            
            <div style="display:table-cell; vertical-align:middle; text-align:center; height: 70px; width: 1000px; alignment-adjust: central; background-color: #ccc; margin: 0 auto 0 auto;">
           <p>&copy; smartaccessservices</p>

            </div>

</div>
         </div> 
</div> 
<div class="clear"></div>
</div> 
</div> 