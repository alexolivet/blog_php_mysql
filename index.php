<?php error_reporting( -1 );
ini_set( "display_errors" , 1 );?>
<?php require_once('config.php') ?>
<!-- config.php should be here as the first include  -->
<?php require_once( ROOT_PATH . '/includes/public_functions.php') ?>
<?php require_once( ROOT_PATH . '/includes/registration_login.php') ?>
<!-- Retrieve all posts from database  -->
<?php $posts = getPublishedPosts(); ?>
<?php require_once( ROOT_PATH .'/includes/head_section.php') ?>
<title>elwebman.io | Home</title>
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
<div class="hero-body">
	<div class="container has-text-centered">
		<h1 class="title">
			Title
		</h1>
		<h2 class="subtitle">
			Subtitle
		</h2>
	</div>
</div>
<!-- //Hero content: will be in the middle -->
<!-- Hero footer: will stick at the bottom -->
<div class="hero-foot">
	<nav class="tabs">
		<div class="container">
			<ul>
				<li class="is-active"><a>Overview</a></li>
				<li><a>Modifiers</a></li>
				<li><a>Grid</a></li>
				<li><a>Elements</a></li>
				<li><a>Components</a></li>
				<li><a>Layout</a></li>
			</ul>
		</div>
	</nav>
</div>
<!-- //Hero footer: will stick at the bottom -->
</section>
</div>
<!-- // Hero -->
<!-- Post -->
<section class="section">
	<div class="container">
		<div class="columns is-mobile is-multiline is-centered">
			<?php foreach ($posts as $post): ?>
			<div class="column is-half-desktop is-half-tablet is-three-quarters-mobile post">
				<article class="notification">
					<?php if (isset($post['topic']['name'])): ?>
					<a href="<?php echo BASE_URL . 'topics_author.php?topic=' . $post['topic']['id'] ?>" class="post__category" href="">
						<?php echo $post['topic']['name'] ?>
					</a>
				<?php endif ?>
				<figure class="image is-16by9">
					<img src="<?php echo BASE_URL . '/static/images/' . $post['image']; ?>" class="post_image" alt="">
				</figure>

				<p class="post__title"><?php echo $post['title'] ?></p>
				Posted on <span><?php echo date("F j, Y ", strtotime($post["created_at"])); ?></span>
				
				<a class="post__permalink" href="single_post.php?post-slug=<?php echo $post['slug']; ?>">Read more...</a>
			</article>
		</div>
	<?php endforeach ?>
</div>
</div>
</section>
<!-- // Post -->
<!-- Footer -->
       <?php include( ROOT_PATH .'/includes/footer.php') ?>