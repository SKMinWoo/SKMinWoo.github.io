<html>
	<head></head>
	
	<body>
		<form method='post' action='continue2.php'>
		<table>
			<tr>
				<td>Username: </td>
				<td><input type='text' name='username'></td>
			</tr>
			<tr>
				<td>Password: </td>
				<td><input type='password' name='password'></td>
			</tr>
			<tr>
				<td><input type='submit' value='Login'></td>
				<td></td>
			</tr>
		</table>
		</form>
	</body>

</html>

<?php

require_once 'dbinfo.php';
require_once 'User.php';

$conn = new mysqli($hn, $un, $pw, $db);
if($conn->connect_error) die($conn->connect_error);

if(isset($_POST['username']) && (isset($_POST['password'])) ){
	
	$username = sanitizeMySQL($conn, $_POST['username']);
	$password = sanitizeMySQL($conn, $_POST['password']);
	
	if($username!='' && $password!=''){
		//echo 'valid login<br>';
		validLogin($username, $password);
	}else{
		invalidLogin();
	}
	
}else{
	invalidLogin();
}

function invalidLogin(){
	echo 'invalid login<br>';
}

function validLogin($username, $password){
	global $conn;
	
	$salt1 = 'qm&h*';
	$salt2 = 'pg!@';

	$token = hash('ripemd128', $salt1.$password.$salt2);
	echo $token;
	
	$query = "select password from users where username='$username' ";
	$result = $conn->query($query);
	if(!$result) die($conn->error);

	$row_count = $result->num_rows;

	for($j=0; $j<$row_count; ++$j){
		$result->data_seek($j);
		$row = $result->fetch_array(MYSQLI_ASSOC);
		$dbpassword = $row['password'];	
		
		if($dbpassword == $token){			
			
			$user = new User($username);
			
			session_start();
			$_SESSION['user'] = $user;
			$_SESSION['password'] = $password;
			
			echo 'valid login';
			
			header("Location: continue2.php");
			
		}else{
			invalidLogin();
		}
		
	}
	
}

function sanitizeString($var)
{
    $var = stripslashes($var);
    $var = strip_tags($var);
    $var = htmlentities($var);
    return $var;
}

function sanitizeMySQL($connection, $var)
{
	$var = sanitizeString($var);
	$var = $connection->real_escape_string($var);
	return $var;
}


?>
