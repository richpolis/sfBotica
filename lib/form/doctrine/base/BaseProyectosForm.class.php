<?php

/**
 * Proyectos form base class.
 *
 * @method Proyectos getObject() Returns the current form's model object
 *
 * @package    Botica
 * @subpackage form
 * @author     Ricardo Alcantara <richpolis@gmail.com>
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseProyectosForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                => new sfWidgetFormInputHidden(),
      'categoria_id'      => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('CategoriasProyectos'), 'add_empty' => true)),
      'titulo'            => new sfWidgetFormInputText(),
      'contenido'         => new sfWidgetFormInputText(),
      'descripcion_corta' => new sfWidgetFormInputText(),
      'is_active'         => new sfWidgetFormInputCheckbox(),
      'thumbnail'         => new sfWidgetFormInputText(),
      'position'          => new sfWidgetFormInputText(),
      'created_at'        => new sfWidgetFormDateTime(),
      'updated_at'        => new sfWidgetFormDateTime(),
      'slug'              => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'                => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'categoria_id'      => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('CategoriasProyectos'), 'required' => false)),
      'titulo'            => new sfValidatorString(array('max_length' => 255)),
      'contenido'         => new sfValidatorPass(),
      'descripcion_corta' => new sfValidatorPass(),
      'is_active'         => new sfValidatorBoolean(array('required' => false)),
      'thumbnail'         => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'position'          => new sfValidatorInteger(array('required' => false)),
      'created_at'        => new sfValidatorDateTime(),
      'updated_at'        => new sfValidatorDateTime(),
      'slug'              => new sfValidatorString(array('max_length' => 255, 'required' => false)),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorDoctrineUnique(array('model' => 'Proyectos', 'column' => array('slug')))
    );

    $this->widgetSchema->setNameFormat('proyectos[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Proyectos';
  }

}
