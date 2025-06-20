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
  <script>
    (function (d) {
      var config = {
          kitId: 'zqt0uva',
          scriptTimeout: 3000,
          async: true,
        },
        h = d.documentElement,
        t = setTimeout(function () {
          h.className =
            h.className.replace(/\bwf-loading\b/g, '') + ' wf-inactive';
        }, config.scriptTimeout),
        tk = d.createElement('script'),
        f = false,
        s = d.getElementsByTagName('script')[0],
        a;
      h.className += ' wf-loading';
      tk.src = 'https://use.typekit.net/' + config.kitId + '.js';
      tk.async = true;
      tk.onload = tk.onreadystatechange = function () {
        a = this.readyState;
        if (f || (a && a != 'complete' && a != 'loaded')) return;
        f = true;
        clearTimeout(t);
        try {
          Typekit.load(config);
        } catch (e) {
        }
      };
      s.parentNode.insertBefore(tk, s);
    })(document);
  </script>

  <?php wp_head(); ?>

  <!-- Global site tag (gtag.js) - Google Analytics -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=UA-10028533-1"></script>
  <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'UA-10028533-1');
  </script>

  <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/assets/dist/styles/vendor.css">
  <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/assets/dist/styles/main.css?v=6">
</head>
<body class="<?php echo implode(' ', $body_classes) ?>">
<header class="header">
  <div class="top">
    <h1 title="CineOP 20ª Mostra de Cinema de Ouro Preto">
      <a href="/">
        <img class="desktop"
             src="<?php bloginfo('template_directory'); ?>/assets/dist/images/header-desktop.png"
             alt="20ª CineOP">
        <img class="mobile"
             src="<?php bloginfo('template_directory'); ?>/assets/dist/images/header-mobile.jpg"
             alt="20ª CineOP">
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
