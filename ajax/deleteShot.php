<?php 
/*
 * Tatiana Kerick
 * Camera Man - Shot List Manager
 * Delete a shot from the list in the database
*/

require_once 'db.php';

if(isset($_GET['shot_id'])) {
	$shot_id = $_GET['shot_id'];

	$query = mysql_query("delete from shotList where shot_id='$shot_id'")
			 or die(mysql_error());

	while($obj = mysql_fetch_object($query)) {
		$arr[] = $obj;
	}
	$json_response = json_encode($arr);
}

?>