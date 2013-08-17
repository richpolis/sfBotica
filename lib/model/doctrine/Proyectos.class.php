<?php

/**
 * Proyectos
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @package    Botica
 * @subpackage model
 * @author     Richpolis Systems <richpolis@gmail.com>
 * @version    SVN: $Id: Builder.php 6820 2009-11-30 17:27:49Z jwage $
 */

class Proyectos extends BaseProyectos
{
    public function __toString() {
        return $this->getTitulo();
    }
    
    public function getCategoriaSlug(){
        return $this->getCategoriasProyectos()->getSlug();
    }
    
    public function getThumbnailValid(){
        $file=$this->getThumbnail();
        if(file_exists(sfConfig::get('sf_upload_dir').'/publicaciones/'.$file)){
           return "http://".$_SERVER['HTTP_HOST'].'/uploads/publicaciones/'.$file;
        }else{
              return "http://".$_SERVER['HTTP_HOST'].'/uploads/publicaciones/thumbnails/bg_negro.png'; 
        } 
    }
    
    public function getHtmlThumbnail(){
            return sprintf(<<<EOF
<div class="contenedor-archivo-galeria"> 
<img src="%s" />
</div>                    
EOF
    ,$this->getThumbnailValid());


     }
    public function getTituloCorto($max=15){
        return sfRichSys::cut_string($this->getTitulo(),$max);
    }
    public function getTituloCortoBackend($max=15){
        return substr($this->getTitulo(),0,$max);
    }
     
    public function getContenidoCorto($max=150){
        //$texto=htmlentitites($this->getContenido());
        $texto = strip_tags($this->getContenido());
        //$texto=  str_replace("&amp;", "&", $texto);
        return sfRichSys::cut_string2($texto,$max);
    }
    
    public function getContenidoMediano($max=700){
        //$texto=htmlentitites($this->getContenido());
        $texto = strip_tags($this->getContenido());
        //$texto=  str_replace("&amp;", "&", $texto);
        return sfRichSys::cut_string($texto,$max);
    }
    public function  delete(Doctrine_Connection $conn = null) {
        return parent::delete($conn);
    }
    
    public function save(Doctrine_Connection $conn = null) {
        if($this->isModified())
        {
            $fileImagen = sfConfig::get('sf_upload_dir') . '/publicaciones/'.$this->getThumbnail();
            $img = new sfImage($fileImagen,sfRichSys::getTipoMime($this->getThumbnail()));
            $img->thumbnail(220,220,'center');
            $img->save();

        }

        if(!$this->getPosition()){
            $this->setPosition(Doctrine_Core::getTable('Proyectos')->getMaximo());
        }
        
        parent::save($conn);
        
    }
    
    public function update(){
        parent::save();
    }
    
    
    
}
