<?php get_header(); ?>
<main>
    <?php get_template_part("paths/banner"); ?>
    <?php
    $pickups = get_field("pickups", "option");
    ?>
    <?php if (!empty($pickups)): ?>
        <secion id="pickup">
            <div class="container">
                <div class="box">
                    <p class="title_all">
                        <svg xmlns="http://www.w3.org/2000/svg" width="11.811" height="25.467" viewBox="0 0 11.811 25.467">
                            <path id="Path_212" data-name="Path 212" d="M0,0,7.382,12.058h4.429L4.429,0Z"
                                transform="translate(0)" fill="#f54d4d" />
                            <path id="Path_213" data-name="Path 213" d="M7.381,51.5,0,63.558H4.429L11.81,51.5Z"
                                transform="translate(0 -38.091)" fill="#3dce97" />
                        </svg>
                        PICK UP
                        <span class="title_all__ja">ピックアップ送出機関</span>
                    </p>
                    <div class="controls">
                        <div class="control prev">
                            <svg id="btn" xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 40 40">
                                <circle id="Ellipse_2" data-name="Ellipse 2" cx="20" cy="20" r="20" fill="#3dce97" />
                                <path id="Path_231" data-name="Path 231" d="M10,0,5,4.643,0,0V3.021L5,7.664l5-4.643Z"
                                    transform="translate(23.837 15.134) rotate(91)" fill="#fff" />
                            </svg>

                        </div>
                        <div class="control next">
                            <svg id="btn" xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 40 40">
                                <circle id="Ellipse_1" data-name="Ellipse 1" cx="20" cy="20" r="20" fill="#3dce97" />
                                <path id="Path_221" data-name="Path 221" d="M10,0,5,4.643,0,0V3.021L5,7.664l5-4.643Z"
                                    transform="translate(17 25) rotate(-90)" fill="#fff" />
                            </svg>

                        </div>
                    </div>
                </div>
                <div class="swiper pickup-slides">
                    <div class="swiper-wrapper">
                        <?php foreach ($pickups as $k => $post): ?>
                            <?php global $post; ?>
                            <div class="swiper-slide">
                                <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="pickup_item">
                                    <?php the_thumb($post, "full"); ?>
                                    <span class="pickup_item__name">
                                        <?php the_title(); ?>
                                    </span>
                                </a>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>

            </div>
        </secion>
    <?php endif; ?>
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
        <section id="topicks-news">
            <div class="container">
                <p class="title_all">
                    <svg xmlns="http://www.w3.org/2000/svg" width="11.811" height="25.467" viewBox="0 0 11.811 25.467">
                        <path id="Path_212" data-name="Path 212" d="M0,0,7.382,12.058h4.429L4.429,0Z"
                            transform="translate(0)" fill="#f54d4d" />
                        <path id="Path_213" data-name="Path 213" d="M7.381,51.5,0,63.558H4.429L11.81,51.5Z"
                            transform="translate(0 -38.091)" fill="#3dce97" />
                    </svg>
                    <strong class="text_1">TOPICKS</strong><strong class="text_2">NEWS</strong>
                </p>
                <div class="topick_wrapper">
                    <span class="title_all__ja">トピックスニュース一覧</span>
<!--                     <div class="tabs">
                        <a href="" data-id="0" title="すべて" class="tab-blog active">すべて</a>
                        <?php $newsCategories = get_field("news_categories", "option"); ?>
						<?php if(!empty($newsCategories)): ?>
                        <?php foreach ($newsCategories as $k => $cat): ?>
                            <a class="tab-blog" href="<?php echo get_term_link($cat->term_id); ?>"
                                title="<?php echo $cat->name; ?>" data-id="<?php echo $cat->term_id; ?>">
                                <?php echo $cat->name; ?>
                            </a>
                        <?php endforeach; ?>
						<?php endif; ?>
                    </div> -->
                    <div class="topick_results">
                        <div class="topick_results">
                            <?php get_template_part("paths/news", "news", ['post_list' => $post_list]); ?>
                        </div>
                    </div>
                    <a href="<?php echo get_post_type_archive_link("news"); ?>" class="topick_all" title="トピックスニュース一覧">
                        トピックスニュース一覧
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16">
                            <g id="Group_291" data-name="Group 291" transform="translate(60 4350) rotate(-90)">
                                <path id="Path_220" data-name="Path 220" d="M10,0,5,4.643,0,0V3.021L5,7.664l5-4.643Z"
                                    transform="translate(4337 -56)" fill="#f54d4d" />
                                <rect id="Rectangle_190" data-name="Rectangle 190" width="16" height="16"
                                    transform="translate(4334 -60)" fill="none" />
                            </g>
                        </svg>

                    </a>
                </div>
            </div>
        </section>
        <script>
            var blogCategories = document.querySelectorAll("#topicks-news .tab-blog");
            var blogResult = document.querySelector("#topicks-news .topick_results");
            var loading = `<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" style="margin: auto; background: rgb(255, 255, 255); display: block; shape-rendering: auto;" width="200px" height="200px" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid"><path d="M10 50A40 40 0 0 0 90 50A40 42 0 0 1 10 50" fill="#e15b64" stroke="none">  <animateTransform attributeName="transform" type="rotate" dur="1s" repeatCount="indefinite" keyTimes="0;1" values="0 50 51;360 50 51"/></path><!-- [ldio] generated by https://loading.io/ --></svg>`;

            function getBlog(id) {
                var xhr = new XMLHttpRequest();
                var ajaxUrl = "<?php echo admin_url('admin-ajax.php'); ?>";
                var requestData = {
                    action: "get_news",
                    category: id,
                };
                var params = Object.keys(requestData)
                    .map(function (key) {
                        return key + "=" + encodeURIComponent(requestData[key]);
                    })
                    .join("&");
                xhr.open("GET", ajaxUrl + "?" + params, true);
                xhr.onload = function () {
                    if (xhr.status >= 200 && xhr.status < 300) {
                        var responseData = xhr.responseText;
                        blogResult.innerHTML = responseData;
                    }
                };
                xhr.onerror = function () {
                    console.error("Đã có lỗi khi gửi yêu cầu.");
                };
                xhr.send();
            }
            blogCategories.forEach(function (e, i) {
                e.addEventListener("click", function (event) {
                    blogCategories.forEach(function (elm, idx) {
                        elm.classList.remove("active");
                    });
                    event.preventDefault();
                    blogResult.innerHTML = loading;
                    var _id = this.getAttribute("data-id");
                    this.classList.add("active");
                    getBlog(_id);
                });
            });
        </script>
    <?php endif; ?>

    <section id="about">
        <div class="container">
            <p class="title_all">
                <svg xmlns="http://www.w3.org/2000/svg" width="11.811" height="25.467" viewBox="0 0 11.811 25.467">
                    <path id="Path_212" data-name="Path 212" d="M0,0,7.382,12.058h4.429L4.429,0Z"
                        transform="translate(0)" fill="#f54d4d" />
                    <path id="Path_213" data-name="Path 213" d="M7.381,51.5,0,63.558H4.429L11.81,51.5Z"
                        transform="translate(0 -38.091)" fill="#3dce97" />
                </svg>
                ABOUT
                <span class="title_all__ja">本サービスについて</span>
            </p>
            <div class="box">
                <div class="column">
                    <p class="about_title">SendingNaviとは</p>
                    <div class="about_contents">
                        <p>
                            本サイトは、新たに外国人技能実習生や特定技能者他外国人労働者の活用をお考えの企業様、監理機関のご担当者様へ向け、各国認定送出機関の情報をご紹介することを目的としています。</p>
                    </div>
                    <a href="<?php echo getTplPageURL("about.php"); ?>" title="詳細を見る" class="about_link">詳細を見る</a>
                </div>
                <div class="column">
                    <div class="about_image">
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/module-t/images/about-image.jpg"
                            alt="詳細を見る">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="banners">
        <div class="container">
            <p class="title_section">関連サービス</p>
            <div class="box">
                <div class="column">
                    <a href="https://gms.ca-m.co.jp/" target="_blank" title="GMS" class="banner_item">
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/module-t/images/banner-item-1.jpg"
                            alt="">
                    </a>
                </div>
                <div class="column">
                    <a href="https://tra-navi.asia/" target="_blank" title="Kaji" class="banner_item">
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/module-t/images/banner-item-3.jpg"
                            alt="">
                    </a>
                </div>
                <div class="column">
                    <a href="https://kaji-japan.jp/" target="_blank" title="Tra-Navi" class="banner_item">
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/module-t/images/banner-item-2.jpg"
                            alt="">
                    </a>
                </div>
            </div>
        </div>
    </section>
    <section id="company">
        <div class="container">
            <p class="title_section">関連会社</p>
            <a href="https://vietnam-camcom.com/" title="関連会社" class="company_logo" target="_blank">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/module-t/images/logo.png" alt="関連会社">
            </a>
        </div>
    </section>
</main>
<?php get_footer(); ?>