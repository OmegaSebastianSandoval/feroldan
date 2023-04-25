<?php

/**
 * 
 */
class Page_Model_Template_Template
{

	protected $_view;

	function __construct($view)
	{
		$this->_view = $view;
	}


	public function getContentseccion($seccion)
	{
		$contenidoModel = new Page_Model_DbTable_Contenido();
		$contenidos = [];
		$rescontenidos = $contenidoModel->getList("contenido_seccion = '$seccion' AND contenido_padre = '0' AND contenido_estado = '1'", "orden ASC");
		foreach ($rescontenidos as $key => $contenido) {
			$contenidos[$key] = [];
			$contenidos[$key]['detalle'] = $contenido;
			$padre = $contenido->contenido_id;
			$hijos = $contenidoModel->getList($padre == 179 ? ("contenido_padre = '$padre' AND contenido_estado = 1") : ("contenido_padre = '$padre' AND contenido_estado = '1'"), "orden ASC");
			foreach ($hijos as $key2 => $hijo) {
				$padre = $hijo->contenido_id;
				$contenidos[$key]['hijos'][$key2] = [];
				$contenidos[$key]['hijos'][$key2]['detalle'] = $hijo;
				$nietos = $contenidoModel->getList("contenido_padre = '$padre' AND contenido_estado = '1' ", "orden ASC");
				if ($nietos) {
					$contenidos[$key]['hijos'][$key2]['hijos'] = $nietos;
					foreach ($nietos as $key3 => $subnietos) {
						$padre = $subnietos->contenido_id;
						$contenidos[$key]['hijos'][$key2]['hijos'][$key3] = [];
						$contenidos[$key]['hijos'][$key2]['hijos'][$key3]['nietos'] = $subnietos;
						$subnietos2 = $contenidoModel->getList("contenido_padre = '$padre' AND contenido_estado = '1'", "orden ASC");
						if ($subnietos2) {
							$contenidos[$key]['hijos'][$key2]['hijos'][$key3]['subnietos'] = $subnietos2;
							foreach ($subnietos2 as $key4 => $subsubnietos) {
								$padre = $subsubnietos->contenido_id;
								$contenidos[$key]['hijos'][$key2]['hijos'][$key3]['subnietos'][$key4] = [];
								$contenidos[$key]['hijos'][$key2]['hijos'][$key3]['detalle'][$key4]['subsubnietos'] = $subsubnietos;
								$subsubnietos2 = $contenidoModel->getList("contenido_padre = '$padre' AND contenido_estado = '1'", "orden ASC");
								if ($subsubnietos2) {
									$contenidos[$key]['hijos'][$key2]['hijos'][$key3]['subnietos'][$key4]['subsubnietos'] = $subsubnietos2;

									foreach ($subsubnietos2 as $key5 => $bisnietos) {
										$padre = $bisnietos->contenido_id;
										$contenidos[$key]['hijos'][$key2]['hijos'][$key3]['hijos'][$key4]['subsubnietos'][$key5] = [];
										$contenidos[$key]['hijos'][$key2]['hijos'][$key3]['hijos'][$key4]['detalle'][$key5]['bisnietos'] = $bisnietos;
										$bisnietos = $contenidoModel->getList("contenido_padre = '$padre' AND contenido_estado = '1'", "orden ASC");

										$contenidos['hijos_' . $padre] = $bisnietos;
									}
								}
							}
						}
					}
				}
			}
		}
		$this->_view->contenidos = $contenidos;
		/*echo "<pre>";
		print_r($contenidos);
		echo "</pre>";*/
		return $this->_view->getRoutPHP("modules/page/Views/template/contenedor.php");
	}

	public function bannerprincipal($seccion)
	{
		$this->_view->seccionbanner = $seccion;
		$publicidadModel = new Page_Model_DbTable_Publicidad();
		$this->_view->banners = $publicidadModel->getList("publicidad_seccion = '$seccion' AND publicidad_estado = 1", "orden ASC");

		return $this->_view->getRoutPHP("modules/page/Views/template/bannerprincipal.php");
	}
}
