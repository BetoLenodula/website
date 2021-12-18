<section class="container">
	<div class="row">
		<div class="col-lg-10 col-md-10 mx-auto pt-5">
		  <form class="pt-5 mt-5" method="post" action="" id="frmPostBlog">
		  <div class="form-group">
		    <input type="text" class="form-control" id="titulo" name="titulo" maxlength="80" placeholder="Título del artículo...">
		  </div>
		  <div class="form-group">
		    <input type="text" class="form-control" id="portada" name="portada" maxlength="300" placeholder="Enlace de imagen de portada...">
		    <small class="form-text text-muted">* opcional</small>
		  </div>
		  <div class="form-group">
		    <textarea name="descripcion" class="form-control" id="descripcion" maxlength="150" rows="2" placeholder="Breve descripción..."></textarea>
		  </div>
		</form>	
		  <div id="editor" class="my-3"></div><br>
		  <button id="publicar_articulo" class="btn btn-primary">Publicar</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		  <a href="/blog/cerrar_sesion"><span>cerrar sesión</span></a>
		</div>
	</div>
</section>
<script src="/Views/assets/richtext/richtext.min.js"></script>
<script>
	$(document).ready(function(){
		$('#editor').richText();
	});
</script>
<?php 
	include_once(MSG . "alert.php");
	if(!empty($callback_datos)) 
	include_once(MSG . "error.php");
?>
