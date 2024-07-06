<?php

  $class = '';
  if ( is_page_template( 'template-events.php' ) ) {
    $class = 'header--image-events';
  }
?>

<section class="header header--image <?php echo $class; ?>" style="background-image: url('<?php the_field('cover_img'); ?>')">

<?php
  if(get_field('logo')) { ?>
  	  <img src="<?php the_field('logo'); ?>">
  <?php } elseif (is_singular( 'bar' )) {

    $tags = get_the_terms( $id, 'venue_tag');
    if($tags && !is_wp_error($tags)) {
      foreach ($tags as $tag) {
        echo '<p class="title--small text-white text-upper">' . $tag->name . '</p>';
      }

    }
    echo '<h2 class="title title--bigger title--gold">'. get_the_title() .'</h2>';

  } else {
    $string = get_the_title();
    $words = explode(' ', $string);
    $subtitle = $words[0];
    $title = $words[1];

    echo '<p class="title--small text-white text-upper">' . $subtitle . '</p>';
    echo '<h2 class="title title--bigger title--gold">'. $title .'</h2>';
    echo '<div class="events-text">'. get_the_content(). '</div>';

  }

  if (!is_page_template( 'template-events.php') && !is_singular('restaurant')) {
    get_template_part('templates/partials/scroll');
  }
?>
</section>
