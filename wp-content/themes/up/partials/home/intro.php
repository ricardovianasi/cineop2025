<?php
$up_home_introduction = get_field('up_home_introduction', 'option');
if (!empty($up_home_introduction['up_home_introduction_enabled'])):
$up_home_introduction_title = $up_home_introduction['up_home_introduction_title'];
$up_home_introduction_text = $up_home_introduction['up_home_introduction_text'];
$up_home_introduction_link = $up_home_introduction['up_home_introduction_link'];
$up_home_introduction_link_text = $up_home_introduction['up_home_introduction_link_text'];

?>
<div class="intro">
  <div class="intro-wrapper">
    <div class="title">
      <h2 class="uppercase"><?php echo $up_home_introduction_title; ?></h2>
    </div>
    <div class="desc">
      <?php echo $up_home_introduction_text ?>
    </div>
    <?php if ($up_home_introduction_link): ?>
      <a href="<?php echo $up_home_introduction_link ?>" class="button button-primary"><?php echo $up_home_introduction_link_text ?? 'Leia a apresentação' ?></a>
    <?php endif; ?>
  </div>
</div>
<?php endif;
