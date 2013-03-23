<?php

/**
 * BaseConfiguracion
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property string $seccion
 * @property string $value
 * @property string $imagen
 * 
 * @method string        getSeccion() Returns the current record's "seccion" value
 * @method string        getValue()   Returns the current record's "value" value
 * @method string        getImagen()  Returns the current record's "imagen" value
 * @method Configuracion setSeccion() Sets the current record's "seccion" value
 * @method Configuracion setValue()   Sets the current record's "value" value
 * @method Configuracion setImagen()  Sets the current record's "imagen" value
 * 
 * @package    Botica
 * @subpackage model
 * @author     Ricardo Alcantara <richpolis@gmail.com>
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseConfiguracion extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('configuracion');
        $this->hasColumn('seccion', 'string', 255, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 255,
             ));
        $this->hasColumn('value', 'string', 100, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 100,
             ));
        $this->hasColumn('imagen', 'string', 255, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 255,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $timestampable0 = new Doctrine_Template_Timestampable();
        $sluggable0 = new Doctrine_Template_Sluggable(array(
             'fields' => 
             array(
              0 => 'seccion',
             ),
             'unique' => true,
             ));
        $this->actAs($timestampable0);
        $this->actAs($sluggable0);
    }
}