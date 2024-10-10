<?php get_header(); ?>
<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/module-t/css/company.css">
<main>
    <?php get_template_part("paths/breacrumb"); ?>
    <div id="company_archive">
        <div class="container">
            <h1 class="page_title">
                <svg xmlns="http://www.w3.org/2000/svg" width="18.686" height="40.291" viewBox="0 0 18.686 40.291">
                    <g id="Group_243" data-name="Group 243" transform="translate(0)">
                        <path id="Path_212" data-name="Path 212" d="M0,0,11.679,19.077h7.007L7.007,0Z" transform="translate(0)" fill="#f54d4d" />
                        <path id="Path_213" data-name="Path 213" d="M11.678,51.5,0,70.577H7.007L18.686,51.5Z" transform="translate(0 -30.286)" fill="#3dce97" />
                    </g>
                </svg>
                <?php echo get_queried_object()->name; ?>
            </h1>
            <?php get_template_part("paths/form_result", null, ['postItems' => $wp_query, 'order' => '', 'location' => get_queried_object()->term_id, 'region' => wp_get_term_taxonomy_parent_id(get_queried_object()->term_id, 'location')]); ?>
            <?php
            global $post;
            if (have_posts()) : ?>
                <div class="company_items">
                    <?php while (have_posts()) :
                        the_post(); ?>
                        <?php get_template_part("paths/company_item", null, ['post' => $post]); ?>
                    <?php endwhile; ?>
                </div>
                <?php cpagination(); ?>
            <?php else : ?>
                <p class="no-result">ありませんでした</p>
            <?php endif; ?>
        </div>
    </div>
</main>
<?php get_footer(); ?>