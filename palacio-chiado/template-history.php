<?php
/**
 * Template Name: Historia
 */
?>

<?php while (have_posts()) : the_post(); ?>
	<section class="header header--history">
		<p class="title--small text-white text-upper"><?php the_title(); ?></p>
		<h2 class="title title--bigger title--gold"><?php the_field('history_subtitle'); ?></h2>
		<div class="text-grey header--history__text"><?php the_content(); ?></div>
  	<?php get_template_part('templates/partials/scroll'); ?>

		<?php if(have_rows('history_event')): ?>
		<div class="history-nav-container">
	  	<a href="#" class="js-open-history-nav history-nav__close icon-down-arrow"></a>
	  	<ul class="history-nav">
				<?php while(have_rows('history_event')): the_row(); ?>
	  		<li class="js-history-nav history-nav__item">
	  			<a href="#<?php the_sub_field('history_year'); ?>" class="js-event-nav"></a>
	  			<div class="history-nav__content">
	  				<h4><?php the_sub_field('history_year'); ?></h4>
	  				<p><?php the_sub_field('history_description'); ?> (...)</p>
	  			</div>
	  		</li>
				<?php endwhile; ?>
	  	</ul>
  	</div>
		<?php endif; ?>
	</section>

	<section class="history-content">
	<?php if(have_rows('history_event')): ?>
		<ul class="history-list">
			<?php while(have_rows('history_event')): the_row(); ?>
			<li id="<?php the_sub_field('history_year'); ?>" class="js-history-item history-list__item" data-date="<?php the_sub_field('history_year'); ?>">
				<p class="history-list__year"><?php the_sub_field('history_year'); ?></p>
				<p class="history-list__date"><?php the_sub_field('history_date'); ?></p>
				<p class="history-list__description"><?php the_sub_field('history_description'); ?></p>
				<img src="<?php the_sub_field('history_img'); ?>">
			</li>
			<?php endwhile; ?>
		</ul>
	<?php endif; ?>
	</section>
<?php endwhile; ?>
