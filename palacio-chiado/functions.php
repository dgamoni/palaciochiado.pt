<?php
/**
 * Sage includes
 *
 * The $sage_includes array determines the code library included in your theme.
 * Add or remove files to the array as needed. Supports child theme overrides.
 *
 * Please note that missing files will produce a fatal error.
 *
 * @link https://github.com/roots/sage/pull/1042
 */
$sage_includes = [
  'lib/assets.php',    // Scripts and stylesheets
  'lib/extras.php',    // Custom functions
  'lib/setup.php',     // Theme setup
  'lib/titles.php',    // Page titles
  'lib/wrapper.php',   // Theme wrapper class
  'lib/customizer.php', // Theme customizer
  'lib/post-types.php' // Post types
];

foreach ($sage_includes as $file) {
  if (!$filepath = locate_template($file)) {
    trigger_error(sprintf(__('Error locating %s for inclusion', 'sage'), $file), E_USER_ERROR);
  }

  require_once $filepath;
}
unset($file, $filepath);


// Function to add active class to current page menu item
add_filter('nav_menu_css_class', 'special_nav_class', 10, 2);

function special_nav_class ($classes, $item) {
    if (in_array('current-menu-item', $classes) ){
        $classes[] = 'active ';
    }
    return $classes;
}


function language_selector_flags() {
  $languages = icl_get_languages('skip_missing=0&orderby=code');
  if(!empty($languages)){
    foreach($languages as $l){
      $lang = $l['language_code'];
      $langAbrv = substr($lang, 0, 2);
      if($l['active']) {
        echo '<li><a href="'.$l['url'].'" class="active">' . $langAbrv . '</a></li>';
      } else {
        echo '<li><a href="'.$l['url'].'">' . $langAbrv . '</a></li>';
      }
    }
  }
}

add_action('wp_footer', 'add_custom_css');
function add_custom_css() { ?>
  <script>
    jQuery(document).ready(function($) {

    });
  </script>
  <style>
    .tabs_pdf {
      margin-top: 67px !important;
      margin-bottom: 5px !important;
    }
  </style>
  <?php
}

// load core functions
require_once get_stylesheet_directory() . '/core/load.php';