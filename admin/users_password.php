<?php  include('../config.php'); ?>
<?php  include(ROOT_PATH . '/admin/includes/admin_functions.php'); ?>
<?php 
    // Get all admin users from DB
$admins = getAdminUsers();
$roles = ['Admin', 'Author'];               
?>
<?php include(ROOT_PATH . '/admin/includes/head_section.php'); ?>
<title>Admin | Manage users</title>
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
			Edit User Password
		</h1>
            <h2 class="subtitle">
			Update Password
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
                    <h1 class="title">Edit User Password</h1>
                    <form method="post" action="<?php echo BASE_URL . 'admin/users_password.php'; ?>">
                        <!-- validation errors for the form -->
                        <?php include(ROOT_PATH . '/includes/errors.php') ?>
                        <!-- if editing user, the id is required to identify that user -->
                        <?php if ($isEditingUser === true): ?>
                        <input type="hidden" name="admin_id" value="<?php echo $admin_id; ?>">
                        <?php endif ?>
                        <div class="field">
                            <label class="label">Username</label>
                            <div class="control">
                                <input class="input" disabled type="text" name="username" value="<?php echo $username; ?>" placeholder="Username">
                            </div>
                        </div>
                        <div class="field">
                            <label class="label">Password</label>
                            <div class="control ">
                                <input class="input" type="password" name="password" placeholder="Password">
                            </div>
                        </div>
                        <div class="field">
                            <label class="label">Password Confirmation</label>
                            <div class="control ">
                                <input class="input" type="password" name="passwordConfirmation" placeholder="Password confirmation">
                            </div>
                        </div>
                        <div class="field is-grouped">
                            <div class="control">
                                <!-- if editing user, display the update button instead of create button -->
                                <?php if ($isEditingUser === true): ?>
                                <button type="submit" disabled class="button is-link myButton" name="update_admin_password">UPDATE PASSWORD</button>
                                <?php else: ?>
                                <button type="submit" disabled class="button is-link myButton" name="create_admin">Save User</button>
                                <?php endif ?>
                            </div>
                            <div class="control">
                                <button class="button is-text">Cancel</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="column">
                    <?php include(ROOT_PATH . '/includes/messages.php') ?>
                    <?php if (empty($admins)): ?>
                    <h1>No admins in the database.</h1>
                    <?php else: ?>
                    <table class="table is-bordered is-hoverable is-fullwidth">
                        <thead>
                            <tr class="is-selected">
                                <th>
                                    <abbr>N</abbr>
                                </th>
                                <th>
                                    <abbr>User and email</abbr>
                                </th>
                                <th>
                                    <abbr>role</abbr>
                                </th>
                                <th colspan="3" class="has-text-centered">
                                    <abbr>action</abbr>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($admins as $key => $admin): ?>
                            <tr>
                                <td>
                                    <?php echo $key + 1; ?>
                                </td>
                                <td>
                                    <?php echo $admin['username']; ?>, &nbsp;
                                    <?php echo $admin['email']; ?>
                                </td>
                                <td>
                                    <?php echo $admin['role']; ?>
                                </td>
                                <td>
                                    <a href="users_update.php?edit-admin=<?php echo $admin['id'] ?>">333
					</a>
                                </td>
                                <td>
                                    <a href="users_password.php?edit-admin=<?php echo $admin['id'] ?>">333
					</a>
                                </td>
                                <td>
                                    <a href="users.php?delete-admin=<?php echo $admin['id'] ?>">333
					</a>
                                </td>
                            </tr>
                        </tbody>
                        <?php endforeach ?>
                    </table>
                    <?php endif ?>
                </div>
            </div>
        </section>
    </div>
    <!-- Footer -->
    <?php include( ROOT_PATH .'/admin/includes/footer.php') ?>