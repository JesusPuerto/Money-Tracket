<?php
	/**
	 * accontModel.php
	 */
	/**
	 * clase del modelo cuenta
	 */
	class accountModel extends AppModel
	{
		/**
		 * metodo constructor
		 */
		public function __construct()
		{
			parent::__construct();
		}

		/**
		 * metodo que obtiene todas las cuentas mediante una consulta sql
		 */
		public function GetAll()
		{
			$query = $this->_db->prepare("SELECT * FROM accounts");
			$query->execute();
			$items = $query->fetchall();
			if($items)
			{
				return $items;
			}
			else
			{
				return false;
			}
		}

		/**
		 * metodo que inserta una nueva cuenta mediante una consulta sql
		 * @param array $data 
		 */
		public function Add($data = array())
		{
			$query = $this->_db->prepare("INSERT INTO accounts (user_id,name) VALUES (:user_id,:name)");

			$defaultID = "1";
			$query->bindParam(":user_id",$defaultID);
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
		 * metodo que obtiene modifica y actualiza una cuenta mediante una consulta sql
		 * @param array $data [description]
		 */
		public function Update($data = array()) 
		{
			$query = $this->_db->prepare("UPDATE accounts SET name=:name WHERE id=:id");
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
		 * metodo que busca una cuenta por medio de la id, mediante una consulta sql
		 * @param [type] $id [description]
		 */
		public function Find($id)
		{
			$query = $this->_db->prepare("SELECT * FROM accounts WHERE id=:id");
			$query->bindParam(":id",$id);
			$query->execute();
			$items = $query->fetch();
			if($items)
			{
				return $items;
			}
			else
			{
				return false;
			}
		}

		/**
		 * metodo que elimina una cuenta por medio de la id y mediante una consulta sql
		 * @param [type] $id [description]
		 */
		public function Delete($id)
		{
			$query = $this->_db->prepare("DELETE FROM accounts WHERE id=:id");
			$query->bindParam(":id",$id);
			$query->execute();
			$items = $query->fetch();
			if($items)
			{
				return $items;
			}
			else
			{
				return false;
			}
		}
	}
?>