<div class="caixa rounded">
<h3>Missatges pendents de ser enviats: <?php echo $nb_emails ?></h3>
<?php if ($nb_emails) : ?>
<ul class="sf_admin_actions">
<li class="sf_admin_action_send">
  <?php echo link_to('Enviar ARA la els missatges preparats','iog_newsletter/sendPreparedEmails')?></li>

</ul>
<?php endif ?>
</div>
