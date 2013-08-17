<?php if(!$pager==null): ?>
<div class="paginate">
    <?php if ($pager->haveToPaginate() && $pager->getPage()>1): ?>
    <a class="previous" href="" onclick="$.showCategoryPage('<?php echo url_for('publicaciones_categoria',array("slug"=>$categoria_actual->getCategoriaSlug(),'page'=>$pager->getPreviousPage())); ?>')">«</a>
    <?php endif; ?>
    <?php $paginaInicial=(floor($pager->getPage()/6)*6)+1;?>
    <?php $paginaFinal=$paginaInicial+6;?>
    <?php foreach ($pager->getLinks() as $i=>$page): ?>
         <?php if($i>=($paginaInicial-1) && $i<$paginaFinal):?>
             <?php if ($page == $pager->getPage()): ?>
                 <span class="current-page"><?php echo $page ?></span>
             <?php else: ?>
                <a href="" onclick="$.showCategoryPage('<?php echo url_for('publicaciones_categoria',array("slug"=>$categoria_actual->getCategoriaSlug(),'page'=>$page)); ?>')"><?php echo $page ?></a>
             <?php endif; ?>
         <?php endif; ?>    
    <?php endforeach; ?> 
    <?php if ($pager->haveToPaginate() && $pager->getPage()<$pager->getLastPage()): ?>
    <a class="next" href="" onclick="$.showCategoryPage('<?php echo url_for('publicaciones_categoria',array("slug"=>$categoria_actual->getCategoriaSlug(),'page'=>$pager->getNextPage())); ?>')">»</a>
    <?php endif; ?>
</div>
<?php endif; ?>