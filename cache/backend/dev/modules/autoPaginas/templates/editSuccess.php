<?php use_helper('I18N', 'Date') ?>
<?php include_partial('paginas/assets') ?>

<div id="sf_admin_container">
  <h1><?php echo __('Editar pagina %%pagina%%', array('%%pagina%%' => $paginas->getPagina()), 'messages') ?></h1>

  <?php include_partial('paginas/flashes') ?>

  <div id="sf_admin_header">
    <?php include_partial('paginas/form_header', array('paginas' => $paginas, 'form' => $form, 'configuration' => $configuration)) ?>
  </div>

  <div id="sf_admin_content">
    <?php include_partial('paginas/form', array('paginas' => $paginas, 'form' => $form, 'configuration' => $configuration, 'helper' => $helper)) ?>
  </div>

  <div id="sf_admin_footer">
    <?php include_partial('paginas/form_footer', array('paginas' => $paginas, 'form' => $form, 'configuration' => $configuration)) ?>
  </div>
</div>
