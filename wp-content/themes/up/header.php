<?php
global $post;

$body_classes = [];
if (is_home()) {
  $body_classes[] = 'home';
}

if ($post && $post->post_type) {
  $body_classes[] = $post->post_type . '-post-type';
}

$up_general_header_cta = get_field('up_general_header_cta', 'option');
$up_general_header_cta_label = $up_general_header_cta['label'] ?? false;
$up_general_header_cta_url = $up_general_header_cta['url'] ?? false;

?>
<!doctype html>
<html lang="pt">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">

  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link
    href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap"
    rel="stylesheet"
  />

  <?php wp_head(); ?>

  <!-- Global site tag (gtag.js) - Google Analytics -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=UA-10028533-3"></script>
  <script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
      dataLayer.push(arguments);
    }

    gtag('js', new Date());

    gtag('config', 'UA-10028533-3');
  </script>

  <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/assets/dist/styles/vendor.css">
  <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/assets/dist/styles/main.css?v=5">
</head>
<body class="<?php echo implode(' ', $body_classes) ?>">
<header class="header">
  <div class="top">
    <h1>
      <a href="/">
        <img class="desktop" src="<?php bloginfo('template_directory'); ?>/assets/dist/images/header_desktop.jpg?v=11"
             alt="28ª Mostra de Cinema de Tiradentes">
        <img class="mobile" src="<?php bloginfo('template_directory'); ?>/assets/dist/images/header_mobile.jpg?v=11"
             alt="28ª Mostra de Cinema de Tiradentes">
      </a>
    </h1>
  </div>
  <div class="nav">
    <div class="container">
      <div
        class="hamburger"
        id="menubtn"
        aria-label="Clique para abrir o menu"
        role="button"
      >
            <span class="wrapper">
              <span></span>
              <span></span>
              <span></span>
              <span></span>
            </span>
      </div>
      <nav>
        <?php if (has_nav_menu('main-menu')) {
          wp_nav_menu([
            'theme_location' => 'main-menu',
            'menu' => '',
            'container' => FALSE,
            'container_class' => 'text-neutral-100',
            'container_id' => '',
            'menu_class' => 'mainmenu',
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
  </div>
</header>
<main class="main">
