
<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Login to I am social</title>
  <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">


<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous"><link rel="stylesheet" href="./public/Css/login.css">

</head>
<body>
<!-- partial:index.partial.html -->
<div class="box-form">
	<div class="left">
		<div class="overlay">
		<h1>Hello fellow IMS user</h1>
		<p>“Distracted from distraction by distraction” <br>
			<a href="easter.html" target="_blank" rel="noopener" style="text-decoration:none;">.</a>
			― T.S. Eliot </p>
		<span>
			<p>Your privacy is our concern!</p>
		</span>
		</div>
	</div>
	
	
		<div class="right">
		<h5>Login</h5>
		<p>Don't have an account? <a href="./public/signup.php">Create Your Account</a> it takes less than a minute</p>
		<form name="f1" method="POST" action="index.php" >  
		<div class="inputs">
			<input type="text" placeholder="user name" id ="username" name  = "username" required>
			<br>
			<input type="password" placeholder="password" id ="password" name  = "password" required>
		</div>
			
			<br><br>
			
		<div class="remember-me--forget-password">
				<!-- Angular -->
	<label>
		<input type="checkbox" name="item" checked/>
		<span class="text-checkbox">Remember me</span>
	</label>
			<p>forget password?</p>
		</div>
			
			<br>
            <!-- <input type =  "submit" id = "btn" value = "Login" /> -->
			<button type =  "submit" id = "btn">Login</button>
            </form>
	</div>
	
</div>
<!-- partial -->
  
</body>
</html>
