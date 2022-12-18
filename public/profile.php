<?php
error_reporting(E_ERROR | E_PARSE);
session_start();
include_once '../include/users.php';
if (empty($_SESSION)) {
    header('Location: ./index.php');
}
$admin=false;
if (isAdmin($_SESSION["id"]) == false) {
    header("Location: ./FeedPlaceHolder.php");
}else{
    $admin = isAdmin($_SESSION['id']);
}
if (isset($_GET["searchUser"])) {
    $users = fuzzySearch($_GET["searchUser"]);
} else {
    $users = fuzzySearch("");
}
if (isset($_GET["userid"])){
	$uid=filter_var( $_GET["userid"], FILTER_SANITIZE_NUMBER_INT);
	if ($uid == null) header('Location: ./index.php');
	$own=$_SESSION["id"] == $uid;
	$cUser=getUser($uid);
	if ($cUser == null)header('Location: ./index.php');
	if(isset($_POST["follow"])){
		if(isfollowing($_SESSION["id"], $uid)){
			unfollowUser($_SESSION["id"], $uid);
		} else {			
			followUser($_SESSION["id"], $uid);
		}
	}

}else {
	$cUser=getUser($_SESSION["id"]);
}

include_once '../include/users.php';
include_once '../include/feed.php';
include_once '../include/post.php';
include_once '../include/PathLogging.php';
$own=true;


if (empty($_SESSION)){
    header('Location: ./index.php');
}

if (isset($_GET["userid"])){
	$uid=filter_var( $_GET["userid"], FILTER_SANITIZE_NUMBER_INT);
	if ($uid == null) header('Location: ./index.php');
	$own=$_SESSION["id"] == $uid;
	$user=getUser($uid);
	if ($user == null)header('Location: ./index.php');
	if(isset($_POST["follow"])){
		if(isfollowing($_SESSION["id"], $uid)){
			unfollowUser($_SESSION["id"], $uid);
		} else {			
			followUser($_SESSION["id"], $uid);
		}
	}

}else {
	$user=getUser($_SESSION["id"]);
}

$posts=GetUserfeed($user["id"]);

?>
<!DOCTYPE html>
<html lang="en">

<head>
<link rel="stylesheet" href="./Css/profile.css">

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="noindex,nofollow">
    <title>Profile</title>
    <link rel="canonical" href="https://www.wrappixel.com/templates/adminpro-lite/" />
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="./assets/images/favicon.png">
    <!-- Bootstrap Core CSS -->
    <link href="./assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="css/admin.css" rel="stylesheet">
    <!-- You can change the theme colors from here -->
    <link href="css/colors/default-dark.css" id="theme" rel="stylesheet">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="./Css/acount.css">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body class="fix-header card-no-border fix-sidebar">
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="loader">
            <div class="loader__figure"></div>
            <p class="loader__label">user</p>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <header class="topbar">
            <nav class="navbar top-navbar navbar-expand-md navbar-light">
                <!-- ============================================================== -->
                <!-- Logo -->
                <!-- ============================================================== -->
                <div class="navbar-header">
                    <a class="navbar-brand" href="#">
                        <!-- Logo icon --><b>
                            <!-- <img src="./assets/images/logo-icon.png" alt="homepage" class="dark-logo" /> -->
                        </b>
                        <!--End Logo icon -->
                        <!-- Logo text -->
                        <span>
                            <?php echo $cUser['username']; ?>
                            <!-- <img src="./assets/images/logo-text.png" alt="homepage" class="dark-logo" /> -->
                        </span>
                    </a>
                </div>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <div class="navbar-collapse">
                    <!-- ============================================================== -->
                    <!-- toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav me-auto">
                        <!-- This is  -->
                        <li class="nav-item"> <a class="nav-link nav-toggler hidden-md-up waves-effect waves-dark"
                                href="javascript:void(0)"><i class="ti-menu"></i></a> </li>
                    </ul>
                    <!-- ============================================================== -->
                    <!-- User profile and search -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav my-lg-0">
                        <!-- ============================================================== -->
                        <!-- Search -->
                        <!-- ============================================================== -->
                        <li class="nav-item hidden-xs-down search-box"> <a
                                class="nav-link hidden-sm-down waves-effect waves-dark" href="javascript:void(0)"><i
                                    class="ti-search"></i></a>
                            <form class="app-search">
                                <input type="text" class="form-control" placeholder="Search & enter" name="searchUser"> <a
                                    class="srh-btn"><i class="ti-close"></i></a>
                            </form>
                        </li>
                        <?php
                        // function to search for a record in the database
                        
                        // get search term from searchUser
                        // $search_term = $_POST['searchUser'];

                        // $query = "SELECT * FROM table_name WHERE name = :search_term";

                        // $stmt = $pdo->prepare($query);
                        // $stmt->execute(array(':search_term' => $search_term));

                        // while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                        //     // process the retrieved records
                        // }
                        ?>
                        <!-- ============================================================== -->
                        <!-- Profile -->
                        <!-- ============================================================== -->
                        <!-- IMAGE SOFTCODEN -->
                        <li class="nav-item">
                            <a class="nav-link waves-effect waves-dark" href="profile.php"><img src="https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fi.pinimg.com%2F736x%2F04%2F90%2F37%2F0490378ab58d2a868b41ee37b91f2e81.jpg&f=1&nofb=1&ipt=5af84330168e9f2e079f3188ce30eb7b7144f59a476d84d5cac9db66acf416a6&ipo=images"
                                    alt="user" class="profile-pic" /></a>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <aside class="left-sidebar">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li> <a class="waves-effect waves-dark" href="account.php" aria-expanded="false"><i
                                    class="mdi mdi-gauge"></i><span class="hide-menu">Account</span></a></li>
                        <li> <a class="waves-effect waves-dark" href="./FollowFeed.php" aria-expanded="false"><i
                                    class="mdi mdi-account-check"></i><span class="hide-menu">Following feed</span></a></li>
                        <li> <a class="waves-effect waves-dark" href="FeedPlaceHolder.php" aria-expanded="false"><i
                                    class="mdi mdi-emoticon"></i><span class="hide-menu">Feed</span></a></li>
                        <li> <a class="waves-effect waves-dark" href="newNav.php" aria-expanded="false"><i
                                    class="mdi mdi-table"></i><span class="hide-menu">Search user</span></a></li>
                        <?php if($admin){ ?>
                        <li> <a class="waves-effect waves-dark" href="admin.php" aria-expanded="false"><i
                                    class="mdi mdi-pen"></i><span class="hide-menu">Admin</span></a></li>
                        <!-- <a class="nav-link" href="./admin.php"><i class="far fa-chart-bar"></i>Admin</a> -->
                        </li>
                        <?php } ?>
                    </ul>
                    <div class="text-center mt-4">
                        <a href="./logout.php" class="btn waves-effect waves-light btn-info hidden-md-down text-white">
                            Logout</a>
                    </div>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <div class="row page-titles">
                    <div class="col-md-5 align-self-center">
                        <h3 class="text-themecolor">Profile page</h3>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                
				<article class="cssui-usercard">
		<div class="cssui-usercard__body">
			<header class="cssui-usercard__header">
				<img src="https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fi.pinimg.com%2Foriginals%2Fbd%2Ff6%2Fbb%2Fbdf6bb3a42c7c27d7d83b9332d23ca1d.jpg&f=1&nofb=1&ipt=0949a9c68290a1d3e702acb75492b55ebdffb8e8d0017414ff8ee28e202c4879&ipo=images" class="cssui-usercard__avatar" alt="Avatar">
				<div class="cssui-usercard__header-info">
					<h3 class="cssui-usercard__name"><?php echo $user["username"] ?></h3>
				</div>
			</header>
				<?php if($own == false){ ?><form method="POST">
					<button value="a" name="follow"><?php echo isfollowing($_SESSION["id"], $_GET["userid"])? "Unfollow": "Follow" ?></button>
				</form><?php } ?>
			<div class="cssui-usercard__content">
				<div class="cssui-slider">

					<!-- the control elements of slider --

					<input id="slide1" type="radio" class="cssui-slider__switch cssui-usercard__switch" name="slider-controls" checked autofocus>
					<label for="slide1" class="cssui-slider__control cssui-usercard__control"></label>

					<div class="cssui-slider__slides">

						<!- first slide -->

						<div class="cssui-slider__slide">
							<h4 class="cssui-usercard__title">About me</h4>
							<div class="cssui-usercard__stats">
								<div class="cssui-stats cssui-usercard__stats-item">
									<i class="cssui-icon icon-earth"></i>
									<div class="cssui-stats__info cssui-usercard__stats-info">
										<span class="cssui-stats__name cssui-usercard__stats-name">Language</span>
										<span class="cssui-stats__value"><?php echo "English" ?></span>
									</div>
								</div>
								<div class="cssui-stats cssui-usercard__stats-item">
									<i class="cssui-icon icon-calendar"></i>
									<div class="cssui-stats__info cssui-usercard__stats-info">
										<span class="cssui-stats__name cssui-usercard__stats-name">Date of birth</span>
										<span class="cssui-stats__value">03 December 1990</span>
									</div>
								</div>
								<div class="cssui-stats cssui-usercard__stats-item">
									<i class="cssui-icon icon-email"></i>
									<div class="cssui-stats__info cssui-usercard__stats-info">
										<span class="cssui-stats__name cssui-usercard__stats-name">E-mail</span>
										<a href="#0" class="cssui-stats__value"><?php echo $user["mail"] ?></a>
									</div>
								</div>
								<div class="cssui-stats cssui-usercard__stats-item">
									<i class="cssui-icon icon-phone"></i>
									<div class="cssui-stats__info cssui-usercard__stats-info">
										<span class="cssui-stats__name cssui-usercard__stats-name">Phone</span>
										<a href="tel:79000000000" class="cssui-stats__value">7-900-000-00-00</a>
									</div>
									
								</div>
							</div>
						</div>

		

						<!-- third slide -->

						<div class="cssui-slider__slide">
							<h4 class="cssui-usercard__title">My Contacts</h4>
							<div class="cssui-usercard__stats">
								<div class="cssui-stats cssui-usercard__stats-item">
									<i class="cssui-icon icon-email"></i>
									<div class="cssui-stats__info cssui-usercard__stats-info">
										<span class="cssui-stats__name cssui-usercard__stats-name">E-mail</span>
										<a href="#0" class="cssui-stats__value"><?php echo $user["mail"] ?></a>
									</div>
								</div>
								<div class="cssui-stats cssui-usercard__stats-item">
									<i class="cssui-icon icon-phone"></i>
									<div class="cssui-stats__info cssui-usercard__stats-info">
										<span class="cssui-stats__name cssui-usercard__stats-name">Phone</span>
										<a href="tel:79000000000" class="cssui-stats__value">7-900-000-00-00</a>
									</div>
								</div>
								
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<footer class="cssui-usercard__footer">
			<a href="#0" class="cssui-social cssui-usercard__social">
				<i class="cssui-icon icon-twitter"></i>
				<span class="cssui-social__name">twitter</span>
			</a>
			<a href="#0" class="cssui-social cssui-usercard__social">
				<i class="cssui-icon icon-linkedin"></i>
				<span class="cssui-social__name">linkedin</span>
			</a>
			<a href="#0" class="cssui-social cssui-usercard__social">
				<i class="cssui-icon icon-codepen"></i>
				<span class="cssui-social__name">codepen</span>
			</a>
		</footer>
	</article>
	<div>
		<?php displayPosts($posts); ?>
	</div>
			</div>
		</div>
	</section>


	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
	<script src="Scripts/PreDelete.js"></script>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <footer class="footer"> © IMS <a href="./index.php">I Am Social</a> </footer>
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="./assets/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="./assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="js/perfect-scrollbar.jquery.min.js"></script>
    <!--Wave Effects -->
    <script src="js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="js/custom.min.js"></script>
</body>

</html>