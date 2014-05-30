<?php
    
    function get_currency($data)
    {
        if($data=="")
        {
            echo '<span> $ </span>'.'<span class="priceTag">';  
        }
        else
        {
         echo '<span> $ </span>'.'<span class="priceTag">'.$data.'</span>';
        
         
        }
    }
