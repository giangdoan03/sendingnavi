<?php 
/*Template Name: お問い合わせ_機関カスタマイズメニュー表示 - Confirm*/ 
?>
<?php get_header(); ?>
<main>
	<?php get_template_part("paths/breacrumb"); ?>
	<img src="<?php echo get_stylesheet_directory_uri(); ?>/module-t/images/bg-bottom-right-half.png" class="bg-bottom-right-half">
<div id="survey" class="survey">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@400;500;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/module-tg/survey.css"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <div class="survey-inner container confirm">
        <div class="title-box">
            <h1>お問い合わせ内容の確認</h1>
            <picture class="line">
                <source media="(max-width: 767px)" srcset="<?php echo get_stylesheet_directory_uri(); ?>/module-tg/img/line_sp.png">
                <source media="(min-width: 768px)" srcset="<?php echo get_stylesheet_directory_uri(); ?>/module-tg/img/line.png">
                <img class="sizes" src="<?php echo get_stylesheet_directory_uri(); ?>/module-tg/img/line.png" alt="">
            </picture>
        </div>

        <div class="survey-form">
            <?php echo do_shortcode('[contact-form-7 id="3305" title="Contact Form Upgrade - Confirm"]'); ?>
        </div>

    </div>
    <script src="<?php echo get_stylesheet_directory_uri(); ?>/module-tg/survey.js"></script>
</div>
<div class="container">
	<?php get_template_part("paths/website"); ?>
	</div>
</main>
<?php get_footer(); ?>