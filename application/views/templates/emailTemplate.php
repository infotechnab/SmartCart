
    
    
<div style="width: 750px; margin: 0 auto 0 auto; padding: 0px;" >
        <div style="display:table-cell; vertical-align:middle; text-align:center; height: 70px; width: 1000px; alignment-adjust: central; background-color: #ccc; margin: 0 auto 0 auto;">
            <h3>Smart Access Services</h3>
            </div>

   <div style="padding: 10px 20px 10px 20px; background-color: #eee;">
   
    
    <h4>Transaction Id: <?php echo $user['tranId']; ?></h4>

    <h4>Date: <?php echo $user['date']; ?></h4>
    <h4>Dear <?php echo $user['name']; ?> ! Thank You for your shopping.</h4>
    <h4>Your shopping details are as follows:</h4>
    <table border="1" width="80%">
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
    <div style="margin: 0 auto 0 auto;">
        <input type="submit" id="printBtn" style="float: left; margin: 0px 10px 0px 10px; background: #000; padding:10px; border: none; border-radius: 5px; color: white;" onclick="window.print()" value="Print" />
        <div id="goToHomeBtn" style="float: left; margin: 0px 10px 0px 10px; background: #000; padding:10px; border: none; border-radius: 5px; max-width: 100px;"><a href="<?php echo base_url().'index.php/view/index'; ?>" style="color: #fff;">Go to home</a></div>
    </div>
    <div style="clear: both"></div>
        <div style="display:table-cell; vertical-align:middle; text-align:center; height: 70px; width: 1000px; alignment-adjust: central; background-color: #ccc; margin: 0 auto 0 auto;">
           <p>&copy; smartaccessservices</p>

            </div>
 	
</div>
        
   
