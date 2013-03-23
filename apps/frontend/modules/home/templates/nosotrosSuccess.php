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
<div class="padding-column">
    <h1 class="page-title">
        <?php echo $contenido->getPagina()?>
    </h1>
    <?php if ($contenido->getImagen() == null): ?>
        <div class="span10" style="text-align: justify;"> 
        <?php echo $contenido->getContenido(ESC_RAW) ?>
        </div>    
    <?php else: ?>
        <img src="/uploads/assets/<?php echo $contenido->getImagen() ?>" style="max-width: 908px;"/>
    <?php endif; ?>
</div>
