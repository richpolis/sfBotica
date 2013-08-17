<?php

/**
 * Clientes form base class.
 *
 * @method Clientes getObject() Returns the current form's model object
 *
 * @package    Botica
 * @subpackage form
 * @author     Ricardo Alcantara <richpolis@gmail.com>
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseClientesForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'         => new sfWidgetFormInputHidden(),
      'cliente'    => new sfWidgetFormInputText(),
      'imagen'     => new sfWidgetFormInputText(),
      'is_active'  => new sfWidgetFormInputCheckbox(),
      'position'   => new sfWidgetFormInputText(),
      'created_at' => new sfWidgetFormDateTime(),
      'updated_at' => new sfWidgetFormDateTime(),
      'slug'       => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'         => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'cliente'    => new sfValidatorString(array('max_length' => 255)),
      'imagen'     => new sfValidatorString(array('max_length' => 255)),
      'is_active'  => new sfValidatorBoolean(array('required' => false)),
      'position'   => new sfValidatorInteger(array('required' => false)),
      'created_at' => new sfValidatorDateTime(),
      'updated_at' => new sfValidatorDateTime(),
      'slug'       => new sfValidatorString(array('max_length' => 255, 'required' => false)),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorAnd(array(
        new sfValidatorDoctrineUnique(array('model' => 'Clientes', 'column' => array('position'))),
        new sfValidatorDoctrineUnique(array('model' => 'Clientes', 'column' => array('slug'))),
      ))
    );

    $this->widgetSchema->setNameFormat('clientes[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Clientes';
  }

}
