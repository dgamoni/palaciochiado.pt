<?php
  $k = 0;
  if ( is_page_template( 'template-home.php' ) ) {
?>  
<section class="slider-container slider-container--home">
	<h2 class="title title--big title--bold slider__title"><?php the_field('home_slider_title'); ?></h2>
	<span class="slider__text slider__text--outter"><?php the_field('home_slider_text'); ?></span>
	<?php if(have_rows('slide')): ?>
		<ul class="slider">
			<?php while(have_rows('slide')): the_row(); ?>
				<?php if($k === 0) { ?>
					<li class="slider__item active">
				<?php } else { ?>
					<li class="slider__item">
				<?php } ?>
					<img src="<?php the_sub_field('image'); ?>">
					<a href="<?php the_sub_field('link'); ?>" class="btn btn--main"><?php _e('Saber mais', 'chiado'); ?></a>
				</li>
			<?php $k++; endwhile; ?>
		</ul>
	<?php endif; ?>
</section>	
<?php  } else { ?>
<section class="slider-container slider-container--restaurant">
	<?php if(have_rows('slide')): ?>
		<ul class="slider">
			<?php while(have_rows('slide')): the_row(); ?>
				<?php if($k === 0) { ?>
					<li class="slider__item active">
				<?php } else { ?>
					<li class="slider__item">
				<?php } ?>
					<div class="slider__item-container media">
						<div class="media__img slider__item-img">
							<img src="<?php the_sub_field('image'); ?>">
						</div>
						<div class="media__content slider__item-content">
							<h2 class="title title--big title--bold"><?php the_sub_field('title'); ?></h2>
							<h3 class="title--small text-thin text-upper text-yellow"><?php the_sub_field('subtitle_big'); ?></h3>
							<h4 class="text-upper"><?php the_sub_field('subtitle_small'); ?></h4>
							<span class="slider__text"><?php the_sub_field('text'); ?></span>
							<a href="<?php the_sub_field('link'); ?>" class="btn btn--main"><?php the_sub_field('link_text'); ?></a>
						</div>
					</div>
				</li>
			<?php $k++; endwhile; ?>
		</ul>
	<?php endif; ?>
</section>	
<?php	
  }
?>
