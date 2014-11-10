<h1 class="page_ttl"><?php the_title(); ?></h1>
<div class="tour_info" id="tour_info_main">
  <div class="main_image_text clearfix">
    <div class="main_image" >
      <?php 
      $url = get_post_thumbnail_id();
      $url = wp_get_attachment_image_src($url, 'main_image');
      if ($url) {
        echo "<img src='{$url[0]}' alt='' />";
      }
      ?>
    </div>  
  <div class="detail-tour-table">
      <?php get_template_part('table-tour'); ?>
  </div>
  <?php the_excerpt(); ?>
</div> 

  <div class="tour_detail">

    <div class="tour_inquiry_s">
      <p>当ツアーに関するご質問・ご相談は「お問い合わせ」ページをご覧の上、お電話または専用フォームよりお気軽にお寄せ下さい。</p>
      <a href="<?php echo get_permalink(get_page_by_path('inquiry')); ?>">お問い合わせ</a>
    </div>
  </div><!-- end .tour_detail -->
</div><!-- end .tour_info -->
<div class="tour_info clearfix" id="tour_info_sub">
  <div class="sub_images ">
    <?php
    $url = wp_get_attachment_image_src($post->cf_img_1, 'sub_image');
    if ($url) { 
      echo "<img class='first' src='{$url[0]}' alt='' />";
    } 
    $url = wp_get_attachment_image_src($post->cf_img_2, 'sub_image');
    if ($url) { 
      echo "<img class='second' src='{$url[0]}' alt='' />";
    }
    ?>
  </div><!-- end .sub_image -->
  <h2>プランのポイント</h2>
  <div id="tour_content_sub">
    <?php the_content(); ?>
  </div>
</div><!-- end .tour_info -->
<div class="tour_inquiry_b">
  <p>当ツアーに関するご質問・ご相談は「お問い合わせ」ページをご覧の上、お電話または専用フォームよりお気軽にお寄せ下さい。</p>
  <a href="<?php echo get_permalink(get_page_by_path('inquiry')); ?>">お問い合わせ</a>
</div>
