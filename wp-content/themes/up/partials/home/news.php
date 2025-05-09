<?php
$up_home_news  = get_field('up_home_news', 'option');
$homeNewsItems = [];
if($up_home_news && !empty($up_home_news['up_home_news_enabled'])) {
  $homeNewsItems = get_posts([
    'post_type' => 'news',
    'numberposts' => 4,
    'suppress_filters' => 0,
    'meta_query' => [
      [
        'key' => 'news_highlight',
        'value' => '1'
      ]
    ]
  ]);
}
$newsShortcode = News_Shortcode::getInstance();

$up_home_tv  = get_field('up_home_tv', 'option');
$homeTv = null;
if($up_home_tv && !empty($up_home_tv['up_home_tv_enabled'])) {
  $homeTvItems = get_posts([
    'post_type' => 'tv',
    'numberposts' => 1,
    'suppress_filters' => 0
  ]);
  $homeTv = $homeTvItems[0] ?? false;
}

if ($homeNewsItems || $homeTv): ?>
  <div class="news">
    <div class="container flex-col">
      <h2 class="home-title uppercase">
        <?php echo !empty($up_home_news['up_home_news_title']) ? $up_home_news['up_home_news_title'] : __('Tv Mostra e Notícias') ?>
      </h2>
      <div class="news-wrapper flex">
        <?php if($homeTv):
          $tvLink = get_field('tv_link', $homeTv);
          $tvCover = get_field('tv_cover', $homeTv);
          ?>
          <div class="left tv">
            <a rel="noopener" target="_blank" href="<?php echo $tvLink ?>">
              <?php echo wp_get_attachment_image($tvCover['ID'], 'tv') ?>
              <span class="play">
                <i class="icon-next"></i>
              </span>
            </a>
          </div>
        <?php endif;
        if ($homeNewsItems): ?>
          <div class="right news-items">
            <?php foreach ($homeNewsItems as $news) {
              echo $newsShortcode->render($news, true);
            } ?>
          </div>
        <?php endif; ?>
      </div>
      <div class="news-cta flex flex-col lg:flex-row gap-[24px] lg:gap-0">
        <div class="left">
          <a class="button button-full-white" rel="noopener" target="_blank" href="https://www.youtube.com/user/universoproducao?sub_confirmation=1">ACOMPANHE NOSSO CANAL NO YOUTUBE</a>
        </div>
        <div class="right">
          <?php if($up_home_news['up_home_news_link']): ?>
          <a class="button button-full-white" href="<?php echo $up_home_news['up_home_news_link'] ?>">
            <?php echo !empty($up_home_news['up_home_news_link_text']) ? $up_home_news['up_home_news_link_text'] : __('Veja todas as notícia') ?></a>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </div>
<?php endif;
