<td colspan="4">
  <?php echo __('%%categorias_proyectos%% - %%position%% - %%titulo%% - %%is_active%%', array('%%categorias_proyectos%%' => $proyectos->getCategoriasProyectos(), '%%position%%' => $proyectos->getPosition(), '%%titulo%%' => $proyectos->getTitulo(), '%%is_active%%' => get_partial('proyectos/list_field_boolean', array('value' => $proyectos->getIsActive()))), 'messages') ?>
</td>
