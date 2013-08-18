<?php use_helper('I18N', 'Date') ?>
<?php include_partial('categorias/assets') ?>

<div id="sf_admin_container">
  <h1><?php echo __('Crear Categoria', array(), 'messages') ?></h1>

  <?php include_partial('categorias/flashes') ?>

  <div id="sf_admin_header">
    <?php include_partial('categorias/form_header', array('categorias_publicaciones' => $categorias_publicaciones, 'form' => $form, 'configuration' => $configuration)) ?>
  </div>

  <div id="sf_admin_content">
    <?php include_partial('categorias/form', array('categorias_publicaciones' => $categorias_publicaciones, 'form' => $form, 'configuration' => $configuration, 'helper' => $helper)) ?>
  </div>

  <div id="sf_admin_footer">
    <?php include_partial('categorias/form_footer', array('categorias_publicaciones' => $categorias_publicaciones, 'form' => $form, 'configuration' => $configuration)) ?>
  </div>
</div>
