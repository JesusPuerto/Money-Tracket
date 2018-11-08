<?php 
	/**
	 * Clase de respuesta que elige entre controlador, metodo o argumento
	 */
	class Request
	{	
		/**
		 * [$_controlador variable para encontrar el controller enviado]
		 * @var $_controlador variable que elige entre los controladores cuentas, categorias y transacciones
		 */
		private $_controlador;

		/**
		 * [$_metodo variable para encontrar el metodo enviado ]
		 * @var $_metodo variable que elige entre los metodos
		 */
		private $_metodo;

		/**
		 * [$_argumentos variable para encontrar el argumento enviado]
		 * @var $_argumentos 
		 */
		private $_argumentos;

		/**
		 * metodo constructor de la clase Request
		 */
		public function __construct()
		{			
			if(isset($_GET['url']))
			{
			}
			
			$url = filter_input(INPUT_GET,'url',FILTER_SANITIZE_URL);
			$url = explode("/", $url);
			$url = array_filter($url);

			$this->_controlador=strtolower(array_shift($url));
			$this->_metodo=strtolower(array_shift($url));
			$this->_argumentos = $url;

			if(!$this->_controlador)
			{
				$this->_controlador = DEFAULT_CONTROLLER;
			}

			if(!$this->_metodo)
			{
				$this->_metodo = "index";
			}

			if(!$this->_argumentos)
			{
				$this->_argumentos = array();
			}
			
		}

		/**
		 * @internal metodo que obtiene un controlador
		 * @return retorna un controlador
		 */
		public function getController()
		{			
			return $this->_controlador;
		}

		/**
		 * @internal metodo que obtiene un metodo
		 * @return retorna un metodo
		 */
		public function getMethod()
		{
			return $this->_metodo;
		}

		/**
		 * @internal metodo que obtiene un argumento
		 * @return retorna un argumento
		 */
		public function getArgs()
		{
			return $this->_argumentos;
		}
	}
?>