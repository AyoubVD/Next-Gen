<?php
session_start();
	if (empty($_SESSION)){
		header('Location: ./index.php');
	}
	include_once '../include/users.php';
	include_once '../include/feed.php';
	include_once '../include/post.php';
	include_once '../include/PathLogging.php';

	if(isset($_POST["update"])){
		$firstname=$_POST["firstname"];
		$lastname=$_POST["lastname"];
		$bio=$_POST["bio"];
		$userid=$_SESSION["id"];
		$company=$_POST["company"];
		$designation=$_POST["designation"];

		updateInfo($firstname, $lastname, $bio, $company, $designation, $userid);
	}
	if(isset($_POST["password"])){
		$oldpassword=$_POST["oldpass"];
		$newpassword=$_POST["newpass"];
		$newpassword2=$_POST["newpass2"];
		$userid=$_SESSION["id"];
		updatePassword($userid, $oldpassword, $newpassword, $newpassword2);
	}
	?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Account Settings UI Design</title>
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="./Css/acount.css">
</head>
	<?php
	include './navbar.php';

	if (empty($_SESSION)){
		header('Location: ./index.php');
	}
	
	if (isset($_GET["userid"])){
		$own=$_SESSION["id"] == $_GET["userid"];
		$user=getUser($_GET["userid"]);
		if(isset($_POST["follow"])){
			followUser($_SESSION["id"], $_GET["userid"]);
		}
	}else {
		$user=getUser($_SESSION["id"]);
	}
	


	?>
<body>
	<section class="py-5 my-5">
		<div class="container">
			<h1 class="mb-5">Account Settings</h1>
			<div class="bg-white shadow rounded-lg d-block d-sm-flex">
				<div class="profile-tab-nav border-right">
					<div class="p-4">
						<div class="img-circle text-center mb-3">
							<img src="https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fi.pinimg.com%2F736x%2F04%2F90%2F37%2F0490378ab58d2a868b41ee37b91f2e81.jpg&f=1&nofb=1&ipt=5af84330168e9f2e079f3188ce30eb7b7144f59a476d84d5cac9db66acf416a6&ipo=images" alt="Image" class="shadow">
						</div>
						<h4 class="text-center">Avatar Aang</h4>
					</div>
					<div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
						<a class="nav-link active" id="account-tab" data-toggle="pill" href="#account" role="tab" aria-controls="account" aria-selected="true">
							<i class="fa fa-home text-center mr-1"></i> 
							Account
						</a>
						<a class="nav-link" id="password-tab" data-toggle="pill" href="#password" role="tab" aria-controls="password" aria-selected="false">
							<i class="fa fa-key text-center mr-1"></i> 
							Password
						</a>
						<a class="nav-link" id="application-tab" data-toggle="pill" href="#application" role="tab" aria-controls="application" aria-selected="false">
							<i class="fa fa-tv text-center mr-1"></i> 
							Following
						</a>
					</div>
				</div>
				<div class="tab-content p-4 p-md-5" id="v-pills-tabContent">
					<div class="tab-pane fade show active" id="account" role="tabpanel" aria-labelledby="account-tab">
						<h3 class="mb-4">Account Settings</h3>
						<form method="POST">
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
								  	<label>First Name</label>
								  	<input type="text" name="firstname"class="form-control" value=<?php echo $user["firstname"] ?>>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
								  	<label>Last Name</label>
								  	<input type="text"name="lastname" class="form-control" value=<?php echo $user["lastname"] ?>>
								</div>
							</div>

							<div class="col-md-6">
								<div class="form-group">
								  	<label>Company</label>
								  	<input type="text" name ="company"class="form-control" value=<?php echo $user["company"] ?>>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
								  	<label>Designation</label>
								  	<input type="text" name="designation" class="form-control" value=<?php echo $user["designation"] ?>>
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group">
								  	<label>Bio</label>
									<input type="text" name="bio" value =" <?php echo $user["bio"]; ?>" class="form-control" rows="4"  name="bio"></input>
								</div>
							</div>
						</div>
						<div>
							<button name="update"class="btn btn-primary" value="u ma">Update</button>
							
							<button name="cancel"class="btn btn-light">Cancel</button>
						</div>
						</form>
							<div class="account-deletion">
								
								<label>Click here to permanently remove your account</label>
							</div>
						<div>
							<a  class = "btn btn-delete" href="./deleteUser.php">Delete</a>
						</div>
					</div>
					<div class="tab-pane fade" id="password" role="tabpanel" aria-labelledby="password-tab">
						<h3 class="mb-4">Password Settings</h3>
						<form method="POST">
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label >Old password</label>
										<input name="oldpass" type="password" class="form-control">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label>New password</label>
										<input name="newpass"type="password" class="form-control">
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label>Confirm new password</label>
										<input name="newpass2"type="password" class="form-control">
									</div>
								</div>
							</div>
							<div>
								<button name="password" value="a" class="btn btn-primary">Update</button>
								
								<button class="btn btn-light">Cancel</button>
							</div>
						</form>
					</div>

					<div class="tab-pane fade" id="application" role="tabpanel" aria-labelledby="application-tab">
						<h3 class="mb-4">Application Settings</h3>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<div class="form-check">
										<input class="form-check-input" type="checkbox" value="" id="app-check">
										<label class="form-check-label" for="app-check">
										App check
										</label>
									</div>
									<div class="form-check">
										<input class="form-check-input" type="checkbox" value="" id="defaultCheck2" >
										<label class="form-check-label" for="defaultCheck2">
										Lorem ipsum dolor sit.
										</label>
									</div>
								</div>
							</div>
						</div>
						<div>
							<button class="btn btn-primary">Update</button>
							<button class="btn btn-light">Cancel</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>


	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
	<script src="Scripts/PreDelete.js"></script>
</body>
</html>