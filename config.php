<?php 
	//dominio
	define("DOMAIN", "localhost"); 
	//constantes de email SMTP
	define("mailFrom", "contacto@".DOMAIN);
	define("mailHost", DOMAIN.":2525");
	define("mailPassword", "23e7085A_11&11");
	
	//constantes de entorno
	define("DS", DIRECTORY_SEPARATOR);
	define("ROOT", realpath(dirname(__FILE__)).DS);
	define("URL", "http://".DOMAIN."/");
	define("MSG", ROOT."Views".DS."assets".DS."messages".DS);

	//________________________________________________________________________

	define("HOST", "localhost"); 
	define("USER", "root"); 
	define("PASS", "23e7085a"); 
	define("DB", "blog"); 

 ?>