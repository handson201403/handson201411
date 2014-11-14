<?php get_header(); ?>
  <div id="container">
    <div id="main" role="main">
      <div id="content">
        <script type="text/javascript" src="//maps.google.com/maps/api/js?sensor=true"></script>
<?php
  if (have_posts()) :
    while (have_posts()) :
    the_post();
    get_template_part('content-branch');
    endwhile;
  endif;
?>
<?php get_template_part('page_top_link'); ?>
      </div><!-- end #content -->
    </div><!-- end #main -->
<?php get_sidebar('branch'); ?>
  </div><!-- end #container -->
<?php get_footer(); ?>
