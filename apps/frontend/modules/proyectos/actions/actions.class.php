<?php

/**
 * proyectos actions.
 *
 * @package    Botica
 * @subpackage proyectos
 * @author     Ricardo Alcantara <richpolis@gmail.com>
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class proyectosActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
    $this->categoria_actual=new CategoriasPublicaciones();
    $this->categoria_actual->setCategoria("Ultimas notas");
    $this->registros=  Doctrine_Core::getTable('Proyectos')->findAll();
    $this->cuantos=Doctrine_Core::getTable('Proyectos')->count();
    $this->filas=  ceil($this->cuantos/3);
    
    $this->categorias = Doctrine_Core::getTable('CategoriasProyectos')->getCategoriasActivas();
    
    $this->contenido=  Doctrine_Core::getTable('Paginas')->findOneBy('slug', 'proyectos');
      
    if($this->contenido==null){
          
          $this->contenido=new Paginas();
          $this->contenido->setPagina("Portafolio");
          $this->contenido->setContenido("Pagina de proyectos");
          
    }

    if(sfRichSys::detectarNavegador()=="IE"){
      $this->setTemplate("index2");
    }
    
     
  } 
    
    
  public function executeCategoria(sfWebRequest $request)
  {
    $this->categorias=Doctrine_Core::getTable('CategoriasProyectos')->getCategoriasActivas();
    if($request->hasParameter('slug')){
       $this->categoria=Doctrine_Core::getTable('CategoriasProyectos')->findBy('slug', $request->getParameter('slug'));
       $this->categoria_actual=$this->categoria[0];
    }else{
        if($this->categorias!=null){
            $this->categoria_actual=$this->categorias[0];
        }else{
            $this->categoria_actual=0;
        }
    }
    if($this->categoria_actual){
        $q=  Doctrine_Core::getTable('Proyectos')->getCriteriaPorCategoria($this->categoria_actual->getId());   
        $this->registros=$q->execute();
        $this->cuantos=count($this->registros);
        $this->filas=  ceil($this->cuantos/3);
    }else{
        $this->registros=null;
        $this->cuantos=0;
        $this->filas=0;
    }
    
    $this->contenido = Doctrine_Core::getTable('Paginas')->findOneBy('slug', 'proyectos');

    if ($this->contenido == null) {
            $this->contenido = new Paginas();
            $this->contenido->setPagina("Portafolio");
            $this->contenido->setContenido("Pagina de proyectos");
    }
    
    if(sfRichSys::detectarNavegador()=="IE"){
      $this->setTemplate("categoria2");
    }
   
  }
  public function executePublicacion(sfWebRequest $request) {
        $this->categorias = Doctrine_Core::getTable('CategoriasProyectos')->getCategoriasActivas();

        if ($request->hasParameter('categoria_slug')) {
            $this->categoria = Doctrine_Core::getTable('CategoriasProyectos')->findBy('slug', $request->getParameter('categoria_slug'));
            $this->categoria_actual = $this->categoria[0];
        } else {
            if ($this->categorias != null) {
                $this->categoria_actual = $this->categorias[0];
            } else {
                $this->categoria_actual = 0;
            }
        }

        if ($request->hasParameter('slug')) {
            $this->publicacion_actual = Doctrine_Core::getTable('Proyectos')->getPublicacionConGaleriaForSlug($request->getParameter('slug'));
        }
        if ($this->publicacion_actual) {
            $this->list_galeria = $this->publicacion_actual->getProyectosGaleria();
        } else {
            $this->list_galeria = null;
        }

        $this->contenido = Doctrine_Core::getTable('Paginas')->findOneBy('slug', 'proyectos');

        if ($this->contenido == null) {

            $this->contenido = new Paginas();
            $this->contenido->setPagina("Portafolio");
            $this->contenido->setContenido("Pagina de proyectos");
        }
    }
}
