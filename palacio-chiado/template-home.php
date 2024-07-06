<?php
/**
 * Template Name: Homepage
 */
?>

<?php while (have_posts()) : the_post(); ?>

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

  <?php get_template_part('templates/partials/slider'); ?>

  <?php get_template_part('templates/partials/featured'); ?>

  <?php get_template_part('templates/partials/suggestion'); ?>
  
<?php endwhile; ?>

<script type="text/javascript">
  var tag = document.createElement('script');
  tag.src = "//www.youtube.com/player_api";
  var firstScriptTag = document.getElementsByTagName('script')[0];
  firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

  var player;

  function onYouTubePlayerAPIReady() {
    player = new YT.Player('video', {
      events: {
        'onReady': onPlayerReady,
        'onStateChange': onPlayerStateChange
      }
    });
  }

  function onPlayerReady(event) {
    var elem = document.getElementById('js-play'),
        close = document.getElementById('js-close-video'),
        container = document.getElementById('js-header-container'),
        mainVideo = document.getElementById('main-video');

    elem.addEventListener("click", function(e) {
      e.preventDefault();
      container.className += " closed";
      mainVideo.className += " opened";
      player.playVideo();
    });

    close.addEventListener('click', function(e) {
      e.preventDefault();
      player.stopVideo();
      container.className = "header__container";
      mainVideo.className = "header__main-video";
    });
  }

  function onPlayerStateChange(event) {      
    if(event.data === 0) {
      d.className = "header__container";
    }
  }
</script>