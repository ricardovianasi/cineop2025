<?php
$heading_title = get_the_title();
if(!empty($args['heading_title'])) {
  $heading_title = $args['heading_title'];
}

$hero_banner = false;
if(!empty($args['hero-banner'])) {
  $hero_banner = $args['hero-banner'];
} else {
  $hero_banner_field = get_field('hero_banner');
  $hero_banner = wp_get_attachment_image_url($hero_banner_field, 'hero_banner');
}

$playerObj = new UP_Player();
$player = $playerObj->player(get_the_ID(), $hero_banner);

?>
<div class="main-header">
<!--  --><?php
//  if($player): ?>
<!--    <div class="main-player expanded">-->
<!--      <div class="container">-->
<!--        --><?php //echo $player ?>
<!--      </div>-->
<!--    </div>-->
  <?php if($hero_banner): ?>
    <div class="main-header-bg">
      <div class="rectangle"></div>
      <div class="container" aria-hidden="true">
        <div class="corners" aria-hidden="true">
          <div class="corner"></div>
          <div class="corner"></div>
          <div class="corner"></div>
        </div>
        <figure><img src="<?php echo $hero_banner ?>" alt="<?php echo $heading_title ?>"></figure>
        <div class="main-header-title">
          <h1 class="uppercase"><?php echo $heading_title ?></h1>
        </div>
      </div>
    </div>
  <?php else: ?>
    <div class="container container-1216 flex-col">
      <div class="main-header-title">
        <h1 class="uppercase"><?php echo $heading_title ?></h1>
      </div>
    </div>
  <?php endif; ?>
</div>
<?php
