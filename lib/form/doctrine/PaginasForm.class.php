<?php

/**
 * Paginas form.
 *
 * @package    Botica
 * @subpackage form
 * @author     Ricardo Alcantara <richpolis@gmail.com>
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class PaginasForm extends BasePaginasForm
{
  public function configure()
  {
      unset($this['created_at'], $this['updated_at']);
      $this->widgetSchema['slug'] = new sfWidgetFormInputHidden();
      
      $this->widgetSchema['imagen'] = new sfWidgetFormInputFileEditable(array(
           'label'     => 'Imagen',
           'file_src'  => '/uploads/assets/'.$this->getObject()->getImagen(),
           'is_image'  => true,
           'edit_mode' => !$this->isNew(),
           'template'  => '<div><img src="/uploads/assets/'.$this->getObject()->getImagen().'" style="max-width:200px;"/><br /><label></label>%input%<br />%delete% %delete_label%<label></label></div>',
      ));


      $this->validatorSchema['imagen'] = new sfValidatorFile(array(
           'required'   => false,
           'mime_types' => 'web_images',
           'path' => sfConfig::get('sf_upload_dir').'/assets'
      ));
      
      $this->validatorSchema['imagen_delete'] = new sfValidatorBoolean();
      
      $this->widgetSchema['fondo'] = new sfWidgetFormInputFileEditable(array(
           'label'     => 'Fondo de pagina',
           'file_src'  => '/uploads/assets/'.$this->getObject()->getFondo(),
           'is_image'  => true,
           'edit_mode' => !$this->isNew(),
           'template'  => '<div><img src="/uploads/assets/'.$this->getObject()->getFondo().'" style="max-width:200px;"/><br /><label></label>%input%<br />%delete% %delete_label%<label></label></div>',
      ));


      $this->validatorSchema['fondo'] = new sfValidatorFile(array(
           'required'   => false,
           'mime_types' => 'web_images',
           'path' => sfConfig::get('sf_upload_dir').'/assets'
      ));
      
      $this->validatorSchema['fondo_delete'] = new sfValidatorBoolean();
      
      $this->widgetSchema['contenido'] = new sfWidgetFormTextareaTinyMCE(array(
                'width' => 500,
                'height' => 250,
       ));
      /*$this->widgetSchema['contenido'] = new sfWidgetFormTextarea(array(), array('cols' => '60','rows'=>'8'));*/
     
  }
}
