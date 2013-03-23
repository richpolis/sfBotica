<div id="pictures_list" class="sf_admin_form_row">
  <?php include_partial('photoListe', array('list_registros' => Doctrine_Core::getTable('Proyectos')->getPublicacionesPorCategoria($form->getObject()->getId()))) ?>
</div>
<?php use_stylesheet("fileuploader.css") ?>
<div id="upload">
    <a href="<?php echo url_for('@proyectos_new?categoria_id='.$form->getObject()->getId())?>">  
    <?php echo 'Agregar Proyecto' ?>
    </a>    
</div>
<!--List Files-->

