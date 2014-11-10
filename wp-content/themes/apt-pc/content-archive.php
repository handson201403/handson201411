<?php
  $cat_info = apt_category_info();
?>
<div class="content_excerpt">
<?php if (!is_search()) : ?>
  <div class="news_headline clearfix">
    <span class="news_date"><?php the_time('Y年m月d日'); ?></span>
    <span class="news_category <?php echo esc_attr($cat_info->slug); ?>"><?php echo esc_html($cat_info->name); ?></span>
  </div>
<?php endif; ?>
  <h2 class="page_ttl"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
  <?php the_excerpt(); ?>
</div><!-- end .content_excerpt -->  
