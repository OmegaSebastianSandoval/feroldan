<?php 

/**
*
*/

class Page_circularesinformativasController extends Page_mainController
{

	public function indexAction()
	{
        $formatoModel = new Page_Model_DbTable_Formatos();
        $this->_view->circularesinformativas = $formatoModel->getList("formato_seccion = '4'", "orden ASC");
        $this->_view->circularesinformativasdocs = $this->template->getContentseccion(17);
	}

}