<?php
get_header();
//*****START ERRORES PARA AMBIENTE DE DESARROLLO
ini_set("display_errors", "on");
error_reporting(E_ALL);
//*****END ERRORES PARA AMBIENTE DE DESARROLLO
?>
<div class="row">
	<!-- ENTRADAS START-->
	<div class="col-lg-9">
		<?php
		if (have_posts()) :
			while (have_posts()) : the_post();
		?>
				<div class="card-body">
					<a href=<?php the_permalink() ?>>
						<h2><?php the_title() ?></h2>
					</a>
					<p class="small mb-0">fecha: <?php the_time('F j, Y') ?></p>
					<p class="small mb-0">Autor: <?php the_author() ?></p>
					<p class="small mb-0"><?php the_category('|') ?></p>
					<p class="small"><?php the_tags('Etiquetas: ', '|', '') ?></p>
					<figure>
						<?php
						if (has_post_thumbnail()) {
							the_post_thumbnail('post-thumbnails', array(
								'class' => 'img-fluid'
							));
						} else {
						?>
							<img class="img-fluid mb-3" src="https://picsum.photos/1200/500" />
						<?php
						}
						?>
					</figure>
					<?php the_excerpt(); ?>
					<a href=<?php the_permalink() ?> class="btn btn-primary">Leer más</a>
				</div>
		<?php
			endwhile;
		endif;
		?>
		<!-- PAGINACION START-->
		<div class="card-body">
			<?php get_template_part('template-parts/content', 'pagination') ?>
		</div>
		<!-- PAGINACION END-->
	</div>
	<!-- ENTRADAS END-->
	<!-- ASIDE START-->
	<?php get_sidebar() ?>
	<!-- ASIDE END-->
</div>
<script>
	const form = document.querySelector('form');
	let url = document.querySelector('form').getAttribute('action');
	form.addEventListener('submit', function(e) {
		e.preventDefault(); // evitar que se envíe el formulario

		const formData = new FormData(form); // crear instancia de FormData con los datos del formulario

		// enviar datos con AJAX
		fetch('/wordpress/formControl.php', {
				method: 'POST',
				body: formData
			})
			.then(response => response.text())
			.then(data => {
				console.log(data); // manejar respuesta del servidor
			})
			.catch(error => console.error(error));
	});
</script>
</div>
<!-- BLOG END -->
<?php
get_footer();
?>