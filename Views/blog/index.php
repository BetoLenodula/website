<section class="container pt-5">
	
	<div class="input-group md-form form-sm form-1 pl-0 pt-5 mt-5 col-lg-7 col-md-5 mx-auto">
  	  <div class="input-group-prepend search">
	    <span class="input-group-text cyan lighten-2" id="basic-text1"><i class="fa fa-search text-white"
	        aria-hidden="true"></i></span>
	  </div>
	  <input class="form-control my-0 py-1 search-input" type="text" placeholder="Buscar" aria-label="Buscar">
	</div>
	<?php if (!empty($callback_datos)): ?>
	<div class="col-lg-10 mx-auto pt-5 clearfix card-sect card-columns">
		<?php foreach ($callback_datos as $dat): ?>
			<div class="card">
			  <img class="card-img-top" src="<?= $dat['foto_articulo']  ?>" alt="<?= $dat['titulo_articulo']; ?>">
			  <div class="card-body">
			    <h5 class="card-title"><?= $dat['titulo_articulo'];  ?></h5>
			    <small class="text-muted"><?= $controlador::funcion('alfa_months', $dat['fecha_publicacion_articulo']); ?></small>
			    <p class="card-text"><?= $dat['descripcion_articulo'];  ?></p>
			    <a href="/blog/articulo/<?= $controlador::funcion('normalize', $dat['titulo_articulo']).'.'.$dat['id'];  ?>" class="card-link">Leer Más -></a>
			  </div>
			</div>
		<?php endforeach ?>
	</div>
	<?php else: ?>
		<div class="col-lg-10 mx-auto pt-5 text-center">
			<p class="display-4 text-muted">
				<i class="fa fa-television"></i>
				¡sin resultados!
			</p>
		</div>
	<?php endif ?>
	
</section>