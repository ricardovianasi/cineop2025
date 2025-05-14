<?php
$home_honor = get_field('up_home_honor', 'option');
if (!empty($home_honor['up_home_honor_enabled'])):
  $home_honor_title = !empty($home_honor['up_home_honor_title'])
    ? $home_honor['up_home_honor_title']
    : __('HOMENAGEM', 'up');
  $up_home_honor_description = $home_honor['up_home_thematic_desc'] ?? '';
  $up_home_honor_description_title = $home_honor['up_home_thematic_desc_title'] ?? '';
  $up_home_honor_image = $home_honor['up_home_honor_image'];
  $up_home_honor_link_label = $home_honor['up_home_honor_link_label'] ?? __('Saiba Mais', 'up');
  $up_home_honor_link = $home_honor['up_home_honor_link'];

  ?>
  <div class="tribute">
    <div class="container container-medium flex-col">
      <div class="tribute-wrapper">
        <?php if (!empty($up_home_honor_image['ID'])): ?>
          <figure class="thematic-figure">
            <?php echo wp_get_attachment_image($up_home_honor_image['ID'], 'thematic') ?>
          </figure>
        <?php endif; ?>
        <div class="tribute-content">
          <div class="tribute-content-wrapper">
            <h2><?php echo !empty($home_honor['up_home_honor_title'])
                ? $home_honor['up_home_honor_title'] : __('Mostra Homenagem', 'up') ?></h2>
            <?php if ($up_home_honor_description_title): ?>
              <h3><?php echo $up_home_honor_description_title ?></h3>
            <?php endif; ?>
            <?php echo $up_home_honor_description; ?>
            <?php if ($up_home_honor_link): ?>
              <a class="btn-red" href="<?php echo $up_home_honor_link ?>">
                <?php echo $up_home_honor_link_label ?>
              </a>
            <?php endif; ?>
          </div>
        </div>
      </div>
    </div>
  </div>
<?php endif;
