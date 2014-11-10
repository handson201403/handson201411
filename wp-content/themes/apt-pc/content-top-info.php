<?php
  $cat_info = apt_category_info();
?>
                <li>
                  <span class="info_li_inner">
                    <span class="news_date"><?php the_time('Y年m月d日'); ?></span>
                    <span class="news_category <?php echo esc_attr($cat_info->slug); ?>"><?php echo esc_html($cat_info->name); ?></span>
                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                  </span>
                </li>
