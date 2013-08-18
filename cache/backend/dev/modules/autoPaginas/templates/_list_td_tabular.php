<td class="sf_admin_text sf_admin_list_td_id">
  <?php echo link_to($paginas->getId(), 'paginas_edit', $paginas) ?>
</td>
<td class="sf_admin_text sf_admin_list_td_pagina">
  <?php echo $paginas->getPagina() ?>
</td>
<td class="sf_admin_text sf_admin_list_td_contenido">
  <?php echo get_partial('paginas/contenido', array('type' => 'list', 'paginas' => $paginas)) ?>
</td>
<td class="sf_admin_text sf_admin_list_td_fondo_miniatura">
  <?php echo get_partial('paginas/fondo_miniatura', array('type' => 'list', 'paginas' => $paginas)) ?>
</td>
<td class="sf_admin_date sf_admin_list_td_created_at">
  <?php echo false !== strtotime($paginas->getCreatedAt()) ? format_date($paginas->getCreatedAt(), "dd/MM/y") : '&nbsp;' ?>
</td>
