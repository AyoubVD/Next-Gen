<?php
include_once '../include/users.php';

$admin = isAdmin($_SESSION["id"]);
?>

<aside class="left-sidebar">
<!-- Sidebar scroll-->
<div class="scroll-sidebar">
    <!-- Sidebar navigation-->
    <nav class="sidebar-nav">
        <ul id="sidebarnav">
            <li> <a class="waves-effect waves-dark" href="FeedPlaceHolder.php" aria-expanded="false"><i
                        class="mdi mdi-emoticon"></i><span class="hide-menu">Feed</span></a></li>
            <li> <a class="waves-effect waves-dark" href="./FollowFeed.php" aria-expanded="false"><i
                        class="mdi mdi-account-check"></i><span class="hide-menu">Following feed</span></a></li>
            <li> <a class="waves-effect waves-dark" href="account.php" aria-expanded="false"><i
                        class="mdi mdi-gauge"></i><span class="hide-menu">Account</span></a></li>
            <!--<li> <a class="waves-effect waves-dark" href="newNav.php" aria-expanded="false"><i
                        class="mdi mdi-table"></i><span class="hide-menu">Search user</span></a></li>-->
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