<?php 
	namespace Models;

	class Admin{

		private $id;
		private $nombre_admin;
		private $correo_admin;
		private $password_admin;

		private $con;

		public function __construct(){
			$this->con = new Conexion();
			$this->con->charSetUTF8();
		}

		public function set($campo, $dato){
			$this->$campo = $dato;
		}

		public function get($arg){
			if($arg == 'login'){
				$sql = "SELECT id FROM admins WHERE nombre_admin = '$this->nombre_admin' AND password_admin = '$this->password_admin';";
			}

			$res = $this->con->returnQuery($sql);
			return $res;
		}

	}

 ?>