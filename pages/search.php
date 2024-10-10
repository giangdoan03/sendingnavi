<?php /* Template Name: 送出機関を探す*/ ?>
<?php get_header(); ?>
<?php 
	$keyword = isset($_REQUEST['keyword']) ? $_REQUEST['keyword'] : '';
	$order = isset($_REQUEST['order']) ? $_REQUEST['order'] : '';
	$location = isset($_REQUEST['location']) ? $_REQUEST['location'] : '';
	$region = isset($_REQUEST['region']) ? $_REQUEST['region'] : '';
	$occupations = isset($_REQUEST['occupation']) ? $_REQUEST['occupation'] : '';
	$specific_skill = isset($_REQUEST['specific_skill']) ? $_REQUEST['specific_skill'] : '';
	$params['keyword'] = $keyword;
$params['order'] = $order;
$params['location'] = $location;
$params['region'] = $region;
$params['occupations'] = $occupations;
$params['specific_skill'] = $specific_skill;

?>
 <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/module-t/css/search.css">
<main>
    <?php get_template_part("paths/breacrumb"); ?>
     <section id="banner" class="search_page">
        <picture>
            <source media='(max-width: 767px)' srcset='<?php echo get_stylesheet_directory_uri(); ?>/module-t/images/banner-search-sp.jpg' />
            <source media='(min-width: 768px)' srcset='<?php echo get_stylesheet_directory_uri(); ?>/module-t/images/banner-search-pc.jpg' />
            <img class='sizes' src='<?php echo get_stylesheet_directory_uri(); ?>/module-t/images/banner-search-pc.jpg' alt='' />
        </picture>
        <div class="container">
            <?php get_template_part("paths/form",null,$params); ?>
        </div>
    </section>
</main>
<?php get_footer(); ?>