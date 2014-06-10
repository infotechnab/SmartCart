<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

function update_data($menu_link)
{
    $list .= $menu_link; 
}
 function queryn($parent_id) { //function to run a query  
     
    $query = mysql_query ( "SELECT * FROM navigation WHERE parent_id=$parent_id && navigation_type='category'");
    return $query;
}
function has_childn($query) { //This function checks if the menus has childs or not
    $rows = mysql_num_rows ( $query );
    if ($rows > 0) {
        return true;
    } else {
        return false;
    }
}

 
function fetch_menun($query,$list) {
    //var_dump($list);
    while ( $result = mysql_fetch_array ( $query ) ) {
        $menu_id = $result ['id'];
        $menu_name = $result ['navigation_name'];
        $menu_link = $result ['navigation_link'];       
         
         $list[] = array_push($list, end(explode("/",$menu_link))); 
       // var_dump($list);
        if (has_childn( queryn( $menu_id))) {            
            fetch_menun ( queryn( $menu_id), $list); 
              
        }       
    }    
    
}