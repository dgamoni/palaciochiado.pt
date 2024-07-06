<?php
  if ( is_page_template( 'template-home.php' ) ) {
    $class = 'suggestion--home';
    $title_class = '';
  } else {
    $class = 'suggestion--single';
    $title_class = 'title--big';
  }
?>

<section class="suggestion <?php echo $class; ?>">
	<div class="suggestion__content">
    <?php
      $date = new DateTime(get_field("suggestion_date"));
      if ( is_page_template( 'template-home.php' ) ) {
    ?>
      <div class="suggestion__date">
        <p class="suggestion__date-day"><?php echo $date->format('d'); ?></p>
        <p class="suggestion__date-month"><?php echo _e($date->format('F')); ?></p>
      </div>
    <?php } else { ?>
      <p class="suggestion__header" <?php echo is_single(1060) || is_single(1102) ? 'style="display:none;"' : ''; ?>><?php _e('Conheça também', 'chiado'); ?></p>
    <?php } ?>
    <div class="suggestion__info">
  		<h2 class="title <?php echo $title_class; ?>"><?php the_field('suggestion_title'); ?></h2>
  		<div class="suggestion__text"><?php the_field('suggestion_text'); ?></div>
  		<a href="<?php the_field('suggestion_link'); ?>" class="btn btn--main"><?php the_field('suggestion_link-copy'); ?></a>
    </div>
	</div>
	<div class="suggestion__image" style="background-image: url(<?php the_field('suggestion_image'); ?>)"></div>
</section>
