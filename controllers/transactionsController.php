<?php
	/**
	 * transactionsController.php
	 */
	/**
	 * Clase de controlador de Transacciones
	 */
	class transactionsController extends AppController
	{
		/**
		 * metodo constructor
		 */
		public function __construct()
		{
			parent::__construct();
		}

		/**
		 * metodo que carga la pagina principal de las transacciones
		 * 
		 */
		public function index()
		{
			$transaction = $this->loadModel("transaction");
			$this->_view->transactions = $transaction->GetAll();
			$this->_view->titulo="Transacciones";
			$this->_view->renderizar("index");
		}

		/**
		 * metodo que agrega una transaccion
		 */
		public function add()
		{
			if($_POST)
			{			
				$modelTransaction = $this->loadModel("transaction");
				$modelTransaction->Add($_POST);
				$this->redirect(array("controller"=>"transactions"));
			}
			$modelCategory = $this->loadModel("category");
			$this->_view->categories = $modelCategory->GetAll();

			$modelAccount = $this->loadModel("account");
			$this->_view->accounts = $modelAccount->GetAll();

			$this->_view->titulo="Nueva Transaccion";
			$this->_view->renderizar("add");
		}

		/**
		 * metodo que actualiza una transaccion
		 * @param $id 
		 * 
		 */
		public function update($id=null)
		{
			if($_POST)
			{
				$modelTransaction = $this->loadModel("transaction");
				$modelTransaction->Update($_POST);

				$this->redirect(array("controller"=>"transactions"));
			}

			$modelTransaction = $this->loadModel("transaction");
			$this->_view->transaction = $modelTransaction->Find($id);

			$modelCategory = $this->loadModel("category");
			$this->_view->categories = $modelCategory->GetAll();

			$modelAccount = $this->loadModel("account");
			$this->_view->accounts = $modelAccount->GetAll();

			$this->_view->titulo="Editar Transaccion";
			$this->_view->renderizar("update");
		}

		/**
		 * metodo que elimina una transaccion
		 * @param $id 
		 * 
		 */
		public function delete($id)
		{
			$modelTransaction = $this->loadModel("transaction");
			$transaction = $modelTransaction->Find($id);
			if($transaction)
			{
				$modelTransaction->Delete($id);
				$this->redirect(array("controller"=>"transactions"));
			}
		}
	}
?>