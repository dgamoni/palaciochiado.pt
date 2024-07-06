<?php
/**
 * Template Name: Bars Template
 */
?>

<?php while (have_posts()) : the_post(); ?>

  <?php get_template_part('templates/partials/header', 'simple'); ?>

  <section class="header-bottom header-bottom--simple">
    <p class="text-white text-tag"><?php _e('no palácio - os bares', 'chiado'); ?></p>
    <p class="header-bottom__title"><?php _e('Selecione um dos bares, e veja as suas ofertas.', 'chiado'); ?></p>

    <?php get_template_part('templates/partials/bars', 'index'); ?>
  </section>

  <?php get_template_part('templates/partials/venues', 'featured'); ?>

<!--   <?php get_template_part('templates/page', 'header'); ?>
  <?php get_template_part('templates/content', 'page'); ?> -->
<?php endwhile; ?>