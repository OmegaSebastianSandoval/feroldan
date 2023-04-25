<?php
/**
* Controlador de Preguntas que permite la  creacion, edicion  y eliminacion de los preguntas del Sistema
*/
class Administracion_preguntasController extends Administracion_mainController
{
	/**
	 * $mainModel  instancia del modelo de  base de datos preguntas
	 * @var modeloContenidos
	 */
	public $mainModel;

	/**
	 * $route  url del controlador base
	 * @var string
	 */
	protected $route;

	/**
	 * $pages cantidad de registros a mostrar por pagina]
	 * @var integer
	 */
	protected $pages ;

	/**
	 * $namefilter nombre de la variable a la fual se le van a guardar los filtros
	 * @var string
	 */
	protected $namefilter;

	/**
	 * $_csrf_section  nombre de la variable general csrf  que se va a almacenar en la session
	 * @var string
	 */
	protected $_csrf_section = "administracion_preguntas";

	/**
	 * $namepages nombre de la pvariable en la cual se va a guardar  el numero de seccion en la paginacion del controlador
	 * @var string
	 */
	protected $namepages;



	/**
     * Inicializa las variables principales del controlador preguntas .
     *
     * @return void.
     */
	public function init()
	{
		$this->mainModel = new Administracion_Model_DbTable_Preguntas();
		$this->namefilter = "parametersfilterpreguntas";
		$this->route = "/administracion/preguntas";
		$this->namepages ="pages_preguntas";
		$this->namepageactual ="page_actual_preguntas";
		$this->_view->route = $this->route;
		if(Session::getInstance()->get($this->namepages)){
			$this->pages = Session::getInstance()->get($this->namepages);
		} else {
			$this->pages = 20;
		}
		parent::init();
	}


	/**
     * Recibe la informacion y  muestra un listado de  preguntas con sus respectivos filtros.
     *
     * @return void.
     */
	public function indexAction()
	{
		$title = "Aministración de preguntas";
		$this->getLayout()->setTitle($title);
		$this->_view->titlesection = $title;
		$this->filters();
		$this->_view->csrf = Session::getInstance()->get('csrf')[$this->_csrf_section];
		$filters =(object)Session::getInstance()->get($this->namefilter);
        $this->_view->filters = $filters;
		$filters = $this->getFilter();
		$order = "";
		$list = $this->mainModel->getList($filters,$order);
		$amount = $this->pages;
		$page = $this->_getSanitizedParam("page");
		if (!$page && Session::getInstance()->get($this->namepageactual)) {
		   	$page = Session::getInstance()->get($this->namepageactual);
		   	$start = ($page - 1) * $amount;
		} else if(!$page){
			$start = 0;
		   	$page=1;
			Session::getInstance()->set($this->namepageactual,$page);
		} else {
			Session::getInstance()->set($this->namepageactual,$page);
		   	$start = ($page - 1) * $amount;
		}
		$this->_view->register_number = count($list);
		$this->_view->pages = $this->pages;
		$this->_view->totalpages = ceil(count($list)/$amount);
		$this->_view->page = $page;
		$this->_view->lists = $this->mainModel->getListPages($filters,$order,$start,$amount);
		$this->_view->csrf_section = $this->_csrf_section;
		$this->_view->encuesta = $this->_getSanitizedParam("encuesta");
		$this->_view->list_pregunta_tipo = $this->getPreguntatipo();
		$this->_view->list_pregunta_ancho = $this->getPreguntaancho();
	}

	/**
     * Genera la Informacion necesaria para editar o crear un  pregunta  y muestra su formulario
     *
     * @return void.
     */
	public function manageAction()
	{
		$this->_view->route = $this->route;
		$this->_csrf_section = "manage_preguntas_".date("YmdHis");
		$this->_csrf->generateCode($this->_csrf_section);
		$this->_view->csrf_section = $this->_csrf_section;
		$this->_view->csrf = Session::getInstance()->get('csrf')[$this->_csrf_section];
		$this->_view->encuesta = $this->_getSanitizedParam("encuesta");
		$this->_view->list_pregunta_tipo = $this->getPreguntatipo();
		$this->_view->list_pregunta_ancho = $this->getPreguntaancho();
		$id = $this->_getSanitizedParam("id");
		if ($id > 0) {
			$content = $this->mainModel->getById($id);
			if($content->pregunta_id){
				$this->_view->content = $content;
				$this->_view->routeform = $this->route."/update";
				$title = "Actualizar pregunta";
				$this->getLayout()->setTitle($title);
				$this->_view->titlesection = $title;
			}else{
				$this->_view->routeform = $this->route."/insert";
				$title = "Crear pregunta";
				$this->getLayout()->setTitle($title);
				$this->_view->titlesection = $title;
			}
		} else {
			$this->_view->routeform = $this->route."/insert";
			$title = "Crear pregunta";
			$this->getLayout()->setTitle($title);
			$this->_view->titlesection = $title;
		}
	}

	/**
     * Inserta la informacion de un pregunta  y redirecciona al listado de preguntas.
     *
     * @return void.
     */
	public function insertAction(){
		$this->setLayout('blanco');
		$csrf = $this->_getSanitizedParam("csrf");
		if (Session::getInstance()->get('csrf')[$this->_getSanitizedParam("csrf_section")] == $csrf ) {	
			$data = $this->getData();
			$id = $this->mainModel->insert($data);
			
			$data['pregunta_id']= $id;
			$data['log_log'] = print_r($data,true);
			$data['log_tipo'] = 'CREAR PREGUNTA';
			$logModel = new Administracion_Model_DbTable_Log();
			$logModel->insert($data);
		}
		$encuesta = $this->_getSanitizedParam("pregunta_encuesta");
		header('Location: '.$this->route.'?encuesta='.$encuesta.'');
	}

	/**
     * Recibe un identificador  y Actualiza la informacion de un pregunta  y redirecciona al listado de preguntas.
     *
     * @return void.
     */
	public function updateAction(){
		$this->setLayout('blanco');
		$csrf = $this->_getSanitizedParam("csrf");
		if (Session::getInstance()->get('csrf')[$this->_getSanitizedParam("csrf_section")] == $csrf ) {
			$id = $this->_getSanitizedParam("id");
			$content = $this->mainModel->getById($id);
			if ($content->pregunta_id) {
				$data = $this->getData();
					$this->mainModel->update($data,$id);
			}
			$data['pregunta_id']=$id;
			$data['log_log'] = print_r($data,true);
			$data['log_tipo'] = 'EDITAR PREGUNTA';
			$logModel = new Administracion_Model_DbTable_Log();
			$logModel->insert($data);}
		$encuesta = $this->_getSanitizedParam("pregunta_encuesta");
		header('Location: '.$this->route.'?encuesta='.$encuesta.'');
	}

	/**
     * Recibe un identificador  y elimina un pregunta  y redirecciona al listado de preguntas.
     *
     * @return void.
     */
	public function deleteAction()
	{
		$this->setLayout('blanco');
		$csrf = $this->_getSanitizedParam("csrf");
		if (Session::getInstance()->get('csrf')[$this->_csrf_section] == $csrf ) {
			$id =  $this->_getSanitizedParam("id");
			if (isset($id) && $id > 0) {
				$content = $this->mainModel->getById($id);
				if (isset($content)) {
					$this->mainModel->deleteRegister($id);$data = (array)$content;
					$data['log_log'] = print_r($data,true);
					$data['log_tipo'] = 'BORRAR PREGUNTA';
					$logModel = new Administracion_Model_DbTable_Log();
					$logModel->insert($data); }
			}
		}
		$encuesta = $this->_getSanitizedParam("encuesta");
		header('Location: '.$this->route.'?encuesta='.$encuesta.'');
	}

	/**
     * Recibe la informacion del formulario y la retorna en forma de array para la edicion y creacion de Preguntas.
     *
     * @return array con toda la informacion recibida del formulario.
     */
	private function getData()
	{
		$data = array();
		$data['pregunta_encuesta'] = $this->_getSanitizedParamHtml("pregunta_encuesta");
		$data['pregunta_pregunta'] = $this->_getSanitizedParamHtml("pregunta_pregunta");
		$data['pregunta_texto'] = $this->_getSanitizedParamHtml("pregunta_texto");
		if($this->_getSanitizedParam("pregunta_tipo") == '' ) {
			$data['pregunta_tipo'] = '0';
		} else {
			$data['pregunta_tipo'] = $this->_getSanitizedParam("pregunta_tipo");
		}
		if($this->_getSanitizedParam("pregunta_obligatoria") == '' ) {
			$data['pregunta_obligatoria'] = '0';
		} else {
			$data['pregunta_obligatoria'] = $this->_getSanitizedParam("pregunta_obligatoria");
		}
		if($this->_getSanitizedParam("pregunta_ancho") == '' ) {
			$data['pregunta_ancho'] = '0';
		} else {
			$data['pregunta_ancho'] = $this->_getSanitizedParam("pregunta_ancho");
		}
		$data['pregunta_seccion'] = $this->_getSanitizedParamHtml("pregunta_seccion");
		return $data;
	}

	/**
     * Genera los valores del campo tipo pregunta.
     *
     * @return array cadena con los valores del campo tipo pregunta.
     */
	private function getPreguntatipo()
	{
		$array = array();
		$array['1'] = 'Texto';
		$array['2'] = 'Número';
		$array['3'] = 'Fecha';
		$array['4'] = 'Área de Texto';
		$array['5'] = 'Menú';
		$array['6'] = 'Si/No';
		$array['7'] = 'Unica respuesta';
		$array['8'] = 'Multiple respuesta';
		$array['9'] = 'Respuesta Abierta con enunciado';
		return $array;
	}


	/**
     * Genera los valores del campo ancho.
     *
     * @return array cadena con los valores del campo ancho.
     */
	private function getPreguntaancho()
	{
		$array = array();
		$array['12'] = '100%';
		$array['6'] = '1/2';
		$array['4'] = '1/3';
		$array['3'] = '1/4';
		return $array;
	}

	/**
     * Genera la consulta con los filtros de este controlador.
     *
     * @return array cadena con los filtros que se van a asignar a la base de datos
     */
    protected function getFilter()
    {
    	$filtros = " 1 = 1 ";
		$encuesta= $this->_getSanitizedParam("encuesta");
		$filtros = $filtros." AND pregunta_encuesta = '$encuesta' ";
        if (Session::getInstance()->get($this->namefilter)!="") {
            $filters =(object)Session::getInstance()->get($this->namefilter);
            if ($filters->pregunta_pregunta != '') {
                $filtros = $filtros." AND pregunta_pregunta LIKE '%".$filters->pregunta_pregunta."%'";
            }
            if ($filters->pregunta_texto != '') {
                $filtros = $filtros." AND pregunta_texto LIKE '%".$filters->pregunta_texto."%'";
            }
            if ($filters->pregunta_tipo != '') {
                $filtros = $filtros." AND pregunta_tipo ='".$filters->pregunta_tipo."'";
            }
            if ($filters->pregunta_obligatoria != '') {
                $filtros = $filtros." AND pregunta_obligatoria LIKE '%".$filters->pregunta_obligatoria."%'";
            }
            if ($filters->pregunta_ancho != '') {
                $filtros = $filtros." AND pregunta_ancho ='".$filters->pregunta_ancho."'";
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
        	Session::getInstance()->set($this->namepageactual,1);
            $parramsfilter = array();
			$parramsfilter['pregunta_pregunta'] =  $this->_getSanitizedParam("pregunta_pregunta");
			$parramsfilter['pregunta_texto'] =  $this->_getSanitizedParam("pregunta_texto");
			$parramsfilter['pregunta_tipo'] =  $this->_getSanitizedParam("pregunta_tipo");
			$parramsfilter['pregunta_obligatoria'] =  $this->_getSanitizedParam("pregunta_obligatoria");
			$parramsfilter['pregunta_ancho'] =  $this->_getSanitizedParam("pregunta_ancho");
			Session::getInstance()->set($this->namefilter, $parramsfilter);
        }
        if ($this->_getSanitizedParam("cleanfilter") == 1) {
            Session::getInstance()->set($this->namefilter, '');
            Session::getInstance()->set($this->namepageactual,1);
        }
    }
}