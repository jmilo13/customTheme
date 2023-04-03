<?php
get_header();
?>
<div class="row">
  <!-- ENTRADAS START-->
  <div class="col-lg-12">
    <?php
    if (have_posts()) :
      while (have_posts()) : the_post();
    ?>
        <div class="card-body">
          <h2><?php the_title() ?></h2>
          <?php the_content(); ?>
        </div>
    <?php
      endwhile;
    endif;
    ?>
  </div>
  <!-- ENTRADAS END-->
</div>
</div>
<!-- BLOG END -->
<?php
get_footer();
?>