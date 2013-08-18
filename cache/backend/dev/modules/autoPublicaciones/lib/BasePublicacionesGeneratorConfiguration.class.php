<?php

/**
 * publicaciones module configuration.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage publicaciones
 * @author     ##AUTHOR_NAME##
 * @version    SVN: $Id: configuration.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BasePublicacionesGeneratorConfiguration extends sfModelGeneratorConfiguration
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
    return array(  '_edit' =>   array(    'label' => 'Editar',  ),  '_delete' =>   array(    'label' => 'Eliminar',  ),);
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
    return '%%categorias_publicaciones%% - %%position%% - %%titulo%% - %%is_active%%';
  }

  public function getListLayout()
  {
    return 'tabular';
  }

  public function getListTitle()
  {
    return 'Publicaciones';
  }

  public function getEditTitle()
  {
    return 'Modificar Publicacion "%%titulo%%"';
  }

  public function getNewTitle()
  {
    return 'Crear Publicacion';
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
    return array(  'Galeria' =>   array(    0 => '_photoUpload',  ),  'Publicacion' =>   array(    0 => 'categoria_id',    1 => 'titulo',    2 => 'contenido',    3 => 'descripcion_corta',    4 => 'is_active',  ),);
  }

  public function getNewDisplay()
  {
    return array(  'Categorias' =>   array(    0 => 'categoria_id',    1 => 'titulo',    2 => 'contenido',    3 => 'descripcion_corta',    4 => 'is_active',  ),);
  }

  public function getListDisplay()
  {
    return array(  0 => 'categorias_publicaciones',  1 => 'position',  2 => 'titulo',  3 => 'is_active',);
  }

  public function getFieldsDefault()
  {
    return array(
      'id' => array(  'is_link' => true,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
      'categoria_id' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'ForeignKey',  'label' => 'Categoria',),
      'titulo' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',  'label' => 'Titulo',),
      'contenido' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
      'descripcion_corta' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
      'is_active' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Boolean',  'label' => 'Activa',  'help' => 'Para desactivar o activar publicacion',),
      'thumbnail' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
      'position' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',  'label' => 'Orden',),
      'created_at' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Date',),
      'updated_at' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Date',),
      'slug' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
      'categorias_publicaciones' => array(  'is_link' => false,  'is_real' => false,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',  'label' => 'Categoria',),
    );
  }

  public function getFieldsList()
  {
    return array(
      'id' => array(),
      'categoria_id' => array(),
      'titulo' => array(),
      'contenido' => array(),
      'descripcion_corta' => array(),
      'is_active' => array(),
      'thumbnail' => array(),
      'position' => array(),
      'created_at' => array(),
      'updated_at' => array(),
      'slug' => array(),
    );
  }

  public function getFieldsFilter()
  {
    return array(
      'id' => array(),
      'categoria_id' => array(),
      'titulo' => array(),
      'contenido' => array(),
      'descripcion_corta' => array(),
      'is_active' => array(),
      'thumbnail' => array(),
      'position' => array(),
      'created_at' => array(),
      'updated_at' => array(),
      'slug' => array(),
    );
  }

  public function getFieldsForm()
  {
    return array(
      'id' => array(),
      'categoria_id' => array(),
      'titulo' => array(),
      'contenido' => array(),
      'descripcion_corta' => array(),
      'is_active' => array(),
      'thumbnail' => array(),
      'position' => array(),
      'created_at' => array(),
      'updated_at' => array(),
      'slug' => array(),
    );
  }

  public function getFieldsEdit()
  {
    return array(
      'id' => array(),
      'categoria_id' => array(),
      'titulo' => array(),
      'contenido' => array(),
      'descripcion_corta' => array(),
      'is_active' => array(),
      'thumbnail' => array(),
      'position' => array(),
      'created_at' => array(),
      'updated_at' => array(),
      'slug' => array(),
    );
  }

  public function getFieldsNew()
  {
    return array(
      'id' => array(),
      'categoria_id' => array(),
      'titulo' => array(),
      'contenido' => array(),
      'descripcion_corta' => array(),
      'is_active' => array(),
      'thumbnail' => array(),
      'position' => array(),
      'created_at' => array(),
      'updated_at' => array(),
      'slug' => array(),
    );
  }


  /**
   * Gets the form class name.
   *
   * @return string The form class name
   */
  public function getFormClass()
  {
    return 'PublicacionesForm';
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
    return 'PublicacionesFormFilter';
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
    return 'retrieveBackendCategoriasList';
  }

  public function getTableCountMethod()
  {
    return '';
  }
}
