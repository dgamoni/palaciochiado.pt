<ul class="events">
  <!--
  <?php
    $type = 'event';
    $today = date('Ymd');
    $args = array(
      'post_type' => $type,
      'order'     => 'ASC',
      'orderby'   => 'event_date',
      'posts_per_page' => 20,
      'meta_query' => array(
        'meta_query' => array(
          'relation' => 'OR',
          array(
            'key'     => 'event_date',
            'value'   => $today,
            'compare' => '>=',
            'type' => 'DATETIME'
          ),
          array(
            'key'     => 'event_date_end',
            'value'   => $today,
            'compare' => '<='
          )
        ),
      ),

    );
    
    $events = null;
    $events = new WP_Query($args);
    $id = $post->ID;

    if( $events->have_posts() ) {
      while ($events->have_posts()) : $events->the_post(); 
        $event_date = new DateTime(get_field("event_date", $id));
        $event_date_end = new DateTime(get_field("event_date_end", $id));
        $event_date_string = $event_date->format('Ymd');
        $event_date_end_string = $event_date_end->format('Ymd');
        
        $today = date('Ymd');


        $highlight_class = '';

        if(get_field('event_highlight')) {
          $highlight_class = 'events__item--highlight';
        }
      ?>
      
     --><li class="events__item <?php echo $highlight_class; ?>">
          <a href="#" class="js-event">
            <div class="event-card-front">
              <?php if($today === $event_date_end_string) { ?>
                <p class="event-card-front__day"><?php echo $event_date->format('d'); ?></p>
                <p class="event-card-front__month"><?php echo _e($event_date->format('F')); ?></p>
              <?php } else { ?>
                <div class="inline event-card-front__date-group">
                  <p class="event-card-front__day"><?php echo $event_date->format('d'); ?></p>
                  <p class="event-card-front__month"><?php echo _e($event_date->format('F')); ?></p>
                </div>
                <p class="inline event-card-front__date-label">A</p>
                <div class="inline event-card-front__date-group">
                  <p class="event-card-front__day"><?php echo $event_date_end->format('d'); ?></p>
                  <p class="event-card-front__month"><?php echo _e($event_date_end->format('F')); ?></p>
                </div>
              <?php } ?>
              <p class="event-card-front__title"><?php the_title(); ?></p>
              <!-- <p class="event-card-front__description"><?php echo get_the_content(); ?></p> -->
            </div>
            <div class="event-card-back">
              <div class="event-card-back__content center">
                <p class="event-card-back__date"><?php echo $event_date->format('d'); ?> <?php echo _e($event_date->format('F')); ?></p>
                <p class="event-card-back__title"><?php the_title(); ?></p>
                <p class="event-card-back__description"><?php echo get_the_content(); ?></p>
              </div>
            </div>
          </a>
        </li><!--
      <?php 
      endwhile;
    }
    wp_reset_query();  // Restore global post data stomped by the_post().
  ?>
-->
</ul>
