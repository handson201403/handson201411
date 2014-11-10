<?php
  $area = apt_category_info('area');
?>
<div class="tour_excerpt">
  <div class="tour_info clearfix">
          <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
    <div class="tour_detail_wrapper">      
      <div class="tour_detail <?php echo esc_html($area->slug); ?>">
        <span><?php echo esc_html($area->name); ?></span>
        <?php the_excerpt(); ?>

        <?php get_template_part('table-tour'); ?>

      </div><!-- end .tour_detail -->

      <div class="main_image">
        <a href="<?php the_permalink(); ?>"><?php
        $id = get_post_thumbnail_id();
        $url = wp_get_attachment_image_src($id, 'tour-archive');
        if ($url) {
          echo "<img src='{$url[0]}' alt='' />";
        } else {
          echo "No Image";
        }
        ?></a>
      </div>
    </div>
    <div class="detail_more">
      <p><a href="<?php the_permalink(); ?>">詳細を見る</a></p>
    </div>
  </div><!-- end .tour_info-->
</div><!-- end .tour_excerpt -->
