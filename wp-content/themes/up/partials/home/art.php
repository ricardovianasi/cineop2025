<?php
$home_art = get_field('up_home_art', 'option');
if(!empty($home_art['up_home_art_enabled'])) {
  $home_art_title = $home_art['up_home_art_title'] ?? __('Arte e Shows', 'up');

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

  function render_art($art) {
    $item_image_list  = get_field('presentation_image', $art);
    $item_image_home  = get_field('presentation_image_home', $art);
    $item_image = $item_image_home['ID'] ?? $item_image_list['ID'];

    $item_date        = get_field('presentation_date', $art);
    $item_hour        = get_field('presentation_hour', $art);
    $item_subtitle    = get_field('presentation_subtitle', $art);
    $item_online      = get_field('player_online', $art);

    $item_place = get_the_terms($art->ID, 'cat_place' );
    $item_place = $item_place ? join(', ', wp_list_pluck($item_place, 'name')) : '';

    $place_hour = [];
    if(!empty($item_place)) {
      $place_hour[] = $item_place;
    }

    if(!empty($item_hour)) {
      $place_hour[] = $item_hour;
    }

    ob_start(); ?>
    <div class="art-item">
      <a href="<?php the_permalink($art);?>">
        <?php echo wp_get_attachment_image($item_image, 'art') ?>
        <div class="content">
          <span class="date"><?php echo $item_date ?></span>
          <span class="title"><?php echo get_the_title($art) ?></span>
          <span class="hour-place">
            <?php if ($place_hour) {
              echo implode(' | ', $place_hour);
            }?>
          </span>
        </div>
      </a>
    </div>
    <?php $render = ob_get_clean();
    return $render;
  }

  if($home_art_items) :
    $highlight = array_shift($home_art_items);

    ?>
    <div class="art">
    <div class="container flex-col">
      <div class="art-header">
        <h2 class="home-title uppercase"><?php echo $home_art_title ?></h2>
        <?php if ($up_home_art_desc): ?>
          <div class="art-subtitle">
            <p><?php echo $up_home_art_desc ?></p>
          </div>
        <?php endif; ?>

        <?php if($home_art_link_url): ?>
          <a class="button button-primary" href="<?php echo $home_art_link_url ?>">
            <?php echo $home_art_link_label ?></a>
        <?php endif; ?>

      </div>
      <div class="art-wrapper">
        <div class="art-items">
          <?php foreach ($home_art_items as $art) {
            echo render_art($art);
          }?>
          <?php ?>
        </div>
        <?php if ($highlight) {
          echo render_art($highlight);
        }?>
      </div>
      <?php if($home_art_link_url): ?>
        <a class="button button-primary" href="<?php echo $home_art_link_url ?>">
          <?php echo $home_art_link_label ?></a>
      <?php endif; ?>
    </div>
    </div>
  <?php endif;
}
