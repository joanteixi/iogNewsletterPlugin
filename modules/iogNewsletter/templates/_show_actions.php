<h3>Opcions</h3>
<ul>
  <li>Plantilla emprada: <strong><?php echo $newsletter->getTemplateName() ?></strong></li>
  <li>Llista a la que s'envia: <strong><?php echo $newsletter->getLlistaName() ?></strong></li>
  <li>Canvia la llista -> <select id="change_llista">
      <?php foreach (iogNewsletterLlistaPeer::doSelect(new Criteria()) as $llista) : ?>
        <option <?php echo $llista->getId() == $newsletter->getIogNewsletterLlistaId() ? 'selected="selected"' : '' ?> value ="<?php echo $llista->getId() ?>"><?php echo $llista->getNom() ?></option>
      <?php endforeach ?>
      </select>

  </ul>

  <p><?php echo link_to('Tornar a la llista', '@newsletter', array('class' => 'button amb-marges suau')) ?></p>
<?php if (!$newsletter->isSended()) : ?>
          <p><?php echo link_to('Enviar newsletter >>>', 'iog_newsletter_send', $newsletter, array('id' => 'enviar', 'class' => 'button amb-marges')); ?></li>

<?php else : ?>
            <p><li><span class="avis">Aquest newsletter ja s'ha enviat però el pots tornar a enviar si cal</span><br/><?php echo link_to("Tornar a enviar", 'iog_newsletter_send', $newsletter, array('confirm' => 'Els newsletter es tornarà a enviar. Segur ho vols fer de nou?', 'class' => 'button amb-marges')); ?></p>

<?php endif ?>
            <form action="<?php echo url_for('@iog_newsletter_enviament_prova') ?>" method='POST'>
              <h3>Enviament de prova</h3>
              <p>Si vols pots enviar una prova a la direcció que ens indiquis: <input type="text" name="email_prova"  value="<?php echo $sf_user->getFlash('email_prova') ?>"/>
    <?php if ($sf_user->hasFlash('mail_error')) : ?>
              <span class="error vermell">Aquest email no és correcte.</span>
    <?php endif ?>
              <input type="hidden" name="newsletter_id" value="<?php echo $newsletter->getId() ?>" />
              <input type="submit" class="button" value="Enviar prova" />
          </form>
          <script type="text/javascript">
            notify =  {
              message : function(msg) {

                $('#message').fadeIn('normal').html(msg);
              },
              loading : function() {

                $('#message').fadeIn('normal').html('<img alt="loading" src="/images/icons/ajax-loader.gif" />');
                setTimeout(function() {
                  $('#message').fadeOut('normal');
                }, 5000)

              }

            }
            $('#change_llista').change(function() {
              notify.loading();
              $.post("<?php echo url_for('iogNewsletter/changeLlista') ?>", {"id" : "<?php echo $newsletter->getId() ?>", 'llista_id' : $(this).val()}, function(data) {
      notify.message("S'ha canviat la llista de l'enviament");
    })
  })




</script>