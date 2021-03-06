<?php

/**
 * catproyectos module configuration.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage catproyectos
 * @author     ##AUTHOR_NAME##
 * @version    SVN: $Id: helper.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseCatproyectosGeneratorHelper extends sfModelGeneratorHelper
{
  public function getUrlForAction($action)
  {
    return 'list' == $action ? 'categorias_proyectos' : 'categorias_proyectos_'.$action;
  }
}
