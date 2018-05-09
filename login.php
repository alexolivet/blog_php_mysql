<?php error_reporting( -1 );
ini_set( "display_errors" , 1 );?>
<?php  include('config.php'); ?>
<?php  include(ROOT_PATH .'/includes/registration_login.php'); ?>
<?php  include(ROOT_PATH .'/includes/head_section.php'); ?>
<title>elwebman.io | Login</title>
</head>

<body>
    <!-- Hero -->
    <div class="container is-fluid">
        <section class="hero is-primary">
            <!-- Hero head: will stick at the top -->
            <div class="hero-head">
                <!-- navbar -->
                <?php include( ROOT_PATH .'/includes/navbar.php') ?>
                <!-- // navbar -->
            </div>
    </div>
    </nav>
    </div>
    <!-- // Hero head: will stick at the top -->
    <!--  Hero body -->
    <div class="hero-body has-background-white">
        <div class="columns has-text-centered">
            <div class="column is-4 is-offset-4">
                <h3 class="title has-text-grey">Login</h3>
                <p class="subtitle has-text-grey">Please login to proceed.</p>
                <div class="box">
                    <figure class="avatar">
                        <img src="https://placehold.it/128x128">
                    </figure>
                    <?php include(ROOT_PATH . '/includes/errors.php') ?>
                    <form method="post" action="login.php">
                        <div class="field">
                            <div class="control has-icons-left has-icons-right">
                                <input class="input is-success" type="text" name="username" value="<?php echo $username; ?>" placeholder="Username">
                                <span class="icon is-small is-left">
																	<i class="fas fa-user"></i>
																</span>
                            </div>
                        </div>
                        <div class="field">
                            <div class="control has-icons-left has-icons-right">
                                <input class="input is-danger" type="password" name="password" placeholder="Your Password">
                                <span class="icon is-small is-left">
																<i class="fas fa-key"></i>
																</span>
                            </div>
                        </div>
                        <button class="button is-block is-info is-large is-fullwidth" type="submit" name="login_btn">Login</button>
                    </form>
                </div>
                <p class="has-text-grey">
                    Not yet a member? <a href="register.php">Sign Up</a> &nbsp;·&nbsp;
                    <a href="../">Need Help?</a>
                </p>
            </div>
        </div>
    </div>
    </section>
    </div>
    <!-- // Hero -->
   <!-- Footer -->
       <?php include( ROOT_PATH .'/includes/footer.php') ?>