<style>
	.text-white {
		background: -webkit-linear-gradient(left,#b09253 0,#f6cf70 25%,#9e8041 50%,#f6cf70 75%,#b09253 100%);
			background-clip: border-box;
		-webkit-background-clip: text;
		-webkit-text-fill-color: transparent;
		color: #f6cf70;
		font-size: 66px;
		font: 400 66px sangbleu_bplight;
	} 
</style>
<?php
/**
 * Template Name: Eventos
 */
?>

<?php while (have_posts()) : the_post(); ?>
	
  <?php get_template_part('templates/partials/header', 'image-event'); ?>

  <section class="events-container">
  	
  	<h2 class="title--small"><?php the_field('title'); ?></h2>
  	<!-- <div class="events-text"><?php the_content(); ?></div> -->
    <?php get_template_part('templates/partials/events', 'index'); ?>
  </section>

<?php endwhile; ?>