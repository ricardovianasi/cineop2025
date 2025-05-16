<?php
$bannerItems = get_posts([
  'post_type' => POST_TYPE_BANNER,
  'showposts' => 10,
  'suppress_filters' => 0
]);

if ($bannerItems): ?>
  <div class="banner">
    <div class="container container-medium">
      <div class="banner-slider">
        <div class="swiper">
          <div class="swiper-wrapper">
            <?php foreach ($bannerItems as $banner):
              $bannerTitle = $banner->post_title;
              $bannerImageDesktop = null;
              $bannerImageMobile = null;
              $bannerImageAlt = "";
              $bannerImageUrl = "";
              if (get_field('banner_image_mobile', $banner)) {
                $bannerImageMobile = wp_get_attachment_image(get_field('banner_image_mobile', $banner)['id'], 'banner_mobile_size');
              }
              if (get_field('banner_image_desktop', $banner)) {
                $bannerImageDesktop = wp_get_attachment_image(get_field('banner_image_desktop', $banner)['id'], 'banner_desktop_size');
              }
              $bannerUrl = get_field('banner_url', $banner); ?>
              <div class="swiper-slide banner-slide">
                <?php if ($bannerImageMobile): ?>
                  <div class="mobile">
                    <?php echo $bannerUrl ? "<a aria-label='$bannerTitle' href='$bannerUrl'>$bannerImageMobile</a>" : $bannerImageMobile ?>
                  </div>
                  <div class="desktop">
                    <?php echo $bannerUrl ? "<a aria-label='$bannerTitle' href='$bannerUrl'>$bannerImageDesktop</a>" : $bannerImageDesktop ?>
                  </div>
                <?php else: ?>
                  <?php echo $bannerUrl ? "<a aria-label='$bannerTitle' href='$bannerUrl'>$bannerImageDesktop</a>" : $bannerImageDesktop ?>
                <?php endif; ?>
              </div>
            <?php endforeach; ?>
          </div>
        </div>
        <?php if (count($bannerItems) > 1): ?>
          <div class="slider-controls">
            <div class="slider-navigation">
              <button class="slider-button-prev">
                <i class="icon-arrow-left-2"></i>
              </button>
              <button class="slider-button-next">
                <i class="icon-arrow-right-2"></i>
              </button>
            </div>
            <div class="slider-pagination"></div>
          </div>
        <?php endif; ?>
      </div>
    </div>
    <div class="mobile">
      <svg width="360" height="47" viewBox="0 0 360 47" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path opacity="0.7" d="M0.5 8.67256L360 26.3323L0.5 47V8.67256Z" fill="#B22E29"/>
        <path d="M0.5 -2.09808e-05L360 26.6603L0.5 31.5812V-2.09808e-05Z" fill="#CC5A39" fill-opacity="0.6"/>
      </svg>
    </div>
  </div>
<?php endif;
