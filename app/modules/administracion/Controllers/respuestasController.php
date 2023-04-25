<?php
/**
* Controlador de Respuestas que permite la  creacion, edicion  y eliminacion de los respuestas del Sistema
*/
class Administracion_respuestasController extends Administracion_mainController
{
	/**
	 * $mainModel  instancia del modelo de  base de datos respuestas
	 * @var modeloContenidos
	 */
	private $mainModel;

	/**
	 * $route  url del controlador base
	 * @var string
	 */
	private $route;

	/**
	 * $pages cantidad de registros a mostrar por pagina]
	 * @var integer
	 */
	private $pages ;

	/**
	 * $namefilter nombre de la variable a la fual se le van a guardar los filtros
	 * @var string
	 */
	protected $namefilter;

	/**
	 * $_csrf_section  nombre de la variable general csrf  que se va a almacenar en la session
	 * @var string
	 */
	protected $_csrf_section = "page_respuestas";

	/**
	 * $namepages nombre de la pvariable en la cual se va a guardar  el numero de seccion en la paginacion del controlador
	 * @var string
	 */
	protected $namepages;



	/**
     * Inicializa las variables principales del controlador respuestas .
     *
     * @return void.
     */
	public function init()
	{
		$this->mainModel = new Administracion_Model_DbTable_Respuestas();
		$this->namefilter = "parametersfilterrespuestas";
		$this->route = "/page/respuestas";
		$this->namepages ="pages_respuestas";
		$this->_view->route = $this->route;
		if(Session::getInstance()->get($this->namepages)){
			$this->pages = Session::getInstance()->get($this->namepages);
		} else {
			$this->pages = 20;
		}
		parent::init();
	}


	/**
     * Recibe la informacion y  muestra un listado de  respuestas con sus respectivos filtros.
     *
     * @return void.
     */
	public function indexAction()
	{
		$this->setLayout('administracion_panel');
		$this->getLayout()->setTitle("Listar respuestas");
		$this->filters();
		$this->_view->csrf = Session::getInstance()->get('csrf')[$this->_csrf_section];
		$filters =(object)Session::getInstance()->get($this->namefilter);
        $this->_view->filters = $filters;
		$filters = $this->getFilter();
		$order = "";
		$list = $this->mainModel->getList($filters,$order);
		$amount = $this->pages;
		$page = $this->_getSanitizedParam("page");
		if (!$page) {
		   	$start = 0;
		   	$page=1;
		}
		else {
		   	$start = ($page - 1) * $amount;
		}
		$this->_view->register_number = count($list);
		$this->_view->pages = $this->pages;
		$this->_view->totalpages = ceil(count($list)/$amount);
		$this->_view->page = $page;
		$this->_view->lists = $this->mainModel->getListPages($filters,$order,$start,$amount);
		$this->_view->csrf_section = $this->_csrf_section;
	}

	/**
     * Genera la Informacion necesaria para editar o crear un  respuesta  y muestra su formulario
     *
     * @return void.
     */
	public function manageAction()
	{
		$this->_view->route = $this->route;
		$this->setLayout('administracion_panel');
		$this->_csrf_section = "manage_respuestas_".date("YmdHis");
		$this->_csrf->generateCode($this->_csrf_section);
		$this->_view->csrf_section = $this->_csrf_section;
		$this->_view->csrf = Session::getInstance()->get('csrf')[$this->_csrf_section];
		$id = $this->_getSanitizedParam("id");
		if ($id > 0) {
			$content = $this->mainModel->getById($id);
			if($content->respuesta_id){
				$this->_view->content = $content;
				$this->_view->routeform = $this->route."/update";
				$this->getLayout()->setTitle("Actualizar respuesta");
			}else{
				$this->_view->routeform = $this->route."/insert";
				$this->getLayout()->setTitle("Crear respuesta");
			}
		} else {
			$this->_view->routeform = $this->route."/insert";
			$this->getLayout()->setTitle("Crear respuesta");
		}
	}

	/**
     * Inserta la informacion de un respuesta  y redirecciona al listado de respuestas.
     *
     * @return void.
     */
	public function insertAction(){
		$csrf = $this->_getSanitizedParam("csrf");
		if (Session::getInstance()->get('csrf')[$this->_getSanitizedParam("csrf_section")] == $csrf ) {	
			$data = $this->getData();
			$id = $this->mainModel->insert($data);
			
		}
		header('Location: '.$this->route);
	}

	/**
     * Recibe un identificador  y Actualiza la informacion de un respuesta  y redirecciona al listado de respuestas.
     *
     * @return void.
     */
	public function updateAction(){
		$csrf = $this->_getSanitizedParam("csrf");
		if (Session::getInstance()->get('csrf')[$this->_getSanitizedParam("csrf_section")] == $csrf ) {
			$id = $this->_getSanitizedParam("id");
			$content = $this->mainModel->getById($id);
			if ($content->respuesta_id) {
				$data = $this->getData();
					$this->mainModel->update($data,$id);
			}
		}
		header('Location: '.$this->route);
	}

	/**
     * Recibe un identificador  y elimina un respuesta  y redirecciona al listado de respuestas.
     *
     * @return void.
     */
	public function deleteAction()
	{
		$csrf = $this->_getSanitizedParam("csrf");
		if (Session::getInstance()->get('csrf')[$this->_csrf_section] == $csrf ) {
			$id =  $this->_getSanitizedParam("id");
			if (isset($id) && $id > 0) {
				$content = $this->mainModel->getById($id);
				if (isset($content)) {
					$this->mainModel->deleteRegister($id);
				}
			}
		}
		header('Location: '.$this->route);
	}

	/**
     * Recibe la informacion del formulario y la retorna en forma de array para la edicion y creacion de Respuestas.
     *
     * @return array con toda la informacion recibida del formulario.
     */
	private function getData()
	{
		$data = array();
		$data['respuesta_valor'] = $this->_getSanitizedParam("respuesta_valor");
		if($this->_getSanitizedParam("respuesta_pregunta") == '' ) {
			$data['respuesta_pregunta'] = '0';
		} else {
			$data['respuesta_pregunta'] = $this->_getSanitizedParam("respuesta_pregunta");
		}
		$data['respuesta_usuario'] = $this->_getSanitizedParam("respuesta_usuario");
		$data['respuesta_fecha'] = $this->_getSanitizedParam("respuesta_fecha");
		return $data;
	}
	/**
     * Genera la consulta con los filtros de este controlador.
     *
     * @return array cadena con los filtros que se van a asignar a la base de datos
     */
    protected function getFilter()
    {

        $filtros = " 1 = 1 ";
        if (Session::getInstance()->get($this->namefilter)!="") {
            $filters =(object)Session::getInstance()->get($this->namefilter);
            if ($filters->respuesta_valor != '') {
                $filtros = $filtros." AND respuesta_valor LIKE '%".$filters->respuesta_valor."%'";
            }
            if ($filters->respuesta_pregunta != '') {
                $filtros = $filtros." AND respuesta_pregunta LIKE '%".$filters->respuesta_pregunta."%'";
            }
            if ($filters->respuesta_usuario != '') {
                $filtros = $filtros." AND respuesta_usuario LIKE '%".$filters->respuesta_usuario."%'";
            }
            if ($filters->respuesta_fecha != '') {
                $filtros = $filtros." AND respuesta_fecha LIKE '%".$filters->respuesta_fecha."%'";
            }
		}
        return $filtros;
    }

 /**
     * Recibe y asigna los filtros de este controlador
     *
     * @return void
     */
    protected function filters()
    {
        if ($this->getRequest()->isPost()== true) {
            $parramsfilter = array();$parramsfilter['respuesta_valor'] =  $this->_getSanitizedParam("respuesta_valor");$parramsfilter['respuesta_pregunta'] =  $this->_getSanitizedParam("respuesta_pregunta");$parramsfilter['respuesta_usuario'] =  $this->_getSanitizedParam("respuesta_usuario");$parramsfilter['respuesta_fecha'] =  $this->_getSanitizedParam("respuesta_fecha");Session::getInstance()->set($this->namefilter, $parramsfilter);
        }
        if ($this->_getSanitizedParam("cleanfilter") == 1) {
             Session::getInstance()->set($this->namefilter, '');
        }
    }


	public function exportarAction(){
		$encuestaModel = new Administracion_Model_DbTable_Encuesta();
		$preguntasModel = new Administracion_Model_DbTable_Preguntas();
		$respuestasModel = new Administracion_Model_DbTable_Respuestas();

		$encuesta_id = $this->_getSanitizedParam("id");
		$encuesta = $encuestaModel->getById($encuesta_id);
		$encuesta_nombre = $encuesta->encuesta_nombre;

		$respuestas = $respuestasModel->getRespuestas("pregunta_encuesta = '$encuesta_id' "," respuesta_usuario, respuesta_pregunta, respuesta_fecha");

		$this->_view->respuestas = $respuestas; 
		$this->_view->encuesta_nombre = $encuesta_nombre;

		$this->setLayout('blanco');
		$hoy = date("YmdHis");
		$excel = $this->_getSanitizedParam("excel");
		if($excel==1){
			header("Content-Type:   application/vnd.ms-excel; charset=utf-8");
			header("Content-type:   application/x-msexcel; charset=utf-8");
			header("Content-Disposition: attachment; filename=respuestas_encuesta_".$encuesta_nombre.$hoy.".xls");
		}

	}
	public function exportar1Action(){
		$encuestaModel = new Administracion_Model_DbTable_Encuesta();
		$preguntasModel = new Administracion_Model_DbTable_Preguntas();
		$respuestasModel = new Administracion_Model_DbTable_Respuestas();

		$encuesta_id = $this->_getSanitizedParam("id");
		$encuesta = $encuestaModel->getById($encuesta_id);
		$encuesta_nombre = $encuesta->encuesta_nombre;

		$respuestas = $respuestasModel->gettabulacionRespuestas("pregunta_encuesta = '$encuesta_id' AND respuesta_valor <> '' "," respuesta_valor");
		$this->_view->respuestas = $respuestas; 
		$this->_view->encuesta_nombre = $encuesta_nombre;

		$this->setLayout('blanco');
		$hoy = date("YmdHis");
		$excel = $this->_getSanitizedParam("excel");
		if($excel==1){
			header("Content-Type:   application/vnd.ms-excel; charset=utf-8");
			header("Content-type:   application/x-msexcel; charset=utf-8");
			header("Content-Disposition: attachment; filename=respuestas_encuesta_".$encuesta_nombre.$hoy.".xls");
		}

	}

}