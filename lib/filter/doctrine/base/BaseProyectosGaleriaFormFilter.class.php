<?php

/**
 * ProyectosGaleria filter form base class.
 *
 * @package    Botica
 * @subpackage filter
 * @author     Ricardo Alcantara <richpolis@gmail.com>
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseProyectosGaleriaFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'publicacion_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Proyectos'), 'add_empty' => true)),
      'titulo'         => new sfWidgetFormFilterInput(),
      'contenido'      => new sfWidgetFormFilterInput(),
      'tipo_archivo'   => new sfWidgetFormFilterInput(),
      'archivo'        => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'thumbnail'      => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'position'       => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'publicacion_id' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Proyectos'), 'column' => 'id')),
      'titulo'         => new sfValidatorPass(array('required' => false)),
      'contenido'      => new sfValidatorPass(array('required' => false)),
      'tipo_archivo'   => new sfValidatorPass(array('required' => false)),
      'archivo'        => new sfValidatorPass(array('required' => false)),
      'thumbnail'      => new sfValidatorPass(array('required' => false)),
      'position'       => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
    ));

    $this->widgetSchema->setNameFormat('proyectos_galeria_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'ProyectosGaleria';
  }

  public function getFields()
  {
    return array(
      'id'             => 'Number',
      'publicacion_id' => 'ForeignKey',
      'titulo'         => 'Text',
      'contenido'      => 'Text',
      'tipo_archivo'   => 'Text',
      'archivo'        => 'Text',
      'thumbnail'      => 'Text',
      'position'       => 'Number',
    );
  }
}
