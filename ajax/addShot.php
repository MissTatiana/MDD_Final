<?php 
/*
 * Tatiana Kerick
 * Camera Man - Shot List Manager
 * Add a shot to the list in the database
*/

if(isset($_GET['shot_num'])) {
	$shot_num = $_GET['shot_num'];
	$shot_type = $_GET['shot_type'];
	$location = $_GET['location'];
	$movement = $_GET['movement'];
	$equipment = $_GET['equipment'];
	$description = $_GET['description'];
	$details = $_GET['details'];
	$status = "0";


	$query = mysql_query("INSERT INTO shotList(status, shot_num, shot_type, location, movement, equipment, description, details)
			 			  VALUES ('$shot_num', '$shot_type', '$location', '$movement', '$equipment', 'description', 'details')")
						  or die(mysql_error());

}

?>