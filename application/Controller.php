<?php 
	/**
	 * Controller.php
	 */
	/**
	 * Clase controlador
	 */
	abstract class AppController
	{
		/**
		 * variable local de vista
		 * @var $_view
		 */
		protected $_view;

		/**
		 * metodo constructor
		 */
		public function __construct()
		{
			$this->_view = new View(new Request);
		}

		/**
		 * metodo que carga la vista principal
		 * 
		 */
		abstract function index();		

		/**
		 * metodo que carga los modelos
		 * @param  $modelo 
		 * @return retorna una excepcion al cargar el moodelo
		 */
		protected function loadModel($modelo)
		{
			$modelo = $modelo."Model";
			$rutaModelo = ROOT."models".DS.$modelo.".php";

			if(is_readable($rutaModelo))
			{
				require_once($rutaModelo);
				$modelo = new $modelo;
				return $modelo;
			}
			else
			{
				throw new Exception("Error al cargar el modelo");
				
			}
		}

		/**
		 * metodo que redirige los controladores
		 * @param  array  $url 
		 * 
		 */
		public function redirect($url = array())
		{
			$path = "";
			if ($url["controller"]) {
				$path .= $url["controller"];
			}

			if ($url["action"]) {
				$path .="/".$url["action"];
			}

			header("LOCATION: ".APP_URL.$path);
		}
	}
?>