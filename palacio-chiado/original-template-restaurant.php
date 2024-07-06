<?php
/**
 * Template Name: Restaurants Template
 */
?>

<?php while (have_posts()) : the_post(); ?>

  <?php get_template_part('templates/partials/header', 'simple'); ?>

  

  <section class="venue-blueprints">
    <?php if (have_rows('blueprints')): ?>

      <h2 class="venue-blueprints__title title title--big"><?php _e('Planta do Palácio', 'chiado'); ?></h2>

      <ul class="menu__tabs">
        <?php while (have_rows('blueprints')): the_row(); ?>
          <li class="js-tab menu__category menu__category--dark">
            <a href="#" data-name="<?php the_sub_field('blueprints_floor'); ?>"><?php the_sub_field('blueprints_floor'); ?></a>
          </li>
        <?php endwhile; ?>
      </ul>

      <?php while (have_rows('blueprints')): the_row(); ?>
        <div class="js-tab-item menu__content">
          <img src="<?php the_sub_field('blueprints_image'); ?>" alt="">
        </div>
      <?php endwhile; ?>

    <?php endif; ?>
  </section>

  <?php get_template_part('templates/partials/venues', 'featured'); ?>

<!--   <?php get_template_part('templates/page', 'header'); ?>
  <?php get_template_part('templates/content', 'page'); ?> -->
<?php endwhile; ?>
