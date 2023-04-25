<?php 

/**
*
*/

class Page_listaencuestaController extends Page_mainController
{
	public function indexAction()
	{
        $encuestaModel = new Page_Model_DbTable_Encuesta();
        $this->_view->encuestas = $encuestaModel->getList("1",""); 
    }

}