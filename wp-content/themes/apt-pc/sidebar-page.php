<?php
  $anc = apt_page_ancestor();
?>
    <div id="sidebar">
      <div class="side_nav">
        <h2><?php echo esc_html($anc->post_title); ?></h2>
        <ul class="sub_navi">
<?php wp_list_pages( array('include' => $anc->ID, 'title_li' => 0) ); ?>
<?php wp_list_pages( array('child_of' => $anc->ID, 'title_li' => 0, 'depth' => 2)); ?>
        </ul>
      </div>
<?php get_template_part('sidebar-common'); ?>
    </div><!-- end #sidebar -->
