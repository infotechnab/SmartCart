 <?php
$this->load->helper('currency');
?>
<script src="<?php echo base_url().'content/jquery.js'; ?>" type="text/javascript"></script>



<style>
    
    
#slideshow #slideshowWindow {
	width:100%;
	margin:0;
	padding:0;
	position:relative;
	overflow:hidden;
}

#slideshow #slideshowWindow .slide {
	margin:0;
	padding:0;
	width:90%; 
	height:400px;
	float:left;
	position:relative;
}




#slideshow #slideshowWindow .slide {
	margin:0;
	padding:0;
	width:675px; 
	
	position:relative;
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
	//width:94px;
	//height:34px;
	position: relative;
	//background-repeat:no-repeat;
	z-index:999;
}

#rightNav {
	//top:225px;
	left:400px;
	//width:53px;
	//height:26px;
	position: relative;
	//background-repeat:no-repeat;
	z-index:999;
}



</style>



<script type="text/javascript">
	$(document).ready(function() {
           
             //adding item to the cart...
             
        $(".addToCarts").live('click',function() {
           
           $('.slide').css({ opacity: 0.3 });
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
                  $('.slide').css({ opacity: 1 });
                }
            });
            
        });
            // end of add to cart
            
            slider();
		var currentPosition = 0;
		var slideWidth = 675;
		var slides = $('.slide');
		var numberOfSlides = slides.length;
		var slideShowInterval;
		var speed = 1000;

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
			currentPosition = ($(this).attr('id')=='rightNav')
			? currentPosition+1 : currentPosition-1;
										
			//hide/show controls
			manageNav(currentPosition);
			clearInterval(slideShowInterval);
			slideShowInterval = setInterval(changePosition, speed);
			moveSlide();
		});
		
		function manageNav(position) {
			//hide left arrow if position is first slide
			if(position==0){ $('#leftNav').hide() }
			else { $('#leftNav').show() }
			//hide right arrow is slide position is last slide
			if(position==numberOfSlides-1){ $('#rightNav').hide() }
			else { $('#rightNav').show() }
		}

		
		/*changePosition: this is called when the slide is moved by the 
        timer and NOT when the next or previous buttons are clicked*/
		function changePosition() {
			if(currentPosition == numberOfSlides - 1) {
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
                    if(currentPosition == numberOfSlides - 1)
                    {
                        currentPosition = 2;
                    }
                        $('#slidesHolder').animate({'marginLeft' : slideWidth*(-currentPosition)});
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
 tbl = '<tr><td rowspan="3"><img src=' +
          base_url + 'content/uploads/images/' +
          sliderJson[i].image1 + ' id="sliderImage" ></td><td style=" vertical-align: top;" ><h2>' +
          sliderJson[i].name + '</h2><p>' +
          sliderJson[i].summary + '</p> <div class="sliderContent"><div class="contentContainerFooterLeft"><h4>' +
          currencyTag + sliderJson[i].price + ' /-</h4></div><div  id="contentContainerFooterRight" ><input style="background-size:30%; height:53px" type="button" value="' + sliderJson[i].id + '"' +
          'class="addToCarts" id="addToCartBtn"></div></div></td></tr>';
  var ltbl = '</table></div>';
    $("#slideshowWindow").append(ftbl + tbl + ltbl);
}
 
    }
 
</script>
<style>
    .contentContainerFooterLeft
    {
        float: left;
        width: 40%;
    }
    .contentContainerFooterRight
    {
        width: 75px;
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
}
@media screen and (max-width : 900px)
{
    #sliderImage
{
    width: 600px;
    float: left;
    margin-right: 10px;
}
#slideshow #slideshowWindow .slide 
{
    width: 875px;
}
.sliderTable
    {
        width: 10%;
    }

}
</style>



            
            
            
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
