<?php use_helper('I18N', 'Date') ?>
<?php include_partial('proyectos/assets') ?>

<div id="sf_admin_container">
  <h1><?php echo __('Modificar proyecto "%%titulo%%"', array('%%titulo%%' => $proyectos->getTitulo()), 'messages') ?></h1>

  <?php include_partial('proyectos/flashes') ?>

  <div id="sf_admin_header">
    <?php include_partial('proyectos/form_header', array('proyectos' => $proyectos, 'form' => $form, 'configuration' => $configuration)) ?>
  </div>

  <div id="sf_admin_content">
    <?php include_partial('proyectos/form', array('proyectos' => $proyectos, 'form' => $form, 'configuration' => $configuration, 'helper' => $helper)) ?>
  </div>

  <div id="sf_admin_footer">
    <?php include_partial('proyectos/form_footer', array('proyectos' => $proyectos, 'form' => $form, 'configuration' => $configuration)) ?>
  </div>
</div>
