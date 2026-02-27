<?php
$home_thematic = get_field('up_home_thematic', 'option');
if(!empty($home_thematic['up_home_thematic_enabled'])) {
  $home_thematic_title = !empty($home_thematic['up_home_thematic_title'])
    ? $home_thematic['up_home_thematic_title']
    : __('TEMÁTICAS', 'up');

  $home_thematic_items = $home_thematic['up_home_thematic_cat_items'];
  ?>
  <div class="thematic">
    <div class="container container-big flex-col">
      <h2 class="thematic-title uppercase home-title "><?php echo $home_thematic_title ?></h2>
      <div class="thematic-items">
        <?php foreach ($home_thematic_items as $key => $thematic): ?>
          <div class="thematic-item">
            <figure class="figure">
              <svg
                viewBox="0 0 464 97"
                fill="none"
                xmlns="http://www.w3.org/2000/svg"
              >
                <path
                  d="M0.5 27L464.5 97H0.5V27Z"
                  fill=""
                  fill-opacity="0.6"
                />
                <path
                  d="M0.5 0.5L464.5 97H0.5V0.5Z"
                  fill=""
                  fill-opacity="0.6"
                />
              </svg>
              <?php echo $thematic['image'] ? wp_get_attachment_image($thematic['image']['ID'], 'thematic') : '' ?>
            </figure>
            <div class="thematic-desc">
              <div>
                <h3 class="title"><?php echo $thematic['title'] ?? '' ?></h3>
                <p><?php echo $thematic['description'] ?? '' ?></p>
              </div>
              <a class="btn-white" href="<?php echo $thematic['link'] ?? '' ?>">
                VER TEMÁTICA</a>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  </div>
  <?php
}
