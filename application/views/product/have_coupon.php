
<script>

        $(document).ready(function(){
            $('#checkkey').click(function(){
               var key = $('#couponkey').val(); 
               
                  var dataString = 'id='+key;
                 // alert(dataString);
            $.ajax({
                type: "POST",
                url: base_url + 'index.php/bnw/checkcoupon',
                data: dataString,
                success: function(msgs)
                {
                    $("#nfcoupon").html(msgs);
                }
            });
            });
          
           
        });

</script>
<div id="nfcoupon"></div>
        <input type="text" name="couponkey" id="couponkey" placeholder="type your key here" /> <br/>
        <input type="button" id="checkkey" value="Apply Coupon" />
  
