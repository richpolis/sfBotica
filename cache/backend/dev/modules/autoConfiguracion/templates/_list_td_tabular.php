<td class="sf_admin_text sf_admin_list_td_id">
  <?php echo link_to($configuracion->getId(), 'configuracion_edit', $configuracion) ?>
</td>
<td class="sf_admin_text sf_admin_list_td_seccion">
  <?php echo $configuracion->getSeccion() ?>
</td>
<td class="sf_admin_text sf_admin_list_td_contenido">
  <?php echo get_partial('configuracion/contenido', array('type' => 'list', 'configuracion' => $configuracion)) ?>
</td>
<td class="sf_admin_text sf_admin_list_td_imagen">
  <?php echo get_partial('configuracion/imagen', array('type' => 'list', 'configuracion' => $configuracion)) ?>
</td>
<td class="sf_admin_date sf_admin_list_td_created_at">
  <?php echo false !== strtotime($configuracion->getCreatedAt()) ? format_date($configuracion->getCreatedAt(), "dd/MM/y") : '&nbsp;' ?>
</td>
