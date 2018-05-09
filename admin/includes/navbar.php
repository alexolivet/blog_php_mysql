<nav class="navbar">
  <div class="container">
    <div class="navbar-brand">
      <a class="navbar-item" href="../">
        <img src="../static/images/elwebman_logo.png" alt="Logo">
      </a>
      <span class="navbar-burger burger" data-target="navbarMenu">
        <span></span>
        <span></span>
        <span></span>
      </span>
    </div>
    <div id="navbarMenu" class="navbar-menu">
      <div class="navbar-end">
        <span class="navbar-item">
          <a class="button is-white is-outlined" href="http://elwebman.io/blog/">
            <span class="icon">
              <i class="fas fa-lg fa-home"></i>
            </span>
            <span>Home</span>
          </a>
        </span>
        <span class="navbar-item">
          <a class="button is-white is-outlined" href="../topics_author.php">
            <span class="icon">
              <i class="fas fa-lg fa-bookmark"></i>
            </span>
            <span>Topics</span>
          </a>
        </span>
        <span class="navbar-item">
          <a class="button is-white is-outlined" href="https://github.com/alexolivet">
            <span class="icon">
              <i class="fab fa-lg fa-github"></i>
            </span>
            <span>About</span>
          </a>
        </span>
        <?php if (isset($_SESSION['user']['username'])) { ?>
        <!-- user dropdown -->
        <div class="navbar-item has-drophas-background-primarydown is-hoverable">
          <a class="navbar-link button is-white is-outlined">
            welcome <?php echo $_SESSION['user']['username'] ?>
          </a>
          <div class="navbar-dropdown has-background-primary">
            <?php if ($_SESSION['user']['role'] == "Admin" ): ?>
            <a href="./dashboard.php" class="navbar-item">
              Dashboard
            </a>
            <a href="./create_post.php" class="navbar-item">
              Create post
            </a>
          <?php endif ?>
          <?php if ($_SESSION['user']['role'] == "Author" ): ?>
          <a href="./create_post_author.php" class="navbar-item">
            Create post
          </a>
           <a href="./posts_author.php" class="navbar-item">
            Manage Post
          </a>
          <a href="./users_update_author.php" class="navbar-item">
            Profile
          </a>
         
        <?php endif ?>
        <hr class="navbar-divider">
        <a href="../logout.php" class="navbar-item">
          Logout
        </a>
      </div>
    </div>
    <!-- //user dropdown -->
    <?php }else{ ?>
    <span class="navbar-item">
      <a href="../register.php" class="button is-white is-outlined">
        <span class="icon">
          <i class="fas fa-lg fa-hand-pointer"></i>
        </span>
        <span>Join Us!</span>
      </a>
    </span>
    <span class="navbar-item">
      <a href="../login.php" class="button is-white is-outlined">
        <span class="icon">
          <i class="fas fa-lg fa-sign-in-alt"></i>
        </span>
        <span>Login</span>
      </a>
    </span>
    <?php } ?>