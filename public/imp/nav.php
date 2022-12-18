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
                    <?php echo $user['username']; ?>
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
                <!--<li class="nav-item hidden-xs-down search-box"> <a
                        class="nav-link hidden-sm-down waves-effect waves-dark" href="javascript:void(0)"><i
                            class="ti-search"></i></a>
                    <form class="app-search">
                        <input type="text" class="form-control" placeholder="Search & enter" name="searchUser"> <a
                            class="srh-btn"><i class="ti-close"></i></a>
                    </form>
                </li>-->
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