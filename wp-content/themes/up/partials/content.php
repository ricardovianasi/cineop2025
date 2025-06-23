<div class="main-container container flex-col">
  <?php get_template_part('partials/heading', '', $args); ?>
  <div class="container container-small content flex-col">
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
<?php
