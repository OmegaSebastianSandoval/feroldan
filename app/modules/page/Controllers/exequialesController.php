<?php 

/**
*
*/

class Page_exequialesController extends Page_mainController
{

	public function indexAction()
	{
        $formatoModel = new Page_Model_DbTable_Formatos();
		$this->_view->exequiales = $formatoModel->getList("formato_seccion = '5'", "orden ASC");
	}

}