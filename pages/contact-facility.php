<?php /* Template Name: お問い合わせ_機関カスタマイズメニュー表示 - Company*/?>
<?php get_header(); ?>
	
<main>
	<?php get_template_part("paths/breacrumb"); ?>
	<div id="survey" class="survey">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@400;500;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/module-tg/survey.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <div class="survey-inner container">
        <div class="title-box">
            <h1>各機関お問い合わせ</h1>
            <picture class="line">
                <source media="(max-width: 767px)" srcset="<?php echo get_stylesheet_directory_uri(); ?>/module-tg/img/line_sp.png">
                <source media="(min-width: 768px)" srcset="<?php echo get_stylesheet_directory_uri(); ?>/module-tg/img/line.png">
                <img class="sizes" src="<?php echo get_stylesheet_directory_uri(); ?>/module-tg/img/line.png" alt="お問い合わせ">
            </picture>
            <p>下記の項目をご入力の上、「個人情報の取り扱いに同意する」にチェックを入れ、「確認」のボタンを押してください。</p>
            <ul>
                <li>「必須」は必須項目です。必ずご記入ください。</li>
                <li>このフォームより寄せられた個人情報は、お問い合わせのご返答・弊社のご案内以外の目的で使用することはありません。</li>
            </ul>
        </div>

        <div class="survey-form">
            <?php echo do_shortcode('[contact-form-7 id="3353" title="Form - お問い合わせ_機関カスタマイズメニュー表示"]'); ?>
        </div>

    </div>
    <script src="<?php echo get_stylesheet_directory_uri(); ?>/module-tg/survey.js"></script>
		
</div>
<div class="container">
	<?php get_template_part("paths/website"); ?>
	</div>
</main>
<?php get_footer(); ?>