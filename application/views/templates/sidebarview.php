
		<?php foreach ($category as $catList) {
		    $category_id = $catList->id; ?>
		<div class="redColouredDiv" id='sidebarContent'><h3><?php echo $catList->category_name; ?></h3></div>
		            <?php $catProduct = $this->productmodel->get_product($category_id);
		 foreach ($catProduct as $product_list) {
		                ?>
		                <div class='sidebarContentNext'>
		                    <div class="cartImage" style="float: left; width: 14%; min-height: 40px; margin: 0px; padding: 0px;">
		                       <img src="<?php echo base_url().'content/uploads/images/'.$product_list->image1; ?>" width="50" height="50"  /> 
		                    </div>
		                    <div class="cartImage" style="float: left; width: 40%; min-height: 40px; margin: 0px; padding: 0px;">
		                       <?php $a=  strlen($product_list->name);
                                       
                                       if($a<=15){
                                       ?>
                                        <p><b><?php echo $product_list->name;  ?></b></p>
                                       <?php } else { ?>
                                           <p><b><?php echo mb_strimwidth($product_list->name, 0, 15, "..."); ?></b></p>
                                     <?php  } ?>
                                        
                                        
		                    </div> 
		                    <div class="sidebarCart"> 
		                    <div class='sidebarCartLeft'><h4><?php get_currency($product_list->price); ?></h4></div>
		                    
		
		                        <input type="button" value="<?php echo $product_list->id ?>" class="addToCart" id="addToCartBtn">  
		
		                    
		                </div>
		                     
		                                           
		                </div>
		
		<?php } } ?>
		<div class="redColouredDiv" id='sidebarContent'><h3>Popular Post</h3></div>
		            <?php for ($i = 0; $i < 4; $i++) {
		                ?>
		                <div class='sidebarContentNext'></div>
		<?php } ?>
		
		            <div class="redColouredDiv" id='sidebarContent'><h3>Sponsors</h3></div>
		            <?php for ($i = 0; $i < 4; $i++) {
		                ?>
		                <div class='sidebarContentNext'></div>
		
		<?php } ?>
		
		        </div>  
		       
		 </div> 
		 <div class="clear"> </div>
		</div>
