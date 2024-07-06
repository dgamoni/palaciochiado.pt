<ul class="venues">
  <!--
  <?php
    $type = 'restaurant';
    $args=array(
      'post_type' => $type,
      'order'     => 'ASC', 
      'orderby'   => 'date'
    );
    
    $post_id = $post->ID;
    $restaurants = null;
    $restaurants = new WP_Query($args);
    if( $restaurants->have_posts() ) {
      while ($restaurants->have_posts()) : $restaurants->the_post(); 
        $id = $post->ID;  
        
        if($post_id === $id) {
          $class = 'venues__item--disabled';
        } else {
          $class = '';
        }
      ?>
      
     --><li class="venues__item <?php echo $class; ?>" style="background-image: url(<?php the_field('bg_img'); ?>)">
          <a href="<?php echo get_permalink($id); ?>">
            <span class="venues__icon">+</span>
            <div class="venues__info">
            <?php
              $tags = get_the_terms( $id, 'venue_tag'); 
              if($tags && !is_wp_error($tags)) {
                foreach ($tags as $tag) {
                  echo '<p class="text-yellow-light text-tag">' . $tag->name . '</p>';
                }
              }
             ?>
              <p class="text-white venues__name"><?php the_title(); ?></p>
            </div>
          </a>
        </li><!--
      <?php endwhile;
    }
    wp_reset_query();  // Restore global post data stomped by the_post().
  ?>
  -->
</ul>
