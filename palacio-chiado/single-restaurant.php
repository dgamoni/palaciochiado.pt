
<?php while (have_posts()) : the_post(); ?>
  <?php /* get_template_part('templates/partials/single', 'top-nav'); */ ?>

  <?php get_template_part('templates/partials/header', 'image'); ?>

  <section class="header-bottom header-bottom--image">
    <h2 class="header-bottom__title header-bottom__title--big"><?php the_field('page_subtitle') ?></h2>
    <p><?php echo get_the_content(); ?></p>
  </section>

  <?php get_template_part('templates/partials/mosaic'); ?>

  <?php get_template_part('templates/partials/menu'); ?>

  <!-- <?php get_template_part('templates/partials/slider'); ?> -->

  <section class="header-bottom header-bottom--simple header-bottom--no-height">
    <div class="venue-contacts">
      <p class="text-yellow-light text-tag"><?php _e('Contactos', 'chiado'); ?></p>
      <h2 class="title title--big text-white"><?php echo get_the_title(); ?></h2>
      <?php if(have_rows('contacts')): ?>
        <ul class="venue-contacts__list">
        <?php while(have_rows('contacts')): the_row(); ?>
          <li>
            <p class="venue-contacts__label"><?php the_sub_field('contact_type'); ?></p>
            <p class="venue-contacts__field"><a href="http://<?php the_sub_field('contact'); ?>" target="blank"><?php the_sub_field('contact'); ?></a></p>
          </li>
        <?php endwhile; ?>
        </ul>
      <?php endif; ?>
      <p class="text-subtitle"><?php the_field('contacts_copy'); ?></p>
    </div>
  	<h3 class="title title--big text-white"><?php _e('Outras Sugestões', 'chiado'); ?></h3>
  	<div class="text-yellow"><?php the_field('restaurants_index_intro'); ?></div>
  	<?php get_template_part('templates/partials/restaurants', 'index'); ?>
  </section>

<?php endwhile; ?>
