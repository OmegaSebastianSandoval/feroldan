<?php 

/**
*
*/

class Page_pruebaController extends Page_mainController
{

	public function indexAction()
	{
        $contenidoModel = new Page_Model_DbTable_Contenido();
        $this->_view->botonesnosotros= $contenidoModel->getList("contenido_seccion = '7' AND contenido_padre = '0'", "orden ASC");
		$this->_view->prueba = $this->template->getContentseccion(65);
	}

}