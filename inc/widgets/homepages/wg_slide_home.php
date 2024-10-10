<?php
class Wg_Slide_Home extends WP_Widget
{
	function __construct()
	{
		parent::__construct(
			'Wg_Slide_Home',
			'Trang chủ - Slide trang chủ',
			array(
				'description' => 'Slide trang chủ'
			)
		);
	}
	function widget($args, $instance)
	{
		extract($args);
?>
		<?php $slides = rwmb_meta('slide-item', array('object_type' => 'setting'), 'my_options'); ?>
		<?php if (!empty($slides) && count($slides) > 0) : ?>
		<section class="section-banner__index">
			<div class="swiper-container slide-banner__index pb-2 xl:pb-0">
				<div class="swiper-wrapper">
					<?php foreach($slides as $item): ?>
						<div class="swiper-slide img_full">
							<?php
								$imgs = _cget('img', $item, []);
								foreach ($imgs as $img) :
							?>
								<picture>
									<source media="(min-width:767px)" data-srcset="<?php echo wp_get_attachment_image_url($img, 'full') ?>" srcset="<?php echo wp_get_attachment_image_url($img, 'full') ?>">
									<source media="(min-width:375px)" data-srcset="<?php echo wp_get_attachment_image_url($img, 'large') ?>" srcset="<?php echo wp_get_attachment_image_url($img, 'large') ?>">
									<source media="(min-width:575px)" data-srcset="<?php echo wp_get_attachment_image_url($img, 'medium_large') ?>" srcset="<?php echo wp_get_attachment_image_url($img, 'medium_large') ?>">
									<source media="(min-width:0px)" data-srcset="<?php echo wp_get_attachment_image_url($img, 'medium') ?>" srcset="<?php echo wp_get_attachment_image_url($img, 'medium') ?>">
									<img srcset="<?php echo wp_get_attachment_image_url($img, 'full') ?>" class="img-fluid smooth no_lazy_load" alt="<?php echo _cget('name', $item); ?>">
								</picture>
							<?php 
								endforeach;
							?>
							<div class="container mt-4 xl:mb-0 2xl:!max-w-[1530px] xl:absolute h-full xl:top-0 xl:left-1/2 xl:-translate-x-1/2 z-[1] flex items-center justify-center">
								<div class="banner-content text-center">
									<p class="title-small text-border-white font-semibold 2xl:text-[1.5rem] xl:text-[1rem] uppercase tracking-[0.45em]"><?php echo (_cget('name', $item))	; ?></p>
									<p class="title-big text-border-white font-bold 2xl:text-[72px] xl:text-[50px] md:text-[30px] text-[16px] uppercase 2xl:mt-4 mt-2"><?php echo (_cget('content', $item)); ?></p>
									<a href="<?php echo _cget('link', $item); ?>" title="<?php echo _cget('name_button', $item); ?>" title="<?php echo _cget('name_button', $item); ?>" class="btn btn-base uppercase 2xl:mt-10 mt-4 min-w-[193px]"><?php echo _cget('name_button', $item); ?></a>
								</div>
							</div>
						</div>
					<?php endforeach; ?>
				</div>
				<div class="container absolute bottom-8 left-1/2 -translate-x-1/2 z-[1] hidden xl:flex items-center justify-between">
					<div class="button-banner flex items-center gap-2">
						<div class="swiper-banner banner__prev">
							<img src="<?php echo get_stylesheet_directory_uri(); ?>/<?php echo get_stylesheet_directory_uri(); ?>/themefrontend/images/arrow-left.svg" class="2xl:w-10 2xl:h-10 w-5 h-5 object-contain" alt="left">
						</div>
						<div class="swiper-banner banner__next">
							<img src="<?php echo get_stylesheet_directory_uri(); ?>/<?php echo get_stylesheet_directory_uri(); ?>/themefrontend/images/arrow-right.svg" class="2xl:w-10 2xl:h-10 w-5 h-5 object-contain" alt="right">
						</div>
					</div>
					<span class="scroll-down font-semibold text-white ">
						<svg width="16" height="24" class="inline-block mr-1 relative top-[-2px]" viewBox="0 0 16 24" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path d="M7.79242 20.163L3.58447 15.7147L4.94659 14.4261L7.78876 17.4307L10.6141 14.428L11.9797 15.7128L7.79242 20.163ZM15.5625 18.375V5.625C15.5625 2.52338 13.0391 0 9.9375 0H5.625C2.52338 0 0 2.52338 0 5.625V18.375C0 21.4766 2.52338 24 5.625 24H9.9375C13.0391 24 15.5625 21.4766 15.5625 18.375ZM9.9375 1.875C12.0053 1.875 13.6875 3.55719 13.6875 5.625V18.375C13.6875 20.4428 12.0053 22.125 9.9375 22.125H5.625C3.55719 22.125 1.875 20.4428 1.875 18.375V5.625C1.875 3.55719 3.55719 1.875 5.625 1.875H9.9375ZM7.78125 3.79688C7.26343 3.79688 6.84375 4.21655 6.84375 4.73438C6.84375 5.2522 7.26343 5.67188 7.78125 5.67188C8.29907 5.67188 8.71875 5.2522 8.71875 4.73438C8.71875 4.21655 8.29907 3.79688 7.78125 3.79688ZM7.78125 7.54688C7.26343 7.54688 6.84375 7.96655 6.84375 8.48438C6.84375 9.0022 7.26343 9.42188 7.78125 9.42188C8.29907 9.42188 8.71875 9.0022 8.71875 8.48438C8.71875 7.96655 8.29907 7.54688 7.78125 7.54688ZM7.78125 11.2969C7.26343 11.2969 6.84375 11.7166 6.84375 12.2344C6.84375 12.7522 7.26343 13.1719 7.78125 13.1719C8.29907 13.1719 8.71875 12.7522 8.71875 12.2344C8.71875 11.7166 8.29907 11.2969 7.78125 11.2969Z"
							fill="white" />
						</svg>
						Scroll down
					</span>
					<div class="pagination-banner w-fit text-white"></div>
				</div>
			</div>
		</section>
		<?php endif; ?>
		<?php
		echo $after_widget;
	}
}
