<?php

require_once dirname(__FILE__).'/../lib/gproyectosGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/gproyectosGeneratorHelper.class.php';

/**
 * gproyectos actions.
 *
 * @package    Botica
 * @subpackage gproyectos
 * @author     Ricardo Alcantara <richpolis@gmail.com>
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class gproyectosActions extends autoGproyectosActions
{
    protected function processForm(sfWebRequest $request, sfForm $form)
    {
        $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
        if ($form->isValid())
        {
        $notice = $form->getObject()->isNew() ? 'Registro fue creado correctamente.' : 'Registro fue actualizado correctamente.';

        try {
            $proyectos_galeria = $form->save();
        } catch (Doctrine_Validator_Exception $e) {

            $errorStack = $form->getObject()->getErrorStack();

            $message = get_class($form->getObject()) . ' has ' . count($errorStack) . " field" . (count($errorStack) > 1 ?  's' : null) . " with validation errors: ";
            foreach ($errorStack as $field => $errors) {
                $message .= "$field (" . implode(", ", $errors) . "), ";
            }
            $message = trim($message, ', ');

            $this->getUser()->setFlash('error', $message);
            return sfView::SUCCESS;
        }

        $this->dispatcher->notify(new sfEvent($this, 'admin.save_object', array('object' => $proyectos_galeria)));

            if ($request->hasParameter('_save_and_add'))
            {
                $this->getUser()->setFlash('notice', $notice.' You can add another one below.');

                $this->redirect('@proyectos_galeria_new');
            }
            else
            {
                $this->getUser()->setFlash('notice', $notice);

                $this->redirect(array('sf_route' => 'proyectos_galeria_edit', 'sf_subject' => $proyectos_galeria));
            }
        }
        else
        {
        $this->getUser()->setFlash('error', 'The item has not been saved due to some errors.', false);
        }
    }
    
    /**
     * por GET
     *
     * @param sfWebRequest $request
     */
    public function executeUpdateRegistroGaleria(sfWebRequest $request) {
        if ($request->isXmlHttpRequest()) {
            try{
                $registro = Doctrine_core::getTable('ProyectosGaleria')->find($request->getParameter('id'));
                $registro->setTitulo($request->getParameter('title'));
                $registro->setContenido($request->getParameter('contenido'));
                $registro->save();
            }catch(Exception $e){
                return $e->getMessage();
            }

            //return $this->renderPartial('li_galeria', array('registro' => $registro));
            $list_registros=Doctrine_core::getTable('ProyectosGaleria')->getGaleriaPorPublicacion($registro->getPublicaciones()->getId());
            return $this->renderPartial('proyectos/photoListe', array('list_registros' =>$list_registros));
        }
        else {
            $this->redirect404();
        }
    }
    public function executeNew(sfWebRequest $request)
    {
        if($request->hasParameter('publicacion_id')){
            $objeto=new ProyectosGaleria();
            $objeto->setPublicacionId($request->getParameter('publicacion_id'));
            if($request->hasParameter('tipo')){
                $tipo=$request->getParameter('tipo');
                if($tipo=="video"){
                    $objeto->setTipoArchivo(ProyectosGaleriaTable::$tipos_archivos['Link']);
                }
            }
            
            $this->form=new ProyectosGaleriaForm($objeto);
            $this->proyectos_galeria = $this->form->getObject();
        }else{
            $this->form = $this->configuration->getForm();
            $this->proyectos_galeria = $this->form->getObject();
        }
    }
}
