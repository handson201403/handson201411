  <div class="rss_link">
        <a href="<?php bloginfo('rss2_url'); ?>"><img src="<?php bloginfo('template_url'); ?>/images/ico_rss.png" width="215" height="29" alt="こちらのRSSを購読する。"></a>
      </div>
      <div class="textwidget">
        <p>
          <a href="http://wpbk2.prime-strategy.co.jp/blog/">
              <img src="<?php bloginfo('template_url'); ?>/images/bnr_blog.jpg" class="" width="215" height="110" alt="社長ブログ">ジャカルタで働く社長のブログ。</a>
        </p>
      </div>

<?php
if ( is_active_sidebar( 'sidebar-1' ) ) : ?>
	<div id="secondary" class="sidebar-container" role="complementary">
		<div class="widget-area">
			<?php dynamic_sidebar( 'sidebar-1' ); ?>
		</div><!-- .widget-area -->
	</div><!-- #secondary -->
<?php endif; ?>

