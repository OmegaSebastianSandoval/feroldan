<?php
/**
* Controlador de Archivos que permite la  creacion, edicion  y eliminacion de los archivos del Sistema
*/
class Administracion_archivosController extends Administracion_mainController
{
	/**
	 * $mainModel  instancia del modelo de  base de datos archivos
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
	protected $_csrf_section = "administracion_archivos";

	/**
	 * $namepages nombre de la pvariable en la cual se va a guardar  el numero de seccion en la paginacion del controlador
	 * @var string
	 */
	protected $namepages;



	/**
     * Inicializa las variables principales del controlador archivos .
     *
     * @return void.
     */
	public function init()
	{
		$this->mainModel = new Administracion_Model_DbTable_Archivos();
		$this->namefilter = "parametersfilterarchivos";
		$this->route = "/administracion/archivos";
		$this->namepages ="pages_archivos";
		$this->namepageactual ="page_actual_archivos";
		$this->_view->route = $this->route;
		if(Session::getInstance()->get($this->namepages)){
			$this->pages = Session::getInstance()->get($this->namepages);
		} else {
			$this->pages = 20;
		}
		parent::init();
	}


	/**
     * Recibe la informacion y  muestra un listado de  archivos con sus respectivos filtros.
     *
     * @return void.
     */
	public function indexAction()
	{
		$title = "Aministración de archivos";
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
	}

	/**
     * Genera la Informacion necesaria para editar o crear un  archivos  y muestra su formulario
     *
     * @return void.
     */
	public function manageAction()
	{
		$this->_view->route = $this->route;
		$this->_csrf_section = "manage_archivos_".date("YmdHis");
		$this->_csrf->generateCode($this->_csrf_section);
		$this->_view->csrf_section = $this->_csrf_section;
		$this->_view->csrf = Session::getInstance()->get('csrf')[$this->_csrf_section];
		$id = $this->_getSanitizedParam("id");
		if ($id > 0) {
			$content = $this->mainModel->getById($id);
			if($content->archivos_id){
				$this->_view->content = $content;
				$this->_view->routeform = $this->route."/update";
				$title = "Actualizar archivos";
				$this->getLayout()->setTitle($title);
				$this->_view->titlesection = $title;
			}else{
				$this->_view->routeform = $this->route."/insert";
				$title = "Crear archivos";
				$this->getLayout()->setTitle($title);
				$this->_view->titlesection = $title;
			}
		} else {
			$this->_view->routeform = $this->route."/insert";
			$title = "Crear archivos";
			$this->getLayout()->setTitle($title);
			$this->_view->titlesection = $title;
		}
	}

	/**
     * Inserta la informacion de un archivos  y redirecciona al listado de archivos.
     *
     * @return void.
     */
	public function insertAction(){
		$this->setLayout('blanco');
		$csrf = $this->_getSanitizedParam("csrf");
		if (Session::getInstance()->get('csrf')[$this->_getSanitizedParam("csrf_section")] == $csrf ) {	
			$data = $this->getData();
			$uploadDocument =  new Core_Model_Upload_Document();
			if($_FILES['archivos_asociados']['name'] != ''){
				$data['archivos_asociados'] = $uploadDocument->upload("archivos_asociados");
			}
			$id = $this->mainModel->insert($data);
			
			$data['archivos_id']= $id;
			$data['log_log'] = print_r($data,true);
			$data['log_tipo'] = 'CREAR ARCHIVOS';
			$logModel = new Administracion_Model_DbTable_Log();
			$logModel->insert($data);
		}
		header('Location: '.$this->route.''.'');
	}

	/**
     * Recibe un identificador  y Actualiza la informacion de un archivos  y redirecciona al listado de archivos.
     *
     * @return void.
     */
	public function updateAction(){
		$this->setLayout('blanco');
		$csrf = $this->_getSanitizedParam("csrf");
		if (Session::getInstance()->get('csrf')[$this->_getSanitizedParam("csrf_section")] == $csrf ) {
			$id = $this->_getSanitizedParam("id");
			$content = $this->mainModel->getById($id);
			if ($content->archivos_id) {
				$data = $this->getData();
					$uploadDocument =  new Core_Model_Upload_Document();
				if($_FILES['archivos_asociados']['name'] != ''){
					if($content->archivos_asociados){
						$uploadDocument->delete($content->archivos_asociados);
					}
					$data['archivos_asociados'] = $uploadDocument->upload("archivos_asociados");
				} else {
					$data['archivos_asociados'] = $content->archivos_asociados;
				}
				$this->mainModel->update($data,$id);
			}
			$data['archivos_id']=$id;
			$data['log_log'] = print_r($data,true);
			$data['log_tipo'] = 'EDITAR ARCHIVOS';
			$logModel = new Administracion_Model_DbTable_Log();
			$logModel->insert($data);}
		header('Location: '.$this->route.''.'');
	}
	public function cargaAction()
	{
		$id = 1;
		$content = $this->mainModel->getById($id);
		$archivo = $content->archivos_asociados;
		$this->getLayout()->setTitle("Importar Asociados");

		//leer archivo
    	ini_set('memory_limit', '-1');
    	ini_set('max_execution_time', 300);
    	$inputFileName = FILE_PATH.'/'.$archivo;
   		$objPHPExcel = PHPExcel_IOFactory::load($inputFileName);
		$infoexel = $objPHPExcel->getActiveSheet()->toArray(null,true,true,true);
		$userModel = new Administracion_Model_DbTable_Usuario();
		$i=0;

		foreach ($infoexel as $fila) {
			$i++;
			if($i>1){
				$data['user_cedula'] = $fila[A];
				$data['user_names'] = $fila[B];
				$data['user_user'] = $fila[C];
				$data['user_password'] = ($fila[D]); 
				$data['user_email'] = $fila[E];
				$data['user_telefono'] = $fila[F];
				$data['user_level'] = 2;
				$data['user_state'] = 1;
				$data['user_delete'] = 1;
				$data['user_current_user'] = 1;
				$data['user_code'] = 1;
				$data['user_date'] = date("Y-m-d");
				$userModel->insert($data);
				$cedula = $data['user_user'];
				$userid = $userModel->getList("user_user = '$cedula'","")[0]->user_id;
				if ($data['user_telefono'] != "") {
					$userModel->editField($userid, "user_telefono", $data['user_telefono'] );
				}

			}
		}

		header("Location:/administracion/usuario");
	}
	/**
     * Recibe un identificador  y elimina un archivos  y redirecciona al listado de archivos.
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
					$uploadDocument =  new Core_Model_Upload_Document();
					if (isset($content->archivos_asociados) && $content->archivos_asociados != '') {
						$uploadDocument->delete($content->archivos_asociados);
					}
					$this->mainModel->deleteRegister($id);$data = (array)$content;
					$data['log_log'] = print_r($data,true);
					$data['log_tipo'] = 'BORRAR ARCHIVOS';
					$logModel = new Administracion_Model_DbTable_Log();
					$logModel->insert($data); }
			}
		}
		header('Location: '.$this->route.''.'');
	}

	/**
     * Recibe la informacion del formulario y la retorna en forma de array para la edicion y creacion de Archivos.
     *
     * @return array con toda la informacion recibida del formulario.
     */
	private function getData()
	{
		$data = array();
		$data['archivos_asociados'] = "";
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
            if ($filters->archivos_asociados != '') {
                $filtros = $filtros." AND archivos_asociados LIKE '%".$filters->archivos_asociados."%'";
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
					$parramsfilter['archivos_asociados'] =  $this->_getSanitizedParam("archivos_asociados");Session::getInstance()->set($this->namefilter, $parramsfilter);
        }
        if ($this->_getSanitizedParam("cleanfilter") == 1) {
            Session::getInstance()->set($this->namefilter, '');
            Session::getInstance()->set($this->namepageactual,1);
        }
    }
}