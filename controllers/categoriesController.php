<?php  
	/**
	 * categoriesController.php
	 */
	/**
	 * clase que controla las categorias
	 */
	class categoriesController extends AppController
	{
		/**
		 * metodo constructor
		 */
		public function __construct()
		{
			parent::__construct();
		}

		/**
		 * metodo que carga la vista principal de categorias
		 * 
		 */
		public function index()
		{
			$category = $this->loadModel("category");
			$this->_view->categories = $category->GetAll();
			$this->_view->titulo="Categorias";
			$this->_view->renderizar("index");
		}

		/**
		 * metodo que agrega una categoria
		 */
		public function add()
		{
			if($_POST)
			{
				$modelCategory = $this->loadModel("category");
				$modelCategory->add($_POST);
				$this->redirect(array("controller"=>"categories"));
			}
			$this->_view->titulo="Nueva Categoria";
			$this->_view->renderizar("add");
		}

		/**
		 * metodo que actualiza y modifica una categoria
		 * @param $id
		 * 
		 */
		public function update($id=null)
		{
			if($_POST)
			{
				$modelCategory = $this->loadModel("category");
				$modelCategory->Update($_POST);
				$this->redirect(array("controller"=>"categories"));
			}
			$modelCategory = $this->loadModel("category");
			$this->_view->category=$modelCategory->Find($id);
			$this->_view->titulo="Actualizar Categoria";
			$this->_view->renderizar("update");
		}

		/**
		 * metodo que elimina una categoria
		 * @param $id
		 * 
		 */
		public function delete($id=null)
		{
			$modelCategory = $this->loadModel("category");
			$category=$modelCategory->Find($id);

			if($category)
			{
				$modelCategory->Delete($id);
				$this->redirect(array("controller"=>"categories"));
			}
		}
	}
?>