<?php 
	namespace Views;


	class Template{

		public function __construct($arr_social = []){
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<?php if (!empty($arr_social)): ?>
	<title><?= $arr_social['titulo_articulo']; ?></title>
	<meta content="<?= $arr_social['titulo_articulo'];  ?>" property="og:title">
	<meta content="<?= $arr_social['descripcion_articulo'];  ?>" property="og:description">
	<meta content="<?= URL . $_GET['url'];  ?>" property="og:url">
	<meta content="Lenodula" property="og:site_name">
	<meta content="website" property="og:type">
	<meta content="<?= $arr_social['foto_articulo']; ?>" property="og:image">
	<meta property="fb:app_id" content="210623272839138">
	<?php else: ?>
	<title>Lenodula</title>
	<?php endif ?>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0">
	<meta name="description" content="Lenodula, sistema creador de contenido ELearning, Gestor de Cursos">
	<meta name="keywords" content="Lenodula, ELearning, Creador, Contenido, Cursos">
	<link rel="shortcut icon" href="/Views/assets/images/favicon.ico">
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="/Views/assets/css/icons.css">
	<link rel="stylesheet" href="/Views/assets/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="/Views/assets/css/style.css">
	<link rel="stylesheet" href="/Views/assets/richtext/richtext.min.css">
	<script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ=" crossorigin="anonymous"></script>
</head>
<body>
	<header class="container-fluid position-fixed">
		<div class="row vertical-align">
			<div class="col-lg-8 col-md-6 col-sm-10 col-9 vertical-align div-logo">
				<i class="icon-logo logo_big"></i><span>Len<i class="icon-logo"></i>dula</span>
			</div>
			<nav class="col-lg-4 col-md-6 d-none d-sm-none d-md-flex vertical-align">
				<ul class="nav mx-auto">
				  <li class="nav-item">
				    <a href="/" class="nav-link">INICIO</a>
				  </li>
				  <li class="nav-item">
				    <a href="/informacion/lenodula" class="nav-link">LENODULA</a>
				  </li>
				  <li class="nav-item">
				    <a href="/blog" class="nav-link">BLOG</a>
				  </li>
				  <li class="nav-item">
				    <a href="/download" class="nav-link">DESCARGA</a>
				  </li>
				  <li class="nav-item">
				    <a href="/informacion/contacto" class="nav-link">CONTACTO</a>
				  </li>
				</ul>
			</nav>
			<div class="dropdown col-sm-2 col-3 d-flex d-md-none menu">
			    <button class="btn col-center" data-toggle="dropdown" id="menu-bars"><i class="fa fa-bars"></i></button>
			    <ul class="dropdown-menu">
			      <li><a class="dropdown-item" href="/">Inicio</a></li>
			      <li><a class="dropdown-item" href="/informacion/lenodula">Lenodula</a></li>
			      <li><a class="dropdown-item" href="/blog">Blog</a></li>
			      <li><a class="dropdown-item" href="/download">Descarga</a></li>
			      <li><a class="dropdown-item" href="/informacion/contacto">Contacto</a></li>
			    </ul>
			</div>
		</div>
	</header>
<?php

		}

		public function __destruct(){
?>
	<footer class="container-fluid">
		<div class="row foot-top"></div>
		<div class="row foot-bottom">
			<div class="container">
				<div class="row vertical-align">
					<div class="col-lg-6 col-md-4 col-sm-12 logo-footer">
						<p>
							<i class="icon-logo logo_big"></i>Len<i class="icon-logo"></i>dula<br>
						</p>
						<h4>[ piensa, organiza, comparte...]</h4>
						<h5>conecta la tecnología y el aprendizaje desde cualquier lugar y en cualquier momento.</h5>
					</div>
					<div class="col-lg-3 col-md-4 col-sm-12">
						<h5>Información <i class="fa fa-external-link"></i></h5>
						<ul class="list-unstyled">
							<li><a href="/informacion/lenodula">Lenodula</a></li>
							<li><a href="/blog">Blog</a></li>
							<li><a href="/download">Descarga</a></li>
							<li><a href="/informacion/contacto">Contacto</a></li>
						</ul>
					</div>
					<div class="col-lg-3 col-md-4 col-sm-12">
						<h5>Contacto <i class="fa fa-at"></i></h5>
						<p>
							<i class="fa fa-whatsapp"></i>&nbsp;&nbsp;<a href="tel:4361058963">4361058963</a><br>
							<i class="fa fa-envelope"></i>&nbsp;&nbsp;<a href="mailto:contacto@lenodula.com">contacto@lenodula.com</a><br>
							<i class="fa fa-facebook-square"></i>&nbsp;&nbsp;<a href="https://www.facebook.com/Lenodula">facebook</a><br>
							<i class="fa fa-twitter"></i>&nbsp;&nbsp;twitter<br>
						</p>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-12 info-foot">
				<p class="text-center pt-3"><i class="icon-logo"></i>&nbsp;Lenodula <?= date('Y'); ?>, Diseño de página por: lenodula.com, México</p>			
			</div>
		</div>
	</footer>	
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="/Views/assets/bootstrap/js/bootstrap.min.js"></script>
	<script src="/Views/assets/js/script.js"></script>
</body>
</html>
<?php

		}

	}


 ?>