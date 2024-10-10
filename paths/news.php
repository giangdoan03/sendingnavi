<?php $post_list = isset($args['post_list']) ? $args['post_list'] : []; ?>
<?php if (!empty($post_list)): ?>
    <div class="box">
        <?php foreach ($post_list as $post):
            setup_postdata($post);
            $newsCat = wp_get_post_terms($post->ID, 'news_cat'); ?>

            <div class="item_topick">
                <div class="item_topick__labels">
                    <?php if (time() - get_the_time('G') < 604800): ?>
                        <span class="label">
                            NEW

                        </span>
                    <?php endif; ?>
                    <span class="pushlish">
                        <?php the_time('Y.m.d'); ?>
                    </span>
                    <div class="categories">
                        <?php if (!empty($newsCat)): ?>
                            <?php foreach ($newsCat as $k => $cat): ?>
                                <a href="<?php echo get_term_link($cat->term_id); ?>" title="<?php echo $cat->name; ?>">
                                    <?php echo $cat->name; ?>
                                </a>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </div>
                </div>
                <h2>
                    <a href="<?php echo the_permalink(); ?>" title="<?php trim_title(50); ?>" class="item_topick__name">
                        <?php trim_title(50); ?>
                    </a>
                </h2>
                <a href="<?php echo the_permalink(); ?>" title="" class="item_topick__link">
                    <svg xmlns="http://www.w3.org/2000/svg" width="10" height="7.664" viewBox="0 0 10 7.664">
                        <path id="Path_220" data-name="Path 220" d="M10,0,5,4.643,0,0V3.021L5,7.664l5-4.643Z"
                            transform="translate(0 0)" fill="#f54d4d" />
                    </svg>

                </a>
				<?php if (!empty($newsCat)): ?>
				<div class="item_topick__categories">
					<?php foreach ($newsCat as $k => $cat): ?>
					<a href="<?php echo get_term_link($cat->term_id); ?>" title="<?php echo $cat->name; ?>">
						<?php echo $cat->name; ?>
					</a>
					<?php endforeach; ?>
				</div>
				<?php endif; ?>
            </div>
        <?php endforeach;
        wp_reset_postdata(); ?>
    </div>
<?php endif; ?>