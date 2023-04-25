<?php

/**
*
*/
class Administracion_preguntascategoriaController extends Administracion_mainController
{
	private $mainModel;
	private $route;
	protected $namefilter;

	public function init()
	{
		
		$this->mainModel = new Administracion_Model_DbTable_Preguntascategoria();
		$this->namefilter = "parametersfiltercontent";
		$this->route = "/administracion/preguntascategoria";
		$this->_view->route = $this->route;
		parent::init();
	}

	public function indexAction()
	{
		
		$this->setLayout('administracion_panel');
		$this->getLayout()->setTitle("Listar Categorias de Preguntas");
		$this->filters();
		$this->_view->csrf = Session::getInstance()->get('csrf');
		$filters =(object)Session::getInstance()->get($this->namefilter);
        $this->_view->filters = $filters;
		$filters = $this->getFilter();
		$order = " orden ASC";
		$list = $this->mainModel->getList($filters,$order);
		$amount = 20;
		$page = $this->_getSanitizedParam("page");
		if (!$page) {
		   	$start = 0;
		   	$page=1;
		}
		else {
		   	$start = ($page - 1) * $amount;
		}
		$this->_view->totalpages = ceil(count($list)/$amount);
		$this->_view->page = $page;
		$this->_view->lists = $this->mainModel->getListPages($filters,$order,$start,$amount);
	}
	public function manageAction()
	{
		$this->setLayout('administracion_panel');
		$this->_view->csrf = Session::getInstance()->get('csrf');
		$id = $this->_getSanitizedParam("id");
		if ($id > 0) {
			$content = $this->mainModel->getById($id);
			if($content->categoria_id){
				$this->_view->content = $content;
				$this->_view->routeform = $this->route."/update";
				$this->getLayout()->setTitle("Actualizar Categorias de Preguntas");
			}else{
				$this->_view->routeform = $this->route."/insert";
				$this->getLayout()->setTitle("Crear Categorias de Preguntas");
			}
		} else {
			$this->_view->routeform = $this->route."/insert";
			$this->getLayout()->setTitle("Crear Categorias de Preguntas");
		}
	}

	public function insertAction(){
		$csrf = $this->_getSanitizedParam("csrf");
		if (Session::getInstance()->get('csrf') == $csrf ) {
			$uploadImage =  new Core_Model_Upload_image();
			$data = $this->getData();
			
			$id = $this->mainModel->insert($data);
			$this->mainModel->changeOrder($id,$id);
		}
		header('Location: '.$this->route);
	}

	public function updateAction(){
		$csrf = $this->_getSanitizedParam("csrf");
		if (Session::getInstance()->get('csrf') == $csrf ) {
			$uploadImage =  new Core_Model_Upload_image();
			$id = $this->_getSanitizedParam("categoria_id");
			$content = $this->mainModel->getById($id);
			if ($content->categoria_id) {
				$data = $this->getData();
				$this->mainModel->update($data,$id);
			}
		}
		header('Location: '.$this->route);
	}

	public function deleteAction()
	{
		$csrf = $this->_getSanitizedParam("csrf");
		if (Session::getInstance()->get('csrf') == $csrf ) {
			$id =  $this->_getSanitizedParam("id");
			if (isset($id) && $id > 0) {
				$content = $this->mainModel->getById($id);
				if (isset($content)) {
					$modelUploadImage= new Core_Model_Upload_image();
					if (isset($content->imagen) && $content->imagen!= '') {
						$modelUploadImage->delete($content->imagen);
					}
					if (isset($content->banner) && $content->banner != '') {
						$modelUploadImage->delete($content->banner);
					}
					$this->mainModel->deleteRegister($id);
				}
			}
		}
		header('Location: '.$this->route);
	}

	public function orderAction()
	{
		$csrf = $this->_getSanitizedParam("csrf");
		if (Session::getInstance()->get('csrf') == $csrf ) {
			$id1 =  $this->_getSanitizedParam("id1");
			$id2 =  $this->_getSanitizedParam("id2");
			if (isset($id1) && $id1 > 0 && isset($id2) && $id2 > 0) {
				$content1 = $this->mainModel->getById($id1);
				$content2 = $this->mainModel->getById($id2);
				if (isset($content1) && isset($content2)) {
					$order1 = $content1->orden;
					$order2 = $content2->orden;
					$this->mainModel->changeOrder($order2,$id1);
					$this->mainModel->changeOrder($order1,$id2);
				}
			}
		}
	}

	private function getData()
	{
		$data = array();
		
		$data['title'] = $this->_getSanitizedParam("title");
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

            if ($filters->titulo != '') {
                $filtros = $filtros." AND categoriapreguntas.nombre LIKE '%".$filters->titulo."%'";
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
            $parramsfilter = array();
            $parramsfilter['titulo'] =  $this->_getSanitizedParam("titulo");
            
            Session::getInstance()->set($this->namefilter, $parramsfilter);
        }
        if ($this->_getSanitizedParam("cleanfilter") == 1) {
             Session::getInstance()->set($this->namefilter, '');
        }
    }

}