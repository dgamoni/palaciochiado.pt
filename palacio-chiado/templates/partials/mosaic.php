<?php if(have_rows('mosaic')): ?>
	<ul class="mosaic"><!--
		<?php while(have_rows('mosaic')): the_row(); ?>
	 --><li>
        <img src="<?php the_sub_field('mosaic_img'); ?>">
	 		</li><!--
		<?php endwhile; ?>
--></ul>
<?php endif; ?>