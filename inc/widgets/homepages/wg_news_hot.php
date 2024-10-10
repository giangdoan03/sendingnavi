<?php
class Wg_News_Hot extends WP_Widget
{
	function __construct()
	{
		parent::__construct(
			'Wg_News_Hot',
			'Trang chủ - Tin tức nổi bật',
			array(
				'description' => 'Tin tức nổi bật'
			)
		);
	}
	function widget($args, $instance)
	{
		extract($args);
?>

<section class="section section-new-first">
	<div class="container">
		<div class="bg_new_first">
			<?php
			    global $post;
			    $the_query_postnew = new WP_Query(
			        array(
			            'post_type' => 'post',
			            'post_status' => 'publish',
			            'posts_per_page' => 11,
			            'orderby'   => 'date',
			            'order'     => 'DESC'
			        )
			    );
			    if ($the_query_postnew->have_posts()) :
			    $posts = $the_query_postnew->posts;
			    $postLefts = array_slice($posts,0,1);
			    $postRights = array_slice($posts,1,10);
			?>
			<div class="row">
				<div class="col-lg-7">
					<?php foreach($postLefts as $post): ?>
						<?php get_template_part('templates/post/item_home_big'); ?>
					<?php endforeach; ?>
				</div>
				<div class="col-lg-5">
					<p class="title-ss-all mb-3">Bài mới nhất</p>
					<ul class="new-right scrollstyle1">
						<?php foreach($postRights as $post): ?>
						<li>
							<?php get_template_part('templates/post/item_home_small'); ?>
						</li>
						<?php 
							endforeach;
							wp_reset_postdata();
						?>
					</ul>
				</div>
			</div>
			<?php endif; ?>
			<?php
			    global $post;
			    $the_query_postcount = new WP_Query(
			        array(
			            'post_type' => 'post',
			            'post_status' => 'publish',
			            'posts_per_page' => 11,
			            'orderby'   => 'meta_value_num',
                        'meta_key'  => 'post_views_count',
                        'order'     => 'ASC',
			        )
			    );
			    if ($the_query_postcount->have_posts()) :
			?>
			<div class="secrion-new-hot position-relative">
				<p class="title-ss-all mb-3">Đáng chú ý</p>
				<div class="slide_new_hot swiper-container mySwiper">
					<div class="swiper-wrapper">
						<?php
                            while ($the_query_postcount->have_posts()) : $the_query_postcount->the_post();
                        ?>
						<div class="swiper-slide h-auto">
							<?php get_template_part('templates/post/item_home_small'); ?>
						</div>
						<?php 
							endwhile;
							wp_reset_postdata();
						?>
					</div>
				</div>
				<div class="swiper-button-next swp-button-next"><i class="fa fa-angle-right" aria-hidden="true"></i></div>
			    <div class="swiper-button-prev swp-button-prev"><i class="fa fa-angle-left" aria-hidden="true"></i></div>
			</div>
			<?php endif; ?>
		</div>
	</div>
</section>

<?php
		echo $after_widget;
	}
}
