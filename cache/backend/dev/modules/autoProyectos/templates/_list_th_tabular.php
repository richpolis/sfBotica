<?php slot('sf_admin.current_header') ?>
<th class="sf_admin_text sf_admin_list_th_categorias_proyectos">
  <?php echo __('Categoria', array(), 'messages') ?>
</th>
<?php end_slot(); ?>
<?php include_slot('sf_admin.current_header') ?><?php slot('sf_admin.current_header') ?>
<th class="sf_admin_text sf_admin_list_th_position">
  <?php if ('position' == $sort[0]): ?>
    <?php echo link_to(__('Orden', array(), 'messages'), '@proyectos', array('query_string' => 'sort=position&sort_type='.($sort[1] == 'asc' ? 'desc' : 'asc'))) ?>
    <?php echo image_tag(sfConfig::get('sf_admin_module_web_dir').'/images/'.$sort[1].'.png', array('alt' => __($sort[1], array(), 'sf_admin'), 'title' => __($sort[1], array(), 'sf_admin'))) ?>
  <?php else: ?>
    <?php echo link_to(__('Orden', array(), 'messages'), '@proyectos', array('query_string' => 'sort=position&sort_type=asc')) ?>
  <?php endif; ?>
</th>
<?php end_slot(); ?>
<?php include_slot('sf_admin.current_header') ?><?php slot('sf_admin.current_header') ?>
<th class="sf_admin_text sf_admin_list_th_titulo">
  <?php if ('titulo' == $sort[0]): ?>
    <?php echo link_to(__('Titulo', array(), 'messages'), '@proyectos', array('query_string' => 'sort=titulo&sort_type='.($sort[1] == 'asc' ? 'desc' : 'asc'))) ?>
    <?php echo image_tag(sfConfig::get('sf_admin_module_web_dir').'/images/'.$sort[1].'.png', array('alt' => __($sort[1], array(), 'sf_admin'), 'title' => __($sort[1], array(), 'sf_admin'))) ?>
  <?php else: ?>
    <?php echo link_to(__('Titulo', array(), 'messages'), '@proyectos', array('query_string' => 'sort=titulo&sort_type=asc')) ?>
  <?php endif; ?>
</th>
<?php end_slot(); ?>
<?php include_slot('sf_admin.current_header') ?><?php slot('sf_admin.current_header') ?>
<th class="sf_admin_boolean sf_admin_list_th_is_active">
  <?php if ('is_active' == $sort[0]): ?>
    <?php echo link_to(__('Activa', array(), 'messages'), '@proyectos', array('query_string' => 'sort=is_active&sort_type='.($sort[1] == 'asc' ? 'desc' : 'asc'))) ?>
    <?php echo image_tag(sfConfig::get('sf_admin_module_web_dir').'/images/'.$sort[1].'.png', array('alt' => __($sort[1], array(), 'sf_admin'), 'title' => __($sort[1], array(), 'sf_admin'))) ?>
  <?php else: ?>
    <?php echo link_to(__('Activa', array(), 'messages'), '@proyectos', array('query_string' => 'sort=is_active&sort_type=asc')) ?>
  <?php endif; ?>
</th>
<?php end_slot(); ?>
<?php include_slot('sf_admin.current_header') ?>