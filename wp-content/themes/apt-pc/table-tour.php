  <table>
    <tr>
      <th>訪問都市</th>
      <td><?php echo esc_html($post->cf_destination); ?></td>
    </tr>
<?php if (is_single()) : ?>
    <tr>
      <th>設定期間</th>
      <td><?php echo esc_html($post->cf_start_day); ?>&#xFF5E;<?php echo esc_html($post->cf_end_day); ?></td>
    </tr>
<?php endif;?>
    <tr>
      <th>出発地</th>
      <td><?php echo esc_html(join(', ', get_post_meta($post->ID, 'cf_departure', false))); ?></td>
    </tr>
    <tr>
      <th>航空会社</th>
      <td><?php echo esc_html(get_post_meta($post->ID, 'cf_airline', true)); ?>（<?php echo esc_html($post->cf_sheet); ?>）</td>
    </tr>
    <tr>
      <th>ホテル</th>
      <td><?php echo esc_html($post->cf_hotel); ?></td>
    </tr>
<?php if (is_single()) : ?>
    <tr>
      <th>食事</th>
      <td><?php echo esc_html($post->cf_meal); ?></td>
    </tr>
    <tr>
      <th>添乗員</th>
      <td><?php echo esc_html($post->cf_conductor); ?></td>
    </tr>
<?php endif; ?>
    <tr>
      <th>料金</th>
      <td><?php echo apt_convert_yen($post->cf_min_fair); ?>&#xFF5E;<?php echo apt_convert_yen($post->cf_max_fair); ?></td>
    </tr>
<?php if (is_single()) : ?>
    <tr>
      <th>ツアーコード</th>
      <td><?php echo esc_html($post->cf_tour_code); ?></td>
    </tr>
<?php endif; ?>
  </table>
