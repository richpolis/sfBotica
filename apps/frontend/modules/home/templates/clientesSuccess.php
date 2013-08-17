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
    <?php foreach($clientes as $cliente):?>
        <div class="thumbnail">
         <img src="http://<?php echo $sf_request->getHost()?>/uploads/clientes/<?php echo $cliente->getImagen()?>" class="thumbnail"/>
        </div>
    <?php endforeach;?>
</div>
