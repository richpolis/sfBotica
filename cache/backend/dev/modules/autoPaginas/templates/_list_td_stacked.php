<td colspan="5">
  <?php echo __('%%id%% - %%pagina%% - %%contenido%% - %%fondo_miniatura%% - %%created_at%%', array('%%id%%' => link_to($paginas->getId(), 'paginas_edit', $paginas), '%%pagina%%' => $paginas->getPagina(), '%%contenido%%' => get_partial('paginas/contenido', array('type' => 'list', 'paginas' => $paginas)), '%%fondo_miniatura%%' => get_partial('paginas/fondo_miniatura', array('type' => 'list', 'paginas' => $paginas)), '%%created_at%%' => false !== strtotime($paginas->getCreatedAt()) ? format_date($paginas->getCreatedAt(), "dd/MM/y") : '&nbsp;'), 'messages') ?>
</td>
