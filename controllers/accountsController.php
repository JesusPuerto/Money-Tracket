<?php 
	/**
	 * accountsController.php
	 */
	/**
	 * Clase que controla las cuentas
	 */
	class accountsController extends AppController
	{
		/**
		 * metodo constructor
		 */
		public function __construct()
		{
			parent::__construct();
		}

		/**
		 * metodo que carga el index de las cuentas
		 * @return [type] [description]
		 */
		public function index()
		{
			$modelAccount = $this->loadModel("account");
			$this->_view->accounts = $modelAccount->GetAll();
			$this->_view->titulo="Cuentas";
			$this->_view->renderizar("index");
		}

		/**
		 * metodo que añade una nueva cuenta
		 */
		public function add()
		{
			if($_POST)
			{
				$modelAccount = $this->loadModel("account");
				$modelAccount->add($_POST);
				$this->redirect(array("controller"=>"accounts"));
			}
			$this->_view->titulo="Nueva Cuenta";
			$this->_view->renderizar("add");
		}

		/**
		 * metodo que actualiza y modifica una cuenta por id
		 * @param  $id 
		 * 
		 */
		public function update($id=null)
		{
			if($_POST)
			{
				$modelAccount = $this->loadModel("account");
				$modelAccount->Update($_POST);
				$this->redirect(array("controller"=>"accounts"));
			}

			$modelAccount = $this->loadModel("account");
			$this->_view->account = $modelAccount->Find($id);
			$this->_view->titulo="Nueva Cuenta";
			$this->_view->renderizar("update");	
		}

		/**
		 * metodo que elimina una cuenta por id
		 * @param  $id 
		 * 
		 */
		public function delete($id=null)
		{
			$modelAccount = $this->loadModel("account");
			$account = $modelAccount->Find($id);
			if($id)
			{
				$modelAccount->Delete($id);
				$this->redirect(array("controller"=>"accounts"));
			}
		}
	}
?>