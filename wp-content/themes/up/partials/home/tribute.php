<?php
$home_honor = get_field('up_home_honor', 'option');
if (!empty($home_honor['up_home_honor_enabled'])): ?>
  <div class="tribute">
    <div class="container flex-col">
      <figure>
        <div class="rectangle"></div>
        <div class="corner"></div>
        <div class="corner"></div>
        <div class="corner"></div>
        <?php if (!empty($home_honor['up_home_honor_image']['ID'])) {
          echo wp_get_attachment_image($home_honor['up_home_honor_image']['ID'], 'honor');
        } ?>
      </figure>
      <div class="desc">
        <div class="left">
          <h2 class="home-title"><?php echo !empty($home_honor['up_home_honor_title']) ? $home_honor['up_home_honor_title'] : 'HOMENAGEM' ?></h2>
          <div class="subtitle">
            <?php echo !empty($home_honor['up_home_thematic_desc']) ? $home_honor['up_home_thematic_desc'] : '' ?>
          </div>
        </div>
        <div class="right">
          <?php if(!empty($home_honor['up_home_honor_link'])): ?>
            <a class="button button-primary" href="<?php echo $home_honor['up_home_honor_link'] ?>">
              <?php echo !empty($home_honor['up_home_honor_link_label']) ? $home_honor['up_home_honor_link_label'] : 'Saiba Mais'?>
            </a>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </div>
<?php endif;
