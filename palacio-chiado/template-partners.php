<style>
	.text-white {
		color: #ffffff;
		font-size: 35px;
		font: 400 35px sangbleu_bplight;
        text-transform: uppercase;
        letter-spacing: 1px;
}
	} 
</style>

<?php
/**
 * Template Name: Parceiros
 */
?>

<?php while (have_posts()) : the_post(); ?>

	<section class="partners-container">
		<h2 class="title--small text-upper text-white"><?php the_title(); ?></h2>
		<p><?php echo get_the_content(); ?></p>

		<div class="partners">
			<?php if(have_rows('partners')): ?>
				<ul class="partners__list">
					<?php while(have_rows('partners')): the_row(); ?>
						<li class="partners__list-item"><a href="<?php the_sub_field('link'); ?>" target="blank"><img src="<?php the_sub_field('logo'); ?>" alt="<?php the_sub_field('name'); ?>"></a></li>
					<?php endwhile; ?>
				</ul>
			<?php endif; ?>
		</div>
	</section>

	<?php get_template_part('templates/partials/featured'); ?>

<?php endwhile; ?>
