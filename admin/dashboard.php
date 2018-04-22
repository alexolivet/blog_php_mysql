<?php include('../config.php'); ?>
<?php include(ROOT_PATH . '/admin/includes/head_section.php'); ?>
<?php  include(ROOT_PATH . '/admin/includes/dashboard_functions.php'); ?>
<!-- Get all admin posts from DB -->
<?php $rowcount = getAllPostsCount(); ?>
<?php $usersCount = getAdminUsersCount(); ?>
<?php $topicsCount = getAllTopicsCount(); ?>
<?php $unPublishedCounts = getAllPostsCountUnPublished(); ?>
<title>elwebman.io | Dashboard</title>
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
            Admin Dashboard
        </h1>
            <h2 class="subtitle">
            Manage everything
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
                <?php include( ROOT_PATH .'/admin/includes/aside.php') ?>
                <!-- //Aside nav drawer -->
                <section class="column">
                    <div class="tile is-ancestor">
                        <div class="tile is-vertical is-8">
                            <div class="tile">
                                <div class="tile is-parent is-vertical">
                                    <article class="tile is-child notification is-primary">
                                        <p class="title">Manage Posts...</p>
                                        <a href="posts.php">
                                            <p class="subtitle">There are
                                                <?php echo $rowcount; ?> Posts</p>
                                        </a>
                                    </article>
                                    <article class="tile is-child notification is-warning">
                                        <p class="title">Create Posts</p>
                                        <a href="create_post.php">
                                            <p class="subtitle">Admin Posts creation</p>
                                        </a>
                                    </article>
                                </div>
                                <div class="tile is-parent">
                                    <article class="tile is-child notification is-info">
                                        <p class="title">Manage Users</p>
                                        <a href="users.php">
                                            <p class="subtitle">There are
                                                <?php echo $usersCount; ?> Users in total</p>
                                        </a>
                                    </article>
                                </div>
                            </div>
                            <div class="tile is-parent">
                                <article class="tile is-child notification is-danger">
                                    <p class="title">Manage Topics</p>
                                    <a href="topics.php">
                                        <p class="subtitle">There are
                                            <?php echo $topicsCount; ?> Topics</p>
                                    </a>
                                    <div class="content">
                                        <!-- Content -->
                                    </div>
                                </article>
                            </div>
                        </div>
                        <div class="tile is-parent">
                            <article class="tile is-child notification is-success">
                                <div class="content">
                                    <p class="title">Posts Status</p>
                                    <a href="posts.php">
                                        <p class="subtitle">There are
                                            <?php echo $unPublishedCounts; ?> unpublished posts.</p>
                                    </a>
                                    <div class="content">
                                        <!-- Content -->
                                    </div>
                                </div>
                            </article>
                        </div>
                    </div>
                </section>
            </div>
        </section>
    </div>
    <!-- Footer -->
    <?php include( ROOT_PATH .'/admin/includes/footer.php') ?>