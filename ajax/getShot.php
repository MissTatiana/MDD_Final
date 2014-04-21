<?php 
/*
 * Tatiana Kerick
 * Camera Man - Shot List Manager
 * Retreive the list of shots from the database
*/

require_once 'db.php';

$status = '%';

if(isset($_GET['status'])) {
	$status = $_GET['status'];
}

$query = mysql_query("select * from shotList")
		 or die(mysql_error());

//Collect the results
while($obj = mysql_fetch_object($query)) {
	$arr[] = $obj;
}

//JSON encode the response
echo $json_response = json_encode($arr);

?>