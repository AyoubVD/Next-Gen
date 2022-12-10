<?php
include_once '../include/users.php';

if($_POST){
    $email=$_POST["email"];
    $username=$_POST["username"];
    $password=$_POST["password"];
    $password2=$_POST["password2"];
    $agree=$_POST["agree"];
    if(register($username,$password,$password2,$email,$agree)){
        header('Location: ./index.php');
    }
}
?>
<!doctype html>
<html lang="en">
  <head>
  	<title>Sign Up 09</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<link rel="stylesheet" href="Css/signup.css">

	</head>
	<body class="img" style="background-image: url(images/bg.jpg);">
	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-6 text-center mb-5">
					<h2 class="heading-section">Let's become social</h2>
				</div>
			</div>
			<div class="row justify-content-center">
				<div class="col-md-7 col-lg-5">
					<div class="login-wrap">
		      	<h3 class="text-center mb-4">Create Your Account</h3>
						<form action="./signup.php" class="signup-form" method="post" id="demo-form">
		      		<div class="form-group mb-3">
		      			<label class="label" for="username">Username</label>
		      			<input type="text" class="form-control" placeholder="Friendly Neighborhood Spider-Man" name="username" id="username" required>
		      			<span class="icon fa fa-user-o"></span>
		      		</div>
		      		<div class="form-group mb-3">
		      			<label class="label" for="email">Email Address</label>
		      			<input type="text" class="form-control" placeholder="peterparker@spidey.com" name="email" id="email" required>
		      			<span class="icon fa fa-paper-plane-o"></span>
		      		</div>
	            <div class="form-group mb-3">
	            	<label class="label" for="password">Password</label>
	              <input id="password" type="password" class="form-control" placeholder="P@$$w0rd" name="password" id="password" required>
	              <span toggle="#password" class="fa fa-fw fa-eye field-icon toggle-password"></span>
	              <span class="icon fa fa-lock"></span>
	            </div>
	            <div class="form-group mb-3">
	            	<label class="label" for="password">Password</label>
	              <input id="password-confirm" type="password" class="form-control" placeholder="P@$$w0rd" name="password2" id="password2" required>
	              <span toggle="#password-confirm" class="fa fa-fw fa-eye field-icon toggle-password"></span>
	              <span class="icon fa fa-lock"></span>
	            </div>
                <div>
             <label for="agree">
                <input type="checkbox" name="agree" id="agree" value="yes"/> I agree
                with the
                <a href="#" title="term of services">term of services</a>
                
            </label> 
            
        </div>
	            <div class="form-group">
	            	<button type="submit" class="form-control btn btn-primary submit px-3">Sign Up</button>
	            </div>
	          </form>
	          <p>I'm already a member! <a href="./index.php">Sign In</a></p>
	        </div>
				</div>
			</div>
		</div>
	</section>

	<script src="Scripts/jquery.min.js"></script>
  <script src="Scripts/popper.js"></script>
  <script src="Scripts/bootstrap.min.js"></script>
  <script src="Scripts/main.js"></script>

	</body>
</html>