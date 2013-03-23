<?php

/**
 * publicaciones actions.
 *
 * @package    Botica
 * @subpackage publicaciones
 * @author     Richpolis Systems <richpolis@gmail.com>
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class publicacionesActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
    $this->categorias = Doctrine_Core::getTable('CategoriasPublicaciones')->getCategoriasActivas();
    
    if(count($this->categorias)>0){
        $this->categoria_actual=$this->categorias[0];
    }
      
    $q=Doctrine_Core::getTable('Publicaciones')->getCriteriaPorCategoria($this->categoria_actual->getId());   
    
    $this->pager = new sfDoctrinePager('Publicaciones',6);
    $this->pager->setQuery($q);
    $this->pager->setPage($request->getParameter('page', 1));
    $this->pager->init();
    $this->list_registros=$this->pager->getResults();
    
    $this->tipos = Doctrine_Core::getTable('PublicacionesGaleria')->getTiposArchivo();
    
     if ($request->isXmlHttpRequest()){
       try{
           return $this->renderPartial('publicaciones/list', array(
               'pager' => $this->pager,
               'list_registros'=>$this->list_registros,
               'categoria_actual'=>$this->categoria_actual,
               'categorias'=>$this->categorias,
               'tipos'=>$this->tipos
            ));
       } catch(Exception $e){
           throw $e->getMessage();
       }
    }
    
    $this->contenido=  Doctrine_Core::getTable('Paginas')->findOneBy('slug', 'noticias');
    if($this->contenido==null){
       $this->contenido=new Paginas();
       $this->contenido->setPagina("Noticias");
       $this->contenido->setContenido("Pagina de noticias");
    }
    
      
  } 
    
    
  public function executeCategoria(sfWebRequest $request)
  {
    $this->categorias=Doctrine_Core::getTable('CategoriasPublicaciones')->getCategoriasActivas();
    if($request->hasParameter('slug')){
       $this->categoria=Doctrine_Core::getTable('CategoriasPublicaciones')->findBy('slug', $request->getParameter('slug'));
       $this->categoria_actual=$this->categoria[0];
    }else{
        if($this->categorias!=null){
            $this->categoria_actual=$this->categorias[0];
        }else{
            $this->categoria_actual=0;
        }
    }
    $this->tipos = Doctrine_Core::getTable('PublicacionesGaleria')->getTiposArchivo();
    if($this->categoria_actual){
        $q=  Doctrine_Core::getTable('Publicaciones')->getCriteriaPorCategoria($this->categoria_actual->getId());   
        $this->pager = new sfDoctrinePager('Publicaciones',6);
        $this->pager->setQuery($q);
        $this->pager->setPage($request->getParameter('page', 1));
        $this->pager->init();
        $this->list_registros=$this->pager->getResults();
    }else{
        $this->list_registros=null;
        $this->pager=null;
    }
        
    if ($request->isXmlHttpRequest())
    {
       return $this->renderPartial('publicaciones/list', array(
           'pager' => $this->pager,
           'list_registros'=>$this->list_registros,
           'categoria_actual'=>$this->categoria_actual
        ));
    }
    
    $this->contenido=  Doctrine_Core::getTable('Paginas')->findOneBy('slug', 'noticias');
    if($this->contenido==null){
       $this->contenido=new Paginas();
       $this->contenido->setPagina("Noticias");
       $this->contenido->setContenido("Pagina de noticias");
    }
    
  }
  public function executePublicacion(sfWebRequest $request)
  {
      
    $this->categorias=Doctrine_Core::getTable('CategoriasPublicaciones')->getCategoriasActivas();
    if($request->hasParameter('categoria_slug')){
       $this->categoria=Doctrine_Core::getTable('CategoriasPublicaciones')->findBy('slug', $request->getParameter('categoria_slug'));
       $this->categoria_actual=$this->categoria[0];
    }else{
        if($this->categorias!=null){
            $this->categoria_actual=$this->categorias[0];
        }else{
            $this->categoria_actual=0;
        }
    }
      
    if($request->hasParameter('slug')){
       $this->publicacion_actual=Doctrine_Core::getTable('Publicaciones')->getPublicacionConGaleriaForSlug($request->getParameter('slug')) ;
    }
    if($this->publicacion_actual){
       $this->list_galeria=$this->publicacion_actual->getPublicacionesGaleria();
    }else{
       $this->list_galeria=null;
    }
    
    $this->contenido=  Doctrine_Core::getTable('Paginas')->findOneBy('slug', 'noticias');
    if($this->contenido==null){
       $this->contenido=new Paginas();
       $this->contenido->setPagina("Noticias");
       $this->contenido->setContenido("Pagina de noticias");
    }
    
  }
  
  
  
}
