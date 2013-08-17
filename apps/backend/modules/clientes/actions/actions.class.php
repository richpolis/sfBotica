<?php

require_once dirname(__FILE__) . '/../lib/clientesGeneratorConfiguration.class.php';
require_once dirname(__FILE__) . '/../lib/clientesGeneratorHelper.class.php';

/**
 * clientes actions.
 *
 * @package    Botica
 * @subpackage clientes
 * @author     Ricardo Alcantara <richpolis@gmail.com>
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class clientesActions extends autoClientesActions {

    public function executePromote() {
        $object = Doctrine::getTable('Clientes')->findOneById($this->getRequestParameter('id'));

        $object->promote();
        $this->redirect("@clientes");
    }

    public function executeDemote() {
        $object = Doctrine::getTable('Clientes')->findOneById($this->getRequestParameter('id'));

        $object->demote();
        $this->redirect("@clientes");
    }

}
