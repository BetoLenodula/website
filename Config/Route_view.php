<?php 
	namespace Config;


	class Route_view{

		public static function run($request, $response){
			$callback_datos = $response;

			$controlador = $request->getControlador()."Controller";
			$metodo = $request->getMetodo();
			$argumento = $request->getArgumento();

			$view_route = ROOT."Views".DS.$request->getControlador().DS.$metodo.".php";

			if(is_readable($view_route)){
				$obj_controller = "Controllers\\".$controlador;
				$controlador = new $obj_controller();
				require_once($view_route);
			}
			else{
				print "No se encontró la vista solicitada!";
			}
		}

	}



 ?>