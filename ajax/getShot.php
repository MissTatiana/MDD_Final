<?php 
/*
 * Tatiana Kerick
 * Camera Man - Shot List Manager
 * Retreive the list of shots from the database
*/

$db = new PDO("mysql:host=localhost; dbname=CameraMan", "root", "root");

 $query = "select * from shotList order by shot_num asc";

// $st = $db->prepare($query)
// $st->execute();

// $shots = $st->fetchAll();

// echo $shots;


// $status = '%';

// if(isset($_GET['status'])) {
// 	$status = $_GET['status'];
// }

//Collect the results
// while($obj = $st->fetchAll()) {
// 	$arr[] = $obj;
// }

// //JSON encode the response
// echo $json_response = json_encode($arr);

?>