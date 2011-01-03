<?php use_helper('Newsletter', 'Date', 'sfAsset'); ?>
<?php use_stylesheet('/iogNewsletterPlugin/css/newsletter.css'); ?>
<?php use_stylesheet('/iogNewsletterPlugin/css/ckeditorHelp.css'); ?>
<div id="message"style="display:none">

</div>
<?php if ($sf_user->hasFlash('notice-error')) : ?>
  <div class="notice-error"><?php echo $sf_user->getFlash('notice-error'); ?></div>
<?php endif ?>
  
  <div id="newsletter">
    <h2>Assumpte del mail: <?php echo $newsletter->getTitular() ?></h2>
  <?php include_partial('iogNewsletterTemplate/' . $newsletter->getTemplateName(), array('newsletter' => $newsletter)); ?>
</div>
<div class="caixa rounded newsletter_actions">
  <?php include_partial('show_actions', array('newsletter' => $newsletter, 'templates' => $templates)); ?>
</div>

  <div class="newsletter_actions caixa rounded">
    <?php include_partial('ckEditorHelp');?>
  </div>

<?php // Activació de l'editor. ?>

<?php use_javascript('/js/ckeditor/ckeditor.js'); ?>
<?php use_javascript('/js/ckeditor/adapters/jquery.js'); ?>
<?php use_javascript('/js/jquery-ui-1.8.dialog.min.js'); ?>
<?php use_javascript('/sfAssetsLibraryPlugin/js/main.js'); ?>
<?php use_stylesheet('/js/ui-lightness/jquery-ui-1.8.custom.css'); ?>
  <input type="hidden" id="numero" value="<?php echo $newsletter->getNumero() ?>" />
  <script type="text/javascript">
    var edit
    $('.editable').dblclick(function(){
      // elimina alguna instancia creada
      if (edit) edit.destroy();
      // crea instància ckeditor
      edit = CKEDITOR.replace(this, {
        customConfig : '/newsletter/js/ckeditor/basic_config.js',
        filebrowserBrowseUrl : '<?php echo url_for('sfAsset/list?popup=4') ?>',
        ajaxsave_url:'<?php echo url_for('@iog_newsletter_ajaxsave') ?>',
        ajaxsave_url_param_id: $(this).attr('id')
      });
    })
  </script>


  <script type="text/javascript">
    $(document).ready(function() {

      //NOTIFICATIONS
<?php if ($sf_user->hasFlash('notice')) : ?>
           notify.message('<?php echo $sf_user->getFlash('notice') ?>');
<?php endif ?>

    //IMAGE EDITABLE
    $(function (){
      $('.image_editable').dblclick(function() {

        window.open('<?php echo url_for("sfAsset/list?popup=5") ?>',
        'sf_library',
        'width=600,height=400,scrollbars=yes, resizable=yes'
      );
        $.data(document.body, 'callerField', $(this).attr('id'));
        //prevent the browser to follow the link
        return false;
      });
    });

    });

    function setImage(src)
    {
    //recollir el id del camp. Està guardat amb $.data() al obrir la finestra
    id = $.data(document.body,'callerField');
    //Afegir la imatge. Cal posar al davant el root_dir per tal que al enviar per mail s'envïi la ruta sencera.
    $('#'+id).attr('src','<?php echo sfConfig::get("SF_ROOT_DIR") ?>'+src);

    //graba la imatge per AJAX
    $.post("<?php echo url_for('iogNewsletter/actualitzarFotos') ?>", {
      'tag' : id,
      'id_newsletter' : '<?php echo $newsletter->getId() ?>',
  'url_image' : src
}, function(r){
  //alert(r);//callback function aJAX

})
}
</script>
