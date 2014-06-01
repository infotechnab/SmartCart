
<div id='content'>
       
        <div class='contentHeader'>
            <h3>Error !</h3>
        </div>
    <?php if(isset($token_error)){ ?>
        <div class='contentContainer'>
             <h3><?php echo $token_error; ?></h3>
    <?php }else{
 echo '<h3>Sorry! </h3>';
    } ?>
        </div>     
          



        </div>



        <!-- left side details content closed here -->

        <div id='sidebar'>
            <div class="redColouredDiv" id='sidebarContent'>
                <div id="sideBarImage"><img src="<?php echo base_url() . "content/uploads/images/shopping-cart-icon-614x460.png"; ?>"/> </div>   
                <h3>Shopping Cart</h3>
            </div>
            <div class='sidebarContentNext' id="shopping_cart">

