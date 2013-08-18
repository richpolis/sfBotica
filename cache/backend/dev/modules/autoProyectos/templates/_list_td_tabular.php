<td class="sf_admin_text sf_admin_list_td_categorias_proyectos">
  <?php echo $proyectos->getCategoriasProyectos() ?>
</td>
<td class="sf_admin_text sf_admin_list_td_position">
  <?php echo $proyectos->getPosition() ?>
</td>
<td class="sf_admin_text sf_admin_list_td_titulo">
  <?php echo $proyectos->getTitulo() ?>
</td>
<td class="sf_admin_boolean sf_admin_list_td_is_active">
  <?php echo get_partial('proyectos/list_field_boolean', array('value' => $proyectos->getIsActive())) ?>
</td>
