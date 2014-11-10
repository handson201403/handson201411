<h1 class="page_ttl"><?php the_title(); ?></h1>
<div class="branch_info">
  <h2>支店情報</h2>
  <table>
    <tr>
      <th>郵便番号</th>
      <td>〒<?php echo esc_html($post->cf_zip); ?></td>
    </tr>
    <tr>
      <th>住所</th>
      <td><?php echo esc_html($post->cf_address); ?></td>
    </tr>
    <tr>
      <th>電話番号</th>
      <td><?php apt_telephone($post->cf_tel); ?></td>
    </tr>
    <tr>
      <th>営業時間</th>
      <td><?php echo esc_html($post->cf_open); ?></td>
    </tr>
    <tr>
      <th>アクセス</th>
      <td><?php the_content(); ?></td>
    </tr>
  </table>
</div>
<div class="maps clearfix">
  <h2>地図</h2>
    <div id="google_map_<?php echo $post->ID; ?>" class="google_map"></div>
    <a id="display-gmap" href="https://maps.google.co.jp/maps?q=<?php echo esc_attr($post->cf_lat); ?>,<?php echo esc_attr($post->cf_lng); ?>+(<?php echo urlencode(esc_attr($post->post_title)); ?>)&amp;iwloc=A&amp;z=<?php echo esc_attr($post->cf_zoom); ?>" target="_blank">Google マップ で表示する</a>
</div>
<script>
  (function(){
    var latlng = new google.maps.LatLng(<?php echo esc_js($post->cf_lat); ?>, <?php echo esc_js($post->cf_lng); ?>);
    var map = new google.maps.Map(
      document.getElementById('google_map_<?php echo $post->ID; ?>'),
      {
        zoom: <?php echo esc_js($post->cf_zoom); ?>,
        center: latlng,
        mapTypeId: google.maps.MapTypeId.ROADMAP
      }
    );
    var_marker = new google.maps.Marker({
      position: latlng,
      map: map,
      title: '<?php echo esc_js($post->post_title); ?>'
    });
  }());
</script>

