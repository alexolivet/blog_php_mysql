<?php error_reporting( -1 );
ini_set( "display_errors" , 1 );?>
<?php  include('config.php'); ?>
<!-- Source code for handling registration and login -->
<?php include(ROOT_PATH .'/includes/registration_login.php'); ?>
<?php include(ROOT_PATH .'/includes/head_section.php'); ?>
<title>elwebman.io| Sign Up</title>
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
    <!-- // Hero head -->
    <!--  Hero body -->
    <div class="hero-body has-background-white">
        <div class="columns has-text-centered">
            <div class="column is-4 is-offset-4">
                <h3 class="title has-text-grey">Sign up</h3>
                <p class="subtitle has-text-grey">Please register to proceed.</p>
                <div class="box">
                    <figure class="avatar">
                        <img src="https://placehold.it/128x128">
                    </figure>
                    <form method="post" action="register.php">
                        <?php include(ROOT_PATH . '/includes/errors.php') ?>
                        <div class="field">
                            <div class="control has-icons-left has-icons-right">
                                <input class="input is-success" type="text" name="username" value="<?php echo $username; ?>" placeholder="username">
                                <span class="icon is-small is-left">
								<i class="fas fa-user"></i>
							</span>
                            </div>
                        </div>
                        <div class="field">
                            <div class="control has-icons-left has-icons-right">
                                <input class="input is-danger" type="email" name="email" value="<?php echo $email ?>" placeholder="email">
                                <span class="icon is-small is-left">
								<i class="fas fa-envelope"></i>
							</span>
                            </div>
                        </div>
                        <div class="field">
                            <div class="control has-icons-left has-icons-right">
                                <input class="input is-danger" type="password" name="password_1" placeholder="password">
                                <span class="icon is-small is-left">
								<i class="fas fa-key"></i>
							</span>
                            </div>
                        </div>
                        <div class="field">
                            <div class="control has-icons-left has-icons-right">
                                <input class="input is-danger" type="password" name="password_2" placeholder="password confirmation">
                                <span class="icon is-small is-left">
								<i class="fas fa-key"></i>
							</span>
                            </div>
                        </div>
                        <button type="submit" name="reg_user" class="button is-block is-info is-large is-fullwidth">Sign Up</button>
                    </form>
                </div>
                <p class="has-text-grey">
                    Already a member? <a href="login.php">Sign In</a> &nbsp;·&nbsp;
                    <a href="../">Need Help?</a>
                </p>
            </div>
        </div>
    </div>
    </section>
    </div>
    <!-- Footer -->
       <?php include( ROOT_PATH .'/includes/footer.php') ?>