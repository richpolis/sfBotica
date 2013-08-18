<td class="sf_admin_text sf_admin_list_td_position">
  <?php echo $categorias_proyectos->getPosition() ?>
</td>
<td class="sf_admin_text sf_admin_list_td_categoria">
  <?php echo $categorias_proyectos->getCategoria() ?>
</td>
<td class="sf_admin_boolean sf_admin_list_td_is_active">
  <?php echo get_partial('catproyectos/list_field_boolean', array('value' => $categorias_proyectos->getIsActive())) ?>
</td>
