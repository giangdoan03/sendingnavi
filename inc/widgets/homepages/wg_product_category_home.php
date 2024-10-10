<?php
class Wg_Product_Category_Home extends WP_Widget
{
	function __construct()
	{
		parent::__construct(
			'Wg_product_Category_Home',
			'Trang chủ - Danh mục sản phẩm trang chủ',
			array(
				'description' => 'Danh mục sản phẩm trang chủ'
			)
			);
	}

	function form($instance) {
        $default = array(
			'title' => '',
            'content' => '',
            'button' => '',
            'link' => '',
		);
        $instance = wp_parse_args( (array) $instance, $default);
        $title = esc_attr( $instance['title'] );
        $content = esc_attr( $instance['content'] );
        $button = esc_attr( $instance['button'] );
        $link = esc_attr( $instance['link'] );
		echo "<p>Tiêu đề:</p>";
        echo "<input style='width:100%' name = '".$this->get_field_name('title')."' value = '".$title."'/>";
		echo "<p>Nội dung:</p>";
        echo "<input style='width:100%' name = '".$this->get_field_name('content')."' value = '".$content."'/>";
		echo "<p>Nút bấm:</p>";
        echo "<input style='width:100%' name = '".$this->get_field_name('button')."' value = '".$button."'/>";
		echo "<p>Link:</p>";
        echo "<input style='width:100%' name = '".$this->get_field_name('link')."' value = '".$link."'/>";
	}

	function update( $new_instance, $old_instance ) {
        $instance = $old_instance;
        $instance['title'] =$new_instance['title'];
        $instance['content'] =$new_instance['content'];
        $instance['button'] =$new_instance['button'];
        $instance['link'] =$new_instance['link'];
        return $instance;
    }

	function widget($args, $instance)
	{
		extract($args);
        $title = $instance['title'];
        $content = $instance['content'];
        $button = $instance['button'];
        $link = $instance['link'];
?>

<?php
	$productCategories = get_terms(array(
			'taxonomy' => 'product-category',
            'hide_empty' => false,
        )
	);
?>
<?php if(is_array($productCategories) && count($productCategories) > 0): ?>
	<section class="2xl:py-12 2xl:pb-24 xl:py-10 py-6 section-pro__index relative">
    	<span class="text-relative hidden 2xl:block absolute top-1/2 -translate-y-1/2 left-9 pointer-events-none">
      		<img src="<?php echo get_stylesheet_directory_uri(); ?>/<?php echo get_stylesheet_directory_uri(); ?>/themefrontend/images/korest-col.png" alt="">
    	</span>
    	<div class="container">
      		<div class="head-all flex items-center justify-center xl:justify-between">
        		<div class="head-content xl:max-w-[670px] text-center xl:text-left wow fadeInLeft">
          			<p class="sub-title-all font-semibold tracking-[0.45em] uppercase text-[#ED2224] text-[0.75rem]">
					  <?php echo $title ?? ''; ?>
          			</p>
          			<p class="title-all font-semibold text-[#252525] 2xl:text-[2rem] xl:text-[1.5rem] text-[1.125rem] mt-3">
					  <?php echo $content ?? ''; ?>
          			</p>
        		</div>
        		<a href="<?php echo $link ?? ''; ?>" title="VIEW ALL" class="btn btn-base min-w-[193px] shrink-0 hidden xl:flex wow fadeInRight"><?php echo $button ?? ''; ?></a>
      		</div>
      		<div class="box-slide relative 2xl:mt-8 mt-4 wow fadeInUp">
        		<div class="swiper-container slide-pro__cate">
          			<div class="swiper-wrapper">
					  	<?php foreach($productCategories as $item): ?>
							<div class="swiper-slide">
								<div class="item-cate">
									<a href="<?php get_term_link($item->term_id) ?>" title="<?php echo $item->name; ?>" class="img block aspect-w-10 2xl:aspect-h-16 aspect-h-13">
										<img src="<?php echo getImageTerm('product_category_img',$item->term_id); ?>" alt="">
											<span class="circle-plus flex items-center justify-center">
												<img src="<?php echo get_stylesheet_directory_uri(); ?>/<?php echo get_stylesheet_directory_uri(); ?>/themefrontend/images/plus.svg" class="relative z-[1]" alt="">
											</span>
									</a>
									<h3>
										<a href="#" title=""
										class="title flex items-center font-semibold text-[#252525] 2xl:text-[1.25rem] xl:text-[1rem] uppercase xl:mt-4 mt-2">
											<?php echo $item->name; ?>
										</a>
									</h3>
								</div>
							</div>
						<?php endforeach; ?>
          			</div>
        		</div>
        		<div class="swiper-button pro-prev absolute top-1/2 -translate-y-1/2 cursor-pointer z-[1] 2xl:-left-14 left-0">
          			<img src="<?php echo get_stylesheet_directory_uri(); ?>/<?php echo get_stylesheet_directory_uri(); ?>/themefrontend/images/arrow-left-black.svg" class="xl:w-10 xl:h-10 w-5 h-5 img-contain" alt="">
        		</div>
        		<div class="swiper-button pro-next absolute top-1/2 -translate-y-1/2 cursor-pointer z-[1] 2xl:-right-14 right-0">
          			<img src="<?php echo get_stylesheet_directory_uri(); ?>/<?php echo get_stylesheet_directory_uri(); ?>/themefrontend/images/arrow-right-black.svg" class="xl:w-10 xl:h-10 w-5 h-5 img-contain" alt="">
        		</div>
      		</div>
      		<a href="<?php echo $link ?? ''; ?>" title="VIEW ALL" class="btn btn-base min-w-[193px] shrink-0 flex xl:hidden mt-4 w-fit mx-auto"><?php echo $button ?? ''; ?></a>
    	</div>
  	</section>
<?php endif; ?>

<?php
		echo $after_widget;
	}
}
