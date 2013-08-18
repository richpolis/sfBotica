<td colspan="3">
  <?php echo __('%%position%% - %%categoria%% - %%is_active%%', array('%%position%%' => $categorias_publicaciones->getPosition(), '%%categoria%%' => $categorias_publicaciones->getCategoria(), '%%is_active%%' => get_partial('categorias/list_field_boolean', array('value' => $categorias_publicaciones->getIsActive()))), 'messages') ?>
</td>
