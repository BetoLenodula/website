<?php 
	
	namespace Controllers;

	class informacionController{

		public function index(){
		}

		public function lenodula(){
		}

		public function contacto(){
			if($_POST){
				if(!isset($_POST['nombre']) || empty($_POST['nombre'])){
					return "Falta el nombre!!";
				}
				if(!isset($_POST['email']) || empty($_POST['email'])){
					return "Falta el Correo electrónico!!";
				}
				if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
					return "El correo no corresponde a una dirección de Email válida!!";
				}
				if(!isset($_POST['cuerpo_mail']) || empty($_POST['cuerpo_mail'])){
					return "Falta el mensaje del correo!!";
				}

				$to = "contacto@lenodula.com";
                $name = trim(strip_tags($_POST['nombre']));
                $subject = "Enviado por: {$name} | Asunto: Contactar a Lenodula ";
                $message = trim(strip_tags($_POST['cuerpo_mail']));
                $from = trim(strip_tags($_POST['email']));
 
                $headers = "MIME-Version: 1.0\r\n";
                $headers.= "Content-type: text/plain; charset=utf-8\r\n";
                $headers.= "To: {$to}\r\n";
                $headers.= "Subject: {$subject}\r\n";
                $headers.= "From: {$from}\r\n";
                
 
                if(mail($to, $subject, $message, $headers)){
                    echo "true";
                }
                else{
                    echo "error";
                }   
			}

		}
	}

 ?>