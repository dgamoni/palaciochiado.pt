<?php while (have_posts()) : the_post(); ?>

  <?php get_template_part('templates/partials/header', 'image'); ?>

  <section class="header-bottom header-bottom--image">
    <h2 class="header-bottom__title header-bottom__title--big"><?php the_field('page_subtitle') ?></h2>
    <p><?php echo get_the_content(); ?></p>
  </section>

  <?php get_template_part('templates/partials/mosaic'); ?>

  <?php get_template_part('templates/partials/menu'); ?>

  <?php get_template_part('templates/partials/suggestion'); ?>

<?php endwhile; ?>