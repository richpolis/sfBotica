<td class="sf_admin_text sf_admin_list_td_categorias_publicaciones">
  <?php echo $publicaciones->getCategoriasPublicaciones() ?>
</td>
<td class="sf_admin_text sf_admin_list_td_position">
  <?php echo $publicaciones->getPosition() ?>
</td>
<td class="sf_admin_text sf_admin_list_td_titulo">
  <?php echo $publicaciones->getTitulo() ?>
</td>
<td class="sf_admin_boolean sf_admin_list_td_is_active">
  <?php echo get_partial('publicaciones/list_field_boolean', array('value' => $publicaciones->getIsActive())) ?>
</td>
