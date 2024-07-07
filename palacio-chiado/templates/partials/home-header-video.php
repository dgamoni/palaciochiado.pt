

  <section class="header header--home" style="background-image: url(<?php the_field('top_image'); ?>)">
    <span id="js-header-container" class="header__container">
      <div class="header__video">
        <video autoplay loop>
          <source src="<?php the_field('intro_video'); ?>" type="video/mp4">\
          Your browser does not support HTML5 video.
        </video>
      </div>
    	<div class="center">
    		<h2 class="title title--smaller"><?php _e('Bem-Vindo ao', 'chiado'); ?></h2>
    		<img src="<?php echo get_template_directory_uri() . '/dist/images/logos/palcio_logo_big.png' ?>">
    		<a href="#" id="js-play" class="js-play btn btn--white btn--main"><?php _e('Watch video', 'chiado'); ?></a>
    	</div>
      <?php get_template_part('templates/partials/scroll'); ?>
    </span>
    <div id="main-video" class="header__main-video">
      <a href="#" id="js-close-video" class="close-video icon-error"></a>
      <iframe id="video" class="video" src="https://www.youtube.com/embed/<?php the_field('main_video'); ?>?enablejsapi=1&amp;rel=0&amp;controls=0&amp;showinfo=0" frameborder="0" allowfullscreen></iframe>
    </div>
  </section>