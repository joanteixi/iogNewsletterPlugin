<table id ="head" cellpadding="0" cellspacing="5" width="600" align="center" style="color: #fff;font-size:12px; line-height: 25px;border-collapse: separate; background-color: #008AC9;margin:0 auto">
  <tr>
    <td valign="bottom" >
      <?php echo image_tag("/iogNewsletterPlugin/templates/" . $newsletter->getTemplateName() . "/naturlens-es.png", array('absolute' => true)) ?>
    </td>

    <td valign="bottom">
      Boletín número <?php echo $newsletter->getNumero() ?>, <?php echo format_date($newsletter->getDataPublicacio(), 'MMMM yyyy', 'es_ES'); ?>
    </td>

    <td  valign="bottom">
      <?php echo image_tag("/iogNewsletterPlugin/templates/" . $newsletter->getTemplateName() . "/10anos.png", array('absolute' => true)) ?>
    </td>
  </tr>

</table>

<table id ="cos" cellpadding="0" cellspacing="5" width="600" align="center" style="font-size:12px; line-height: 25px;border-collapse: separate; background-color: #ffffff;margin:0 auto">

  <tr class="titol">
    <td>
      <div id="apartat_<?php echo $newsletter->getApartat('center')->getId() ?>" class="editable">
        <?php echo $newsletter->getApartat('center')->getRawValue(); ?>
      </div>
    </td>
  </tr>
</table>
