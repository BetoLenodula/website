<?php 
	//dominio
	define("DOMAIN", "lenodula.com"); 
	//constantes de email SMTP
	define("mailFrom", "contacto@".DOMAIN);
	define("mailHost", DOMAIN.":2525");
	define("mailPassword", "23e7085A_11&11");
	
	//constantes de entorno
	define("DS", DIRECTORY_SEPARATOR);
	define("ROOT", realpath(dirname(__FILE__)).DS);
	define("URL", "https://".DOMAIN."/");
	define("MSG", ROOT."Views".DS."assets".DS."messages".DS);

	//________________________________________________________________________

	define("HOST", "lenodula.com"); 
	define("USER", "lenodula_ln11"); 
	define("PASS", "850420_Ln11$"); 
	define("DB", "lenodula_blg"); 

 ?>