<?php use_helper('Escaping') ?>
<div class="hfeed">
<?php foreach ($list_registros as $registro): ?>
    <article class="post-<?php echo $registro->getId() ?> post type-post status-publish format-standard hentry category-nieuws">
        <time class="updated published" datetime="<?php echo $registro->getCreatedAt() ?>">
            <?php echo $registro->getDateTimeObject('created_at')->format('m.d.Y')  ?>
            <span class="underscore-medium inline-block"></span>
            <?php if(strlen($slug)==0):?>
            <span class="categoria-publicacion">
            &nbsp;<?php echo $registro->getCategoriasPublicaciones()->getCategoria();?>
            </span>
            <?php endif;?>
        </time>
        <div class="clear" style="height:10px;"></div>
        <div class="column column-left">
            <h2 class="entry-title"><?php echo $registro->getTitulo() ?></h2>
            <div class="entry-content">
                <div class="unreset-css">
                    <?php echo $registro->getDescripcionCorta(ESC_RAW) ?>
                </div>
            </div>
            <span class="article-counter">
                <?php //echo $registro->getPosition() ?>
                <a style="font-size: 14pt; position: relative; top: -30px; right: -130px;" 
                   href="<?php echo url_for("publicaciones_publicacion",$registro)?>">
                    <img src="/images/noticias/vermas.png"/>
                    ver más...
                </a>
            </span>
        </div>
        <div class="column column-right image-container">
            <?php
            $galeria = $registro->getPublicacionesGaleria();
            $item = $galeria[0];
            
            ?>
            <?php if ($item->getTipoArchivo() == $tipos['Imagen']): ?>
            <img src="<?php echo "http://".$sf_request->getHost().
                    "/imagenes/publicaciones/514/297/".$item->getArchivo()
                ?>" style="max-width: 514px; max-height: 297px;" alt="<?php echo $registro->getTitulo() ?>" title="<?php echo $registro->getTitulo() ?>">
            <?php else: ?>
                <!--img src="<?php echo $registro->getThumbnailValid() ?>" width="514" height="297" alt="<?php echo $registro->getTitulo() ?>" title="<?php echo $registro->getTitulo() ?>"-->
                <?php echo $item->getArchivoView(array("width"=>514,"height"=>297),ESC_RAW)?>
            <?php endif; ?>
        </div>
        <div class="clear"></div>
    </article>
<?php endforeach; ?>
<?php /*include_partial('publicaciones/paginador', array(
    'pager' => $pager, 
    'categoria_actual' => $categoria_actual,
    'slug'=>$slug
    ));*/ ?>
</div>  