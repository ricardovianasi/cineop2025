<?php
$up_home_bcm = get_field('up_home_bcm', 'option');
$up_home_bcm_enabled = !empty($up_home_bcm['up_home_bcm_enabled']) && $up_home_bcm['up_home_bcm_enabled'];
$up_home_bcm_text = !empty($up_home_bcm['up_home_bcm_text']) ? $up_home_bcm['up_home_bcm_text'] : "";
$up_home_bcm_featured = !empty($up_home_bcm['up_home_bcm_featured']) ? $up_home_bcm['up_home_bcm_featured'] : "";

if( $up_home_bcm_enabled ):
?>
	<div class="bcm">
		<div class="bcm-wrapper">
			<div class="container container-948 flex-col">
				<img alt="Brasil CineMundi - 15º International Coproduction Meeting" class="bcm-logo" src="<?php bloginfo('template_directory'); ?>/assets/dist/images/bcm.svg">
				<div class="flex">
					<div class="desc">
						<?php echo $up_home_bcm_text ?>
					</div>
					<div class="date">
						<p><?php echo $up_home_bcm_featured ?></p>
						<a class="btn btn-full btn-arrow btn-tertiary" target="_blank" href="https://brasilcinemundi.com.br/"><?php echo __('ACESSE O SITE')?> <i class="icon-long-arrow-right"></i></a>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php endif;
