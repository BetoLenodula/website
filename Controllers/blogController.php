<?php 
	namespace Controllers;

	use Models\Admin as Admin;
	use Models\Articulo as Articulo;
	use Classes\Funcion as Funcion;

	class blogController{
		private $admin;
		private $articulo;

		public function __construct(){
			$this->admin = new Admin();
			$this->articulo = new Articulo();
		}

		public static function funcion($method, $arg){
			$funcion = new Funcion();
			$return = $funcion->$method($arg);
			return $return;
		}

		public function index(){
			$res = $this->articulo->getAll();

			$arr = array();

			while($row = $res->fetch_array()){
				$arr[] = $row;
			}

			return $arr;
		}

		public function buscar($arg){
			$this->articulo->set('titulo_articulo', trim(strip_tags($arg)));
			$res = $this->articulo->getBy(['LIKE' => 'titulo_articulo']);

			$arr = array();

			while($row = $res->fetch_array()){
				$arr[] = $row;
			}

			return $arr;
		}


		public function articulo($arg){
			$arg = explode(".", trim($arg));
			$id = $arg[1];
			$arg = $arg[0];
			
			$this->articulo->set('titulo_articulo', $arg);
			$this->articulo->set('id', $id);

			$res = $this->articulo->getBy(['LIKE' => 'titulo_articulo', '=' => 'id'], ['AND']);

			return $res->fetch_array();
		}
		
		public function ultimo_articulo(){
		    $res = $this->articulo->getLast();
		    
		    $arr = array();
		    
		    while($row = $res->fetch_array()){
		        $fot = $row['foto_articulo'];
		        $tit = $row['titulo_articulo'];
		        $des = $row['descripcion_articulo'];
		        
				$arr[] = array('fot' => $fot, 'tit' => $tit, 'des' => $des);
			}
			
			header('Access-Control-Allow-Origin: *');
			echo json_encode($arr);
		}

		public function nuevo(){
			session_start();

			if(isset($_SESSION['lnd-admin'])){
				$ses = json_decode(base64_decode($_SESSION['lnd-admin']));

				if($_POST){
					
					if(strlen($_POST['titulo']) == 0){
						return "Falta el título!'";
					}

					if(strlen($_POST['titulo']) > 80){
						return "El titulo es demasiado largo!'";
					}

					if(false == preg_match("/^[0-9a-zA-ZñÑáéíóúÁÉÍÓÚ\s]{1,80}$/", $_POST['titulo'])){
						return "El título No soporta alguno caracteres extraños!'";
					}

					if(strlen($_POST['portada']) > 0){
						if(false == preg_match("/(http|https|ftp|ftps)\:\/\/[a-zA-Z0-9\-\.]+\.[a-zA-Z]{2,3}(\/\S*)?/", $_POST['portada'])){
							return "La dirección de la imagen no es una URL válida!";
						}
					}

					if(strlen($_POST['descripcion']) == 0){
						return "Escribe una breve descripción del artículo!";
					}

					if(strlen($_POST['descripcion']) > 150){
						return "La descripción es muy larga!'";
					}

					if(false == preg_match("/^[0-9a-zA-ZñÑáéíóúÁÉÍÓÚ\s\,\(\)\:\"\+\-\*\/\;\.\_\¿\?\¡\!\&\-\$\=\%]{1,150}$/", $_POST['descripcion'])){
						return "La descripción No soporta algunos caracteres extraños!'";
					}

					if($_POST['articulo'] == "<div><br></div>" || $_POST['articulo'] == ""){
						return "Escribe algo para el blog!'";
					}
					
					$this->articulo->set('id_admin', $ses->id);
					$this->articulo->set('titulo_articulo', $_POST['titulo']);
					$this->articulo->set('foto_articulo', $_POST['portada']);
					$this->articulo->set('descripcion_articulo', $_POST['descripcion']);
					$this->articulo->set('cuerpo_articulo', htmlentities(trim($_POST['articulo'])));
					$this->articulo->set('likes_articulo', 0);
					$this->articulo->set('fecha_publicacion_articulo', date('Y-m-d'));

					$res = $this->articulo->add();

					if($res){
						echo "true";
					}
					else{
						echo "false";
					}

				}
			}
			else{
				header("Location: " . URL . "blog/login");
			}
		}

		public function cerrar_sesion(){
			session_start();

			if(isset($_SESSION['lnd-admin'])){
				unset($_SESSION['lnd-admin']);
				header("Location:" . URL . "blog/login");
			}
			else{
				header("Location" . URL );
			}
		}
		
		public function login(){
			if($_POST){

				if(strlen($_POST['usuario']) == 0){
					return "Falta el nombre de usuario!";
				}

				if(strlen($_POST['usuario']) > 15){
					return "Nombre de usuario muy largo!";
				}

				if(false == preg_match("/^[a-zA-z0-1áéíóúÁÉÍÓÓñÑ]{1,15}$/", $_POST['usuario'])){
					return "El nombre de usuario no debe contener caracteres extraños!";
				}

				if(strlen($_POST['password']) == 0){
					return "Falta el password!";
				}

				if(strlen($_POST['password']) < 8){
					return "Password muy corto, debe tener al menos 8 caracteres!";
				}

				if(strlen($_POST['password']) > 15){
					return "Password demasiado largo!";
				}


				if(false == preg_match("/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d@$!%*#?&_.]{8,15}$/", $_POST['password'])){
					return "El password debe tener al menos una letra y un número y puede tener caracteres @$!%*#?&_.";
				}

				$this->admin->set('nombre_admin', $_POST['usuario']);
				$this->admin->set('password_admin', sha1(sha1($_POST['password'])));

				$res = $this->admin->get('login');

				if($res->num_rows == 1){
					$idadmin = $res->fetch_row();
					$arr_ses = array('id' => $idadmin[0], 'user' => $_POST['usuario']);

					ini_set("session.cookie_lifetime", "10800");
	                ini_set("session.gc_maxlifetime",  "10800");

					session_start();
					$_SESSION['lnd-admin'] = base64_encode(json_encode($arr_ses));
					header("Location:" . URL . "blog/nuevo");
				}
				else{
					return "No coindice el Usuario o el Password, intenta de nuevo!";
				}

			}
		}
	}

 ?>