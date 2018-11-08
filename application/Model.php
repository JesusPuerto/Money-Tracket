<?php 
	/**
	 * Clase modelo de la aplicacion
	 */
	class AppModel
	{
			/**
			 * [$_db description]
			 * @var $_db
			 */
		protected $_db;

		/**
		 * metodo que crea una base de datos
		 */
		public function __construct()
		{
			$this->_db = new Database();
		}
	}
?>