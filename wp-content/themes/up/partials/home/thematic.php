<?php
$home_thematic = get_field('up_home_thematic', 'option');
if(!empty($home_thematic['up_home_thematic_enabled'])) {
  $home_thematic_title = !empty($home_thematic['up_home_thematic_title'])
    ? $home_thematic['up_home_thematic_title']
    : __('TEMÁTICA', 'up');
	$up_home_thematic_description = $home_thematic['up_home_thematic_description'] ?? '';
	$up_home_thematic_description_title = $home_thematic['up_home_thematic_description_title'] ?? '';
  $up_home_thematic_image = $home_thematic['up_home_thematic_image'];
  $up_home_thematic_link_label = $home_thematic['up_home_thematic_link_label'] ?? __('Saiba Mais', 'up');
  $up_home_thematic_link = $home_thematic['up_home_thematic_link_page'];
  ?>
    <div class="thematic">
        <div class="container flex-col">
            <h2 class="home-title"><?php echo $home_thematic_title ?></h2>
            <div class="thematic-wrapper">
                <div class="thematic-id">
                    <svg
                            width="1920"
                            height="460"
                            viewBox="0 0 1920 460"
                            fill="none"
                            xmlns="http://www.w3.org/2000/svg"
                    >
                        <path
                                opacity="0.2"
                                d="M237.315 42.6094C118.146 35.0397 0 0.560547 0 0.560547V340.009C0 340.009 110.568 308.746 182.139 290.315C381.816 238.895 587.541 340.009 587.541 340.009C587.541 340.009 810.584 425.285 960.749 415.315C1118.66 404.831 1184.2 383.947 1325.96 397.731C1439.61 408.78 1465.42 451.62 1608.06 459.275C1749.72 466.878 1920 397.731 1920 397.731V373.649C1920 373.649 1770.01 360.832 1679.5 340.009C1515.12 302.193 1542.51 158.754 1376.11 126.707C1205.02 93.7579 1125.8 252.129 949.942 241.386C733.649 228.172 718.044 39.803 517.596 27.3189C413.998 20.8667 334.527 48.7843 237.315 42.6094Z"
                                fill="#D7498A"
                        />
                    </svg>
                </div>
                <div class="thematic-content">
                    <?php if ($up_home_thematic_description_title): ?>
                        <h3><?php echo $up_home_thematic_description_title ?></h3>
                    <?php endif; ?>
                    <?php echo $up_home_thematic_description; ?>
                </div>
                <?php if (!empty($up_home_thematic_image['ID'])): ?>
                    <figure class="thematic-figure">
                        <?php echo wp_get_attachment_image($up_home_thematic_image['ID'], 'thematic') ?>
                    </figure>
                <?php endif; ?>
            </div>
            <?php if ($up_home_thematic_link): ?>
                <div class="read-more">
                    <a class="btn orange" href="<?php echo $up_home_thematic_link ?>">
                      <?php echo $up_home_thematic_link_label ?>
                    </a>
                </div>
            <?php endif; ?>
        </div>
    </div>
  <?php
}
