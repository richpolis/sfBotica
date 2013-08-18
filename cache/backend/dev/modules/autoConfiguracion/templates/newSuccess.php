<?php use_helper('I18N', 'Date') ?>
<?php include_partial('configuracion/assets') ?>

<div id="sf_admin_container">
  <h1><?php echo __('Nuevo registro', array(), 'messages') ?></h1>

  <?php include_partial('configuracion/flashes') ?>

  <div id="sf_admin_header">
    <?php include_partial('configuracion/form_header', array('configuracion' => $configuracion, 'form' => $form, 'configuration' => $configuration)) ?>
  </div>

  <div id="sf_admin_content">
    <?php include_partial('configuracion/form', array('configuracion' => $configuracion, 'form' => $form, 'configuration' => $configuration, 'helper' => $helper)) ?>
  </div>

  <div id="sf_admin_footer">
    <?php include_partial('configuracion/form_footer', array('configuracion' => $configuracion, 'form' => $form, 'configuration' => $configuration)) ?>
  </div>
</div>
