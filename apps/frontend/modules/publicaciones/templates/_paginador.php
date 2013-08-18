<?php if(!$pager==null): ?>
<div class="paginate">
    <?php if ($pager->haveToPaginate() && $pager->getPage()>1): ?>
    <button class="previous btn btn-mini" onclick="$.showCategoryPage('<?php echo url_for('publicaciones_categoria',array("slug"=>$categoria_actual->getSlug()));?>','<?php echo $pager->getPreviousPage()?>')">«</button>
    <?php else:?>
    <button class="btn btn-mini" disabled="disabled">«</button>
    <?php endif; ?>
    <?php $paginaInicial=(floor($pager->getPage()/6)*6)+1;?>
    <?php $paginaFinal=$paginaInicial+6;?>
    <?php foreach ($pager->getLinks() as $i=>$page): ?>
         <?php if($i>=($paginaInicial-1) && $i<$paginaFinal):?>
             <?php if ($page == $pager->getPage()): ?>
                 <span class="current-page"><?php echo $page ?></span>
             <?php else: ?>
                <button class="btn btn-mini" onclick="$.showCategoryPage('<?php echo url_for('publicaciones_categoria',array("slug"=>$categoria_actual->getSlug())); ?>','<?php echo $page?>')"><?php echo $page ?></button>
             <?php endif; ?>
         <?php endif; ?>    
    <?php endforeach; ?> 
    <?php if ($pager->haveToPaginate() && $pager->getPage()<$pager->getLastPage()): ?>
    <button class="next btn btn-mini" onclick="$.showCategoryPage('<?php echo url_for('publicaciones_categoria',array("slug"=>$categoria_actual->getSlug())); ?>','<?php echo $pager->getNextPage()?>')">»</button>
    <?php else:?>
    <button class="btn btn-mini"  disabled="disabled">»</button>
    <?php endif; ?>
</div>
<?php endif; ?>