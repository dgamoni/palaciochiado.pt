<?php
/**
 * Template Name: Homepage
 */
?>

<?php while (have_posts()) : the_post(); ?>

  <?php //get_template_part('templates/partials/home-header-video'); ?>
  <?php get_template_part('templates/partials/home-header-slider'); ?>

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
      container.className = "header__container swiper-wrapper";
      mainVideo.className = "header__main-video";
    });
  }

  function onPlayerStateChange(event) {      
    if(event.data === 0) {
      d.className = "header__container";
    }
  }
</script>