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
          $this->widgetSchema['contenido'] = new sfWidgetFormTextareaTinyMCE(array(
                'width' => 500,
                'height' => 250,
          ));
          $this->widgetSchema['descripcion_corta'] = new sfWidgetFormTextareaTinyMCE(array(
                'width' => 500,
                'height' => 250,
          ));
  }
}
