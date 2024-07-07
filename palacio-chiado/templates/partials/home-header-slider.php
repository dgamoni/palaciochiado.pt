

  <section class="header header--home swiper-container">
    <span id="js-header-container" class="header__container swiper-wrapper">
      <?php
      $upload_dir = wp_upload_dir();
      $baseurl = $upload_dir['baseurl'] . '/2024/07/';
      $images = [
        "1.webp",
        "2.webp",
        "3.webp",
        "4.webp",
        "5.webp",
        "6.webp",
        "7.webp",
        "8.webp",
        "9.webp",
        "10.webp",
        "11.webp",
        "12.webp",
        "13.webp",
        "14.webp",
        "15.webp",
        "16.webp",
        "17.webp",
        "18.webp",
        "19.webp"        
      ];
      foreach ($images as $image) {
        echo '<div class="swiper-slide" style="background-image: url(' . esc_url($baseurl . $image) . ');">';
        echo '<div class="overlay"></div>';
        echo '</div>';
      }
      ?>
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

  <script>
    jQuery(document).ready(function($) {

      const swiper = new Swiper('.swiper-container', {
        loop: true,
        autoplay: {
          delay: 4000,
          disableOnInteraction: false,
        },
        effect: 'fade', // Optional: Add fade effect
      });
    
    }); 
  </script>