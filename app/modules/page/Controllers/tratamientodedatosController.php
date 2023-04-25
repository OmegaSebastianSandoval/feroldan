<?php 

/**
*
*/

class Page_tratamientodedatosController extends Page_mainController
{

	public function indexAction()
	{
		$this->_view->tratamiento = $this->template->getContentseccion(9);
	}

}