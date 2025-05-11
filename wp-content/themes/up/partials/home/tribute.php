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
    <div class="thematic tribute">
        <div class="container flex-col">
            <h2 class="home-title">
              <?php echo !empty($home_honor['up_home_honor_title'])
                ? $home_honor['up_home_honor_title'] : __('Mostra Homenagem', 'up') ?>
            </h2>
            <div class="thematic-wrapper">
                <div class="thematic-id">
                    <svg width="1920" height="391" viewBox="0 0 1920 391" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path opacity="0.5" d="M1920 1.36719C1920 1.36719 1673.54 141.204 1496.29 181.156C1213.08 244.996 1040.95 104.993 750.903 133.975C585.792 150.473 492.576 167.2 335 214.955C199.245 256.096 0 349.924 0 349.924" stroke="#004834"/>
                        <path opacity="0.5" d="M1920 94.7611C1714.36 140.241 1576.59 3.41363 1363.22 45.959C1143.25 89.822 1068.5 229.496 868.029 314.575C719.665 377.541 619.088 400.845 456.167 385.967C259.182 367.979 0 184.961 0 184.961" stroke="#004834"/>
                    </svg>

                </div>
              <?php if (!empty($up_home_honor_image['ID'])): ?>
                  <figure class="thematic-figure">
                    <?php echo wp_get_attachment_image($up_home_honor_image['ID'], 'thematic') ?>
                  </figure>
              <?php endif; ?>
                <div class="thematic-content">
                  <?php if ($up_home_honor_description_title): ?>
                      <h3><?php echo $up_home_honor_description_title ?></h3>
                  <?php endif; ?>
                  <?php echo $up_home_honor_description; ?>
                </div>
            </div>
          <?php if ($up_home_honor_link): ?>
              <div class="read-more">
                  <a class="btn orange" href="<?php echo $up_home_honor_link ?>">
                    <?php echo $up_home_honor_link_label ?>
                  </a>
              </div>
          <?php endif; ?>
        </div>
    </div>
<?php endif;
