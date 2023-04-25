<?php
/**
* Controlador de Clasificados que permite la  creacion, edicion  y eliminacion de los clasificados del Sistema
*/
class Administracion_clasificadosController extends Administracion_mainController
{
	/**
	 * $mainModel  instancia del modelo de  base de datos clasificados
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
	protected $_csrf_section = "administracion_clasificados";

	/**
	 * $namepages nombre de la pvariable en la cual se va a guardar  el numero de seccion en la paginacion del controlador
	 * @var string
	 */
	protected $namepages;



	/**
     * Inicializa las variables principales del controlador clasificados .
     *
     * @return void.
     */
	public function init()
	{
		$this->mainModel = new Administracion_Model_DbTable_Clasificados();
		$this->namefilter = "parametersfilterclasificados";
		$this->route = "/administracion/clasificados";
		$this->namepages ="pages_clasificados";
		$this->namepageactual ="page_actual_clasificados";
		$this->_view->route = $this->route;
		if(Session::getInstance()->get($this->namepages)){
			$this->pages = Session::getInstance()->get($this->namepages);
		} else {
			$this->pages = 20;
		}
		parent::init();
	}


	/**
     * Recibe la informacion y  muestra un listado de  clasificados con sus respectivos filtros.
     *
     * @return void.
     */
	public function indexAction()
	{
		$title = "Aministración de clasificados";
		$this->getLayout()->setTitle($title);
		$this->_view->titlesection = $title;
		$this->filters();
		$this->_view->csrf = Session::getInstance()->get('csrf')[$this->_csrf_section];
		$filters =(object)Session::getInstance()->get($this->namefilter);
        $this->_view->filters = $filters;
		$filters = $this->getFilter();
		$order = "orden ASC";
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
		$this->_view->list_clasificados_categoria = $this->getClasificadoscategoria();
		$this->_view->list_clasificados_estado = $this->getClasificadosestado();
	}

	/**
     * Genera la Informacion necesaria para editar o crear un  clasificados  y muestra su formulario
     *
     * @return void.
     */
	public function manageAction()
	{
		$this->_view->route = $this->route;
		$this->_csrf_section = "manage_clasificados_".date("YmdHis");
		$this->_csrf->generateCode($this->_csrf_section);
		$this->_view->csrf_section = $this->_csrf_section;
		$this->_view->csrf = Session::getInstance()->get('csrf')[$this->_csrf_section];
		$this->_view->list_clasificados_categoria = $this->getClasificadoscategoria();
		$this->_view->list_clasificados_estado = $this->getClasificadosestado();
		$id = $this->_getSanitizedParam("id");
		if ($id > 0) {
			$content = $this->mainModel->getById($id);
			if($content->clasificados_id){
				$this->_view->content = $content;
				$this->_view->routeform = $this->route."/update";
				$title = "Actualizar clasificados";
				$this->getLayout()->setTitle($title);
				$this->_view->titlesection = $title;
			}else{
				$this->_view->routeform = $this->route."/insert";
				$title = "Crear clasificados";
				$this->getLayout()->setTitle($title);
				$this->_view->titlesection = $title;
			}
		} else {
			$this->_view->routeform = $this->route."/insert";
			$title = "Crear clasificados";
			$this->getLayout()->setTitle($title);
			$this->_view->titlesection = $title;
		}
	}

	/**
     * Inserta la informacion de un clasificados  y redirecciona al listado de clasificados.
     *
     * @return void.
     */
	public function insertAction(){
		$this->setLayout('blanco');
		$csrf = $this->_getSanitizedParam("csrf");
		if (Session::getInstance()->get('csrf')[$this->_getSanitizedParam("csrf_section")] == $csrf ) {	
			$data = $this->getData();
			$uploadImage =  new Core_Model_Upload_Image();
			if($_FILES['clasificados_imagen']['name'] != ''){
				$data['clasificados_imagen'] = $uploadImage->upload("clasificados_imagen");
			}
			if($_FILES['clasificados_imagen1']['name'] != ''){
				$data['clasificados_imagen1'] = $uploadImage->upload("clasificados_imagen1");
			}
			if($_FILES['clasificados_imagen2']['name'] != ''){
				$data['clasificados_imagen2'] = $uploadImage->upload("clasificados_imagen2");
			}
			if($_FILES['clasificados_imagen3']['name'] != ''){
				$data['clasificados_imagen3'] = $uploadImage->upload("clasificados_imagen3");
			}
			if($_FILES['clasificados_imagen4']['name'] != ''){
				$data['clasificados_imagen4'] = $uploadImage->upload("clasificados_imagen4");
			}
			$id = $this->mainModel->insert($data);
			$this->mainModel->changeOrder($id,$id);
			$data['clasificados_id']= $id;
			$data['log_log'] = print_r($data,true);
			$data['log_tipo'] = 'CREAR CLASIFICADOS';
			$logModel = new Administracion_Model_DbTable_Log();
			$logModel->insert($data);
		}
		header('Location: '.$this->route.''.'');
	}

	/**
     * Recibe un identificador  y Actualiza la informacion de un clasificados  y redirecciona al listado de clasificados.
     *
     * @return void.
     */
	public function updateAction(){
		$this->setLayout('blanco');
		$csrf = $this->_getSanitizedParam("csrf");
		if (Session::getInstance()->get('csrf')[$this->_getSanitizedParam("csrf_section")] == $csrf ) {
			$id = $this->_getSanitizedParam("id");
			$content = $this->mainModel->getById($id);
			if ($content->clasificados_id) {
				$data = $this->getData();
				$uploadImage =  new Core_Model_Upload_Image();
				if($_FILES['clasificados_imagen']['name'] != ''){
					if($content->clasificados_imagen){
						$uploadImage->delete($content->clasificados_imagen);
					}
					$data['clasificados_imagen'] = $uploadImage->upload("clasificados_imagen");
				} else {
					$data['clasificados_imagen'] = $content->clasificados_imagen;
				}
			
				if($_FILES['clasificados_imagen1']['name'] != ''){
					if($content->clasificados_imagen1){
						$uploadImage->delete($content->clasificados_imagen1);
					}
					$data['clasificados_imagen1'] = $uploadImage->upload("clasificados_imagen1");
				} else {
					$data['clasificados_imagen1'] = $content->clasificados_imagen1;
				}
			
				if($_FILES['clasificados_imagen2']['name'] != ''){
					if($content->clasificados_imagen2){
						$uploadImage->delete($content->clasificados_imagen2);
					}
					$data['clasificados_imagen2'] = $uploadImage->upload("clasificados_imagen2");
				} else {
					$data['clasificados_imagen2'] = $content->clasificados_imagen2;
				}
			
				if($_FILES['clasificados_imagen3']['name'] != ''){
					if($content->clasificados_imagen3){
						$uploadImage->delete($content->clasificados_imagen3);
					}
					$data['clasificados_imagen3'] = $uploadImage->upload("clasificados_imagen3");
				} else {
					$data['clasificados_imagen3'] = $content->clasificados_imagen3;
				}
			
				if($_FILES['clasificados_imagen4']['name'] != ''){
					if($content->clasificados_imagen4){
						$uploadImage->delete($content->clasificados_imagen4);
					}
					$data['clasificados_imagen4'] = $uploadImage->upload("clasificados_imagen4");
				} else {
					$data['clasificados_imagen4'] = $content->clasificados_imagen4;
				}
				$this->mainModel->update($data,$id);
			}
			$data['clasificados_id']=$id;
			$data['log_log'] = print_r($data,true);
			$data['log_tipo'] = 'EDITAR CLASIFICADOS';
			$logModel = new Administracion_Model_DbTable_Log();
			$logModel->insert($data);}
		header('Location: '.$this->route.''.'');
	}

	/**
     * Recibe un identificador  y elimina un clasificados  y redirecciona al listado de clasificados.
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
					$uploadImage =  new Core_Model_Upload_Image();
					if (isset($content->clasificados_imagen) && $content->clasificados_imagen != '') {
						$uploadImage->delete($content->clasificados_imagen);
					}
					
					if (isset($content->clasificados_imagen1) && $content->clasificados_imagen1 != '') {
						$uploadImage->delete($content->clasificados_imagen1);
					}
					
					if (isset($content->clasificados_imagen2) && $content->clasificados_imagen2 != '') {
						$uploadImage->delete($content->clasificados_imagen2);
					}
					
					if (isset($content->clasificados_imagen3) && $content->clasificados_imagen3 != '') {
						$uploadImage->delete($content->clasificados_imagen3);
					}
					
					if (isset($content->clasificados_imagen4) && $content->clasificados_imagen4 != '') {
						$uploadImage->delete($content->clasificados_imagen4);
					}
					$this->mainModel->deleteRegister($id);$data = (array)$content;
					$data['log_log'] = print_r($data,true);
					$data['log_tipo'] = 'BORRAR CLASIFICADOS';
					$logModel = new Administracion_Model_DbTable_Log();
					$logModel->insert($data); }
			}
		}
		header('Location: '.$this->route.''.'');
	}

	/**
     * Recibe la informacion del formulario y la retorna en forma de array para la edicion y creacion de Clasificados.
     *
     * @return array con toda la informacion recibida del formulario.
     */
	private function getData()
	{
		$data = array();
		$data['clasificados_nombre'] = $this->_getSanitizedParam("clasificados_nombre");
		$data['clasificados_introduccion'] = $this->_getSanitizedParamHtml("clasificados_introduccion");
		$data['clasificados_descripcion'] = $this->_getSanitizedParamHtml("clasificados_descripcion");
		if($this->_getSanitizedParam("clasificados_categoria") == '' ) {
			$data['clasificados_categoria'] = '0';
		} else {
			$data['clasificados_categoria'] = $this->_getSanitizedParam("clasificados_categoria");
		}
		$data['clasificados_imagen'] = "";
		$data['clasificados_imagen1'] = "";
		$data['clasificados_imagen2'] = "";
		$data['clasificados_imagen3'] = "";
		$data['clasificados_imagen4'] = "";
		$data['clasificados_nombreusuario'] = $this->_getSanitizedParam("clasificados_nombreusuario");
		$data['clasificados_documento'] = $this->_getSanitizedParam("clasificados_documento");
		$data['clasificados_correo'] = $this->_getSanitizedParam("clasificados_correo");
		$data['clasificados_telefono'] = $this->_getSanitizedParam("clasificados_telefono");
		if($this->_getSanitizedParam("clasificados_estado") == '' ) {
			$data['clasificados_estado'] = '0';
		} else {
			$data['clasificados_estado'] = $this->_getSanitizedParam("clasificados_estado");
		}
		return $data;
	}

	/**
     * Genera los valores del campo Categoria.
     *
     * @return array cadena con los valores del campo Categoria.
     */
	private function getClasificadoscategoria()
	{
		$modelData = new Administracion_Model_DbTable_Dependcategorias();
		$data = $modelData->getList();
		$array = array();
		foreach ($data as $key => $value) {
			$array[$value->categorias_id] = $value->categorias_nombre;
		}
		return $array;
	}


	/**
     * Genera los valores del campo Estado.
     *
     * @return array cadena con los valores del campo Estado.
     */
	private function getClasificadosestado()
	{
		$array = array();
		$array['0'] = 'Inactivo';
		$array['1'] = 'Activo';
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
        if (Session::getInstance()->get($this->namefilter)!="") {
            $filters =(object)Session::getInstance()->get($this->namefilter);
            if ($filters->clasificados_nombre != '') {
                $filtros = $filtros." AND clasificados_nombre LIKE '%".$filters->clasificados_nombre."%'";
            }
            if ($filters->clasificados_categoria != '') {
                $filtros = $filtros." AND clasificados_categoria LIKE '%".$filters->clasificados_categoria."%'";
            }
            if ($filters->clasificados_documento != '') {
                $filtros = $filtros." AND clasificados_documento LIKE '%".$filters->clasificados_documento."%'";
            }
            if ($filters->clasificados_telefono != '') {
                $filtros = $filtros." AND clasificados_telefono LIKE '%".$filters->clasificados_telefono."%'";
            }
            if ($filters->clasificados_estado != '') {
                $filtros = $filtros." AND clasificados_estado ='".$filters->clasificados_estado."'";
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
					$parramsfilter['clasificados_nombre'] =  $this->_getSanitizedParam("clasificados_nombre");
					$parramsfilter['clasificados_categoria'] =  $this->_getSanitizedParam("clasificados_categoria");
					$parramsfilter['clasificados_documento'] =  $this->_getSanitizedParam("clasificados_documento");
					$parramsfilter['clasificados_telefono'] =  $this->_getSanitizedParam("clasificados_telefono");
					$parramsfilter['clasificados_estado'] =  $this->_getSanitizedParam("clasificados_estado");Session::getInstance()->set($this->namefilter, $parramsfilter);
        }
        if ($this->_getSanitizedParam("cleanfilter") == 1) {
            Session::getInstance()->set($this->namefilter, '');
            Session::getInstance()->set($this->namepageactual,1);
        }
    }
}