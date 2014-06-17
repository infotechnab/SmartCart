<?php
$this->load->helper('currency');
?>
<style>

    .contentContainerFooterLeft
    {
        float: left;


    }
    .contentContainerFooterRight
    {

        float: left;
    }
    .sliderTable
    {
        border: 0px solid #000;
    }
    #sliderImage
    {
        width: 300px;
        float: left;
        margin-right: 10px;
        height: 400px;
    }

    #slideshow #slideshowWindow {
        width:100%;
        margin:0;
        padding:0;
        position:relative;
        overflow:hidden;
        min-height: 150px;
    }

    #slideshow #slideshowWindow .slide {
        margin:0;
        padding:0;
        float:left;
        position:relative;
        width: 800px;
        height: 400px;
    }

    #slideshow #slideshowWindow .slide .slideText {
        position: relative;
        margin:0;
        padding:0;
        color:#ffffff;
        font-family:Myriad Pro, Arial, Helvetica, sans-serif;
    }

    #slideshow #slideshowWindow .slide .slideText a:link, 
    #slideshow #slideshowWindow .slide .slideText a:visited {
        color:#ffffff;
        text-decoration:none;
    }

    #slideshow #slideshowWindow .slide .slideText h2, 
    #slideshow #slideshowWindow .slide .slideText p {
        margin:10px 0 0 10px;
        padding:0;
    }

    .nav {
        display:block;
        text-indent:-10000px;
        position:absolute;
        cursor:pointer;
    }

    #leftNav {
        top:223px;
        left:10px;
        position: relative;
        z-index:999;
    }

    #rightNav {
        left:400px;      
        position: relative;      
        z-index:999;
    }

</style>



<script type="text/javascript">
    $(document).ready(function() {

        //adding item to the cart...

        $(".addToCarts").live('click', function() {

            //$('.slide').css({opacity: 0.3});
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
        // end of add to cart

        slider();
        var currentPosition = 0;
        var slideWidth = 800;
        var slides = $('.slide');
        var numberOfSlides = slides.length;
        var slideShowInterval;
        var speed = 3000;

        //Assign a timer, so it will run periodically
        slideShowInterval = setInterval(changePosition, speed);

        slides.wrapAll('<div id="slidesHolder"></div>')

        //slides.css({ 'float' : 'left' });

        //set #slidesHolder width equal to the total width of all the slides
        $('#slidesHolder').css('width', slideWidth * numberOfSlides);

        $('#slideshow')
                .append('<span class="nav" id="leftNav">Move Left</span>')
                .append('<span class="nav" id="rightNav">Move Right</span>');

        manageNav(currentPosition);

        //tell the buttons what to do when clicked
        $('.nav').bind('click', function() {

            //determine new position
            currentPosition = ($(this).attr('id') == 'rightNav')
                    ? currentPosition + 1 : currentPosition - 1;

            //hide/show controls
            manageNav(currentPosition);
            clearInterval(slideShowInterval);
            slideShowInterval = setInterval(changePosition, speed);
            moveSlide();
        });

        function manageNav(position) {
            //hide left arrow if position is first slide
            if (position == 0) {
                $('#leftNav').hide()
            }
            else {
                $('#leftNav').show()
            }
            //hide right arrow is slide position is last slide
            if (position == numberOfSlides - 1) {
                $('#rightNav').hide()
            }
            else {
                $('#rightNav').show()
            }
        }


        /*changePosition: this is called when the slide is moved by the 
         timer and NOT when the next or previous buttons are clicked*/
        function changePosition() {
            if (currentPosition == numberOfSlides - 1) {
                currentPosition = 0;
                manageNav(currentPosition);
            } else {
                currentPosition++;
                manageNav(currentPosition);
            }
            moveSlide();
        }


        //moveSlide: this function moves the slide 
        function moveSlide() {
            $('#slidesHolder')
                    .animate({'marginLeft': slideWidth * (-currentPosition)});
        }

    });
</script>




<script>

    function slider()
    {
        var i = 0;
        var base_url = '<?php echo base_url(); ?>';
        var sliderJson = <?php echo $slider_json ?>;
        var currencyTag = '<?php echo get_currency(""); ?>';
        var tbl = "";
        for (i = 0; i < sliderJson.length; i++)
        {
            var ftbl = '<div class="slide"><table class="sliderTable">';
            tbl = '<tr><td><img src=' +
                    base_url + 'content/uploads/images/' +
                    sliderJson[i].image1 + ' id="sliderImage" ></td><td style="vertical-align:top;"><div class="slideContents"><a style="color:#000;" href="' + base_url + 'index.php/view/details/' + sliderJson[i].id + '"><h2>' +
                    sliderJson[i].name +
                    '</h2><p></a>' +
                    sliderJson[i].summary + '</p> <div class="sliderContent"><div class="contentContainerFooterLeft"><h4>' +
                    currencyTag + sliderJson[i].price + '</h4></div><div  id="contentContainerFooterRight" ><input style="background-size:30%; height:50px" type="button" value="' + sliderJson[i].id + '"' +
                    'class="addToCarts" id="addToCartBtn"></div></div></div></td></tr>';
            var ltbl = '</table></div>';
            $("#slideshowWindow").append(ftbl + tbl + ltbl);
        }
    }

</script>

<script>
    var base_url = '<?php echo base_url(); ?>';
    $(document).ready(function() {
        //adding item to the cart...
        $(".addToCart").click(function() {
            //$(this).parent().parent().parent().css("opacity","0.3");
            $(this).parent().parent().prev().css("display", "block");
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
                    //$(".contentContainerBox").css("opacity","1.0");
                    //$(".contentContainerBottom").css("opacity","1.0")
                    $(".loadingImg").css("display", "none");

                }
            });

        });

    });

</script>
<script>
    $(document).ready(function() {
        $('.homemsg').show();
        setTimeout(function() {
            $('.homemsg').fadeOut();
        }, 5000);
    });
</script>



<div id='content'>
    <!-- from slider starts-->
    <?php if ($this->session->flashdata('message')) { ?>
        <div class="homemsg">
            <?php echo $this->session->flashdata('message'); ?>
        </div>
    <?php } ?> 
    <div class="slider_main">
        <div class='contentHeader'>
            <h3>Featured products</h3>
        </div>
        <div class='contentContainer'>
            <div id="slideshow">
                <div id="slideshowWindow">
                    <!-- from here the details starts and it must be replaced by slider-->

                    <!-- here the details ends-->


                </div></div>
        </div>  </div>

    <!-- the slider ends here-->  


    <div class='contentHeader'>
        <h3>Recent products</h3>

    </div>

    <div class="loadingImg" style="display: none; position:relative;">
        <img  src="<?php echo base_url() . 'content/uploads/images/page-loader.gif'; ?>" alt="loading.."/>
        <br><b style="">Loading...</b>
    </div>

    <div id="itemContent">
        <?php foreach ($product_info as $product) {
            ?>
            <div class='contentContainerBox'>

                <!-- upto here -->
                <a href='<?php echo base_url() . "index.php/view/details/" . $product->id ?>'><div class='contentContainerHeader'>
                        <div class="likeShare">        <?php if ($product->like == "enabled") { ?>
                                <div class="fb-like" data-href="<?php echo base_url() . "/index.php/view/details/" . $product->id; ?>" data-layout="button_count" data-action="like" data-show-faces="false" data-share="false"></div>
                                <?php
                            }
                            ?>      
                            <?php if ($product->share == "enabled") { ?>
                                <div class="fb-share-button"  data-href="<?php echo base_url() . "/index.php/view/details/" . $product->id; ?>" data-type="button_count"></div>
                                <script src="//connect.facebook.net/en_US/all.js"></script>
        <?php
    }
    ?>
                        </div>   

    <?php
    if (strlen($product->name) <= 20) {
        ?>
                            <h3><?php echo $product->name; ?></h3>
                        <?php } else { ?> 
                            <h4> <?php $text = wordwrap($product->name, 18, "\n", true);
                                    echo mb_strimwidth($text, 0, 36, ".."); ?></h4>
                        <?php }
                        ?>




                </div>
                
                <?php if (strlen($product->image1)>2){ ?>
                                <div class='contentContainerImage'>
                    <img src="<?php echo base_url() . "content/uploads/images/" . $product->image1; ?>" alt="" height="150" width="130"/>   
                </div>
                                <?php }else{if (strlen($product->image2)>2){?>
                                    <div class='contentContainerImage'>
                    <img src="<?php echo base_url() . "content/uploads/images/" . $product->image2; ?>" alt="" height="150" width="130"/>   
                </div>
                                <?php   } else  {if (strlen($product->image3)>2){?>
                                    <div class='contentContainerImage'>
                    <img src="<?php echo base_url() . "content/uploads/images/" . $product->image3; ?>" alt="" height="150" width="130"/>   
                </div>
                             <?php   } else {?>
                <div class='contentContainerImage'>
                    
                </div>
                    <?php }}}  ?>
                
                </a>

                <div class="loadingImg" style="display: none; position: relative; margin:-137px auto 83px 79px; padding: 0px;">
                    <img width="30" style="margin:0px; padding: 0px;" src="<?php echo base_url() . 'content/uploads/images/page-loader.gif'; ?>" alt="loading.."/>
                    <br><b style="margin:0px; padding: 0px;">Loading...</b>
                </div>

                <div class="contentContainerBottom"> 
                    <div class='contentContainerFooterLeft'><h4><?php get_currency($product->price); ?></h4></div>
                    <div class="redColouredDiv" class='contentContainerFooterRight'>

                        <input type="button" value="<?php echo $product->id ?>" class="addToCart" id="addToCartBtn">  

                    </div>
                </div>

            </div>



        <?php } ?>
    </div >
    <div class='clear'></div>

    <?php if (strlen($links) > 2) { ?>
        <div style="margin: 10px 0px 5px 0px; background-color: #999; color: #3399ff; border-radius:5px; width:95%; ">
            <?php echo $links; ?>
        </div>
    <?php } ?>
</div>

<!-- left side content closed here -->


