<?php
$up_home_mostra  = get_field('up_home_mostra', 'option');
if(!empty($up_home_mostra['up_home_mostra_enabled'])):
  $up_home_mostra_title = $up_home_mostra['up_home_mostra_title'] ?? 'MOSTRAS';
  $up_home_mostra_items = $up_home_mostra['up_home_mostra_items'] ?? [];
  $movie = Movie::getInstance();
  $movie->setType('list');
  ?>

  <div class="category">
    <div class="container flex-col">
      <h2 class="home-title uppercase"><?php echo $up_home_mostra_title ?></h2>
      <div class="category-names">
        <div class="swiper">
          <div class="swiper-wrapper">
            <?php foreach ($up_home_mostra_items as $mostra):
              $mostra_title = $mostra['title'] ?? '';
              ?>
              <div class="swiper-slide category-name">
                <a href="javascript:;"><?php echo $mostra_title ?></a></div>
            <?php endforeach; ?>
          </div>
        </div>
      </div>
      <div class="category-items">
        <div class="">
          <div class="swiper">
            <div class="swiper-wrapper">
              <?php foreach ($up_home_mostra_items as $mostra):
                $mostra_title = $mostra['title'] ?? '';
                $mostra_description = $mostra['description'] ?? '';
                $mostra_link = $mostra['link'] ?? '';
                $mostra_movies = $mostra['movies'] ?? [];
              ?>
                <div class="swiper-slide category-item">
                <div class="flex">
                  <div class="category-desc">
                    <p><?php echo $mostra_description ?></p>
                  </div>
                  <div class="category-movies">
                    <div class="movie movie-list">
                      <div class="movie-items">
                        <?php foreach ($mostra_movies as $m) {
                          echo $movie::single($m);
                        } ?>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="category-item-readmore">
                  <?php if ($mostra_link): ?>
                    <a class="button button-full-white" href="<?php echo $mostra_link?>">Ver todos os filmes</a>
                  <?php endif; ?>
                </div>
              </div>
              <?php endforeach; ?>
            </div>
          </div>
        </div>
      </div>
      <div
        class="section-controls flex flex-col md:flex-row items-center justify-between w-full gap-4"
      >
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
<?php endif;
