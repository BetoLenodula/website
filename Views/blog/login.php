<section class="container">
	<div class="col-lg-9 col-md-9 mx-auto pt-5 pb-5 clearfix">
	<form class="p-5 mt-5" method="post" action="" id="frmLoginBlog">
	  <div class="form-group">
	    <label for="usuario">Usuario</label>
	    <input type="text" class="form-control" id="usuario" name="usuario" aria-describedby="usuario-help" maxlength="15" placeholder="Ingresa usuario">
	    <small id="usuario-help" class="form-text text-muted">El nombre de usuario de administrador del blog</small>
	  </div>
	  <div class="form-group">
	    <label for="password">Password</label>
	    <input type="password" class="form-control" id="password" name="password" maxlength="15" placeholder="Ingresa password">
	  </div>
	  <button type="submit" class="btn btn-primary">Ingresar</button>
	</form>
	</div>
</section>
<?php 
	include_once(MSG . "alert.php");
	if(!empty($callback_datos)) 
	include_once(MSG . "error.php");
?>