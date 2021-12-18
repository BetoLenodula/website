<?php 
	namespace Models;

	class Conexion{

		private $datos = array(
			'host' => HOST,
			'user' => USER,
			'pass' => PASS,
			'db'   => DB
		);

		private $con;

		public function __construct(){
			$this->con = new \mysqli(
				$this->datos['host'],
				$this->datos['user'],
				$this->datos['pass'],
				$this->datos['db']
			);

			if(mysqli_connect_errno()){
				die("Error of Connection to DataBase: " . mysqli_connect_error());
			}
		}

		public function simpleQuery($sql){
			$this->con->query($sql);
		}

		public function returnQuery($sql){
			return $this->con->query($sql);
		}

		public function charSetUTF8(){
			$this->con->set_charset("utf8");
		}

		public function charSetMB4(){
			$this->con->set_charset("utf8mb4");
		}

		public function getAffectedRows(){
			return $this->con->affected_rows;
		}

		public function lastInsertId(){
			return $this->con->insert_id;
		}
	}


 ?>
