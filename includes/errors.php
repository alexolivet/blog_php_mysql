<?php if (count($errors) > 0) : ?>
<div class="notification is-danger remove_alert">
    <?php foreach ($errors as $error) : ?>
    <button type="button" class="delete"></button>
    <p><strong><?php echo $error ?> - </strong></p>
    <?php endforeach ?>
    </div>
    <?php endif ?>
