<?php use_stylesheet('galeria-only.css') ?>
<?php use_helper('Escaping') ?>

<?php if (isset($publicacion_actual)): ?>
    <?php slot('metas-galeria') ?>
    <meta property="og:title" content="<?php echo (strlen($publicacion_actual->getTitulo()) > 0 ? $publicacion_actual->getTitulo() : 'Imagen de la pagina de Botica.com'); ?>" />
    <meta property="og:type" content="album" />
    <meta property="og:url" content="<?php echo url_for('proyectos_publicacion', $publicacion_actual) ?>" />
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
        var $listImagenGaleria=$("li.publicacion-galeria-item"),
        largoListGaleria=Math.ceil($listImagenGaleria.length/1)-1,
        indiceListGaleria=0,
        $controlAnterior=$("#publicacion-galeria-previous"),
        $controlSiguiente=$("#publicacion-galeria-next");

        $controlSiguiente.click(function(){
            if(indiceListGaleria<largoListGaleria){
                indiceListGaleria++;
            }
            var posicion=(indiceListGaleria*650)*1;
            $("#publicacion-galeria-content").animate({'left':'-'+posicion+'px'},"slow");
			
        });
        $controlAnterior.click(function(){
            if(indiceListGaleria  >= 1){
                indiceListGaleria--;
            }
            var posicion=(indiceListGaleria*650)*1;
            $("#publicacion-galeria-content").animate({'left':'-'+posicion+'px'},"slow");
        });
        $("#pestana-publicacion").click(function(){
           if($("#ventana-publicacion").attr('show')=='false'){
               $("#ventana-publicacion").animate({'right':'+='+300+'px'},"slow").attr('show','true'); 
           }else{
               $("#ventana-publicacion").animate({'right':'-='+300+'px'},"slow").attr('show','false'); 
           }
           
        });
        
    });
     
</script>
<?php end_slot(); ?>    

<h2 class="titulo-proyecto"><?php echo $publicacion_actual->getTitulo() ?></h2>

<div class="over-padding-column">
    <nav class="sidenav" role="navigation">
        <ul class="type-filter">
            <li><a href="<?php echo url_for("proyectos") ?>">Ver todos</a></li>
            <?php foreach ($categorias as $categoria): ?>
                <?php if($categoria->getId()==$categoria_actual->getId()):?>
                <li class="active"><a href=""><?php echo $categoria->getCategoria(); ?></a></li>
                <?php else: ?>
                <li><a href="<?php echo url_for("proyectos_categoria",$categoria)?>"><?php echo $categoria->getCategoria(); ?></a></li>
                <?php endif;?>
            <?php endforeach; ?>
        </ul>
    </nav>
</div>

<div class="padding-column row">
    <div class="span9" style="overflow: hidden; height: 391px; position: relative; ">
        <table>
            <tr>
                <td>
                    <img id="publicacion-galeria-previous" src="/images/noticias/dentrodenota/anterior.png" alt="move previous" />
                </td>
                <td>
                    <div id="publicacion-galeria">
                        <?php include_partial('proyectos/galeria', array('list_galeria' => $list_galeria)); ?>   
                    </div>
                </td>
                <td>
                    <img id="publicacion-galeria-next" src="/images/noticias/dentrodenota/siguiente.png" alt="move next" />
                </td>
            </tr>
        </table>
        <div id="ventana-publicacion" show="false">
            <div id="pestana-publicacion">
                <img src="/images/portafolio/acercadelproyecto_btn.png"/>
            </div>
            <div class="unreset-css" style="margin: 5px;">
                <div class="contenedor-publicacion">
                    <?php echo $publicacion_actual->getContenido(ESC_RAW) ?>
                </div>
                <div class="redes-sociales-publicacion">		
                    <ul>
                        <li>
                            <a rel="external" title="facebook" target="_blank" href="http://www.facebook.com/sharer.php?u=<?php echo urlencode(url_for('proyectos_publicacion', $publicacion_actual, true)) ?>&t=<?php echo $publicacion_actual->getTitulo(); ?>">
                                <span style="background:url(/images/portafolio/icon-facebook.png) no-repeat; width:26px; height:26px; display:block;"></span>
                            </a>
                        </li>
                        <li>
                            <a rel="external" title="twitter" href="http://twitter.com/home?status=<?php echo "Publicacion desde Botica.com " . urlencode(url_for('proyectos_publicacion', $publicacion_actual, true)) ?>" target="_black">
                                <span style="background:url(/images/portafolio/icon-twitter.png) no-repeat; width:26px; height:26px; display:block;"></span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="span2 ">
        
    </div>
</div>        
