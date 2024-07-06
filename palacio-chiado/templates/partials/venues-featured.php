<?php
  if (is_page_template('template-restaurant.php')) {
  	$sectionClasses = 'venues-featured--bars';
  } else {
  	$sectionClasses = 'venues-featured--restaurants';
  }
?>
<section class="venues-featured <?php echo $sectionClasses; ?>">
  <img src="<?php the_field('featured_bg_img'); ?>">
  <h2 class="title title--huge"><?php the_field('featured_title'); ?></h2>
  <h3 class="title--small text-upper text-yellow"><?php the_field('featured_subtitle'); ?></h3>
  <?php the_field('featured_text'); ?>
  <a href="<?php the_field('featured_link'); ?>" class="btn btn--main"><?php the_field('featured_link_copy'); ?></a>
</section>