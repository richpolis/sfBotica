<td colspan="4">
  <?php echo __('%%categorias_publicaciones%% - %%position%% - %%titulo%% - %%is_active%%', array('%%categorias_publicaciones%%' => $publicaciones->getCategoriasPublicaciones(), '%%position%%' => $publicaciones->getPosition(), '%%titulo%%' => $publicaciones->getTitulo(), '%%is_active%%' => get_partial('publicaciones/list_field_boolean', array('value' => $publicaciones->getIsActive()))), 'messages') ?>
</td>
