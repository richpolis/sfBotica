<?php $categoria=Doctrine_Core::getTable('CategoriasProyectos')->find($sf_user->getAttribute('categoria_id',$form->getObject()->getCategoriaId()));?>
<ul class="sf_admin_actions">
<?php if ($form->isNew()): ?>
  <?php echo $helper->linkToDelete($form->getObject(), array(  'params' =>   array(  ),  'confirm' => 'Are you sure?',  'class_suffix' => 'delete',  'label' => 'Delete',)) ?>
  <?php //echo $helper->linkToList(array(  'params' =>   array(  ),  'class_suffix' => 'list',  'label' => 'Back to list',)) ?>
  <a class="graybutton f_left return_to_list" href="<?php echo url_for('categorias_proyectos_edit',$categoria);?>"><span class="sprite_icon">Regresar</span></a>
  <?php echo $helper->linkToSave($form->getObject(), array(  'params' =>   array(  ),  'class_suffix' => 'save',  'label' => 'Guardar',)) ?>
<?php else: ?>
  <?php echo $helper->linkToDelete($form->getObject(), array(  'params' =>   array(  ),  'confirm' => 'Are you sure?',  'class_suffix' => 'delete',  'label' => 'Delete',)) ?>
  <?php //echo $helper->linkToList(array(  'params' =>   array(  ),  'class_suffix' => 'list',  'label' => 'Back to list',)) ?>
  <a class="graybutton f_left return_to_list" href="<?php echo url_for('categorias_proyectos_edit',$categoria);?>"><span class="sprite_icon">Regresar</span></a>
  <?php echo $helper->linkToSave($form->getObject(), array(  'params' =>   array(  ),  'class_suffix' => 'save',  'label' => 'Guardar',)) ?>
<?php endif; ?>
</ul>
