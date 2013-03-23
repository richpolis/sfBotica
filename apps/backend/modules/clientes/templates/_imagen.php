<?php if($clientes->getImagen()):?>
    <img src="/uploads/clientes/<?php echo $clientes->getImagen()?>" style="max-height: 100px; max-width: 100px;"/>
<?php else: ?>
    Sin imagen
<?php endif; ?>