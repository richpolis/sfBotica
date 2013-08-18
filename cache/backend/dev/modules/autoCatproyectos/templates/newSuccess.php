<?php use_helper('I18N', 'Date') ?>
<?php include_partial('catproyectos/assets') ?>

<div id="sf_admin_container">
  <h1><?php echo __('Crear categoria', array(), 'messages') ?></h1>

  <?php include_partial('catproyectos/flashes') ?>

  <div id="sf_admin_header">
    <?php include_partial('catproyectos/form_header', array('categorias_proyectos' => $categorias_proyectos, 'form' => $form, 'configuration' => $configuration)) ?>
  </div>

  <div id="sf_admin_content">
    <?php include_partial('catproyectos/form', array('categorias_proyectos' => $categorias_proyectos, 'form' => $form, 'configuration' => $configuration, 'helper' => $helper)) ?>
  </div>

  <div id="sf_admin_footer">
    <?php include_partial('catproyectos/form_footer', array('categorias_proyectos' => $categorias_proyectos, 'form' => $form, 'configuration' => $configuration)) ?>
  </div>
</div>
