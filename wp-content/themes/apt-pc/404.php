<!DOCTYPE HTML>
<html lang="ja">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, user-scalable=yes, initial-scale=1, maximum-scale=1, minimum-scale=1" />
<title>404 Not Found | <?php bloginfo('name'); ?></title>
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo('template_url'); ?>/css/404.css" />
</head>
<body>

  <div id="outside">
    <div id="wrapper_page">
      <h1><img src="<?php bloginfo('template_url'); ?>/images/404/img_404_logo.png" alt="<?php bloginfo('name'); ?>　404 Not Found"></h1>
      <h2>お探しのページは見つかりませんでした。</h2>
      <p>このページは、掲載終了・アドレス変更されたか、一時的にご利用できない可能性がございます。<br>
        また、URLを直接入力された場合、入力に間違いがないか再度ご確認ください。<br>
      </p>
      <p class="large"><a class="large" href="<?php echo home_url('/'); ?>"><?php bloginfo('name'); ?>TOPへ</a></p>
    </div>

  </div>
</body>
</html>
