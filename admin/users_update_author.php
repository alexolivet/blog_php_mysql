<?php  include('../config.php'); ?>
<?php include(ROOT_PATH . '/admin/includes/head_section.php'); ?>
<title>Author | Manage Profile</title>
</head>

<body>
    <!-- admin navbar -->
    <?php include(ROOT_PATH . '/admin/includes/navbar_author.php') ?>
    <div class="container content">
        <!-- Left side menu -->
        <?php include(ROOT_PATH . '/admin/includes/menu_author.php') ?>
        <!-- Middle form - to create and edit  -->
        <div class="action">
            <h1 class="page-title">Profile</h1>
            <?php if (isset($_SESSION['user'])): ?>
            <form method="post">
                <input type="text" name="username" disabled value="Username: <?php echo $_SESSION['user']['username'] ?>" placeholder="Username">
                <input type="email" name="email" disabled value="Email: <?php echo $_SESSION['user']['email'] ?>" placeholder="Email">
                <input type="text" disabled value="Role: <?php echo $_SESSION['user']['role'] ?>">
            </form>
            <?php endif ?>
        </div>
        <!-- // Middle form - to create and edit -->
    </div>
</body>

</html>