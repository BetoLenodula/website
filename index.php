<?php
	require_once("config.php");
//_____________________________________________________________________________
	require_once("Config/Autoload.php");

	Config\Autoload::run();

	$request = new Config\Request();

	$response = Config\Route_controller::run($request); // controlador
	if($response == 'ajax') return false;

	$arrf = (is_array($response) && count($response) === 16) ? $response : null;

	$tmpl = new Views\Template($arrf);

	
	Config\Route_view::run($request, $response); // vista
?>