<?php 
  $nav_class = '';
  $lang_link = '';
  $lang_menu = '';

  if ( is_page_template( 'template-home.php' ) ) {
    $nav_class = 'site-nav--home';
    $logo = get_template_directory_uri() . '/dist/images/logos/palacio_logo_header-home.png';
  } else {
    $lang_link = 'lang-menu--white';
    $logo = get_template_directory_uri() . '/dist/images/logos/palacio_logo_header.png';
  }

   if (is_page_template('template-restaurant.php') || is_page_template('template-bars.php') || is_single()) {
      $lang_menu = 'lang-list--black';
   }
?>

<header>
  <nav class="site-nav <?php echo $nav_class; ?>">
    <div class="site-nav__container">
      <a class="site-nav__item site-nav__item--logo" href="<?= esc_url(home_url('/')); ?>">
        <img src="<?php echo $logo ?>" alt="Palacio do Chiado">
      </a>
    
      <a href="#" class="js-menu site-nav__item site-nav__mobile">
        <div class="site-nav__mobile-icon">
          <span></span>
        </div>
        <p class="site-nav__mobile-text mobile-menu-closed">Menu</p>
        <p class="site-nav__mobile-text mobile-menu-opened"><?php _e('Fechar', 'chiado'); ?></p>
      </a>
      <div class="js-site-menu site-nav__item site-menu">
        <p class="site-nav__title">Menu</p>
       <?php
        if (has_nav_menu('primary_navigation')) :
          wp_nav_menu(['theme_location' => 'primary_navigation', 'container' => '', 'menu_class' => 'site-menu__item site-menu__item--pages']);
        endif;
        ?> 

      <p class="site-nav__title"><?php _e('Idioma', 'chiado'); ?></p>
        <div class="site-menu__item site-menu__item--lang">
          <a href="#" class="js-lang btn <?php echo $lang_link; ?> lang-menu"><span class="js-selected-lang selected-lang"></span><span class="icon icon-down-arrow"></span></a>
          <ul class="js-lang-list <?php echo $lang_menu; ?>">
            <?php language_selector_flags(); ?>
          </ul>
        </div>
      </div>
    </div>

  </nav>
</header>