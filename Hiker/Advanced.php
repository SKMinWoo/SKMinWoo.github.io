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

<div class="jumbotron text-center">
<h1>Reviews</h1>
</div>

<?php

require_once 'login.php';

$conn = new mysqli($hn, $un, $pw, $db);
if($conn->connect_error) die($conn->connect_error);

$query = 'Select * from reviews WHERE difficulty_ID=4';
$result = $conn->query($query);
if(!$result) die($conn->error);

$row_count = $result->num_rows;

for($j=0; $j<$row_count; ++$j){
	$result->data_seek($j);
	$row = $result->fetch_array(MYSQLI_NUM);

echo <<<_END
<div class="container">
			<img src="user1.png" alt="User" style="width:90px">
	<pre>

		User:
		$row[2]

		Rating:
		$row[3]/5

		Review:
		$row[4]
	<form method='GET' action='Delete-Review.php'>
		<input type='hidden' name='review_ID' value='$row[0]'>
		<a href='Delete-Review.php?review_ID=$review_ID'><input type='submit' value='Delete'></a>
	</form>
	</pre>
</div>
_END;
		
}

$result->close();
$conn->close();


?>


	</body>
</html>



