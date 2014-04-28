<?php 
/*
 * Tatiana Kerick
 * PocketAD - Shot List Manager
 * Retreive the list of shots from the database
*/

ini_set( "display_errors", 1 );
error_reporting( -1);

$db = new PDO("mysql:host=localhost; dbname=CameraMan", "root", "root");

$query = "select * from shotList order by shot_num asc";

$st = $db->prepare($query);
$st->execute();

$shots = $st->fetchAll();

//Json encode the reponse
echo $json_response = json_encode($shots)

?>