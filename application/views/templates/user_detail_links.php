<style>
    
#userDetail ul {
	list-style: none;
	padding:0;
	margin:0px 0px 10px 0px;
}


#userDetail #selected {
	padding-bottom: 1px; 
	background: white;
}

#userDetail li {
	float: left;
	margin: 0px 5px 10px 0px;
        display: inline;
}

#userDetail #selected {
	position: relative;
	top: 1px;
	background: white;
}
#userDetail ul li a {
    padding: 10px;
    text-decoration: none;
    background-color: #6fa5e2; color: #000;
   
}
#userDetail ul li a:hover {
    color: red;
    padding: 10px;
    text-decoration: underline;
}
#userDetail ul li h3{
    margin: 20px 0px 0px 0px; padding: 0px;
}
</style>
<div id='content'>
    <div id="userDetail">
        
        <ul>
            <li><h3><a href="<?php echo base_url()."index.php/view/user" ?>">Personal Details</a></h3></li>
            <li><h3><a href="<?php echo base_url()."index.php/view/transactiondetails" ?>">Transaction Details</a></h3></li>
	
</ul>
        <div class="clear"></div>  
        