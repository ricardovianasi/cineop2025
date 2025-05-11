<?php
$up_home_gallery  = get_field('up_home_gallery', 'option');
$gallery_items = !empty($up_home_gallery['up_home_gallery_images']) ? $up_home_gallery['up_home_gallery_images'] : [];
if($gallery_items):
  ?>

  <div class="gallery">
      <div class="lines"></div>
      <h2 class="uppercase home-title"><?php echo __('Galeria', 'up'); ?></h2>
    <div class="gallery-items">
      <?php
      $count = 0;
      foreach ($gallery_items as $key => $img):
        $count++;
        if($count === 6): ?>
            <div class="cta">
                <a href="https://www.flickr.com/photos/universoproducao/" class="flex" target="_blank">
                    <span>
                      Ir para o Flickr da
                      <br />
                      Universo Produção
                    </span>
                    <span class="icon-next"></span>
                </a>
            </div>
        <?php endif; ?>
        <div class="">
          <a data-fancybox="gallery" href="<?php echo wp_get_attachment_image_url($img['ID'], 'full') ?>">
            <?php echo wp_get_attachment_image($img['ID'], 'gallery') ?></a>
        </div>
        <?php endforeach; ?>
    </div>
  </div>
<?php endif;
