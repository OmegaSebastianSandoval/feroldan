<?php 

/**
*
*/

class Page_reglamentosController extends Page_mainController
{

	public function indexAction()
	{
        $formatoModel = new Page_Model_DbTable_Formatos();
        $this->_view->reglamentos = $formatoModel->getList("formato_seccion = '2'", "orden ASC");
        $this->_view->reglamentosdocs = $this->template->getContentseccion(14);
	}

}