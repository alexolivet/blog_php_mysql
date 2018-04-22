<?php if (count($errors) > 0) : ?>
<div class="notification is-warning">
    <?php foreach ($errors as $error) : ?>
    <button class="delete"></button>
    <strong><?php echo $error ?></strong>
    <?php endforeach ?>
    <?php endif ?>