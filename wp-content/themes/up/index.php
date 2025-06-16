<?php
get_header();
get_template_part('partials/home/banner');
get_template_part('partials/home/intro');
get_template_part('partials/home/thematic');
get_template_part('partials/home/mostras');
get_template_part('partials/home/tribute');
get_template_part('partials/home/masterclass');
//get_template_part('partials/home/debate');
get_template_part('partials/home/art');
?>
  <div class="communication">
    <div class="container container-big">
      <?php get_template_part('partials/home/tv'); ?>
      <?php get_template_part('partials/home/news'); ?>
      <?php get_template_part('partials/home/gallery'); ?>
      <?php get_template_part('partials/home/timeline'); ?>
    </div>
  </div>
<?php
get_template_part('partials/home/brands');
get_footer();
