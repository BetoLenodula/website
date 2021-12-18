<section class="container pt-5">
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
		<div class="col-lg-10 mx-auto mt-5 pt-5 text-center">
			<p class="display-4 text-muted">
				<i class="fa fa-search"></i>
				¡no se encontró ninguna coincidencia!
			</p>
		</div>
	<?php endif ?>
</section>