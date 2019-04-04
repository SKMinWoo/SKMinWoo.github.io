<!DOCTYPE html>

<html lang="en">
<head>
  <!-- Theme Made By www.w3schools.com -->
  <title>Bootstrap Theme Company Page</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="style.css"> 
  <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="60">

<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="#myPage"><a href="project-base.php"><img src="Hiker_Text.svg" height=50px width=100px></a></a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-right">
        <li(<?php echo ucfirst($_SESSION['email']['role_ID']); ?>)</i> <br>
			<a href="index.php?logout='1'" style="color: white;">LOGOUT</a></li>
      </ul>
    </div>
  </div>
</nav>
		<div class="background-text"><br><br><br><br>
		Hello! Enter your Review Below:<br>
		<hr class="linebr2">
		<form method ='post'>
			Difficulty:  
			<input type='text' name='difficulty_ID' placeholder='Value out of 5' required> <br>
			Rating:  
			<input type='text' name='rating' placeholder='Value out of 5' required> <br>
			Type your Review Here:<br>
			<textarea rows="4" cols="50" name="review_text" placeholder="Enter text here..."></textarea><br>

			<input type='submit' value='Submit'>
		</div>
		
		</form>
	</body>
</html>
<?php

session_start();

$email = $_SESSION['email'];

require_once 'login.php';

$conn = new mysqli($hn, $un, $pw, $db);
if($conn->connect_error) die($conn->connect_error);

if(isset($_POST['difficulty_ID'])){

	$difficulty_ID = $_POST['difficulty_ID'];
	$rating = $_POST['rating'];
	$review_text = $_POST['review_text'];

	$query = "INSERT into reviews (review_ID, difficulty_ID, email, rating, review_text)
	values (DEFAULT, '$difficulty_ID', '$email', '$rating', '$review_text')";

	
	$result = $conn->query($query);
 	if(!$result) die($conn->error);


	 header("Location: Difficulty-Selection.php");

}

?>