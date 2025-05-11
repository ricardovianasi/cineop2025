<?php
$home_art = get_field('up_home_art', 'option');
if (!empty($home_art['up_home_art_enabled'])) {
  $home_art_title = $home_art['up_home_art_title'] ?? __('Arte', 'up');

  $home_art_items = $home_art['up_home_art_activities'];

  $up_home_art_desc = $home_art['up_home_art_desc'];

  $home_art_link = $home_art['up_home_art_link'];

  $home_art_link_url = !empty($home_art_link['up_home_art_link_url'])
    ? $home_art_link['up_home_art_link_url']
    : false;

  $home_art_link_label = !empty($home_art_link['up_home_art_link_label'])
    ? $home_art_link['up_home_art_link_label']
    : __('ver tudo', 'up');

  $is_mobile = wp_is_mobile();

  function render_art($art, $class = '')
  {
    $item_image_list = get_field('presentation_image', $art);
    $item_image_home = get_field('presentation_image_home', $art);
    $item_image = $item_image_home['ID'] ?? $item_image_list['ID'];

    $item_date = get_field('presentation_date', $art);
    $item_hour = get_field('presentation_hour', $art);
    $item_subtitle = get_field('presentation_subtitle', $art);
    $item_online = get_field('player_online', $art);

    $item_place = get_the_terms($art->ID, 'cat_place');
    $item_place = $item_place ? join(', ', wp_list_pluck($item_place, 'name')) : '';

    $place_hour = [];
    if (!empty($item_place)) {
      $place_hour[] = $item_place;
    }

    if (!empty($item_hour)) {
      $place_hour[] = $item_hour;
    }

    ob_start(); ?>
    <div class="art-item <?php echo $class ?>">
      <?php if ($item_image): ?>
        <figure>
          <?php echo wp_get_attachment_image($item_image, 'art') ?>
        </figure>
      <?php endif; ?>

      <div class="desc">
        <span class="date"><?php echo $item_date ?></span>
        <h3><?php echo get_the_title($art) ?></h3>
        <?php if ($item_place): ?>
          <span class="local"><?php echo __('Local', 'up') ?>: <?php echo $item_place ?></span>
        <?php endif; ?>
        <a class="btn-link" href="<?php echo get_the_permalink($art) ?>"><i
            class="icon-lines"></i><?php echo __('Saiba Mais', 'up') ?><i class="icon-arrow-right"></i></a>
      </div>
    </div>
    <?php $render = ob_get_clean();
    return $render;
  }

  if ($home_art_items) :
    ?>
    <div class="art">
      <div class="container flex-col">
        <h2 class="home-title"><?php echo $home_art_title ?></h2>

        <div class="art-grid">
          <div class="art-slider">
            <div class="swiper">
              <div class="swiper-wrapper">
                <?php foreach ($home_art_items as $art):
                  $item_image_list = get_field('presentation_image', $art);
                  $item_image_home = get_field('presentation_image_home', $art);
                  $item_image = $item_image_home['ID'] ?? $item_image_list['ID'];

                  $item_date = get_field('presentation_date', $art);
                  $item_hour = get_field('presentation_hour', $art);
                  $item_subtitle = get_field('presentation_subtitle', $art);
                  $item_online = get_field('player_online', $art);

                  $item_place = get_the_terms($art->ID, 'cat_place');
                  $item_place = $item_place ? join(', ', wp_list_pluck($item_place, 'name')) : '';

                  $place_hour = [];
                  if (!empty($item_place)) {
                    $place_hour[] = $item_place;
                  }

                  if (!empty($item_hour)) {
                    $place_hour[] = $item_hour;
                  }
                  ?>
                  <div class="swiper-slide art-item">
                    <?php if ($item_image): ?>
                      <figure>
                        <?php echo wp_get_attachment_image($item_image, 'art') ?>
                      </figure>
                    <?php endif; ?>
                    <div class="desc">
                      <h3 class="title"><?php echo get_the_title($art) ?></h3>
                      <div class="info">
                        <p>
                          <span class="icon-mdi-calendar"></span>
                          <span><?php echo $item_date ?></span>
                        </p>
                        <p>
                          <span class="icon-pin-fill"></span>
                          <span><?php echo $item_place ?></span>
                        </p>
                      </div>
                      <a href="<?php echo get_the_permalink($art) ?>" class="btn-secondary">Saiba Mais</a>
                    </div>
                  </div>
                <?php endforeach; ?>
              </div>
            </div>
          </div>
          <div class="art-thumb">
            <div class="swiper">
              <div class="swiper-wrapper">
                <?php foreach ($home_art_items as $art):
                  $item_image_list = get_field('presentation_image', $art);
                  $item_image_home = get_field('presentation_image_home', $art);
                  $item_image = $item_image_home['ID'] ?? $item_image_list['ID'];
                  ?>
                  <div class="swiper-slide">
                    <?php if ($item_image): ?>
                      <figure>
                        <?php echo wp_get_attachment_image($item_image, 'art') ?>
                      </figure>
                    <?php endif; ?>
                  </div>
                <?php endforeach; ?>
              </div>
            </div>
            <div class="slider-controls">
              <div class="slider-pagination"></div>
              <div class="slider-navigation">
                <button class="slider-button-prev">
                  <i class="icon-arrow-left-2"></i>
                </button>
                <button class="slider-button-next">
                  <i class="icon-arrow-right-2"></i>
                </button>
              </div>
            </div>
            <?php if ($home_art_link_url): ?>
              <div class="text-right">
                <a class="btn orange" href="<?php echo $home_art_link_url ?>"><?php echo $home_art_link_label ?></a>
              </div>
            <?php endif; ?>
          </div>
        </div>

      </div>
    </div>
  <?php endif;
}
