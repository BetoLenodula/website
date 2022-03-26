<section class="container pt-5">
	<div class="row pt-5">
		<div class="col-lg-8 col-md-8 mx-auto pt-5">
<?php if(!empty($callback_datos)): $dat = $callback_datos; ?>
			<article>
				<img src="/Views/assets/images/pluma.svg" alt="Lenodula-blog-pen" class="img-fluid d-block mx-auto" width="40">
				<h1 class="text-center display-4 my-4"><?= $dat['titulo_articulo'];  ?></h1>
					<h5 class="text-center font-italic my-4"><?= $dat['descripcion_articulo'];  ?></h5>
					 <div class="dropdown text-center">
					 	 <div class="fb-like" data-href="<?= URL; ?>blog/articulo/<?= $argumento;?>" data-width="" data-layout="button_count" data-action="like" data-size="small" data-share="false"></div>
					 	  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					 	  <span data-toggle="dropdown">
						    <i class="fa fa-share-alt"></i>&nbsp;&nbsp;Compartir	
						  </span>
						  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
						    <a class="dropdown-item" href="https://www.facebook.com/sharer.php?u=<?= URL;  ?>blog/articulo/<?= $argumento;  ?>">Facebook</a>
						    <a class="dropdown-item" href="https://twitter.com/intent/tweet?text=<?= $dat['descripcion_articulo']; ?>&url=<?= URL; ?>blog/articulo/<?= $argumento; ?>&hashtags=BlogLenodula">Twitter</a>
						    <a class="dropdown-item" href="https://api.whatsapp.com/send?text=<?= $dat['descripcion_articulo'] ." ".URL; ?>blog/articulo/<?= $argumento;  ?>">Whatsapp</a>
						  </div>
					</div>
					<section>
						<img src="<?= $dat['foto_articulo'];  ?>" alt="<?= $dat['titulo_articulo'];  ?>" class="img-fluid d-block mx-auto my-3">
						<?= html_entity_decode($dat['cuerpo_articulo']);  ?>
					</section>
			</article>
		<div class="fb-comments" data-href="<?= URL; ?>blog/articulo/<?= $argumento;?>" data-width="" data-numposts="10" data-mobile="true"></div>
		<div id="fb-root"></div>
		<script async defer crossorigin="anonymous" src="https://connect.facebook.net/es_LA/sdk.js#xfbml=1&version=v5.0&appId=210623272839138&autoLogAppEvents=1"></script>
<?php endif ?>
		</div>
	</div>
</section>