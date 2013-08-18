<?php

/**
 * categorias module configuration.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage categorias
 * @author     ##AUTHOR_NAME##
 * @version    SVN: $Id: helper.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseCategoriasGeneratorHelper extends sfModelGeneratorHelper
{
  public function getUrlForAction($action)
  {
    return 'list' == $action ? 'categorias_publicaciones' : 'categorias_publicaciones_'.$action;
  }
}
