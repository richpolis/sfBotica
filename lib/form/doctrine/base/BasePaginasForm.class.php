<?php

/**
 * Paginas form base class.
 *
 * @method Paginas getObject() Returns the current form's model object
 *
 * @package    Botica
 * @subpackage form
 * @author     Ricardo Alcantara <richpolis@gmail.com>
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BasePaginasForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'         => new sfWidgetFormInputHidden(),
      'pagina'     => new sfWidgetFormInputText(),
      'contenido'  => new sfWidgetFormInputText(),
      'imagen'     => new sfWidgetFormInputText(),
      'fondo'      => new sfWidgetFormInputText(),
      'created_at' => new sfWidgetFormDateTime(),
      'updated_at' => new sfWidgetFormDateTime(),
      'slug'       => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'         => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'pagina'     => new sfValidatorString(array('max_length' => 100)),
      'contenido'  => new sfValidatorPass(),
      'imagen'     => new sfValidatorString(array('max_length' => 255)),
      'fondo'      => new sfValidatorString(array('max_length' => 255)),
      'created_at' => new sfValidatorDateTime(),
      'updated_at' => new sfValidatorDateTime(),
      'slug'       => new sfValidatorString(array('max_length' => 255, 'required' => false)),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorDoctrineUnique(array('model' => 'Paginas', 'column' => array('slug')))
    );

    $this->widgetSchema->setNameFormat('paginas[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Paginas';
  }

}
