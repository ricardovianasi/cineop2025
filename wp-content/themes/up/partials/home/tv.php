<?php
$up_home_tv = get_field('up_home_tv', 'option');

$homeTvItems = [];

if ($up_home_tv && !empty($up_home_tv['up_home_tv_enabled'])) {
  $homeTvItems = get_posts([
    'post_type' => 'tv',
    'numberposts' => 3,
    'suppress_filters' => 0
  ]);

  $homeTvTitle = !empty($up_home_tv['up_home_tv_title']) ? $up_home_tv['up_home_tv_title'] : _('TV MOSTRA', 'up');
  $homeBtnLabel = !empty($up_home_tv['up_home_tv_btn']) ? $up_home_tv['up_home_tv_btn'] : _('Acompanhe nosso canal no YouTube', 'up');
}

$homeTvItemsRendered = [];
foreach ($homeTvItems as $tv) {
  $tvLink = get_field('tv_link', $tv);
  $tvCover = get_field('tv_cover', $tv);

  $homeTvItemsRendered[] = '
    <div class="tv-item">
      <a rel="noopener" target="_blank" href="' . $tvLink . '" data-fancybox>
        <figure class="tv-figure">
        ' . wp_get_attachment_image($tvCover['ID'], 'tv') . '
        <span class="circle-play"><i class="icon-play1"></i></span>
        </figure>
        <span class="content">
          <span class="tv-title">' . get_the_title($tv) . '</span>
        </span>
      </a>
    </div>';
}

if ($homeTvItemsRendered): ?>
  <div class="tv">
    <h2 class="home-title">
      <?php echo $homeTvTitle; ?></h2>
    <div class="tv-wrapper flex">
      <div class="left"><?php
        echo $homeTvItemsRendered[0];
        unset($homeTvItemsRendered[0]);
        ?></div>
      <div class="right">
        <?php echo implode('', $homeTvItemsRendered); ?>
        <a class="btn-red" rel="noopener" target="_blank"
           href="http://www.youtube.com/user/universoproducao?sub_confirmation=1">
          <?php echo $homeBtnLabel ?></a>
      </div>
    </div>
  </div>
  <div class="id mobile full">
    <svg width="360" height="47" viewBox="0 0 360 47" fill="none" xmlns="http://www.w3.org/2000/svg">
      <path opacity="0.7" d="M0.5 8.67256L360 26.3323L0.5 47V8.67256Z" fill="#5A6592"/>
      <path d="M0.5 -0.000143051L360 26.6602L0.5 31.5811V-0.000143051Z" fill="#83AD74" fill-opacity="0.5"/>
    </svg>
  </div>
<?php endif;
