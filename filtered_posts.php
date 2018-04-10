<?php error_reporting( -1 );
ini_set( "display_errors" , 1 );?>
<?php include('config.php'); ?>
<?php include('includes/public_functions.php'); ?>
<?php include('includes/head_section.php'); ?>
<?php 
    // Get posts under a particular topic
if (isset($_GET['topic'])) {
    $topic_id = $_GET['topic'];
    $posts = getPublishedPostsByTopic($topic_id);
    $topics = getAllTopics();
}
?>
<title>LifeBlog | Home </title>
</head>

<body>
    <div class="container">
        <!-- Navbar -->
        <?php include( ROOT_PATH . '/includes/navbar.php'); ?>
        <!-- // Navbar -->
        <!-- content -->
        <div class="content">
            <h2 class="content-title">
                Articles on <u><?php echo getTopicNameById($topic_id); ?></u>
            </h2>
            <hr>
            <?php foreach ($posts as $post): ?>
            <div class="post" style="margin-left: 0px;">
                <img src="<?php echo BASE_URL . '/static/images/' . $post['image'] ?>" class="post_image" alt="">
                <a href="single_post.php?post-slug=<?php echo $post['slug']; ?>">
                    <div class="post_info">
                        <h3><?php echo $post['title']; ?></h3>
                        <div class="info">
                            <span><?php echo date("F j, Y ", strtotime($post["created_at"])); ?></span>
                            <span class="read_more">Read more...</span>
                        </div>
                    </div>
                </a>
            </div>
            <?php endforeach ?>
            <!-- post sidebar -->
            <div class="post-sidebar">
                <div class="card">
                    <div class="card-header">
                        <h2>Topics</h2>
                    </div>
                    <div class="card-content">
                        <?php foreach ($topics as $topic): ?>
                        <a href="<?php echo BASE_URL . 'filtered_posts.php?topic=' . $topic['id'] ?>">
                            <?php echo $topic['name']; ?>
                        </a>
                        <?php endforeach ?>
                    </div>
                </div>
            </div>
            <!-- // post sidebar -->
        </div>
        <!-- // content -->
    </div>
    <!-- // container -->
    <!-- Footer -->
    <?php include( ROOT_PATH . '/includes/footer.php'); ?>
    <!-- // Footer -->