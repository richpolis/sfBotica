<?php

/**
 * CategoriasPublicaciones form.
 *
 * @package    Botica
 * @subpackage form
 * @author     Richpolis Systems <richpolis@gmail.com>
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class CategoriasPublicacionesForm extends BaseCategoriasPublicacionesForm
{
  public function configure()
  {
      unset($this['created_at'], $this['updated_at']);
      $this->widgetSchema['position'] = new sfWidgetFormInputHidden();
      
  }
}
