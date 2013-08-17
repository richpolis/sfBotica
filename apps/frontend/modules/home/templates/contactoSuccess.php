<?php use_stylesheet('prettyPhoto.css') ?>
<?php use_stylesheet('galeria.css') ?>
<?php use_javascript('jquery.prettyPhoto.js') ?>
<?php use_javascript('sfrichpolis.js') ?>
<?php use_helper('Escaping') ?>


<?php slot('background') ?>    
<?php if ($contenido->getFondo()): ?>
<script type="text/javascript"> 
    $(document).ready(function(){
        $('#background').smartBackgroundResize({
            image: 'http://<?php echo $sf_request->getHost()?>/uploads/assets/<?php echo $contenido->getFondo()?>' 
	});
    });
</script>
<?php endif; ?>
<?php end_slot(); ?>

<h1 class="page-title">
    <?php echo $contenido->getPagina()?>
</h1>


<div class="padding-column">
        <div class="column column-medium">
            <?php if ($contenido->getImagen() == null): ?>
                <div class="unreset-css"> 
                    <?php echo $contenido->getContenido(ESC_RAW) ?>
                </div>    
            <?php else: ?>
                <div >
                    <img src="/uploads/assets/<?php echo $contenido->getImagen() ?>" style="max-width: 908px;" />
                </div>
            <?php endif; ?>
        </div>
        <div class="column column-medium">
            <div id="dialog-form">                
            <?php include_partial('form_contacto', array('form'=>$form,"mensaje_ok"=>$mensaje_ok)) ?>
            </div>
        </div>
</div>
<div class="development-phrenesis">
   <a href="http://www.interactivevalley.com" target="_black"> Developed by Interactive Valley</a>
</div>
