<?php 
	namespace Controllers;
	
	class downloadController{

		public function index(){
		}

		public function ab30kdh829993830_12fg119001kll11($arg){
			$arg = str_split($arg);
			$arg[0] = strtoupper($arg[0]);
			$arg[1] = strtoupper($arg[1]);
			$arg[4] = strtoupper($arg[4]);
			$arg[6] = strtoupper($arg[6]);

			if(base64_decode(implode($arg)) == "LndW00"){
				session_start();

				$id_app = sha1("LndWapp10_911");
				$arr_dwn = array('app' => "Lenodula1.0", 'id_app' => $id_app);
				$_SESSION['lnd-dwnld-source'] = base64_encode(json_encode($arr_dwn));

				header("Location:" . URL . "download/LenodulaApp");
			}
			else{
				header("Location:" . URL);
			}
		}

		public function lenodulaapp(){
			session_start();

			if(isset($_SESSION['lnd-dwnld-source'])){
				$ses = json_decode(base64_decode($_SESSION['lnd-dwnld-source']));
				$idapp = sha1("LndWapp10_911");
				
				if($ses->id_app == $idapp){
					return "true";
				}
				else{
					header("Location:" . URL);
				}
			}
			else{
				header("Location:" . URL);
			}
		}

		public function download_lenodula(){
			session_start();

			if(isset($_SESSION['lnd-dwnld-source'])){
				$ses = json_decode(base64_decode($_SESSION['lnd-dwnld-source']));
				$idapp = sha1("LndWapp10_911");
				
				if($ses->id_app == $idapp && $ses->app == "Lenodula1.0"){
					$file = ROOT . "Views/assets/downloads/oep83920jsks.892kdk&mm#.erg/Lenodula.zip";

					header("Content-disposition: attachment; filename = Lenodula.zip");
					header("Content-type: application/zip");
					readfile($file);
					unset($_SESSION['lnd-dwnld-source']);
					exit;
				}
				else{
					header("Location:" . URL);
				}
			}
			else{
				header("Location:" . URL);
			}
		}

	}

 ?>