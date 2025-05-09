<div class="main-container">
  <?php if( function_exists( 'bcn_display' )): ?>
    <div class="container container-1216 flex-col">
      <div class="breadcrumbs" typeof="BreadcrumbList" vocab="https://schema.org/">
        <?php bcn_display(); ?>
      </div>
    </div>
  <?php endif; ?>
  <?php get_template_part('partials/heading', '', $args); ?>

  <div class="container container-1216 flex-col">
    <div class="main-content">
      <div class="container-948">
        <?php
        if(!empty($args['content-before'])) {
          echo $args['content-before'];
        }

        echo the_content();

        if(!empty($args['content-after'])) {
          echo $args['content-after'];
        }
        ?>
      </div>
    </div>
  </div>
</div>
<?php
