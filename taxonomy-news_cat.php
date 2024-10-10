<?php get_header(); ?>
<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/module-t/css/blog.css">
<main>
    <?php get_template_part("paths/breacrumb",null,['static'=>true,'type'=>'news-cat']); ?>
    <div id="blog_page">
        <div class="container">
            <div class="blog_box">
                <h1 class="page_title">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18.686" height="40.291" viewBox="0 0 18.686 40.291">
                        <g id="Group_243" data-name="Group 243" transform="translate(0)">
                            <path id="Path_212" data-name="Path 212" d="M0,0,11.679,19.077h7.007L7.007,0Z"
                                transform="translate(0)" fill="#f54d4d" />
                            <path id="Path_213" data-name="Path 213" d="M11.678,51.5,0,70.577H7.007L18.686,51.5Z"
                                transform="translate(0 -30.286)" fill="#3dce97" />
                        </g>
                    </svg>
                    トピックスニュース一覧
                </h1>
                <?php $news_cats = get_terms([
                    'taxonomy' => 'news_cat',
                    'hide_empty' => false,
					'orderby' => 'meta_value_num',
				  	'order' => 'ASC',
					'meta_query' => [[
					'key' => 'order_news_category',
					'type' => 'NUMERIC',
				  ]],
                ]); ?>
                <div class="blog_tabs">
                    <?php if (!empty($news_cats)): ?>
					  <div class ="all-cate">
                        <a href="<?php echo get_post_type_archive_link("news"); ?>" class="blog_tab" title="すべて">すべて</a>
					</div>
                         
					  <div class ="item-cate">
                        <?php foreach ($news_cats as $news_cat): ?>
                            <a class="blog_tab <?php echo get_queried_object()->term_id == $news_cat->term_id ? 'active' : '' ?>"
                                href="<?php echo get_term_link($news_cat->term_id); ?>" title="<?php echo $news_cat->name; ?>">
                                <?php echo $news_cat->name; ?>
                            </a>
                        <?php endforeach; ?>
					</div>
                    <?php endif; ?>
                </div>
                <?php
                global $post;
                if (have_posts()): ?>
                    <div class="blog_items">
                        <?php while (have_posts()):
                            the_post(); ?>
                            <div class="blog_item <?php echo time() - get_the_time('G') < 604800 ? 'new' : 'old'; ?>">
                                <?php if (time() - get_the_time('G') < 604800): ?>
                                    <span class="blog_item__label">
                                        NEW
                                    </span>
                                <?php endif; ?>
                                <div class="blog_item__time">
                                    <?php the_time('Y.m.d'); ?>
                                </div>
                                <?php $newsCat = wp_get_post_terms($post->ID, 'news_cat'); ?>
                                <?php if (!empty($newsCat)): ?>
                                    <div class="blog_item__categories">
                                        <?php foreach ($newsCat as $k => $cat): ?>
                                            <a class="blog_item__category" href="<?php echo get_term_link($cat->term_id); ?>"
                                                title="<?php echo $cat->name; ?>">
                                                <?php echo $cat->name; ?>
                                            </a>
                                        <?php endforeach; ?>
                                    </div>
                                <?php endif; ?>
                                <h3>
                                    <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="blog_item__name">
                                        <?php the_title(); ?>
                                    </a>
                                </h3>
                                <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="blog_item__link">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="10" height="7.664" viewBox="0 0 10 7.664">
                                        <path id="Path_220" data-name="Path 220" d="M10,0,5,4.643,0,0V3.021L5,7.664l5-4.643Z"
                                            transform="translate(0 0)" fill="#f54d4d" />
                                    </svg>
                                </a>
                            </div>
                        <?php endwhile; ?>
                    </div>
                    <?php cpagination(); ?>
                </div>
            <?php else: ?>
                <p class="no-result">ありませんでした</p>
            <?php endif; ?>
            <?php get_template_part("paths/website"); ?>
        </div>

    </div>
</main>
<?php get_footer(); ?>