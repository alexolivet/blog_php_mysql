<?php  include('config.php'); ?>
<?php  include('includes/public_functions.php'); ?>
<?php 
if (isset($_GET['post-slug'])) {
    $post = getPost($_GET['post-slug']);
}
$topics = getAllTopics();
?>
<?php include('includes/head_section.php'); ?>
<title>
    <?php echo $post['title'] ?> | Elwebman Wiki</title>
</head>

<body>
    <!-- Hero -->
    <div class="container is-fluid">
        <section class="hero is-primary is-medium">
            <!-- Hero head: will stick at the top -->
            <div class="hero-head">
                <!-- navbar -->
                <?php include( ROOT_PATH .'/includes/navbar.php') ?>
                <!-- // navbar -->
            </div>
        </div>
    </nav>
</div>
<!-- Hero content: will be in the middle -->
<div class="hero-body is-marginless is-paddingless">
    <br>
      <div class="container has-text-centered is-fluid">
        <div class="columns is-vcentered">
          <div class="column is-5">
            <figure class="image is-4by3">
             <img src="<?php echo BASE_URL . '/static/images/' . $post['image']; ?>" class="post_image" alt="">
            </figure>
          </div>
          <div class="column is-6 is-offset-1">
             <?php if ($post['published'] == false): ?>
            <h1 class="title is-2">
               Sorry... This post has not been published
            </h1>
             <?php else: ?>
            <h1 class="title is-2">
              <?php echo $post['title']; ?>
            </h1>
            <h2 class="subtitle is-4">
              <?php if (isset($post['topic']['name'])): ?>
                      Category :  <?php echo $post['topic']['name'] ?>
                <?php endif ?>
            </h2>
            <br>
          </div>
        </div>
      </div>
      <br>
    </div>
<!-- Hero footer: will stick at the bottom -->
</section>
</div>
<!-- Post -->
<section class="section">
    <div class="container is-fluid">
        <div class="columns is-mobile is-centered">
            <div class="column is-four-fifths">
                <article class="notification">
                    <?php if (isset($post['topic']['name'])): ?>
                    <a class="post__category" href="<?php echo BASE_URL . 'topics_author.php?topic=' . $post['topic']['id'] ?>" class="post__category" href="">
                        <?php echo $post['topic']['name'] ?>
                    </a>
                <?php endif ?>
<!--                 <figure class="image is-16by9">
                  <img src="<?php echo BASE_URL . '/static/images/' . $post['image']; ?>" class="post_image" alt="">
                </figure> -->
                <p class="post__title"><?php echo $post['title']; ?></p>
               <p><?php echo html_entity_decode($post['body']); ?></p>
            <?php endif ?>
        </article>
    </div>
</div>
</div>
</section>
<!-- // Post -->
<!-- Footer -->
       <?php include( ROOT_PATH .'/includes/footer.php') ?>