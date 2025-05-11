<?php
get_header();
get_template_part('partials/home/banner');
get_template_part('partials/home/intro');
get_template_part('partials/home/mostras');
get_template_part('partials/home/thematic');
get_template_part('partials/home/tribute');
get_template_part('partials/home/masterclass');
get_template_part('partials/home/debate');
get_template_part('partials/home/art');
?>
    <div class="highlight highlight-news">
        <div class="highlight-wrapper">
            <div class="container big flex-col">
                <?php get_template_part('partials/home/tv'); ?>
                <?php get_template_part('partials/home/news'); ?>
                <?php get_template_part('partials/home/gallery'); ?>
                <?php get_template_part('partials/home/timeline'); ?>
            </div>
        </div>
    </div>
<?php
get_template_part('partials/home/brands');
get_footer();
