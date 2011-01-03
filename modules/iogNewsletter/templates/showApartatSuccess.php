<?php  use_stylesheet('/iogNewsletterPlugin/css/newsletter.css');?>
<?php use_helper('Date');?>
<div id="newsletter_content">

    <div class='top'><p><?php echo format_date($newsletter->getDataPublicacio(),'MMMM yyyy','ca_ES');?></p></div>
    <div class='header'>
        <?php echo image_tag("/media/newsletter/impacte.png")?>
        <?php echo image_tag("/media/newsletter/abril2010/foto_portada_content.jpg",'width=322 height=167');?>
    </div>
    <div class="content">
        
            <h1><?php echo image_tag('/media/newsletter/'.$sf_params->get('apartat').'.png');?></h1>
        <div class="editable" id="<?php echo $sf_params->get('apartat');?>" >
        <?php echo $content->getDescription() ?>
        </div>
       
    </div>
    <div class="footer"> <p><?php echo link_to('<< Tornar','iog_newsletter_show',$newsletter);?></p></div>

</div>

<?php if($sf_user->isAuthenticated()) : ?>
<?php use_javascript('ckeditor/ckeditor.js'); ?>
<?php use_javascript('ckeditor/adapters/jquery.js'); ?>
<input type="hidden" id="numero" value="<?php echo $sf_params->get('numero')?>" />

<!-- aquest camp el fa servir el plugin ajax save per enviar el camp que cal grabar -->
<input type="hidden" id="field" value="full" />

<script type="text/javascript">
    var edit;
    $('.editable').dblclick(function(){
        // elimina alguna instancia creada
        if (edit) edit.destroy();
        // crea instància ckeditor
        edit = CKEDITOR.replace(this, {   customConfig : '/js/ckeditor/basic_config.js',
            filebrowserBrowseUrl : '<?php echo url_for('sfAsset/list?popup=4')?>'
        });
    });
</script>
<?php endif ?>