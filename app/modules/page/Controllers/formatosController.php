<?php 

/**
*
*/

class Page_formatosController extends Page_mainController
{

	public function indexAction()
	{
        $formatoModel = new Page_Model_DbTable_Formatos();
        $this->_view->formato = $formatoModel->getList("formato_seccion = '1'", "orden ASC");
        $this->_view->formatosdocs = $this->template->getContentseccion(15);
	}

}