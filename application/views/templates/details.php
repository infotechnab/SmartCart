
  <?php
$this->load->helper('currency');
?>
<script src="<?php echo base_url() . 'content/jquery.js'; ?>" type="text/javascript"></script>
<style type="text/css">
    /* popup_box DIV-Styles*/
    .popup_box { 
        display:none; /* Hide the DIV */
        position:absolute;  
        _position:absolute; /* hack for internet explorer 6 */  
        height:800px;  
        width:600px;  
        background:#FFFFFF;  
        left: 300px;
        top: 50px;
        z-index:100; /* Layering ( on-top of others), if you have lots of layers: I just maximized, you can change it yourself */
        margin-left: 15px;  

        /* additional features, can be omitted */
        border:1px solid black;  	
        padding:25px;  
        font-size:15px;  
        -moz-box-shadow: 0 0 5px #a9a4a4;
        -webkit-box-shadow: 0 0 5px #a9a4a4;
        box-shadow: 0 0 2px #a9a4a4;

    }
    a{  
        cursor: pointer;  
        text-decoration:none;  
    } 

    /* This is for the positioning of the Close Link */
    #popupBoxClose {
        font-size:20px;  
        line-height:15px;  
        right:5px;  
        top:5px;  
        position:absolute;  
        color:#6fa5e2;  
        font-weight:500;  	
    }</style>
<script type="text/javascript">

    $(document).ready( function() {
        // When site loaded, load the Popupbox First
        $('.srcimage').click(function(){
            $('.popup_box').fadeIn(500);
            var srcimg = $(this).attr('src');
		
                
               
            $("#pqr").attr({
                src: srcimg
			
            });
            $('.popup_box').css({"display":"Block"});
			
            //$('#pqr').fadeIn(3000);
            $('.detailsImage').css({"opacity":".3"});
			
        });
		
        $('#popupBoxClose').click( function() {
            unloadPopupBox();
        });
		
        function unloadPopupBox() {	// TO Unload the Popupbox
            $('.popup_box').fadeOut("slow");
            $(".detailsImage").css({ // this is just for style		
                "opacity": "1"  
            }); 
        }		
		
		
		
        /**********************************************************/
		
    });
	
	
</script>
<script>
var base_url = '<?php echo base_url(); ?>';
$(document).ready(function() {
    //adding item to the cart...
    $(".addToCart").click(function() {
       $(this).parent().parent().parent().prev().css("display","block");
        var id = $(this).val();
        var dataString = 'itemid=' + id;
        $.ajax({
            type: "POST",
            url: base_url + 'index.php/view/add',
            data: dataString,
            success: function(msgs)
            {
                $("#shopping_cart").html(msgs);
            },
            complete: function() {
                $(".loadingImg").css("display","none");
            }
        });

    });

});

//for cart//
$(document).ready(function() {

    //adding item to the cart...

    $(".addToCarts").live('click', function() {
        $('.slide').css({opacity: 0.3});
        var id = $(this).val();
        var dataString = 'itemid=' + id;
        $.ajax({
            type: "POST",
            url: base_url + 'index.php/view/add',
            data: dataString,
            success: function(msgs)
            {
                $("#shopping_cart").html(msgs);
            },
            complete: function() {
                $('.slide').css({opacity: 1});
            }
        });

    });
</script>
<script>
        var base_url = "<?php echo base_url(); ?>";
    $(document).ready(function() {
       
        $(".addToCart").click(function() {
            var id = $(this).val();
            
            var dataString = 'itemid=' + id;
            $.ajax({
                type: "POST",
                url: base_url + 'index.php/view/add',
                data: dataString,
                success: function(msgs)
                {
                    $("#shopping_cart").html(msgs);
                },
                complete: function() {

                }
            });
        });

    });

</script>
<div id='content'>
        <div class='contentHeader'>
            <h3><a href="<?php base_url();?>">home </a> >> <?php if(isset($pageTitle)){ echo $pageTitle; } else{ echo "Error !"; }?></h3>
        </div>

        
            <?php
            if (!empty($product)) {
               
                foreach ($product as $productDet) {
                    
          
                    ?>
                    <div class='contentContainer'>
                        
                            <div id='detailsImageLarge'>
                                <div class="detailsImageLargeLeft">
                                <img src="<?php echo base_url() . "content/uploads/images/" . $productDet->image1; ?>" alt="<?php echo $productDet->name; ?>"/>   
                                </div>
<div class="detailsImageLargeLeft">
                            <div id="detailsDetail">
                                
                                 <?php
                                 //Facebook like and share 
                                 if ($productDet->like == "enabled") { ?>
                            <div class="fb-like" data-href="<?php echo base_url() . "/index.php/view/details/".$productDet->id; ?>" data-layout="button_count" data-action="like" data-show-faces="false" data-share="false"></div>
                            <?php
                        } else {
                            
                        }
                        ?> 
                        <?php if ($productDet->share == "enabled") { ?>
                            <div class="fb-share-button" data-href="<?php echo base_url() . "/index.php/view/details/".$productDet->id; ?>" data-type="button_count"></div>
                            <script src="//connect.facebook.net/en_US/all.js"></script>
                            <?php
                        } else {
                            
                        }
                        ?>
                            
                            
                                <h2><?php echo $productDet->name; ?></h2>
                                <p> <?php echo $productDet->description; ?> </p> 

                            </div>
                        <div class="loadingImg" style="display: none; position: relative; margin:-123px 129px 17px 93px;; padding: 0px;">
                    <img width="30" style="margin:0px; padding: 0px;" src="<?php echo base_url() . 'content/uploads/images/page-loader.gif'; ?>" alt="loading.."/>
                    <br><b style="margin:0px; padding: 0px;">Loading...</b>
                </div>   
                            <div class="detailsBottom"> 
                    <div class='contentContainerFooterLeft'><h4><?php get_currency($productDet->price); ?></h4></div>
                    <div class="redColouredDiv" class='contentContainerFooterRight'>

                        <input type="button" value="<?php echo $productDet->id ?>" class="addToCart" id="addToCartBtn">  

                    </div>
                </div>
</div>
                          </div>
                            
                        <div class="clear"></div>
<?php if(strlen($productDet->image1)>2){ ?>
                        <div class='detailsImage'>
                            <img class="srcimage" src="<?php echo base_url() . "content/uploads/images/" . $productDet->image1; ?>" alt="<?php echo $productDet->name; ?>"/>   
                        </div>
                        
                        <?php } ?>
                        <?php if(strlen($productDet->image2)>2){ ?>
                        <div class='detailsImage'>
                            <img class="srcimage" src="<?php echo base_url() . "content/uploads/images/" . $productDet->image2; ?>" alt="<?php echo $productDet->name; ?>"/>   
                        </div>
                         <?php } ?>
                        <?php if(strlen($productDet->image3)>2){ ?>
                        <div class='detailsImage'>
                            <img class="srcimage" src="<?php echo base_url() . "content/uploads/images/" . $productDet->image3; ?>" alt="<?php echo $productDet->name; ?>"/>   
                        </div>
     <?php } ?>
                      <div class="clear"></div>
                                   
     </div>

            
                <?php
                }
            } else {
                ?><div class='contentContainerDetails'> 
                    <?php echo '<h3>This page does not contain any content.</h3>'; ?>
                </div> 
<?php }
?>

<div class="popup_box">	<!-- OUR PopupBox DIV-->
<img  src="" width="600px" height="800px" id="pqr"  />
 <a id="popupBoxClose">Close</a>	
</div>

        </div>




        <!-- left side details content closed here -->

       