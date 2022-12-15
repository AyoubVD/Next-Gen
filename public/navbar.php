<?php
include_once '../include/users.php';

$admin = isAdmin($_SESSION['id']);
?>

<link rel="stylesheet" href="./Css/navbar.css">
<script src="./Scripts/navbar.js"></script>

<nav class="navbar navbar-expand-custom navbar-mainbg">
    <a class="navbar-brand navbar-logo" href="./FeedPlaceHolder.php"></a>
    <button class="navbar-toggler" type="button" aria-controls="navbarSupportedContent" aria-expanded="false"
        aria-label="Toggle navigation">
        <i class="fas fa-bars text-white"></i>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto">
            <div class="hori-selector">
                <div class="left"></div>
                <div class="right"></div>
            </div>
            <!--<li class="nav-item active">
                <a class="nav-link" href="javascript:void(0);"><i class="far fa-chart-bar"></i>Charts</a>
            </li>

            <li class="nav-item active">
                <a class="nav-link" href="javascript:void(0);"><i class="far fa-chart-bar"></i>Charts</a>
            </li>

            <li class="nav-item active">
                <a class="nav-link" href="javascript:void(0);"><i class="far fa-chart-bar"></i>Charts</a>
            </li>

            <li class="nav-item active">
                <a class="nav-link" href="javascript:void(0);"><i class="far fa-chart-bar"></i>Charts</a>
            </li>
-->
    
        <?php if($admin){ ?>
            <li class="nav-item">
                <a class="nav-link" href="./admin.php"><i class="far fa-chart-bar"></i>Admin</a>
            </li>
            <?php } ?>
            <li class="nav-item">
                <a class="nav-link" href="./FollowFeed.php"><i class="far fa-chart-bar"></i>FollowFeed</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="./account.php"><i class="fas fa-tachometer-alt"></i>Account</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="./FeedPlaceHolder.php"><i class="far fa-address-book"></i>Feed</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="./profile.php"><i class="far fa-clone"></i>Profile</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="./logout.php"><i class="far fa-calendar-alt"></i>Logout</a>
            </li>
        </ul>
    </div>
</nav>