<?php
$home_honor = get_field('up_home_honor', 'option');
if (!empty($home_honor['up_home_honor_enabled'])):
  $home_honor_items = $home_honor['up_home_honor_items'] ?? [];

  if (!empty($home_honor_items)):
    ?>
    <div class="tribute">
      <div class="container container-medium flex-col">
        <div class="tribute-wrapper">
          <div class="swiper">
            <div class="swiper-wrapper">
              <?php foreach ($home_honor_items as $home_honor_item):
                $titulo = $home_honor_item['titulo'] ?? '';
                $subtitulo = $home_honor_item['subtitulo'] ?? '';
                $descricao = $home_honor_item['descricao'] ?? '';
                $imagem = $home_honor_item['imagem'] ?? null;
                $link = $home_honor_item['link'] ?? null;
                $label = $home_honor_item['label'] ?? 'Saiba Mais';
                ?>
                <div class="swiper-slide">
                  <div class="tribute-item">
                    <?php if (!empty($imagem['ID'])): ?>
                      <figure class="thematic-figure">
                        <?php echo wp_get_attachment_image($imagem['ID'], 'thematic') ?>
                      </figure>
                    <?php endif; ?>
                    <div class="tribute-content">
                      <div class="tribute-content-wrapper">
                        <?php if ($titulo): ?>
                          <h2><?php echo $titulo ?></h2>
                        <?php endif; ?>
                        <?php if ($subtitulo): ?>
                          <h3><?php echo $subtitulo ?></h3>
                        <?php endif; ?>
                        <?php if ($descricao): ?>
                          <p><?php echo $descricao ?></p>
                        <?php endif; ?>
                        <?php if ($link): ?>
                          <a class="btn-red" href="<?php echo $link ?>"><?php echo $label ?></a>
                        <?php endif; ?>
                      </div>
                    </div>
                  </div>
                </div>
              <?php endforeach; ?>
            </div>
          </div>
          <?php if (count($home_honor_items) > 1): ?>
            <div class="slider-controls">
              <div class="slider-navigation">
                <button class="slider-button-prev">
                  <i class="icon-arrow-left-2"></i>
                </button>
                <button class="slider-button-next">
                  <i class="icon-arrow-right-2"></i>
                </button>
              </div>
            </div>
          <?php endif; ?>
        </div>
      </div>
    </div>
  <?php
  endif;
endif;
