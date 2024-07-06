<?php 
  $next_post = get_next_post();
  $prev_post = get_previous_post();
?>
<div class="header__nav">

  <?php if (!empty( $next_post )): ?>
    <a href="<?php echo get_permalink( $next_post->ID ); ?>" class="icon-down-arrow header__nav-prev"></a>
  <?php endif; ?>

  <p><?php echo get_the_title(); ?></p>

  <?php if (!empty( $prev_post )): ?>
    <a href="<?php echo get_permalink( $prev_post->ID ); ?>" class="icon-down-arrow header__nav-next"></a>
  <?php endif; ?>
</div>