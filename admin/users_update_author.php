<?php  include('../config.php'); ?>
<?php include(ROOT_PATH . '/admin/includes/head_section.php'); ?>
<title>elwebman.io | Profile</title>
</head>

<body>
    <!-- Hero -->
    <div class="container is-fluid">
        <section class="hero is-primary">
            <!-- Hero head: will stick at the top -->
            <div class="hero-head">
                <!-- navbar -->
                <?php include( ROOT_PATH .'/admin/includes/navbar.php') ?>
                <!-- // navbar -->
            </div>
    </div>
    </nav>
    </div>
    <!-- Hero content: will be in the middle -->
    <div class="hero-body">
        <div class="container has-text-centered">
            <h1 class="title">
			User Profile
		</h1>
            <h2 class="subtitle">
			Read Only
		</h2>
        </div>
    </div>
    <!-- //Hero content: will be in the middle -->
    </section>
    </div>
    <!-- // Hero -->
    <div class="container is-fluid">
        <section class="section">
            <div class="columns container">
                <!-- Aside nav drawer -->
                <?php include( ROOT_PATH .'/admin/includes/aside_author.php') ?>
                <!-- //Aside nav drawer -->
                <div class="column is-hidden-mobile is-two-fifths">
                    <h1 class="title">Profile</h1>
                    <?php if (isset($_SESSION['user'])): ?>
                    <form method="post">
                        <div class="field ">
                            <label class="label ">Username</label>
                            <div class="control">
                                <input class="input" type="text" name="username" readonly value="Username: <?php echo $_SESSION['user']['username'] ?>" placeholder="Username">
                            </div>
                        </div>
                        <div class="field ">
                            <label class="label ">Email</label>
                            <div class="control">
                                <input class="input" type="email" name="email" readonly value="Email: <?php echo $_SESSION['user']['email'] ?>" placeholder="Email">
                            </div>
                        </div>
                        <div class="field ">
                            <label class="label ">Role</label>
                            <div class="control">
                                <input class="input" type="text" readonly value="Role: <?php echo $_SESSION['user']['role'] ?>">
                            </div>
                        </div>
                    </form>
                    <?php endif ?>
                </div>
            </div>
        </section>
    </div>
    <!-- Footer -->
    <?php include( ROOT_PATH .'/admin/includes/footer.php') ?>