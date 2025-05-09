<?php
$up_home_gallery  = get_field('up_home_gallery', 'option');
$gallery_items = !empty($up_home_gallery['up_home_gallery_images']) ? $up_home_gallery['up_home_gallery_images'] : [];
if($gallery_items):
  $gallery_slides = "";
  foreach ($gallery_items as $key => $img) {
    $gallery_slides .= '<div class="swiper-slide">'.wp_get_attachment_image($img['ID'], 'gallery').'</div>';
  }
  ?>
  <div class="gallery">
    <div class="container flex-col">

        <h2 class="home-title uppercase"><?php echo __('Galeria', 'up'); ?></h2>
        <div class="gallery-items">
          <?php
          $cont = 0;
          foreach ($gallery_items as $key => $img):
            $cont++;
            if ($cont === 6): ?>
              <div class="cta">
                <a target="_blank" href="https://www.flickr.com/photos/universoproducao" class="flex">
                  <span class="uppercase">Ir para o Flickr da <br/>Universo Produção</span>
                  <span class="icon-next"></span>
                </a>
              </div>
            <?php endif; ?>
            <div>
              <a data-fancybox="gallery" href="<?php echo wp_get_attachment_image_url($img['ID'], 'full') ?>">
                <?php echo wp_get_attachment_image($img['ID'], 'gallery') ?></a>
            </div>
          <?php
            endforeach; ?>
        </div>
    </div>
  </div>
<?php endif;
