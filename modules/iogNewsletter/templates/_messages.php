<?php if ($sf_user->hasFlash('notice')) : ?>
<div class="notice">
  <h2><?php echo $sf_user->getFlash('notice'); ?></h2>
</div>
<?php endif ?>
