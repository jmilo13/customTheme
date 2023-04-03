<?php
get_header();
?>
<div class="row">
	<!-- ENTRADAS START-->
	<div class="col-lg-9">
		<?php
		if (have_posts()) :
			while (have_posts()) : the_post();
		?>
				<div class="card-body">
					<h2><?php the_title() ?></h2>
					<p class="small mb-0">fecha: <?php the_time('F j, Y') ?></p>
					<p class="small mb-0">Autor: <?php the_author() ?></p>
					<p class="small mb-0"><?php the_category('|') ?></p>
					<p class="small"><?php the_tags('Etiquetas: ', '|', '') ?></p>
					<figure class="w-100">
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
					<?php the_content(); ?>
				</div>
		<?php
			endwhile;
		endif;
		?>
	</div>
	<!-- ENTRADAS END-->
	<!-- ASIDE START-->
	<?php get_sidebar() ?>
	<!-- ASIDE END-->
</div>
</div>
<!-- BLOG END -->
<?php
get_footer();
?>