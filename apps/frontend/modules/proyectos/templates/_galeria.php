<?php use_helper('Escaping')?>
<ul id="publicacion-galeria-content" style="width: <?php echo $list_galeria->count()*650?>px; margin: 0;">
    <?php foreach ($list_galeria as $galeria): ?>
     <li class="publicacion-galeria-item" style="text-align:center; width: 640px;height:391px;">
     <?php if($galeria->getTipoArchivo()==1):?>
        <img class="galeria-imagen" src="<?php echo "http://".$sf_request->getHost().
                    "/imagenes/publicaciones/640/391/".$galeria->getArchivo()
                ?>" width="640" height="391" alt="<?php echo $galeria->getTitulo()?>"/>
     <?php elseif($galeria->getTipoArchivo()==0):?>
        <div >
            <?php echo $galeria->getArchivoView(array("width"=>640,"height"=>391),ESC_RAW)?>
        </div>
     <?php endif;?>
     </li>
     <?php endforeach; ?>
</ul>

 