<?php

/**
 * categorias module configuration.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage categorias
 * @author     ##AUTHOR_NAME##
 * @version    SVN: $Id: configuration.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseCategoriasGeneratorConfiguration extends sfModelGeneratorConfiguration
{
  public function getActionsDefault()
  {
    return array();
  }

  public function getFormActions()
  {
    return array(  '_list' =>   array(    'label' => 'Regresar a Lista',  ),  '_save' =>   array(    'label' => 'Guardar',  ),);
  }

  public function getNewActions()
  {
    return array();
  }

  public function getEditActions()
  {
    return array();
  }

  public function getListObjectActions()
  {
    return array(  'Arriba' =>   array(    'action' => 'promote',  ),  'Abajo' =>   array(    'action' => 'demote',  ),  '_edit' =>   array(    'label' => 'Editar',  ),  '_delete' =>   array(    'label' => 'Eliminar',  ),);
  }

  public function getListActions()
  {
    return array(  '_new' => NULL,);
  }

  public function getListBatchActions()
  {
    return array(  '_delete' => NULL,);
  }

  public function getListParams()
  {
    return '%%position%% - %%categoria%% - %%is_active%%';
  }

  public function getListLayout()
  {
    return 'tabular';
  }

  public function getListTitle()
  {
    return 'Categorias de Publicaciones';
  }

  public function getEditTitle()
  {
    return 'Modificar Categoria "%%categoria%%"';
  }

  public function getNewTitle()
  {
    return 'Crear Categoria';
  }

  public function getFilterDisplay()
  {
    return array();
  }

  public function getFormDisplay()
  {
    return array();
  }

  public function getEditDisplay()
  {
    return array(  'Publicaciones' =>   array(    0 => '_photoUpload',  ),  'Categorias' =>   array(    0 => 'categoria',    1 => 'is_active',  ),);
  }

  public function getNewDisplay()
  {
    return array(  'Categorias' =>   array(    0 => 'categoria',    1 => 'is_active',  ),);
  }

  public function getListDisplay()
  {
    return array(  0 => 'position',  1 => 'categoria',  2 => 'is_active',);
  }

  public function getFieldsDefault()
  {
    return array(
      'id' => array(  'is_link' => true,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
      'categoria' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',  'label' => 'Categoria',),
      'slug' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
      'is_active' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Boolean',  'label' => 'Activa',),
      'created_at' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Date',),
      'updated_at' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Date',),
      'position' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',  'label' => 'Orden',),
    );
  }

  public function getFieldsList()
  {
    return array(
      'id' => array(),
      'categoria' => array(),
      'slug' => array(),
      'is_active' => array(),
      'created_at' => array(),
      'updated_at' => array(),
      'position' => array(),
    );
  }

  public function getFieldsFilter()
  {
    return array(
      'id' => array(),
      'categoria' => array(),
      'slug' => array(),
      'is_active' => array(),
      'created_at' => array(),
      'updated_at' => array(),
      'position' => array(),
    );
  }

  public function getFieldsForm()
  {
    return array(
      'id' => array(),
      'categoria' => array(),
      'slug' => array(),
      'is_active' => array(),
      'created_at' => array(),
      'updated_at' => array(),
      'position' => array(),
    );
  }

  public function getFieldsEdit()
  {
    return array(
      'id' => array(),
      'categoria' => array(),
      'slug' => array(),
      'is_active' => array(),
      'created_at' => array(),
      'updated_at' => array(),
      'position' => array(),
    );
  }

  public function getFieldsNew()
  {
    return array(
      'id' => array(),
      'categoria' => array(),
      'slug' => array(),
      'is_active' => array(),
      'created_at' => array(),
      'updated_at' => array(),
      'position' => array(),
    );
  }


  /**
   * Gets the form class name.
   *
   * @return string The form class name
   */
  public function getFormClass()
  {
    return 'CategoriasPublicacionesForm';
  }

  public function hasFilterForm()
  {
    return true;
  }

  /**
   * Gets the filter form class name
   *
   * @return string The filter form class name associated with this generator
   */
  public function getFilterFormClass()
  {
    return 'CategoriasPublicacionesFormFilter';
  }

  public function getPagerClass()
  {
    return 'sfDoctrinePager';
  }

  public function getPagerMaxPerPage()
  {
    return 20;
  }

  public function getDefaultSort()
  {
    return array('position', 'asc');
  }

  public function getTableMethod()
  {
    return '';
  }

  public function getTableCountMethod()
  {
    return '';
  }
}
