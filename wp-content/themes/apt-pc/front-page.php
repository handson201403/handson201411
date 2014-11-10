<?php get_header(); ?>
  <div class="main_image">
    <a href="<?php echo get_permalink(get_page_by_path('tour-info')); ?>"><img src="<?php bloginfo('template_url'); ?>/images/top/main_image.png" width="950" height="329" alt="想像以上の旅をご提供いたします。" /></a>
  </div><!-- .main_image end -->
    
  <div id="container">
    <div id="main" role="main">
      <div id="content">
        <div id="tour_info" class="clearfix">
          <h2><img src="<?php bloginfo('template_url'); ?>/images/top/ttl_tour.png" width="183" height="25" alt="最新ツアー情報"></h2>
          <p class="list_link"><a href="<?php echo get_permalink(get_page_by_path('tour-info')); ?>"><img src="<?php bloginfo('template_url'); ?>/images/top/btn_linklist.png" width="80" height="29" alt="一覧を見る"></a></p>
          <div class="inner clearfix">
<?php
  query_posts(array('post_type' => 'tour', 'posts_per_page' => 6));
  while (have_posts()) :
    the_post();
    get_template_part('content-top-tour');
  endwhile;
  wp_reset_query();
?>
          </div><!-- end .inner -->
        </div><!-- end #tourInfo -->
        <div id="top_info" class="clearfix">
          <h2><img src="<?php bloginfo('template_url'); ?>/images/top/ttl_news.png" width="183" height="25" alt="お知らせ"></h2>
          <p class="list_link"><a href="<?php echo get_permalink(get_page_by_path('news')); ?>"><img src="<?php bloginfo('template_url'); ?>/images/top/btn_linklist.png" width="80" height="29" alt="一覧を見る"></a></p>
          <div class="inner clearfix">
            <ul>
<?php
  query_posts(array('post_type' => 'post'));
  while (have_posts()) :
    the_post();
    get_template_part('content-top-info');
  endwhile;
  wp_reset_query();
?>
            </ul>
          </div>
        </div><!-- end #topInfo -->
      </div><!-- end #content -->
    </div><!-- end #main -->
<?php get_sidebar(); ?>
  </div><!-- end #container -->
<?php get_footer(); ?>
