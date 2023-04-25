<?php 

/**
*
*/

class Page_indexController extends Page_mainController
{

	public function indexAction()
	{
		$this->_view->bannerprincipal = $this->template->bannerprincipal(1);
		$this->_view->contenidohome = $this->template->getContentseccion(1);
		$modalModel = new Page_Model_DbTable_Publicidad();
		$this->_view->modal = $modalModel->getList("publicidad_seccion='3' AND publicidad_estado='1'","orden ASC")[0];
		$logrosModel = new Page_Model_DbTable_Logros();
		$this->_view->logros = $logrosModel->getList("","orden ASC");
		$this->_view->conveniostitulo = $this->template->getContentseccion(2);
		$contenidoModel = new Page_Model_DbTable_Contenido();
		$contenidoModel1 = new Page_Model_DbTable_Convenios();
		$this->_view->convenios = $contenidoModel1->getList();
		$this->_view->noticias = $contenidoModel->getListPages("contenido_seccion = '4' AND contenido_estado='1'", "contenido_fecha DESC, orden ASC", 0,3);
		$this->_view->empresas = $contenidoModel->getList("contenido_seccion = '5' AND contenido_estado='1'", "orden ASC");
		$this->_view->solucion = $this->template->getContentseccion(6);
		$this->_view->pop_up = $modalModel->getList("publicidad_seccion='3' AND publicidad_estado='1'","orden ASC");
	}

}