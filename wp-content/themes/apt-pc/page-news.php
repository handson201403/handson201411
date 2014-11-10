<?php get_header(); ?>
  <div id="container">
    <div id="main" role="main">
      <div id="content">
        <h1 class="page_ttl"><?php single_post_title(); ?></h1>
<?php
  query_posts(array('post_type' => 'post', 'paged' => get_query_var('paged')));
  if (have_posts()) :
    while (have_posts()) :
      the_post();
      get_template_part('content-archive');
    endwhile;
  endif;
  if (class_exists('WP_SiteManager_page_navi')) :
    WP_SiteManager_page_navi::page_navi();
  endif;
  wp_reset_query();
?>
<?php get_template_part('page_top_link'); ?>
      </div><!-- end #content -->
    </div><!-- end #main -->
<?php get_sidebar('post'); ?>
  </div><!-- end #container -->
<?php get_footer(); ?>
