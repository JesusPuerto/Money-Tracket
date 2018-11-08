<?php 

	/**
	 * Clase de modelo
	 */
	class categoryModel extends AppModel
	{
		/**
		 * metodo constructor
		 */
		public function __construct()
		{
			parent::__construct();
		}

		/**
		 * metodo que obtiene todas las categorias por medio de una consulta sql
		 */
		public function GetAll()
		{
			$query = $this->_db->prepare("SELECT * FROM categories ");
			$query->execute();
			$items = $query->fetchall();
			
			if($items)
			{
				return $items;
			}
			else
			{
				return null;
			}
		}

		/**
		 * metodo que añade una nueva categoria por medio de una consulta sql
		 * @param array $data 
		 */
		public function Add($data = array())
		{
			$query = $this->_db->prepare("INSERT INTO categories (name) VALUES (:name )");			
			$query->bindParam(":name",$data['name']);

			if($query->execute())
			{
				return true;
			}
			else
			{
				return false;
			}
		}

		/**
		 * metodo que actualiza y modifica una categoria por medio de una consulta sql
		 * @param array $data 
		 */
		public function Update($data = array()) 
		{
			$query = $this->_db->prepare("UPDATE categories SET name=:name WHERE id=:id");		

			$query->bindParam(":id",$data['id']);	
			$query->bindParam(":name",$data['name']);

			if($query->execute())
			{
				return true;
			}
			else
			{
				return false;
			}
		}

		/**
		 * metodo que busca una categoria por id  por medio de una consulta sql
		 * @param [type] $id 
		 */
		public function Find($id)
		{
			$query = $this->_db->prepare("SELECT * FROM categories WHERE id=:id");
			$query->bindParam(":id",$id);
			$query->execute();
			$items = $query->fetch();
			
			if($items)
			{
				return $items;
			}
			else
			{
				return null;
			}
		}

		/**
		 * modelo que elimina una categoria por medio de una consulta sql
		 * @param [type] $id 
		 */
		public function Delete($id)
		{
			$query = $this->_db->prepare("DELETE FROM categories WHERE id=:id");		

			$query->bindParam(":id",$id);	

			if($query->execute())
			{
				return true;
			}
			else
			{
				return false;
			}
		}
	}
?>