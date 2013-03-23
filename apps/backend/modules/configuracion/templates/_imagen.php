<?php if($configuracion->getImagen()):?>
<img src="/uploads/assets/<?php echo $configuracion->getImagen()?>" style="max-height: 100px; max-width: 100px;"/>
<?php else: ?>
Sin imagen
<?php endif; ?>
