<?php
session_start();
include_once '../include/users.php';
include_once '../include/PathLogging.php';

if(isset($_SESSION['id'])){
	header('Location: ./FeedPlaceholder.php');
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>Login to I am social</title>
	<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">


	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"
		integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
	<link rel="stylesheet" href="./Css/login.css">

</head>

<body>
	<!-- partial:index.partial.html -->
	<div class="box-form">
		<div class="left">
			<div class="overlay">
				<h1>Hello fellow IMS user</h1>
				<p>“Distracted from distraction by distraction” <br>
					<a href="../easter.html" target="_blank" rel="noopener" style="text-decoration:none;">.</a>
					― T.S. Eliot </p>
				<span>
					<p>Your privacy is our concern!</p>
				</span>
			</div>
		</div>


		<div class="right">
			<h5>Login</h5>
			<p>Don't have an account? <a href="./signup.php">Create Your Account</a> it takes less than a minute</p>
			<form name="f1" method="POST" action="index.php">
				<div class="inputs">
					<input type="text" placeholder="user name" id="username" name="username" required>
					<br>
					<input type="password" placeholder="password" id="password" name="password" required>
					<?php
					if(!empty($_POST) == true){
						error_reporting(E_ERROR | E_PARSE);
						$username=$_POST["username"];
						$password=$_POST["password"];
					  
						$loggedin=login($username,$password);
						if($loggedin==null){
						  echo "Wrong username or password";
						}
						else{
						  $_SESSION["id"]=$loggedin["id"];
						  header('Location: ./FeedPlaceholder.php');
						}
					  }
					  ?>
				</div>

				<br><br>

				

				<br>
				<!-- <input type =  "submit" id = "btn" value = "Login" /> -->
				<button type="submit" id="btn">Login</button>
			</form>
		</div>

	</div>
	<!-- partial -->

</body>

</html>