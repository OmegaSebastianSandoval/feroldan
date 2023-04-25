<?php 

/**
*
*/

class Page_serviciosController extends Page_mainController
{

	public function indexAction()
	{
		$contenidoModel = new Page_Model_DbTable_Contenido();
        $this->_view->botonesservicios= $contenidoModel->getList("contenido_seccion = '13' AND contenido_padre = '0'", "orden ASC");
		$this->_view->servicios = $this->template->getContentseccion(13);
	}

}