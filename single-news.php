<?php get_header(); ?>
<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/module-t/css/single.css">
<main>
	<img src="<?php echo get_stylesheet_directory_uri(); ?>/module-t/images/bg-middle-right.png" class="bg-middle-right">
	<img src="<?php echo get_stylesheet_directory_uri(); ?>/module-t/images/bg-bottom-left.png" class="bg-bottom-left">
	<?php get_template_part("paths/breacrumb",null,['static'=>true,'type'=>'single-news']); ?>
    <div id="blog_single">
        <div class="container">
            <div class="box">
                <div class="column">
                    <h1 class="blog_single__heading">
                        <?php the_title(); ?>
                    </h1>
                    <div class="blog_single__infos">
                        <span class="blog_single__time">
                            <?php the_time('Y.m.d'); ?>
                        </span>
                        <?php $newsCat = wp_get_post_terms($post->ID, 'news_cat'); ?>
                        <?php if (!empty($newsCat)): ?>
                            <div class="blog_single__categories">
                                <?php foreach ($newsCat as $k => $cat): ?>
                                    <a href="<?php echo get_term_link($cat->term_id); ?>" title="<?php echo $cat->name; ?>"
                                        class="blog_single__category">
                                        <?php echo $cat->name; ?>
                                    </a>
                                <?php endforeach; ?>
                            </div>
                        <?php endif; ?>
                    </div>
                    <div class="s-content">
                        <?php the_content(); ?>
                    </div>
					<?php get_template_part("paths/socials"); ?>
                </div>
                <div class="column">
                    <aside class="blog_aside">
                        <p class="blog_aside__title">最近のトピックスニュース</p>
                        <?php
                        $args = array(
                            'post_type' => 'news',
                            'orderby' => 'date',
                            'order' => 'DESC',
                            'posts_per_page' => 6,
                        );
                        $post_list = get_posts($args);
                        ?>
                        <?php if ($post_list): ?>
                            <?php foreach ($post_list as $post):
                                setup_postdata($post);
                                $newsCat = wp_get_post_terms($post->ID, 'news_cat'); ?>
                                <div class="aside_item">
                                    <div class="aside_item__head">
                                        <span class="aside_item__time">
                                            <?php the_time('Y.m.d'); ?>
                                        </span>
                                        <?php if (time() - get_the_time('G') < 604800): ?>
                                            <span class="aside_item__label">NEW</span>
                                        <?php endif; ?>

                                    </div>
                                    <h2>
                                        <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"
                                            class="aside_item__name">
                                            <?php trim_title(50); ?>
                                        </a>
                                    </h2>
                                    <?php if (!empty($newsCat)): ?>
                                        <div class="aside_item__categories">
                                            <?php foreach ($newsCat as $k => $cat): ?>
                                                <a class="aside_item__category" href="<?php echo get_term_link($cat->term_id); ?>"
                                                    title="<?php echo $cat->name; ?>">
                                                    <?php echo $cat->name; ?>
                                                </a>
                                            <?php endforeach; ?>
                                        </div>
                                    <?php endif; ?>
                                    <a href="<?php the_permalink(); ?>" title="" class="aside_item__link">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="10" height="7.664"
                                            viewBox="0 0 10 7.664">
                                            <path id="Path_220" data-name="Path 220"
                                                d="M10,0,5,4.643,0,0V3.021L5,7.664l5-4.643Z" transform="translate(0 0)"
                                                fill="#f54d4d" />
                                        </svg>

                                    </a>
                                </div>
                            <?php endforeach;
                            wp_reset_postdata(); ?>
                        <?php endif; ?>
                        <a href="<?php echo get_post_type_archive_link("news"); ?>" title="トピックスニュース一覧"
                            class="blog_aside__link">
                            トピックスニュース一覧
                            <svg xmlns="http://www.w3.org/2000/svg" width="10" height="7.664" viewBox="0 0 10 7.664">
                                <path id="Path_220" data-name="Path 220" d="M10,0,5,4.643,0,0V3.021L5,7.664l5-4.643Z"
                                    transform="translate(0 0)" fill="#f54d4d" />
                            </svg>
                        </a>
                    </aside>
                </div>
            </div>
<!--             <?php get_template_part("paths/socials"); ?> -->
            <?php get_template_part("paths/website"); ?>
        </div>

    </div>

</main>
<?php get_footer(); ?>