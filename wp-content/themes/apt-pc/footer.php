</div><!-- #wrap end -->
<div id="footer-container">
  <div id="footer">
    <div class="footer_menu">
      <div class="footerBlock widget_nav_menu">
        <h2><a href="<?php echo get_permalink(get_page_by_path('tour-info')); ?>">ツアー情報</a></h2>
        <ul class="menu">
<?php wp_list_categories(array('taxonomy' => 'area', 'title_li' => false, 'hide_empty' => true)); ?>
        </ul>
      </div>
      <div class="footerBlock widget_nav_menu">
        <h2><a href="<?php echo get_permalink(get_page_by_path('office')); ?>">営業所</a></h2>
        <ul class="menu">
<?php wp_list_pages(array('post_type' => 'branch', 'title_li' => false)); ?>
        </ul>
      </div>
      <div class="footerBlock widget_nav_menu">
        <h2><a href="<?php echo get_permalink(get_page_by_path('news')); ?>">お知らせ</a></h2>
        <ul class="menu">
<?php wp_list_categories(array('title_li' => false, 'hide_empty' => true)); ?>
        </ul>
      </div>
      <div class="footerBlock widget_nav_menu">
        <h2><a href="<?php echo get_permalink(get_page_by_path('about')); ?>">会社概要</a></h2>
        <ul class="menu">
<?php wp_list_pages(array('child_of' => get_page_by_path('about')->ID, 'title_li' => false, 'depth' => 1));
?>
        </ul>
      </div>
    </div><!-- #footer_menu end -->
    <p id="copyright">
      <small>Copyright &copy; <?php bloginfo('name'); ?> All rights reserved.</small>
    </p>
  </div><!-- #footer end -->
</div><!-- #footer-container end -->
<?php wp_enqueue_script('scrolljs', get_template_directory_uri() . '/js/scroll.js'); ?>
<?php wp_footer(); ?>
</body>
</html>
