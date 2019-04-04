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
        <li(<?php echo ucfirst($_SESSION['user']['user_type']); ?>)</i> <br>
			<a href="index.php?logout='1'" style="color: white;">LOGOUT</a></li>
      </ul>
    </div>
  </div>
</nav>

		<div class="background-text"><br><br><br><br>
		Hello! Enter your payment information below :<br>
		<hr class="linebr2">
		<form method ='post'>
			Card number:
			<input type='text' name='card_number'> <br>
			Address:  
			<input type='text' name='address'> <br>
			State: 
			<input type='text' name='state'> <br>
			Zip code: 
			<input type='text' name='zip_code'> <br>
			Cardholder name : 
			<input type='text' name='name'> <br>
            
            Expiration date : 
            <input type='text' name='exp_date' placeholder = "0000-00-00"> <br>
            
            Security code: 
            <input type='text' name='csv'> <br>
            


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



if(isset($_POST['card_number'])){

	$cardn =$_POST['card_number'];
	$add =$_POST['address'];
	$state =$_POST['state'];
	$zip =$_POST['zip_code'];
    $cname =$_POST['name'];
    $exp =$_POST['exp_date'];
    $csv =$_POST['csv'];




	$paym = "INSERT into card (email, card_number, address, state, zip, cardholder_name, expiration_date, csv)
	values ('$email', '$cardn', '$add', '$state', '$zip', '$cname', '$exp', '$csv')";

	
	$result = $conn->query($paym);
 	if(!$result) die($conn->error);


	 header("Location: paycon.php");

}



?>