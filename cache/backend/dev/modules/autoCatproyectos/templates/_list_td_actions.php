<td>
  <ul class="sf_admin_td_actions">
    <li class="sf_admin_action_arriba">
      <?php echo link_to(__('Arriba', array(), 'messages'), 'catproyectos/promote?id='.$categorias_proyectos->getId(), array()) ?>
    </li>
    <li class="sf_admin_action_abajo">
      <?php echo link_to(__('Abajo', array(), 'messages'), 'catproyectos/demote?id='.$categorias_proyectos->getId(), array()) ?>
    </li>
    <?php echo $helper->linkToEdit($categorias_proyectos, array(  'label' => 'Editar',  'params' =>   array(  ),  'class_suffix' => 'edit',)) ?>
    <?php echo $helper->linkToDelete($categorias_proyectos, array(  'label' => 'Eliminar',  'params' =>   array(  ),  'confirm' => 'Are you sure?',  'class_suffix' => 'delete',)) ?>
  </ul>
</td>
