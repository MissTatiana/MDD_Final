<?php 
/*
 * Tatiana Kerick
 * Camera Man - Shot List Manager
 * Update the status of a shot
*/

require_once 'db.php';

if(isset($_GET['shot_id'])) {
	$status = $_GET['status'];
	$shot_id = $_GET['shot_id'];

	$query = mysql_query("update shotList set status='$status' where id='$shot_id'")
			 or die(mysql_error());

	while($obj = mysql_fetch_object($query)) {
		$arr[] = $obj; 
	}
	$json_response = json_encode($arr);
}


?>