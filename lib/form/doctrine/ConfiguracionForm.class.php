<?php

/**
 * Configuracion form.
 *
 * @package    Botica
 * @subpackage form
 * @author     Richpolis Systems <richpolis@gmail.com>
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class ConfiguracionForm extends BaseConfiguracionForm
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
           'template'  => '<div><img src="/uploads/assets/'.$this->getObject()->getImagen().'" style="max-heigth:200px"/><br /><label></label>%input%<br />%delete% %delete_label%<label></label></div>',
      ));


      $this->validatorSchema['imagen'] = new sfValidatorFile(array(
           'required'   => false,
           'mime_types' => 'web_images',
           'path' => sfConfig::get('sf_upload_dir').'/assets'
      ));
  }
}
