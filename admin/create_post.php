<?php  include('../config.php'); ?>
<?php  include(ROOT_PATH . '/admin/includes/admin_functions.php'); ?>
<?php  include(ROOT_PATH . '/admin/includes/post_functions.php'); ?>
<?php include(ROOT_PATH . '/admin/includes/head_section.php'); ?>
<!-- Get all topics -->
<?php $topics = getAllTopics(); ?>
<title>elwebman.io | Create Post Admin</title>
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
			Create / Edit  Posts
		</h1>
            <h2 class="subtitle">
			Create - Edit Posts - Admin
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
                <div class="column is-centered">
                    
                    <!-- validation errors for the form -->
                     <?php include(ROOT_PATH . '/includes/errors.php') ?>
                     <!-- form start -->
                    <form method="post" enctype="multipart/form-data" action="<?php echo BASE_URL . 'admin/create_post.php'; ?>">
                        <!-- if editing post, the id is required to identify that post -->
                        <?php if ($isEditingPost === true): ?>
                        <input type="hidden" name="post_id" value="<?php echo $post_id; ?>">
                        <?php endif ?>
                        <div class="field">
                            <label class="label">Title</label>
                            <div class="control">
                                <input class="input" type="text" name="title" id="postTitleInput" data-charcount-maxlength="70" value="<?php echo $title; ?>" placeholder="Title">
                            </div>
                        </div>
                        <div class="field">
                            <label class="label">Current Image</label>
                            <div class="control has-icons-left has-icons-right">
                                <input class="input" type="text" name="featured_image" readonly value="<?php echo $featured_image; ?>" placeholder="No image to display">
                               
                            </div>
                        </div>
                        <div class="field">
                            <label class="label">Add / Edit Image</label>
                            <div class="control has-icons-left has-icons-right">
                                <input class="input is-danger" type="file" name="featured_image">
                               
                            </div>
                        </div>
                        <div class="field">
                            <label class="label">Message</label>
                            <div class="control">
                                <textarea class="textarea" placeholder="Textarea" data-limit-rows="true" wrap="hard" name="body" id="body" cols="20" rows="1">
                                    <?php echo $body; ?>
                                </textarea>
                            </div>
                        </div>
                        <div class="field">
                            <label class="label">Topics</label>
                            <div class="control">
                                <div class="select">
                                    <select name="topic_id">
                                        <option value="<?php echo $topic_name; ?>" selected>
                                            <?php echo $topic_name; ?> - Edit topic</option>
                                        <?php foreach ($topics as $topic): ?>
                                        <option value="<?php echo $topic['id']; ?>">
                                            <?php echo $topic['name']; ?>
                                        </option>
                                        <?php endforeach ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="field">
                            <div class="control">
                                <!-- Only admin users can view publish input field -->
                                <?php if ($_SESSION['user']['role'] == "Admin"): ?>
                                <!-- display checkbox according to whether post has been published or not -->
                                <?php if ($published == true): ?>
                                <label for="unpublish">
                                    unpublish?
                                    <input class="checkbox" type="checkbox" value="1" name="unpublish">
                                </label>
                                <?php else: ?>
                                <label for="publish">
                                    publish?
                                    <input class="checkbox" type="checkbox" value="1" name="publish">
                                </label>
                                <?php endif ?>
                                <?php endif ?>
                            </div>
                        </div>
                        <div class="field is-grouped">
                            <div class="control">
                                <?php if ($isEditingPost === true): ?>
                                <!-- if editing post, display the update button instead of create button -->
                                <button type="submit" disabled class="button is-link myButton" name="update_post">UPDATE</button>
                                <?php else: ?>
                                <button type="submit" disabled class="button is-link myButton" name="create_post">SAVE POST</button>
                                <?php endif ?>
                            </div>
                            <div class="control">
                                <button class="button is-text">Cancel</button>
                            </div>
                        </div>
                    </form>
                    <!-- //form end -->
                </div>
            </div>
        </section>
    </div>
    <!-- Footer -->
    <?php include( ROOT_PATH .'/admin/includes/footer.php') ?>
    <script>
    CKEDITOR.replace('body');
    </script>