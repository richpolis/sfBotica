<?php use_helper('I18N', 'Date') ?>
<?php include_partial('publicaciones/assets') ?>

<div id="sf_admin_container">
  <h1><?php echo __('Modificar Publicacion "%%titulo%%"', array('%%titulo%%' => $publicaciones->getTitulo()), 'messages') ?></h1>

  <?php include_partial('publicaciones/flashes') ?>

  <div id="sf_admin_header">
    <?php include_partial('publicaciones/form_header', array('publicaciones' => $publicaciones, 'form' => $form, 'configuration' => $configuration)) ?>
  </div>

  <div id="sf_admin_content">
    <?php include_partial('publicaciones/form', array('publicaciones' => $publicaciones, 'form' => $form, 'configuration' => $configuration, 'helper' => $helper)) ?>
  </div>

  <div id="sf_admin_footer">
    <?php include_partial('publicaciones/form_footer', array('publicaciones' => $publicaciones, 'form' => $form, 'configuration' => $configuration)) ?>
  </div>
</div>
