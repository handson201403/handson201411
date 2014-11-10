<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8" />
<title><?php apt_simple_title(); ?></title>
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo('stylesheet_url'); ?>" />
<link rel="shortcut icon" href="<?php bloginfo('template_url'); ?>/images/favicon.ico" />
<link rel="apple-touch-icon-precomposed" href="<?php bloginfo('template_url'); ?>/images/apple-touch-icon.png" />
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="wrap">
  <div id="header" role="banner">
    <div class="inner clearfix">
      <<?php apt_site_id(); ?> class="site-id">
        <a href="<?php echo home_url('/'); ?>"><img src="<?php bloginfo('template_url'); ?>/images/site_id.png" width="322" height="42" alt="<?php bloginfo('description'); ?><?php bloginfo('name'); ?>" /></a>
      </<?php apt_site_id(); ?>>
      <div class="utility">
<?php
  wp_nav_menu(array(
    'container' => false,
    'theme_location' => 'place_pc_utility',
  ));
?>
        <div id="search" role="search">
<?php echo get_search_form(); ?>
        </div><!-- #search end -->
      </div><!-- .utility ebd -->
    </div><!-- .inner end -->
<?php
  add_filter('nav_menu_css_class', 'apt_current_nav', 10, 2);
  add_filter('nav_menu_css_class', 'apt_slug_nav', 10, 2);
  wp_nav_menu(array(
    'container' => 'div',
    'container_id' => 'global_nav',
    'theme_location' => 'place_pc_global',
    'depth' => 3,
  ));
  remove_filter('nav_menu_css_class', 'apt_current_nav'); 
  remove_filter('nav_menu_css_class', 'apt_slug_nav');
?>
  </div><!-- #header end -->
<?php
  if (!is_front_page()) :
?>
  <div class="category_image">
    <img src="<?php bloginfo('template_url'); ?>/images/sub/<?php echo apt_category_image(); ?>" width="950" height="120" alt="">
  </div><!-- .category_image end -->
<?php
    if ( class_exists( 'WP_SiteManager_bread_crumb' ) ) :
      add_filter('bread_crumb_arr', 'apt_bread_crumb');
      WP_SiteManager_bread_crumb::bread_crumb('navi_element=div&elm_id=bread_crumb');
      remove_filter('bread_crumb_arr', 'apt_bread_crumb');
    endif;
?>
<?php
  endif;
?>

