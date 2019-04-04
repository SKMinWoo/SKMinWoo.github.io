<?php

require_once 'login.php';

$conn = new mysqli($hn, $un, $pw, $db);
if($conn->connect_error) die($conn->connect_error);

session_start();
$review_ID = $_SESSION['review_ID'];

if(isset($_GET['review_ID'])){
	
	$review_id=$_GET['review_ID'];
	
	$query="delete from reviews where review_ID='$review_id' ";
	$conn->query($query);
	if(!$conn) die($conn->error);
	
	header("Location: Difficulty-Selection.php");
}








?>



