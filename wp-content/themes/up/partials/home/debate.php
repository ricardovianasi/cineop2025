<?php
$home_debate = get_field('up_home_debate', 'option');
if (!empty($home_debate['up_home_debate_enabled'])) {
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
    : __('Ver todos os debates', 'up');


  if ($home_debate_items) :
    $orderly_debate_items = [];
    foreach ($home_debate_items as $item) {
      $debate_start_date_time = get_field('presentation_start_date_time', $item);
      $start_date_time = DateTime::createFromFormat('d/m/Y H:i:s', $debate_start_date_time);
      $order_by = $debate_start_date_time ? $start_date_time->format('YmdHis') : $item->ID;
      $orderly_debate_items[$order_by] = $item;
    }
    ksort($orderly_debate_items);
    ?>
    <div class="debate">
      <div class="debate-id">
        <svg
          width="1920"
          height="391"
          viewBox="0 0 1920 391"
          fill="none"
          xmlns="http://www.w3.org/2000/svg"
        >
          <path
            opacity="0.5"
            d="M0 1C0 1 246.464 140.837 423.707 180.789C706.925 244.629 879.047 104.626 1169.1 133.608C1334.21 150.105 1427.42 166.833 1585 214.588C1720.76 255.729 1920 349.557 1920 349.557"
            stroke="#004834"
          />
          <path
            opacity="0.5"
            d="M0 94.3939C205.637 139.874 343.407 3.04644 556.776 45.5918C776.754 89.4548 851.5 229.129 1051.97 314.208C1200.33 377.173 1300.91 400.478 1463.83 385.6C1660.82 367.611 1920 184.594 1920 184.594"
            stroke="#004834"
          />
        </svg>
      </div>
      <div class="container flex-col">
        <h2 class="home-title">
          <?php echo $home_debate_title ?>
        </h2>
        <div class="debate-slider">
          <div class="swiper">
            <div class="swiper-wrapper">
              <?php foreach ($orderly_debate_items as $debate):
                $item_tag = get_field('presentation_tag', $debate);
                $item_date = get_field('presentation_date', $debate);
                $item_subtitle = get_field('presentation_subtitle', $debate);
                $item_obs = get_field('presentation_obs', $debate);

                $item_image_list = get_field('presentation_image', $debate);
                $item_image_home = get_field('presentation_image_home', $debate);
                $block_image_grid = get_field('presentation_image_grid', $debate);
                $item_image = $item_image_home ? $item_image_home : $item_image_list;

                $item_place = '';
                $cat_place_terms = get_the_terms($debate->ID, 'cat_place');
                $cat_place_terms = is_array($cat_place_terms) ? $cat_place_terms[0] : $cat_place_terms;
                if ($cat_place_terms) {
                  $item_place = $cat_place_terms->name;
                } ?>
                <div class="swiper-slide debate-item items-center">
                  <div class="debate-content fixed-height">
                    <div class="tags">
                      <span class="tag"><?php echo $item_tag ?></span>
                    </div>
                    <div class="title">
                      <h3 class="uppercase">
                        <?php echo get_the_title($debate) ?>
                      </h3>
                      <?php if ($item_subtitle): ?>
                        <p class="subtitle on-active">
                          <?php echo $item_subtitle ?>
                        </p>
                      <?php endif; ?>
                    </div>

                    <p class="excerpt on-active">
                      <?php echo get_the_excerpt($debate); ?>
                    </p>

                    <div class="info">
                      <?php if ($item_date): ?>
                        <p class="date uppercase">
                          <span class="icon-mdi-calendar"></span>
                          <?php echo $item_date; ?>
                        </p>
                      <?php endif; ?>
                      <?php if ($item_place): ?>
                        <p class="place">
                          <span class="icon-pin-fill"></span>
                          <?php echo $item_place; ?>
                        </p>
                      <?php endif; ?>
                      <?php if ($item_obs): ?>
                        <p class="obs">
                          <span>*</span>
                          <?php echo $item_obs ?>
                        </p>
                      <?php endif; ?>
                    </div>
                    <a class="btn-link on-active" href="<?php echo get_the_permalink($debate) ?>">
                      Saiba Mais
                      <i class="icon-play1"></i>
                    </a>
                  </div>
                  <div class="id"></div>
                </div>
              <?php endforeach; ?>
            </div>
          </div>
        </div>
        <div class="debate-controls">
          <div class="slider-pagination"></div>
          <div class="slider-navigation">
            <button class="slider-button-prev">
              <i class="icon-arrow-left-2"></i>
            </button>
            <button class="slider-button-next">
              <i class="icon-arrow-right-2"></i>
            </button>
          </div>
          <?php if ($home_debate_link_url): ?>
            <a class="btn orange" href="<?php echo $home_debate_link_url; ?>">
              <?php echo $home_debate_link_label ?></a>
          <?php endif; ?>
        </div>
      </div>
    </div>
  <?php endif;
}
