<?php
/**
 * Template Name: Contactos
 */
?>

<?php while (have_posts()) : the_post(); ?>

<section class="page-contacts" style="background-image: url('<?php the_field('cover_img'); ?>')">
  <!-- <p class="title--small text-white text-upper"><?php _e('O palácio', 'chiado'); ?></p> -->
  <h2 class="title title--bigger title--gold"><?php echo get_the_title(); ?></h2>

	<?php if(have_rows('contacts')): ?>
  <ul class="contacts-list">
		<?php while(have_rows('contacts')): the_row(); ?>
  	<li class="contacts-list__item">
  		<p class="page-contacts__title"><?php the_sub_field('contacts_title'); ?></p>
  		<p class="page-contacts__content"><?php the_sub_field('contacts_content'); ?></p>
  	</li>
  	<?php endwhile; ?>
  </ul>
	<?php endif; ?>

	<div class="contacts-location">
		<span class="icon-location contacts-location__icon"></span>
		<h2 class="page-contacts__title"><?php _e('Localização', 'chiado'); ?></h2>
		<p class="page-contacts__content"><?php the_field('location'); ?></p>
		<a href="https://www.google.pt/maps/place/Pal%C3%A1cio+Chiado/@38.7097555,-9.1434553,19z/data=!4m7!1m4!3m3!1s0xd19347e95f94239:0x15fe378de8b95a91!2sR.+Serpa+Pinto+9,+1200-026+Lisboa!3b1!3m1!1s0x0000000000000000:0x6281a8a072e44871" target="blank" class="btn btn--main"><?php _e('obter direcções', 'chiado'); ?></a>
	</div>
</section>

<?php endwhile; ?>
