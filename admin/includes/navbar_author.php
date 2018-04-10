<div class="header">
	<div class="logo">
			<h1>LifeBlog - Author</h1>
	</div>
	<?php if (isset($_SESSION['user'])): ?>
        <div class="user-info">
            <span><?php echo $_SESSION['user']['username'] ?></span> -
            <a href="<?php echo BASE_URL . '/logout.php'; ?>" class="logout-btn">logout</a>
        </div>
        <?php endif ?>
</div>