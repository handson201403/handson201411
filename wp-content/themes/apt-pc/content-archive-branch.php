<div class="branch_info clearfix">
  <h2 class="page_ttl"><?php the_title(); ?></h2>
  <table>
    <tr>
      <th>住所</th>
      <td>〒<?php echo esc_html($post->cf_zip); ?> <?php echo esc_html($post->cf_address); ?><br />
        <a href="https://maps.google.co.jp/maps?q=<?php echo esc_attr($post->cf_lat); ?>,<?php echo esc_attr($post->cf_lng); ?>+(<?php echo urlencode(esc_attr($post->post_title)); ?>)&amp;iwloc=A&amp;z=<?php echo esc_attr($post->cf_zoom); ?>" target="_blank">Google マップ で表示する</a>
      </td>
    </tr>
    <tr>
      <th>電話番号</th>
      <td><?php apt_telephone($post->cf_tel); ?></td>
    </tr>
  </table>
  <div class="detail_more">
    <p><a href="<?php the_permalink(); ?>">詳細を見る</a></p>
  </div>
</div>
