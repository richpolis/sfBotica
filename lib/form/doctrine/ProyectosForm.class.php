<?php

/**
 * Proyectos form.
 *
 * @package    Botica
 * @subpackage form
 * @author     Richpolis Systems <richpolis@gmail.com>
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class ProyectosForm extends BaseProyectosForm
{
  public function configure()
  {
	  unset($this['created_at'], $this['updated_at']);
          $this->widgetSchema['position'] = new sfWidgetFormInputHidden();
          $this->widgetSchema['slug'] = new sfWidgetFormInputHidden();
          $this->widgetSchema['thumbnail'] = new sfWidgetFormInputFileEditable(array(
            'file_src' => '/uploads/publicaciones/'. $this->getObject()->getThumbnail(),
            'is_image' => true,
            'edit_mode' => !$this->isNew(),
            'template' => '%file% %input%'
          ));
          
          $this->widgetSchema['contenido'] = new sfWidgetFormTextareaTinyMCE(array(
                'width' => 500,
                'height' => 250,
          ));

          $this->widgetSchema['descripcion_corta'] = new sfWidgetFormTextareaTinyMCE(array(
                'width' => 500,
                'height' => 250,
          ));

          $this->validatorSchema['thumbnail'] = new sfValidatorFile(array(
            'path' => sfConfig::get('sf_upload_dir').'/publicaciones',
            'required' => false,
            'mime_types' => 'web_images'
          ));
  }
}
