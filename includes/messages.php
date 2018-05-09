<?php if (isset($_SESSION['message'])) : ?>
<div class="notification is-warning remove_alert">
	<button type="button" class="delete"></button>
    <p>
        <?php 
          	echo $_SESSION['message']; 
          	unset($_SESSION['message']);
          ?>
    </p>
</div>
<?php endif ?>