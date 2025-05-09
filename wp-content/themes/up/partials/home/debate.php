<?php
$home_debate = get_field('up_home_debate', 'option');
if(!empty($home_debate['up_home_debate_enabled'])) {
//if(true) {
  $home_debate_title = !empty($home_debate['up_home_debate_title'])
    ? $home_debate['up_home_debate_title']
    : __('DEBATE', 'up');

  $home_debate_items = $home_debate['up_home_debate_activities'];

  $home_debate_link = $home_debate['up_home_debate_link'];

  $home_debate_link_url = !empty($home_debate_link['up_home_debate_link_url'])
    ? $home_debate_link['up_home_debate_link_url']
    : false;

  $home_debate_link_label = !empty($home_debate_link['up_home_debate_link_label'])
    ? $home_debate_link['up_home_debate_link_label']
    : __('ver todos os debates', 'up');


  if($home_debate_items) :
    $orderly_debate_items = [];
    foreach ($home_debate_items as $item) {
      $debate_start_date_time = get_field('presentation_start_date_time', $item);
      $start_date_time = DateTime::createFromFormat( 'd/m/Y H:i:s', $debate_start_date_time );
      $order_by = $debate_start_date_time ? $start_date_time->format('YmdHis') : $item->ID;
      $orderly_debate_items[$order_by] = $item;
    }
    ksort($orderly_debate_items);

    $debate_items = array_chunk($orderly_debate_items, 2);
    ?>
    <div class="debate">
      <div class="container flex-col">
        <h2 class="home-title uppercase"><?php echo $home_debate_title ?></h2>

        <div class="debate-items">
          <div aria-hidden="true" class="id"></div>
          <div class="swiper">
            <div class="swiper-wrapper">
              <?php foreach ($debate_items as $debate_page): ?>
                <div class="debate-slide swiper-slide">
                  <?php foreach ($debate_page as $debate):
                    $item_tag         = get_field('presentation_tag', $debate);
                    $item_date        = get_field('presentation_date', $debate);
                    $item_subtitle    = get_field('presentation_subtitle', $debate);
                    $item_obs         = get_field('presentation_obs', $debate);

                    $item_image_list  = get_field('presentation_image', $debate);
                    $item_image_home  = get_field('presentation_image_home', $debate);
                    $block_image_grid = get_field( 'presentation_image_grid', $debate );
                    $item_image = $item_image_home ?? $item_image_list;

                    $item_place = '';
                    $cat_place_terms = get_the_terms($debate->ID, 'cat_place');
                    $cat_place_terms = is_array($cat_place_terms) ? $cat_place_terms[0] : $cat_place_terms;
                    if($cat_place_terms) {
                      $item_place = $cat_place_terms->name;
                    } ?>
                    <div class="debate-item">
                      <?php if ($block_image_grid): ?>
                        <div class="debate-img-grid">
                          <?php foreach ($block_image_grid as  $key => $img) {
                            echo wp_get_attachment_image($img['ID'], 'prog');
                          } ?>
                        </div>
                      <?php elseif ($item_image['ID']): ?>
                        <figure><?php echo wp_get_attachment_image($item_image['ID'], 'debate') ?></figure>
                      <?php endif; ?>
                      <div class="desc">
                        <h3 class="title"><?php echo get_the_title($debate) ?></h3>
                        <p class="excerpt">
                          <?php echo get_the_excerpt($debate); ?>
                        </p>
                        <?php if($item_date): ?>
                          <span class="date"><?php echo $item_date; ?></span>
                        <?php endif; ?>
                        <a class="button button-primary" href="<?php echo get_the_permalink($debate) ?>">Ver Mais</a>
                      </div>
                    </div>
                  <?php endforeach; ?>
                </div>
              <?php endforeach; ?>
            </div>
          </div>
        </div>

        <div class="section-controls flex flex-col md:flex-row items-center justify-between w-full gap-4">
          <div class="slider-navigation hidden md:flex">
            <button class="slider-button-prev">
              <i class="icon-prev"></i>
            </button>
            <button class="slider-button-next">
              <i class="icon-next"></i>
            </button>
          </div>
          <div class="slider-pagination"></div>
          <?php if($home_debate_link_url): ?>
            <a class="button button-primary" href="<?php echo $home_debate_link_url; ?>">
              <?php echo $home_debate_link_label ?></a>
          <?php endif; ?>
        </div>
      </div>
    </div>
  <?php endif;
}
