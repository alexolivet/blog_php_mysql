<?php  include('../config.php'); ?>
<?php  include(ROOT_PATH . '/admin/includes/admin_functions.php'); ?>
<?php include(ROOT_PATH . '/admin/includes/head_section.php'); ?>
<!-- Get all topics from DB -->
<?php $topics = getAllTopics(); ?>
<title>elwebman.io | Manage Topics</title>
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
			Manage Topics Admin
		</h1>
            <h2 class="subtitle">
			Edit - Delete  Topics 
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
                <div class="column is-hidden-mobile">
                    <h1 class="title">Edit / Create Topics</h1>
                     <!-- validation errors for the form -->
                        <?php include(ROOT_PATH . '/includes/errors.php') ?>
                    <form method="post" action="<?php echo BASE_URL . 'admin/topics.php'; ?>">
                        <!-- if editing topic, the id is required to identify that topic -->
                        <?php if ($isEditingTopic === true): ?>
                        <input type="hidden" name="topic_id" value="<?php echo $topic_id; ?>">
                        <?php endif ?>
                        <div class="field">
                            <label class="label">Topics</label>
                            <div class="control">
                                <input class="input" type="text" name="topic_name" value="<?php echo $topic_name; ?>" placeholder="Topic">
                            </div>
                        </div>
                        <!-- if editing topic, display the update button instead of create button -->
                        <div class="field is-grouped">
                            <div class="control">
                                <?php if ($isEditingTopic === true): ?>
                                <button type="submit" disabled class="button is-link myButton" name="update_topic">UPDATE</button>
                                <?php else: ?>
                                <button type="submit" disabled class="button is-link myButton" name="create_topic">Save Topic</button>
                                <?php endif ?>
                            </div>
                            <div class="control">
                                <button class="button is-text">Cancel</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="column">
                    <!-- Display notification message -->
                    <?php include(ROOT_PATH . '/includes/messages.php') ?>
                    <?php if (empty($topics)): ?>
                    <h1>No topics in the database.</h1>
                    <?php else: ?>
                    <table class="table is-bordered is-hoverable is-fullwidth">
                        <thead>
                            <tr class="is-selected">
                                <th>
                                    <abbr>N</abbr>
                                </th>
                                <th>
                                    <abbr>Topic Name</abbr>
                                </th>
                                <th colspan="2" class="has-text-centered">
                                    <abbr>action</abbr>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($topics as $key => $topic): ?>
                            <tr>
                                <td>
                                    <?php echo $key + 1; ?>
                                </td>
                                <td>
                                    <?php echo $topic['name']; ?>
                                </td>
                                <td>
                                    <a href="topics.php?edit-topic=<?php echo $topic['id'] ?>">
                                		<span class="icon">
                                			<i class="fas fa-pencil-alt">
                                			</i>
                                		</span>
                                	</a>
                                </td>
                                <td>
                                    <a href="topics.php?delete-topic=<?php echo $topic['id'] ?>">
                                		<span class="icon">
                                			<i class="fas fa-trash-alt">	
                                			</i>
                                		</span>
                                	</a>
                                </td>
                            </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                    <?php endif ?>
                </div>
            </div>
        </section>
    </div>
    <!-- Footer -->
    <?php include( ROOT_PATH .'/admin/includes/footer.php') ?>