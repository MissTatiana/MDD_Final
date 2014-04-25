<?php 
/*
 * Tatiana Kerick
 * Camera Man - Shot List Manager
 * Add a shot to the list in the database
*/

require_once: 'db.php'

if(isset($_GET['shot'])) {
	$shot_num = $_GET['shot_num'];
	$shot_type = $_GET['shot_type'];
	$movement = $_GET['movement'];
	$description = $_GET['description'];
	$status = "0";

	$query = mysql_query("INSERT INTO shotList(shot_num, shot_type, movement, description, status)
						  VALUES('$shot_num', '$shot_type', '$movement', '$description', '$status')")
						  or die(mysql_error());				
	
}

?>