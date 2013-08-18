<td colspan="3">
  <?php echo __('%%position%% - %%categoria%% - %%is_active%%', array('%%position%%' => $categorias_proyectos->getPosition(), '%%categoria%%' => $categorias_proyectos->getCategoria(), '%%is_active%%' => get_partial('catproyectos/list_field_boolean', array('value' => $categorias_proyectos->getIsActive()))), 'messages') ?>
</td>
