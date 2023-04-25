<?php

/**
 *
 */

class Page_contactenosController extends Page_mainController
{
	public function indexAction()
	{
		$contenidoModel = new Page_Model_DbTable_Contenido();
		$this->_view->pqrs = $contenidoModel->getList("contenido_seccion = '12'", "orden ASC");
		$this->_view->res = $this->_getSanitizedParam('res');
		$this->_view->politica = $contenidoModel->getList("contenido_id = '54'")[0];


	}
	public function enviarAction()
	{
		$this->setLayout('blanco');
		$data = [''];
		$data['nombre'] = $this->_getSanitizedParam('nombre');
		$data['email'] = $this->_getSanitizedParam('email');
		$data['telefono'] = $this->_getSanitizedParam('telefono');
		$data['ciudad'] = $this->_getSanitizedParam('ciudad');
		$data['mensaje'] = $this->_getSanitizedParam('mensaje');
		$email = new Core_Model_Sendingemail($this->_view);
		$res = $email->enviarcorreo($data);
		header("Location: /page/contactenos?res=" . $res);
	}
}
