<?php
get_header(); ?>

<div class="bg-bege pt-[20px] pb-[48px] lg:pt-[80px] lg:pb-[135px]">
  <?php
  get_template_part('partials/home/banner');
  get_template_part('partials/home/intro');
  ?>
</div>
<?php
get_template_part('partials/home/thematic');
get_template_part('partials/home/mostras');
get_template_part('partials/home/tribute');
get_template_part('partials/home/debate');
get_template_part('partials/home/masterclass');
get_template_part('partials/home/art');
?>
<div class="tv-gallery">
<?php
  get_template_part('partials/home/news');
  get_template_part('partials/home/gallery');
?>
</div>
<?php
get_template_part('partials/home/brands');
get_footer();
