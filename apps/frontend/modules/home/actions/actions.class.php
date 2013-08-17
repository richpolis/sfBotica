<?php
/**
 * home actions.
 *
 * @package    Botica
 * @subpackage home
 * @author     Richpolis Systems <richpolis@gmail.com>
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class homeActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
      /*if(!$this->getUser()-isAuthenticated()){
        return $this->redirect("@construccion");
      }*/
          
      $this->contenido=  Doctrine_Core::getTable('Paginas')->findOneBy('slug', 'home');
      
      if($this->contenido==null){
          
          $this->contenido=new Paginas();
          $this->contenido->setPagina("Inicio");
          $this->contenido->setContenido("Pagina de inicio");
          
      }
  }
  
  public function executeConstruccion(sfWebRequest $request){
      $this->setLayout(false);
  }
  
  public function executeServicios(sfWebRequest $request)
  {
      $this->contenido=  Doctrine_Core::getTable('Paginas')->findOneBy('slug', 'servicios');
      
      if($this->contenido==null){
          
          $this->contenido=new Paginas();
          $this->contenido->setPagina("Servicios");
          $this->contenido->setContenido("Pagina de servicios");
          
      }
  }
  
  public function executeNosotros(sfWebRequest $request)
  {
      $this->contenido=  Doctrine_Core::getTable('Paginas')->findOneBy('slug', 'nosotros');
      
      if($this->contenido==null){
          
          $this->contenido=new Paginas();
          $this->contenido->setPagina("Nosotros");
          $this->contenido->setContenido("Pagina de nosotros");
          
      }
  }
  
  public function executeClientes(sfWebRequest $request)
  {
      $this->contenido=  Doctrine_Core::getTable('Paginas')->findOneBy('slug', 'clientes');
      
      $this->clientes= Doctrine_Core::getTable('Clientes')->getClientesList();
      
      if($this->contenido==null){
          
          $this->contenido=new Paginas();
          $this->contenido->setPagina("Clientes");
          $this->contenido->setContenido("Pagina de clientes");
          
      }
  }
  
  public function executeContacto(sfWebRequest $request)
  {
    $this->form = new ContactForm();
    $this->mensaje_ok="";

    if ($request->isMethod('post'))
    {
      $this->form->bind($request->getParameter('contact'));
      if ($this->form->isValid())
      {
        $mailer = Swift_Mailer::newInstance(Swift_MailTransport::newInstance());
        $this->Datos=$this->getArregloMensaje($request->getParameter('contact'));
        $asunto=$this->Datos[2]['value'];
        //Creamos el mensaje
        $message = Swift_Message::newInstance($asunto)
                ->setFrom(array($this->Datos[0]['value']=>$this->Datos[1]['value']))
                ->setTo(array('info@boticaproject.com'))
                //->setTo(array('lizzy@Botica.com','cancinolizzy@yahoo.com','ventas@Botica.com'))
                ->setBody("Mensaje desde Botica.com")
                ->addPart($this->getMensajeFormateado($this->Datos), 'text/html');
        try{
        //Enviamos el email
           $mailer->send($message);
        }catch(Exception $e){
           echo "Error al enviar mensaje ". $e->getMessage();
        }

        $this->form=new ContactForm();
        $this->mensaje_ok="Gracias, nos comunicaremos a la brevedad posible";
      }
    }
    //$this->list_contactos=SfroxcasConfigPeer::retrieveByPK(1);
    if ($request->isXmlHttpRequest())
    {
       //return $this->renderText('ok');
        return $this->renderPartial('home/form_contacto', array('form' => $this->form,"mensaje_ok"=>$this->mensaje_ok));
    }
    
    $this->contenido=  Doctrine_Core::getTable('Paginas')->findOneBy('slug', 'contacto');
      
    if($this->contenido==null){
          
          $this->contenido=new Paginas();
          $this->contenido->setPagina("Contacto");
          $this->contenido->setContenido("Pagina de contacto");
          
    }
  }

  public function executeRenderImagen(sfWebRequest $request){
    $imagen=  $request->getParameter('imagen').'.'.$request->getParameter('sf_format');
    $fileImagen = sfConfig::get('sf_upload_dir').'/'.$request->getParameter('path').'/'.$imagen;
    
    //chmod($fileImagen, 0666);
    $img = new sfImage($fileImagen,sfRichSys::getTipoMime($imagen));
    
    $response = $this->getResponse();

    $response->setContentType($img->getMIMEType());    
    
    $img->thumbnail($request->getParameter('width'),$request->getParameter('height'),'center');
    
    $response->setContent($img); 

    return sfView::NONE;
  }
  
  public function executeRenderGrayscaleImagen(sfWebRequest $request){
    $imagen=  $request->getParameter('imagen').'.'.$request->getParameter('sf_format');
    $fileImagen = sfConfig::get('sf_upload_dir').'/'.$request->getParameter('path').'/'.$imagen;
    
    //chmod($fileImagen, 0666);
    $img = new sfImage($fileImagen,sfRichSys::getTipoMime($imagen));
    
    $response = $this->getResponse();

    $response->setContentType($img->getMIMEType());    
    
    if($img->getWidth()<$request->getParameter('width')){
        $img->resize(1000,null);
    }
    
    $img->thumbnail($request->getParameter('width'),$request->getParameter('height'),'deflate');
    
    $grayscale= new sfImageGreyscaleGD();
          
    $img=$grayscale->execute($img);
    
    $response->setContent($img); 

    return sfView::NONE;
  }
  
  /*
   * background-color: #ffcc00;
    color: white;
   *
   */
  protected function getMensajeFormateado($fields){
      $msg = '<font face="Lucida Grande,Corbel,Arial,sans-serif" color="#565656"><table border=0 cellpadding="4" cellspacing="5" width="500">
		<tr>
                    <td colspan="2" bgcolor="#181818" valign="middle" align="center">
                        <h2 style="margin:0;padding:8px;color:white;font-size: 24px;">
                            Boticaproject.com
                        </h2>
                    </td>
		</tr>
		<tr>
                    <td colspan="2">&nbsp;</td>
		</tr>';

		for($i=0;$i<count($fields);$i++){

			if(isset($fields[$i]['field']) && mb_strlen(trim($fields[$i]['field']),"utf-8") > 0){

				$fields[$i]['field'] = htmlspecialchars($fields[$i]['field']);

				$msg.= '<tr><td valign="top" bgcolor="#eeeeee"><small>'.$fields[$i]['label'].':&nbsp;&nbsp;&nbsp;</small></td><td>';

				if($fields[$i]['type'] == 'textArea'){
					$msg.=nl2br($fields[$i]['value']);
				}
				else if($fields[$i]['type'] == 'checkBox'){
					$msg.='Yes';
				/*}
				else if($fields[$i]['items']){
					$msg.= $fields[$i]['items']['field'];*/
                                }else $msg.= $fields[$i]['value'];

				$msg.='</td></tr>';
			}
		}

		$msg .= '</table></font>';
          return $msg;
  }
  protected function getArregloMensaje($Datos){
       $arreglo=array();

       $arreglo[0]['type']='Email';
       $arreglo[1]['type']='Text';
       $arreglo[2]['type']='Text';
       $arreglo[3]['type']='textArea';

       $arreglo[0]['field']='Email';
       $arreglo[1]['field']='Nombre';
       $arreglo[2]['field']='Asunto';
       $arreglo[3]['field']='Mensaje';

       $arreglo[0]['label']='Email';
       $arreglo[1]['label']='Nombre';
       $arreglo[2]['label']='Asunto';
       $arreglo[3]['label']='Mensaje';

       $arreglo[0]['items']='Email';
       $arreglo[1]['items']='Nombre';
       $arreglo[2]['items']='Asunto';
       $arreglo[3]['items']='Mensaje';

       $arreglo[0]['value']=$Datos['email'];
       $arreglo[1]['value']=$Datos['name'];
       $arreglo[2]['value']=$Datos['subject'];
       $arreglo[3]['value']=$Datos['message'];

       return $arreglo;
  }
  
 
  
  
}
