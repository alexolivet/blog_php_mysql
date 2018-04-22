<?php error_reporting( -1 );
ini_set( "display_errors" , 1 );?>
<?php  include('../config.php'); ?>
<?php  include(ROOT_PATH . '/admin/includes/admin_functions.php'); ?>
<?php  include(ROOT_PATH . '/admin/includes/post_functions.php'); ?>
<?php include(ROOT_PATH . '/admin/includes/head_section.php'); ?>
<!-- Get all admin posts from DB -->
<?php $posts = getAllPosts(); ?>
<title>elwebman.io | Manage Posts Admin</title>
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
            Manage Posts
        </h1>
            <h2 class="subtitle">
            Edit - Delete - Publish Posts
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
                    <?php include(ROOT_PATH . '/includes/messages.php') ?>
                    <?php if (empty($posts)): ?>
                    <h1>No posts in the database.</h1>
                    <?php else: ?>
                    <table class="table is-bordered is-hoverable">
                        <thead>
                            <tr class="is-selected">
                                <th>
                                    <abbr>N</abbr>
                                </th>
                                <th>
                                    <abbr>Author</abbr>
                                </th>
                                <th>
                                    <abbr>Title</abbr>
                                </th>
                                <th>
                                    <abbr>Views</abbr>
                                </th>
                                <!-- Only Admin can publish/unpublish post -->
                                <?php if ($_SESSION['user']['role'] == "Admin"): ?>
                                <th>
                                    <abbr>Publish</abbr>
                                </th>
                                <?php endif ?>
                                <th>
                                    <abbr>Edit</abbr>
                                </th>
                                <th>
                                    <abbr>Delete</abbr>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($posts as $key => $post): ?>
                            <tr>
                                <td>
                                    <?php echo $key + 1; ?>
                                </td>
                                <td>
                                    <?php echo $post['author']; ?>
                                </td>
                                <td>
                                    <a target="_blank" href="<?php echo BASE_URL . 'single_post.php?post-slug=' . $post['slug'] ?>">
                                        <?php echo $post['title']; ?>
                                    </a>
                                </td>
                                <td>
                                    <?php echo $post['views']; ?>
                                </td>
                                <!-- Only Admin can publish/unpublish post -->
                                <?php if ($_SESSION['user']['role'] == "Admin" ): ?>
                                <td>
                                    <?php if ($post['published'] == true): ?>
                                    <a href="posts.php?unpublish=<?php echo $post['id'] ?>">
                                        <span class="icon">
                                            <i class="fas fa-lg fa-check-circle has-text-primary">
                                                
                                            </i>
                                        </span>
                                    </a>
                                    <?php else: ?>
                                    <a href="posts.php?publish=<?php echo $post['id'] ?>">
                                    <span class="icon">
                                        <i class="fas fa-lg fa-times-circle has-text-danger">  
                                        </i>
                                    </span>
                                </a>
                                    <?php endif ?>
                                </td>
                                <?php endif ?>
                                <td>
                                    <a href="create_post.php?edit-post=<?php echo $post['id'] ?>">
                            <span class="icon">
                                <i class="fas fa-lg fa-pencil-alt"> 
                                </i>
                            </span>
                        </a>
                                </td>
                                <td>
                                    <a href="create_post.php?delete-post=<?php echo $post['id'] ?>">
                            <span class="icon">
                                <i class="fas fa-lg fa-trash-alt">   
                                </i>
                            </span>
                        </a>
                                </td>
                            </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                    <?php endif ?>
                </section>
            </div>
        </section>
    </div>
    <!-- Footer -->
    <?php include( ROOT_PATH .'/admin/includes/footer.php') ?>