<?php
// auto-generated by sfViewConfigHandler
// date: 2013/08/17 13:23:08
$response = $this->context->getResponse();


  $templateName = sfConfig::get('symfony.view.'.$this->moduleName.'_'.$this->actionName.'_template', $this->actionName);
  $this->setTemplate($templateName.$this->viewName.$this->getExtension());



  if (null !== $layout = sfConfig::get('symfony.view.'.$this->moduleName.'_'.$this->actionName.'_layout'))
  {
    $this->setDecoratorTemplate(false === $layout ? false : $layout.$this->getExtension());
  }
  else if (null === $this->getDecoratorTemplate() && !$this->context->getRequest()->isXmlHttpRequest())
  {
    $this->setDecoratorTemplate('' == 'layout' ? false : 'layout'.$this->getExtension());
  }
  $response->addHttpMeta('content-type', 'text/html', false);
  $response->addMeta('title', 'Backend Botica', false, false);

  $response->addStylesheet('admin.css', '', array ());
  $response->addStylesheet('jquery-ui-1.8.9.custom.css', '', array ());
  $response->addStylesheet('jquery.Jcrop.css', '', array ());
  $response->addJavascript('jquery-ui-1.8.13.custom.min.js', '', array ());
  $response->addJavascript('tiny_mce/tiny_mce.js', 'last', array ());
  $response->addJavascript('jquery.chrony.min.js', '', array ());
  $response->addJavascript('jquery.Jcrop.min.js', '', array ());


