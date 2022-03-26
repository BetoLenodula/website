<?php 
	namespace Models;

	class Articulo{

		private $id;
		private $id_admin;
		private $titulo_articulo;
		private $foto_articulo;
		private $descripcion_articulo;
		private $cuerpo_articulo;
		private $likes_articulo;
		private $fecha_publicacion_articulo;

		private $con;

		public function __construct(){
			$this->con = new Conexion();
			$this->con->charSetUTF8();
		}

		public function set($campo, $dato){
			$this->$campo = $dato;
		}

		public function get($campo){
			return $this->$campo;
		}

		public function add(){
			$sql = "INSERT INTO articulos VALUES(NULL, '$this->id_admin', '$this->titulo_articulo', '$this->foto_articulo', '$this->descripcion_articulo', '". addslashes($this->cuerpo_articulo) ."', '$this->likes_articulo', '$this->fecha_publicacion_articulo');";

			$res = $this->con->returnQuery($sql);

			if($res && $this->con->getAffectedRows() == 1){
				return true;
			}
			else{
				return false;
			}
		}

		public function getAll(){
			$sql = "SELECT id, id_admin, titulo_articulo, foto_articulo, descripcion_articulo, likes_articulo, fecha_publicacion_articulo FROM articulos ORDER BY id DESC LIMIT 6;";
			$res = $this->con->returnQuery($sql);
			return $res;
		}

		public function getBy($arg = [], $op = []){

			$i = 0;
			$pre = "";

			foreach ($arg as $key => $value) {
				$cond = ($key == "LIKE") ? ' \'%' . $this->$value . '%\' ' : ' \'' .$this->$value . '\' ';
				$oper = (isset($op[$i])) ? $op[$i] : ' ';
				$pre .=  " " . $value . " " . $key . $cond . $oper . " ";
				$i++;
			}

			$sql = "SELECT * FROM articulos WHERE {$pre};"; 
			$res = $this->con->returnQuery(trim($sql));
			return $res;
		}
		
		public function getLast(){
		    $sql = "SELECT titulo_articulo, foto_articulo, descripcion_articulo FROM articulos ORDER BY id DESC LIMIT 1;";
			$res = $this->con->returnQuery($sql);
			return $res;
		}

	}

 ?>