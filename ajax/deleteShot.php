<?php 
/*
 * Tatiana Kerick
 * PocketAD - Shot List Manager
 * Delete a shot from the list in the database
*/

$shot_id = $_GET['shot_id'];



if(isset($_GET['shot_id'])) {
	$shot_id = $_GET['shot_id'];

	$db = new PDO("mysql:host=localhost; dbname=CameraMan", "root", "root");

	$query = "delete from shotList where shot_id='$shot_id'";

	while($obj = mysql_fetch_object($query)) {
		$arr[] = $obj;
	}
	
	$json_response = json_encode($arr);
}

?>