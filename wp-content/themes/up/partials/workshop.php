<?php
global $post;

$activity_type = get_field('presentation_type');
$activity_subtitle = get_field('presentation_subtitle');
$activity_date = get_field('presentation_date');
$activity_hour = get_field('presentation_hour');
$activity_start = get_field('presentation_start_date_time');
$activity_end = get_field('presentation_end_date_time');
$activity_subscription = get_field('presentation_subscription');
$activity_image = get_field('presentation_image');
$activity_image_banner = get_field('hero_banner');
$activity_workload         = get_field( 'presentation_workload' );
$activity_vacancies        = get_field( 'presentation_vacancies' );
$activity_age_range        = get_field( 'presentation_age_range' );
$activity_tag = get_field('presentation_tag');
$activity_gallery = get_field( 'presentation_gallery' );

$activity_guest = get_field( 'presentation_guest' );
$guest_name = $activity_guest['name'] ?? null;
$guest_image = $activity_guest['image'] ?? null;
$guest_country = $activity_guest['country'] ?? null;
$guest_description = $activity_guest['description'] ?? null;
$guest_curriculo = $activity_guest['curriculo'] ?? null;


$activity_terms           = get_the_terms($post->ID, 'cat_activities');
$activities_page_title    = join(', ', wp_list_pluck($activity_terms, 'name'));

$cat_place_terms = get_the_terms($post->ID, 'cat_place');
$block_place = join(', ', wp_list_pluck($cat_place_terms, 'name'));

get_header(); ?>
<div class="main-container container container-1216 flex-col">
  <?php if( function_exists( 'bcn_display' )): ?>
    <div class="breadcrumbs" typeof="BreadcrumbList" vocab="https://schema.org/">
      <?php bcn_display(); ?>
    </div>
  <?php endif; ?>
  <?php get_template_part('partials/heading', '', $args); ?>
  <div class="main-content">
    <div class="formation-single">
      <div class="details">
        <div class="left">
          <img src="<?php bloginfo('template_directory'); ?>/assets/dist/images/formation-single.jpg" alt="">
          <?php if ($activity_tag): ?>
            <div class="tags">
              <div class="tag"><?php echo $activity_tag; ?></div>
            </div>
          <?php endif; ?>

          <?php if ($activity_date || $activity_workload || $activity_vacancies || $activity_age_range): ?>
            <div class="info">
              <?php if($activity_date): ?><span><i class="icon-mdi-calendar"></i><?php echo $activity_date; ?></span><?php endif; ?>
              <?php if($activity_hour): ?><span><i class="icon-clock"></i><?php echo $activity_hour; ?></span><?php endif; ?>
              <?php if($block_place): ?><span><i class="icon-pin-fill"></i><?php echo $block_place; ?></span><?php endif; ?>
              <?php if($activity_workload): ?><span><i class="icon-clock"></i>Carga horária: <?php echo $activity_workload ?></span><?php endif; ?>
              <?php if($activity_age_range): ?><span><i class="icon-user"></i>Faixa etária: <?php echo $activity_age_range ?></span><?php endif; ?>
              <?php if($activity_vacancies): ?><span><i class="icon-user"></i><?php echo $activity_vacancies ?> vagas</span><?php endif; ?>
            </div>
          <?php endif; ?>
          <?php if( !empty($activity_subscription) && $activity_subscription['presentation_subscription_enabled']): ?>
            <a target="_blank"
               class="cta"
               href="<?php echo $activity_subscription['presentation_subscription_link'] ?>">
              <span><?php echo !empty($activity_subscription['presentation_subscription_label'])
                ? $activity_subscription['presentation_subscription_label']
                : 'Inscreva-se';
              ?></span><i class="icon-next"></i>
            </a>
          <?php endif; ?>
        </div>
        <?php if ($activity_guest): ?>
        <div class="right">
          <figure>
            <?php if ($guest_image['ID']) {
              echo wp_get_attachment_image($guest_image['ID'], [400,400]);
            } ?>
          </figure>
          <?php if($guest_name): ?><h3><?php echo $guest_name ?></h3><?php endif; ?>
          <?php if($guest_country): ?><span><?php echo $guest_country ?></span><?php endif; ?>
        </div>
        <?php endif; ?>
      </div>
      <div class="container-948">
        <div class="section">
          <h4 class="uppercase">Objetivo</h4>
          <div>
            <?php the_content(); ?>
          </div>
        </div>
        <?php if ($guest_description): ?>
        <div class="section">
          <h4 class="uppercase">CONVIDADO</h4>
          <div>
            <p><?php echo $guest_description ?></p>
          </div>
        </div>
        <?php endif; ?>
        <?php if($guest_curriculo): ?>
        <div class="section">
          <h4 class="uppercase">Currículo</h4>
          <div>
            <p>
              <?php echo $guest_curriculo ?>
            </p>
          </div>
        </div>
        <?php endif; ?>
      </div>
    </div>
  </div>
</div>
<?php
get_footer();
