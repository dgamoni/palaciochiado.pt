<?php
/**
 * Template Name: Sala Multiusos
 */
?>
<?php while (have_posts()) : the_post(); ?>

  <?php //get_template_part('templates/partials/header', 'image'); ?>
  <?php get_template_part('templates/partials/mosaic'); ?>

  <section class="header-bottom header-bottom--image">
    <h2 class="header-bottom__title header-bottom__title--big"><?php the_field('page_subtitle') ?></h2>
    <p><?php echo get_the_content(); ?></p>
  </section>

  <?php //get_template_part('templates/partials/mosaic'); ?>

  <script type="text/javascript">
    jQuery(document).ready(function($) {
      $("input").focus(function(){
        $(this).parents('.form__block').addClass('active');
      });
      $("input").blur(function(){
        $(this).parents('.form__block').removeClass('active');
      })
    });
  </script>

  <section class="reservations">
  	<h2 class="title title--big text-white"><?php _e('Reservas', 'chiado'); ?><br> <?php _e('salas exclusivas', 'chiado'); ?></h2>
  	<p><?php the_field('reservations_text'); ?></p>
  	<div class="form">
		  <?php if (get_field('form')) : ?>
		  	<?php the_field('form') ?>
		  <?php endif; ?>
	  </div>
  </section>
<?php endwhile; ?>