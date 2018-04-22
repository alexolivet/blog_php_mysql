<?php error_reporting( -1 );
ini_set( "display_errors" , 1 );?>
<?php  include('config.php'); ?>
<?php  include('includes/public_functions.php'); ?>
<?php $topics = getAllTopics();?>
<?php $posts = getPublishedPosts(); ?>
<?php include('includes/head_section.php'); ?>
<?php 
    // Get posts under a particular topic
if (isset($_GET['topic'])) {
    $topic_id = $_GET['topic'];
    $posts = getPublishedPostsByTopic($topic_id);
    $topics = getAllTopics();
}
?>
<title>
    Topics | Elwebman Wiki</title>
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
    <div class="hero-body">
        <div class="container has-text-centered">
            <div class="box">
                <div class="columns is-mobile is-centered">
                    <div class="field is-grouped is-grouped-multiline">
                        <?php foreach ($topics as $topic): ?>
                        <a class="control" href="<?php echo BASE_URL . 'topics_author.php?topic=' . $topic['id'] ?>">
                         <span class="tag is-link is-large"> <?php echo $topic['name']; ?></span></a>
                     </a>
                 <?php endforeach ?>
             </div>
         </div>
     </div>
 </div>
</div>
</section>
</div>
<section class="container">
    <br>
    <!-- Post -->
    <section class="section">
        <div class="container">
            <div class="columns is-mobile is-multiline is-centered">
                <?php foreach ($posts as $post): ?>
                <div class="column is-half-desktop is-half-tablet is-three-quarters-mobile post">
                    <article class="notification">
                        <?php if (isset($post['topic']['name'])): ?>
                        <a class="post__category" href="<?php echo BASE_URL . 'topics_author.php?topic=' . $post['topic']['id'] ?>" class="btn category">
                            <?php echo $post['topic']['name'] ?>
                        </a>
                    <?php endif ?>
                    <figure class="image is-16by9">
                        <img src="<?php echo BASE_URL . '/static/images/' . $post['image']; ?>" class="post_image" alt="">
                    </figure>
                    <p class="post__title">
                        <?php echo $post['title'] ?>
                    </p>
                    <p class="subtitle">Created on
                        <?php echo date("F j, Y ", strtotime($post["created_at"])); ?>
                    </p>
                    <a href="single_post.php?post-slug=<?php echo $post['slug']; ?>" class="post__permalink" href="">Learn more</a>
                </article>
            </div>
        <?php endforeach ?>
    </div>
</div>
</section>
<!-- // Post -->
<br>
</section>
<!-- Footer -->
       <?php include( ROOT_PATH .'/includes/footer.php') ?>