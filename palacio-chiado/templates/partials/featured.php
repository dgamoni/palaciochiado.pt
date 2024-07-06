<?php 
	$class;
	if ( is_page_template( 'template-partners.php' ) ) {
		$class = 'featured--partners';
	} else {
		$class = 'featured--home';
	}
?>
<section class="featured <?php echo $class; ?>" style="background-image: url('<?php the_field('bg_img'); ?>')">
	<div class="featured__content center">
  	<h2 class="title text-white title--big"><?php the_field('title'); ?></h2>
  	<?php the_field('text'); ?>
  	<a href="<?php the_field('link'); ?>" class="btn btn--main btn--white"><?php the_field('link_copy'); ?></a>
	</div>
</section>