<?php use_stylesheet('prettyPhoto.css') ?>
<?php use_stylesheet('galeria.css') ?>
<?php use_javascript('jquery.prettyPhoto.js') ?>
<?php use_javascript('sfrichpolis.js') ?>
<?php use_helper('Escaping') ?>

<?php if (isset($publicacion_actual)): ?>
    <?php slot('metas-galeria') ?>
    <meta property="og:title" content="<?php echo (strlen($publicacion_actual->getTitulo()) > 0 ? $publicacion_actual->getTitulo() : 'Imagen de la pagina de Botica.com'); ?>" />
    <meta property="og:type" content="album" />
    <meta property="og:url" content="<?php echo url_for('publicaciones_publicacion', $publicacion_actual) ?>" />
    <meta property="og:image" content="<?php echo $publicacion_actual->getThumbnailValid() ?>" />
    <meta property="og:site_name" content="Botica.com" />
    <!--meta property="fb:admins" content="USER_ID1,USER_ID2"/-->
    <meta property="og:description" content="<?php echo $publicacion_actual->getContenidoCorto(50) ?>" />
    <?php end_slot() ?>
<?php endif; ?>

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
    $(document).ready(function(){
        $.configPrettyPhoto();

        var $listImagenGaleria=$("li.publicacion-galeria-item"),
        largoListGaleria=Math.ceil($listImagenGaleria.length/5)-1,
        indiceListGaleria=0,
        $controlAnterior=$("#publicacion-galeria-previous"),
        $controlSiguiente=$("#publicacion-galeria-next");

        $controlSiguiente.click(function(){
            if(indiceListGaleria<largoListGaleria){
                indiceListGaleria++;
            }
            var posicion=(indiceListGaleria*160)*5;
            $("#publicacion-galeria-content").animate({'left':'-'+posicion+'px'},"slow");
			
        });
        $controlAnterior.click(function(){
            if(indiceListGaleria  >= 1){
                indiceListGaleria--;
            }
            var posicion=(indiceListGaleria*160)*5;
            $("#publicacion-galeria-content").animate({'left':'-'+posicion+'px'},"slow");
        });
    });
     
</script>
<?php end_slot(); ?>    
    
<?php if (!isset($publicacion_actual)) $publicacion_actual = null; ?>    
<h1 class="page-title"><?php echo $contenido->getPagina()?></h1>
<div class="row" stlye="float: right; right: 60px;">
    <div class="span4 offset8">
       <?php if(!$publicacion_actual==null):?>
        <a href="<?php echo url_for("publicaciones_categoria",$categoria_actual) ?>">
            <img id="regresar-categoria" src="/images/noticias/dentrodenota/regresar.png" alt="Regresar" />
        </a>
       <?php endif;?>
    </div>
</div>
<div class="over-padding-column">
    <nav class="sidenav">
        <ul>
            <?php foreach($categorias as $categoria): ?>
            <?php if($categoria->getId()!=$categoria_actual->getId()): ?>
            <li><a href="<?php echo url_for("publicaciones_categoria", $categoria) ?>"><?php echo $categoria->getCategoria() ?></a></li>
            <?php else: ?>
            <li class="active-link"><a href="<?php echo url_for("publicaciones_categoria", $categoria) ?>" ><?php echo $categoria->getCategoria() ?></a></li>
            <?php endif; ?>
            <?php endforeach;?>
        </ul>
    </nav>
</div>    
<div class="padding-column">
    <?php if(!$publicacion_actual==null):?>
        <section class="sub-page" id="team">
            <div class="row">
                <table>
                    <tr>
                        <td>
                            <img id="publicacion-galeria-previous" src="/images/noticias/dentrodenota/anterior.png" alt="move previous" />
                        </td>
                        <td>
                            <div id="publicacion-galeria">
                                <?php include_partial('publicaciones/galeria', array('list_galeria' => $list_galeria)); ?>   
                            </div>
                        </td>
                        <td>
                            <img id="publicacion-galeria-next" src="/images/noticias/dentrodenota/siguiente.png" alt="move next" />
                        </td>
                    </tr>
                </table>
             </div>
            <div class="row">
                <h2>
                    <?php echo $publicacion_actual->getTitulo()?>
                    <br/>
                    <?php echo $publicacion_actual->getDateTimeObject('created_at')->format('m.d.Y') ?>
                    <span class="underscore-small inline-block"></span>
                </h2>
                <div class="unreset-css">
                    <?php echo $publicacion_actual->getContenido(ESC_RAW)?>
                </div>			
            </div>
            <div class="clear"></div>
        </section>
        <?php endif;?>
    </div>    
