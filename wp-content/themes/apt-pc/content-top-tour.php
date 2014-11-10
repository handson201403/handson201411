<?php
  $area = apt_category_info('area');
?>
<div class="tour_column">
  <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
  <p class="tour_info_top">
    <span class="tour_category <?php echo esc_attr($area->slug); ?>"><?php echo esc_html($area->name); ?></span>
    <span class="tour_date">設定期間：<?php echo esc_html($post->cf_start_day); ?>〜<?php echo esc_html($post->cf_end_day); ?></span>
  </p>
  <p class="tour_image"><a href="<?php the_permalink(); ?>"><?php
  if (has_post_thumbnail()) :
    the_post_thumbnail('post-thumbnail');
  else :
    echo "No Image";
  endif; ?></a></p>
  <dl class="tour_info_foot clearfix">
    <dt>旅行代金</dt>
    <dd><?php echo apt_convert_yen($post->cf_min_fair); ?>～<?php echo apt_convert_yen($post->cf_max_fair); ?></dd>
    <dt>訪問都市</dt>
    <dd><?php echo esc_html($post->cf_destination); ?></dd>
    <dt>出発地</dt>
    <dd><?php echo esc_html(join(', ', get_post_meta($post->ID, 'cf_departure', false))) ?></dd>
    <dt>シートクラス</dt>
    <dd><?php echo esc_html($post->cf_sheet); ?></dd>
  </dl>
</div>
