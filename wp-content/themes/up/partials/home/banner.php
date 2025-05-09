<?php
$bannerItems = get_posts([
  'post_type' => POST_TYPE_BANNER,
  'showposts' => 10,
  'suppress_filters' => 0
]);

if($bannerItems): ?>
  <div class="banner">
    <div class="container container-1216">
      <div class="banner-slider">
        <div class="swiper">
        <div class="swiper-wrapper">
          <?php foreach ($bannerItems as $banner):
            $bannerImage = null;
            $bannerImageAlt = "";
            $bannerImageUrl = "";
            if(wp_is_mobile() && get_field('banner_image_mobile', $banner)) {
              $bannerImage = wp_get_attachment_image( get_field('banner_image_mobile', $banner)['id'], 'banner_mobile_size' );
            } elseif(get_field('banner_image_desktop', $banner)) {
              $bannerImage = wp_get_attachment_image( get_field('banner_image_desktop', $banner)['id'], 'banner_desktop_size' );
            }
            $bannerUrl = get_field('banner_url', $banner); ?>
            <div class="swiper-slide banner-slide">
              <?php echo $bannerUrl ? "<a href='$bannerUrl'>$bannerImage</a>" : $bannerImage ?>
            </div>
          <?php endforeach; ?>
        </div>
          <div class="section-controls flex flex-col md:flex-row items-center justify-between w-full gap-4">
            <div class="slider-pagination"></div>
            <div class="slider-navigation hidden md:flex">
              <button class="slider-button-prev">
                <i class="icon-prev"></i>
              </button>
              <button class="slider-button-next">
                <i class="icon-next"></i>
              </button>
            </div>
          </div>
      </div>
      </div>
    </div>
  </div>
<?php endif;
