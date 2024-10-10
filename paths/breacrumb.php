<?php if (isset($args['static'])): ?>
    <?php if (isset($args['type']) && $args['type'] == 'news-cat'): ?>
        <section class="breacrumb">
            <div class="container">
                <div class="aioseo-breadcrumbs">
                    <span class="aioseo-breadcrumb">
                        <a href="<?php echo site_url(); ?>" title="ホーム">ホーム</a>
                    </span>
                    <span class="aioseo-breadcrumb-separator"></span>
                    <span class="aioseo-breadcrumb">
                        トピックスニュース一覧
                    </span>
                </div>
            </div>
        </section>
    <?php endif; ?>
    <?php if (isset($args['type']) && $args['type'] == 'archive-news'): ?>
        <section class="breacrumb">
            <div class="container">
                <div class="aioseo-breadcrumbs">
                    <span class="aioseo-breadcrumb">
                        <a href="<?php echo site_url(); ?>" title="ホーム">ホーム</a>
                    </span>
                    <span class="aioseo-breadcrumb-separator"></span>
                    <span class="aioseo-breadcrumb">
                        トピックスニュース一覧
                    </span>
                </div>
            </div>
        </section>
    <?php endif; ?>
	<?php if (isset($args['type']) && $args['type'] == 'archive-posts'): ?>
		<section class="breacrumb">
			<div class="container">
				<div class="aioseo-breadcrumbs">
					<span class="aioseo-breadcrumb">
						<a href="<?php echo site_url(); ?>" title="ホーム">ホーム</a>
					</span>
					<span class="aioseo-breadcrumb-separator"></span>
					<span class="aioseo-breadcrumb">
						検索結果
					</span>
				</div>
			</div>
		</section>
	<?php endif; ?>
    <?php if (isset($args['type']) && $args['type'] == 'single'): ?>
        <section class="breacrumb">
            <div class="container">
                <div class="aioseo-breadcrumbs">
                    <span class="aioseo-breadcrumb">
                        <a href="<?php echo site_url(); ?>" title="ホーム">ホーム</a>
                    </span>
                    <span class="aioseo-breadcrumb-separator"></span>
                    <span class="aioseo-breadcrumb">
                        <a href="<?php echo getTplPageURL("facility-archive.php"); ?>" title="送出機関一覧">送出機関一覧</a>
                    </span>
                    <span class="aioseo-breadcrumb-separator"></span>
                    <?php
                    global $post;
                    $location = get_the_terms($post->ID, 'location');
                    $location = !empty($location) ? $location[0] : [];
                    $location_parent = get_term(wp_get_term_taxonomy_parent_id($location->term_id, 'location'), 'location');
                    ?>
                    <?php if (!empty($location) && $location_parent != null && empty($location_parent->errors)): ?>
                        <span class="aioseo-breadcrumb">
                            <a href="<?php echo get_term_link($location_parent, 'location'); ?>"
                                title="<?php echo $location_parent->name; ?>">
                                <?php echo $location_parent->name; ?>
                            </a>
                        </span>
                        <span class="aioseo-breadcrumb-separator"></span>
                        <?php if ($location != null): ?>
                            <span class="aioseo-breadcrumb">
                                <?php echo $location->name; ?>
                            </span>
                        <?php endif; ?>
                    <?php else: ?>
					<span class="aioseo-breadcrumb">
						<?php echo $post->post_title; ?>
					</span>
					<?php endif;?>
                </div>
            </div>
        </section>
    <?php endif; ?>
<?php if (isset($args['type']) && $args['type'] == 'single-news'): ?>
        <section class="breacrumb">
            <div class="container">
                <div class="aioseo-breadcrumbs">
                    <span class="aioseo-breadcrumb">
                        <a href="<?php echo site_url(); ?>" title="ホーム">ホーム</a>
                    </span>
                    <span class="aioseo-breadcrumb-separator"></span>
                    <span class="aioseo-breadcrumb">
                        <a href="<?php echo get_post_type_archive_link("news"); ?>" title="トピックスニュース一覧">トピックスニュース一覧</a>
                    </span>
                    <span class="aioseo-breadcrumb-separator"></span>
                    <?php
                    global $post;
                    $news_cat = get_the_terms($post->ID, 'news_cat');
                    $news_cat = !empty($news_cat) ? $news_cat[0] : [];
                    $news_cat_parent = get_term(wp_get_term_taxonomy_parent_id($news_cat->term_id, 'news_cat'), 'news_cat');
                    ?>
                    <?php if (!empty($news_cat)): ?>
						<?php if($news_cat_parent != null && empty($news_cat_parent->errors)): ?>
                        <span class="aioseo-breadcrumb">
                            <a href="<?php echo get_term_link($news_cat_parent, 'news_cat'); ?>"
                                title="<?php echo $news_cat_parent->name; ?>">
                                <?php echo $news_cat_parent->name; ?>
                            </a>
                        </span>
                        <span class="aioseo-breadcrumb-separator"></span>
						<?php endif; ?>
                        <?php if ($news_cat != null): ?>
                            <span class="aioseo-breadcrumb">
								<a href="<?php echo get_term_link($news_cat, 'news_cat'); ?>"
                                title="<?php echo $news_cat->name; ?>">
                                	<?php echo $news_cat->name; ?>
                            	</a>
                            </span>
                        <?php endif; ?>
					<?php endif;?>
					<span class="aioseo-breadcrumb">
						<?php echo $post->post_title; ?>
					</span>
					
                </div>
            </div>
        </section>
    <?php endif; ?>
<?php else: ?>
    <section class="breacrumb">
        <div class="container">
            <?php if (function_exists('aioseo_breadcrumbs'))
                aioseo_breadcrumbs(); ?>
        </div>
    </section>
<?php endif; ?>