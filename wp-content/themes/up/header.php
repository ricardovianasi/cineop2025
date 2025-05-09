<?php
global $post;

$body_classes = [];
if (is_home()) {
    $body_classes[] = 'home';
}

if ($post && $post->post_type) {
    $body_classes[] = $post->post_type . '-post-type';
}
?>
<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet">

    <?php wp_head(); ?>

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-10028533-3"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());
      gtag('config', 'UA-10028533-3');
    </script>

    <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/assets/dist/styles/vendor.css">
    <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/assets/dist/styles/main.css?v=16">
</head>
<body class="<?php echo implode(' ', $body_classes) ?>">
<header class="header">
      <div class="header-top">
        <a class="header-img" href="/">
          <img src="<?php bloginfo('template_directory'); ?>/assets/dist/images/header-desktop.webp?v=3" class="desktop" alt="19ª CineOP">
          <img src="<?php bloginfo('template_directory'); ?>/assets/dist/images/header-mobile.webp?v=3" class="mobile" alt="19ª CineOP">
        </a>
      </div>
      <div class="header-nav">
        <div class="container container-1216 mx-auto items-center flex lg:hidden">
          <div class="hamburger" id="menubtn" aria-label="Clique para abrir o menu" role="button">
            <div class="wrapper">
              <span></span>
              <span></span>
              <span></span>
              <span></span>
            </div>
          </div>
        </div>
        <nav class="container container-1216">
          <?php if(has_nav_menu('main-menu')) {
              wp_nav_menu([
                'theme_location' => 'main-menu',
                'menu' => '',
                'container' => FALSE,
                'container_class' => 'text-neutral-100',
                'container_id' => '',
                'menu_class' => 'text-neutral-100',
                'menu_id' => 'mainmenu',
                'echo' => true,
                'fallback_cb' => 'wp_page_menu',
                'before' => '',
                'after' => '',
                'link_before' => '<span>',
                'link_after' => '</span>',
                'depth' => 3,
                'walker' => new Custom_Walker_Nav_Menu
              ]);
            } ?>
        </nav>
      </div>
    </header>

    <main class="main">
