<?php /* Template Name: お問い合わせ_機関カスタマイズメニュー表示 - Thanks*/ ?>
<?php get_header(); ?>
<main>
	<?php get_template_part("paths/breacrumb"); ?>
	<div id="survey" class="survey">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@400;500;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/module-tg/survey.css"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <div class="survey-inner thanks container">
        <div class="title-box">
            <h1>お問い合わせが完了しました</h1>
            <picture class="line">
                <source media="(max-width: 767px)" srcset="<?php echo get_stylesheet_directory_uri(); ?>/module-tg/img/line_sp.png">
                <source media="(min-width: 768px)" srcset="<?php echo get_stylesheet_directory_uri(); ?>/module-tg/img/line.png">
                <img class="sizes" src="<?php echo get_stylesheet_directory_uri(); ?>/module-tg/img/line.png" alt="お問い合わせが完了しました">
            </picture>
            <p>お問い合わせありがとうございます。<br>
後日担当者が確認の上、ご連絡いたしますので、恐れ入りますがしばらくお待ちください。</p>
            <a href="<?php echo site_url(); ?>" class="bsm" title="TOPに戻る">TOPに戻る</a>
        </div>

      

    </div>
    <script src="<?php echo get_stylesheet_directory_uri(); ?>/module-tg/survey.js"></script>
</div>
<div class="container">
	<?php get_template_part("paths/website"); ?>
	</div>
</main>

<?php get_footer(); ?>