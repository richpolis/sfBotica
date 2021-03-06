<?php

/**
 * BaseClientes
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property string $cliente
 * @property string $imagen
 * @property boolean $is_active
 * @property integer $position
 * 
 * @method string   getCliente()   Returns the current record's "cliente" value
 * @method string   getImagen()    Returns the current record's "imagen" value
 * @method boolean  getIsActive()  Returns the current record's "is_active" value
 * @method integer  getPosition()  Returns the current record's "position" value
 * @method Clientes setCliente()   Sets the current record's "cliente" value
 * @method Clientes setImagen()    Sets the current record's "imagen" value
 * @method Clientes setIsActive()  Sets the current record's "is_active" value
 * @method Clientes setPosition()  Sets the current record's "position" value
 * 
 * @package    Botica
 * @subpackage model
 * @author     Ricardo Alcantara <richpolis@gmail.com>
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseClientes extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('clientes');
        $this->hasColumn('cliente', 'string', 255, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 255,
             ));
        $this->hasColumn('imagen', 'string', 255, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 255,
             ));
        $this->hasColumn('is_active', 'boolean', null, array(
             'type' => 'boolean',
             'notnull' => false,
             'default' => true,
             ));
        $this->hasColumn('position', 'integer', 4, array(
             'type' => 'integer',
             'length' => 4,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $timestampable0 = new Doctrine_Template_Timestampable();
        $sortable0 = new Doctrine_Template_Sortable();
        $sluggable0 = new Doctrine_Template_Sluggable(array(
             'fields' => 
             array(
              0 => 'cliente',
             ),
             'unique' => true,
             'canUpdate' => true,
             ));
        $this->actAs($timestampable0);
        $this->actAs($sortable0);
        $this->actAs($sluggable0);
    }
}