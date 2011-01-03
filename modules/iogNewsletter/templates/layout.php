<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
  <head>
    <?php include_http_metas() ?>
    <?php include_metas() ?>
    <title>
      <?php if (include_slot('title')
        );echo __("Gestió de newsletters") ?>
    </title>

    <!--    <link rel="shortcut icon" href="/favicon.ico" />-->
    <?php include_stylesheets() ?>
<?php include_javascripts() ?>
    </head>
    <body>
      <div id="wrapper">
        <div id="head" class="rounded">
          <h1>Gestió newsletter</h1>
          <ul id="navigator">
            <li><?php echo link_to('Panell de control','@newsletter',array('class' => 'rounded'));?></li>
            <li><?php echo link_to('Llistes', '@iog_newsletter_emails',array('class' => 'rounded'));?></li>
            <li><?php echo link_to('Mediateca', 'sfAsset/list',array('class' => 'rounded'));?></li>
          </ul>
        </div>

        <div id="content">


<?php echo $sf_content ?>
      </div>
      <div id="footer">
        <div class="footer_nav">
          <ul>
            <li><?php echo link_to('inici', '@homepage') ?></li>
            <li>|</li>
            <li><?php echo mail_to("info@laiogurtera.com") ?></li>
            <li>|</li>

          </ul>


        </div>


      </div>
        <div class="clear"></div>
    </div>

  </body>

</html>
