<?php use_stylesheet('prettyPhoto.css') ?>
<?php use_stylesheet('galeria.css') ?>
<?php use_javascript('jquery.prettyPhoto.js') ?>
<?php use_javascript('sfrichpolis.js') ?>

<?php use_javascript('modernizr.custom.min.js') ?>
<?php use_javascript('jquery.livequery.min.js') ?>
<?php use_javascript('jquery.easing.min.js') ?>
<?php use_javascript('jquery.masonry.min.js') ?>
<?php use_javascript('jquery.hoverintent.min.js') ?>
<?php use_javascript('functions.js') ?>
<?php use_javascript('script.js') ?>
<?php use_helper('Escaping') ?>

<?php slot('background') ?>    
<?php if ($contenido->getFondo()): ?>
<script type="text/javascript"> 
    $(document).ready(function(){
        $('#background').smartBackgroundResize({
            image: 'http://<?php echo $sf_request->getHost() ?>/uploads/assets/<?php echo $contenido->getFondo() ?>' 
        });
    });
</script>
<?php endif; ?>
<script>
    jQuery.showCategoryPage=function(urlCategoryPage){
        $("#loading").show('fast');
        $(".padding-column").fadeOut("fast");
        $.get(urlCategoryPage, {},
        function(data){
            $(".padding-column").html(data).fadeIn("fast");
             $("#loading").show('hide');
        });
    }
    jQuery.showNewsPage=function(urlNewsPage){
        $("#loading").show('fast');
        $(".padding-column").fadeOut("fast");
        $.get(urlNewsPage, {},
        function(data){
            $(".padding-column").html(data).fadeIn("fast");
             $("#loading").show('hide');
        });
    }
    $("#loading").show('hide');
</script>
<?php end_slot(); ?>

<h1 class="page-title"><?php echo $contenido->getPagina()?></h1>
<div class="over-padding-column">
    <nav class="sidenav">
        <ul>
            <?php foreach($categorias as $categoria): ?>
            <?php if($categoria->getId()!=$categoria_actual->getId()): ?>
            <li><a href="<?php echo url_for("publicaciones_categoria", $categoria) ?>"><?php echo $categoria->getCategoria() ?></a></li>
            <?php else: ?>
            <li class="active-link"><a href="" ><?php echo $categoria->getCategoria() ?></a></li>
            <?php endif; ?>
            <?php endforeach;?>
        </ul>
    </nav>
</div>    
<div class="padding-column left">
        <?php include_partial('publicaciones/list', array(
               'pager' => $pager,
               'list_registros'=>$list_registros,
               'categoria_actual'=>$categoria_actual,
               'categorias'=>$categorias,
               'tipos'=>$tipos
                )); ?>  
</div>
