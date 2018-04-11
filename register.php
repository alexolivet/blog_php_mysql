<?php error_reporting( -1 );
ini_set( "display_errors" , 1 );?>
<?php  include('config.php'); ?>
<!-- Source code for handling registration and login -->
<?php include(ROOT_PATH .'/includes/registration_login.php'); ?>
<?php include(ROOT_PATH .'/includes/head_section.php'); ?>
<title>Elwebman Wiki | Sign up </title>
</head>

<body>
    <div class="container">
        <!-- Navbar -->
        <?php include( ROOT_PATH . '/includes/navbar.php'); ?>
        <!-- // Navbar -->
        <div style="width: 40%; margin: 20px auto;">
            <form method="post" action="register.php">
                <h2>Register on LifeBlog</h2>
                <?php include(ROOT_PATH . '/includes/errors.php') ?>
                <input type="text" name="username" value="<?php echo $username; ?>" placeholder="username">
                <input type="email" name="email" value="<?php echo $email ?>" placeholder="email">
                <input type="password" name="password_1" placeholder="password">
                <input type="password" name="password_2" placeholder="password confirmation">
                <button type="submit" class="btn" name="reg_user">Register</button>
                <p>
                    Already a member? <a href="login.php">Sign in</a>
                </p>
            </form>
        </div>
    </div>
    <!-- // container -->
    <!-- Footer -->
    <?php include( ROOT_PATH . '/includes/footer.php'); ?>
    <!-- // Footer -->