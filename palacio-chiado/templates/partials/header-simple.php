<?php
  if (is_page_template('template-restaurant.php')) {
  	$headerClasses = 'header header--simple header--restaurants';
  } else {
  	$headerClasses = 'header header--simple header--bars';
  }
?>
<section class="<?php echo $headerClasses; ?>">
	<div class="header__image-container">
	  <img src="<?php the_field('venues_bg_img'); ?>">
  </div>
  <h2 class="title title--bigger"><?php echo get_the_title(); ?></h2>
  <?php the_content(); ?>
  <?php get_template_part('templates/partials/scroll'); ?>
</section>