<?php use_helper('Escaping')?>
<?php if($paginas->getContenido()):?>
<?php echo $paginas->getContenidoCorto(); ?>
<?php elseif($paginas->getImagen()):?>
<img src="/uploads/assets/<?php echo $paginas->getImagen()?>" style="max-height: 100px; max-width: 100px;"/>    
<?php else:?>
Sin contenido
<?php endif;?>

    