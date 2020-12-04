<?php  
	$conn= new mysqli("localhost","root","","arts_and_crafts_supply");

	//check connection
	if(!$conn){
		die("Connection failed: ".$conn-> connect_error);
	}
	//echo "I was here";
?>	