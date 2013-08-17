<?php use_javascript('modernizr.custom.min.js') ?>
<?php use_javascript('jquery.livequery.min.js') ?>
<?php use_javascript('jquery.easing.min.js') ?>
<?php use_javascript('jquery.masonry.min.js') ?>
<?php use_javascript('jquery.hoverintent.min.js') ?>
<?php use_javascript('functions.js') ?>
<?php use_javascript('jquery.address-1.4.min.js') ?>
<?php use_javascript('script.js') ?>


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
    jQuery.showProjectPage=function(urlProjectPage){
        $("#loading").show('fast');
        $(".padding-column").fadeOut("fast");
        $.get(urlProjectPage, {},
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
    <nav class="sidenav" role="navigation">
        <ul class="type-filter links-negros">
            <li data-filter="all" class="show-all-link active"><a href="">Ver todos</a></li>
            <?php foreach ($categorias as $categoria): ?>
                <li data-filter="<?php echo $categoria->getId() ?>" class="categoria-<?php echo $categoria->getId() ?>"><a href=""><?php echo $categoria->getCategoria(); ?></a></li>
            <?php endforeach; ?>
        </ul>
    </nav>
</div>
<div class="padding-column">
    <div class="project-list" style="margin-top: 15px;">
        <ul style="height: <?php echo $filas * 295 ?>px;" class="masonry">
            <?php $contFilas = 0;
            $contColumnas = 0; ?>
            <?php foreach ($registros as $registro): ?>
                <li class="active-block masonry-brick" data-types="<?php echo $registro->getCategoriaId() ?>" style="position: absolute; top: <?php echo $contFilas * 295 ?>px; left: <?php $contColumnas * 240 ?>px;">
                    <div class="image-container">
                        <a href="<?php echo url_for("proyectos_publicacion", $registro) ?>">
                            <img src="<?php echo $registro->getThumbnailValid() ?>" width="220" height="220"/>
                            <span class="thumb-overlay zero-opacity" style="opacity: 0;"></span>
                        </a>
                    </div>
                    <div class="zero-opacity" style="opacity: 0;">
                        <h2><?php echo $registro->getTitulo() ?><span class="underscore-extrasmall inline-block"></span></h2>
                        <span class="type"><?php echo $registro->getCategoriasProyectos() ?></span>
                    </div>
                </li>
                <?php
                $contColumnas++;
                if ($contColumnas == 3) {
                    $contColumnas = 0;
                    $contFilas++;
                }
                ?>
            <?php endforeach; ?>

        </ul>
    </div>
</div>

