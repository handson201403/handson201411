<?php

// カスタムメニュー
register_nav_menus(
  array(
    'place_pc_global' => 'PCグローバル',
    'place_sp_global' => 'SPグローバル',
    'place_pc_utility' => 'PCユーティリティ',
    'place_sp_utility' => 'SPユーティリティ',
  )   
);

// wp_nav_menuにslugのクラス属性を追加する。
function apt_slug_nav($css, $item) {
  if ($item->object == 'page') {
    $page = get_post($item->object_id);
    $css[] = 'menu-item-slug-' . esc_attr($page->post_name);
  }
  return $css;
}

// 最上位の固定ページ情報を取得する。
function apt_page_ancestor() {
  global $post;
  $anc = array_pop(get_post_ancestors($post));
  $obj = new stdClass;
  if ($anc) {
    $obj->ID = $anc;
    $obj->post_title = get_post($anc)->post_title;
  } else {
    $obj->ID = $post->ID;
    $obj->post_title = $post->post_title;
  }
  return $obj;
}

// カテゴリIDを取得する。
function apt_category_id($tax='category') {
  global $post;
  $cat_id = 0;
  if (is_single()) {
    $cat_info = get_the_terms($post->ID, $tax);
    if ($cat_info) {
      $cat_id = array_shift($cat_info)->term_id;
    }
  }
  return $cat_id;  
}

function unregister_widgets(){
    unregister_widget('WP_Widget_Pages');//固定ページ
    unregister_widget('WP_Widget_Links');//リンク集
    unregister_widget('WP_Widget_Search');//サイト内検索フォーム
    unregister_widget('WP_Widget_Archives');//月別アーカイブ
    unregister_widget('WP_Widget_Meta');//めた情報(login/outなど)
    unregister_widget('WP_Widget_Calendar');//カレンダー
    unregister_widget('WP_Widget_Categories');//カテゴリーリスト
    unregister_widget('WP_Widget_Recent_Posts');//最近の投稿
    unregister_widget('WP_Widget_Recent_Comments');//最近のコメント
    unregister_widget('WP_Widget_RSS');//RSSフィード
    unregister_widget('WP_Widget_Tag_Cloud');//タグクラウド
    unregister_widget('WP_Nav_Menu_Widget');//ナビゲーションメニュー
}
add_action('widgets_init', 'unregister_widgets');

// カテゴリ情報を取得する。
function apt_category_info($tax='category') {
  global $post;
  $cat = get_the_terms($post->ID, $tax);
  $obj = new stdClass;
  if ($cat) {
    $cat = array_shift($cat);
    $obj->name = $cat->name;
    $obj->slug = $cat->slug;
  } else {
    $obj->name = '';
    $obj->slug = '';
  }
  return $obj;
}

// カスタム投稿タイプ・カスタム分類
add_action('init', 'register_post_type_and_taxonomy');
function register_post_type_and_taxonomy() {
  register_post_type(
    'branch',
    array(
      'labels' => array(
        'name' => '営業所情報',
        'add_new_item' => '営業所を追加',
        'edit_item' => '営業所の編集',
      ),
      'public' => true,
      'hierarchical' => true,
      'supports' => array(
        'title',
        'editor',
        'excerpt',
        'custom-fields',
        'thumbnail',
        'page-attributes',
      ),
    )
  );
  register_post_type(
    'tour',
    array(
      'labels' => array(
        'name' => 'ツアー情報',
        'add_new_item' => '新規ツアーを追加',
        'edit_item' => 'ツアーの編集',
      ),
      'public' => true,
      'supports' => array(
        'title',
        'editor',
        'excerpt',
        'custom-fields',
        'thumbnail',
      ),
    )
  );
  register_taxonomy(
    'area',
    'tour',
    array(
      'labels' => array(
        'name' => '地域',
        'add_new_item' => '地域を追加',
        'edit_item' => '地域の編集',
      ),
      'hierarchical' => true,
      'show_admin_column' => true,
    )
  );
}

// wp_list_pagesのクラス属性を変更する。
function apt_add_current($output) {
  global $post;
  $oid = "page-item-{$post->ID}";
  $cid = "$oid current_page_item";
  $output = preg_replace("/$oid/", $cid, $output);
  return $output;
}

// アイキャッチ画像を利用できるようにします。
add_theme_support('post-thumbnails');
set_post_thumbnail_size(208, 138, true);

// メディアのサイズを追加します。
add_image_size('main_image', 370);
add_image_size('tour-archive', 280);
add_image_size('sub_image', 150);

// ツアー情報のパンくずナビを修正します。
function apt_bread_crumb($arr) {
  if (is_tax('area') && count($arr) == 2) {
    $arr[2] = $arr[1];
    $arr[1] = array('title' => 'ツアー情報', 'link' => get_permalink(get_page_by_path('tour-info')));
  }
  return $arr;
}

// 数字を円貨幣のフォーマットに整形します。
function apt_convert_yen($yen) {
  $yen = mb_convert_kana($yen, 'n', 'UTF-8');
  $yen = preg_replace('/[^0-9]/', '', $yen);
  if (is_numeric($yen)) {
    $yen = number_format($yen) . '円';
    return $yen;
  }
}

// タイトルタグのテキストを出力します。
function apt_simple_title() {
  if (!is_front_page()) {
    echo trim(wp_title('', false)) . " | ";
  } 
  bloginfo('name');
}

// サイトIDのタグをトップページとそれ以外で切り替えます。
function apt_site_id() {
  if (is_front_page()) {
    echo "h1";
  } else {
    echo "div";
  }
}

// 検索ワードが未入力または0の場合にsearch.phpをテンプレートとして使用する
function apt_search_redirect() {
  global $wp_query;
  $wp_query->is_search = true;
  $wp_query->is_home = false;
  if (file_exists(TEMPLATEPATH . '/search.php')) {
    include(TEMPLATEPATH . '/search.php');
  }
  exit;
}

if (isset($_GET['s']) && $_GET['s'] == false) {             
  add_action('template_redirect', 'apt_search_redirect');                                     
}

// wp_nav_menuにcurrentのクラス属性を追加します。
function apt_current_nav($css, $item) {
  if ($item->title == 'ツアー情報') {
    if (get_post_type() == 'tour' || is_tax('area')) {
      $css[] = 'current-page-ancestor';
    }
  } elseif ($item->title == '営業所') {
    if (get_post_type() == 'branch') {
      $css[] = 'current-page-ancestor';
    }
  }
  return $css;
}

// カテゴリーイメージで使用するファイル名を出力します。:
function apt_category_image() {
  global $post;
  $cat_img = 'def';
  if (is_page()) {
    if (in_array($post->post_name, array('about', 'csr', 'tour-info', 'office' ))) {
      $cat_img = $post->post_name;
    } else {
      $anc = array_pop(get_post_ancestors($post));
      if ($anc) {
        $anc = get_page($anc);
        if (in_array($anc->post_name, array('about', 'csr'))) {
          $cat_img = $anc->post_name;
        }
      }
    }
  }
  if (get_post_type() == 'branch') {
    $cat_img = 'office';
  }
  if (get_post_type() == 'tour' || is_tax('area')) {
    $cat_img = 'tour-info';
  }
  $cat_img = 'img_cat_' . $cat_img . '.png';
  return $cat_img;
}

// 抜粋の文末を変更します。
function apt_excerpt_more($more) {
  return '...';
}
add_filter('excerpt_more', 'apt_excerpt_more');

// スマートフォンテーマが選択されているか判別します。
if (!function_exists('apt_is_smart')) {
  function apt_is_smart() {
    return false;
  }
}

// 電話番号を処理します。
function apt_telephone($tel, $echo=true) {
  $tel = mb_convert_kana($tel, 'n', 'UTF-8');
  $tel = preg_replace('/[^0-9\-]/', '', $tel);
  if (apt_is_smart()) {
    $tel = '<a href="tel:' . esc_attr($tel) . '">' . esc_html($tel) . '</a>';
  } else {
    $tel = esc_html($tel);
  }
  if ($echo) {
    echo $tel;
    return;
  } else {
    return $tel;
  }
}

// 電話番号処理のショートコードを登録します。
function apt_tel_func($atts, $tel='') {
  return apt_telephone($tel, false);
}
add_shortcode('apt_tel', 'apt_tel_func');

function twentythirteen_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'メインウィジェットエリア', 'twentythirteen' ),
		'id'            => 'sidebar-1',
		'description'   => __( 'サイドバーに表示されます。', 'twentythirteen' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
}
add_action( 'widgets_init', 'twentythirteen_widgets_init' );

add_editor_style('custom-editor-style.css');
