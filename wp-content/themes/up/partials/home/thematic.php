<?php
$home_thematic = get_field('up_home_thematic', 'option');
if(!empty($home_thematic['up_home_thematic_enabled'])) {
  $home_thematic_title = !empty($home_thematic['up_home_thematic_title'])
    ? $home_thematic['up_home_thematic_title']
    : __('TEMÁTICAS', 'up');

  $home_thematic_items = $home_thematic['up_home_thematic_cat_items'];
  ?>
  <div class="thematic">
    <div class="container flex-col">
      <h2 class="thematic-title uppercase home-title "><?php echo $home_thematic_title ?></h2>
      <div class="thematic-items">
        <?php foreach ($home_thematic_items as $key => $thematic): ?>
          <div class="thematic-item">
            <figure class="figure">
              <?php echo $thematic['image'] ? wp_get_attachment_image($thematic['image']['ID'], 'thematic') : '' ?>
            </figure>
            <div class="thematic-desc">
              <div>
                <h3 class="title"><?php echo $thematic['title'] ?? '' ?></h3>
                <p><?php echo $thematic['description'] ?? '' ?></p>
              </div>
              <a class="button button-primary" href="<?php echo $thematic['link'] ?? '' ?>">
                VER TEMÁTICA</a>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  </div>
  <?php
}
