<?php /*Template Name: 送出機関視察*/?>
<?php get_header(); ?>

<main id="main_wrap">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@100;200;300;400;500;700;900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" media="all"
        href="<?php echo get_stylesheet_directory_uri(); ?>/module-g/css/sending-tour.css" />
    <!--<script type="text/javascript"-->
    <!--    src="<?php echo get_stylesheet_directory_uri(); ?>/module-g/sending-tour.js"></script>-->
    <script>
        (function (d) {
            var config = {
                kitId: 'fii2jzq',
                scriptTimeout: 3000,
                async: true
            },
                h = d.documentElement, t = setTimeout(function () {
                    h.className = h.className.replace(/\bwf-loading\b/g, "") + " wf-inactive";
                }, config.scriptTimeout), tk = d.createElement("script"), f = false,
                s = d.getElementsByTagName("script")[0], a;
            h.className += " wf-loading";
            tk.src = 'https://use.typekit.net/' + config.kitId + '.js';
            tk.async = true;
            tk.onload = tk.onreadystatechange = function () {
                a = this.readyState;
                if (f || a && a != "complete" && a != "loaded") return;
                f = true;
                clearTimeout(t);
                try {
                    Typekit.load(config)
                } catch (e) {
                }
            };
            s.parentNode.insertBefore(tk, s)
        })(document);
    </script>
    <div id="sending-tour" class="sending-tour">
        <div class="banner">
            <div class="title-bg-dark">
                <p>ベトナム送出機関紹介サイト連携</p>
            </div>
            <div class="banner-desc">
<!--                 <div class="text-small">
                    ベトナムへの渡航解禁の今がチャンス！
                </div> -->
                <div class="text-medium">
                    <div class="icon">
                        <img class="sizes" src="<?php echo get_stylesheet_directory_uri(); ?>/module-g/images/sending-tour/sending_nv_icon_flag_vn.png" alt="">
                    </div>
                    <p>ベトナム送出機関</p>
                </div>
                <div class="text-big">
                    <p>視察ツアー</p>
                </div>
            </div>
        </div>
        <div class="bg-grid">
            <div class="image-desc-banner">
                <picture>
                    <source media="(max-width: 767px)" srcset="<?php echo get_stylesheet_directory_uri(); ?>/module-g/images/sending-tour/sending_navi_sp_01.png 2x">
                    <source media="(min-width: 768px)" srcset="<?php echo get_stylesheet_directory_uri(); ?>/module-g/images/sending-tour/sending_navi_pc_01.png 2x">
                    <img class="sizes" src="<?php echo get_stylesheet_directory_uri(); ?>/module-g/images/sending-tour/sending_navi_pc_01.png" alt="">
                </picture>
            </div>
            <div class="supervising-organization">
                <div class="inner">
                    <div class="bl-top">
                        <div class="title">
                            <p>監理団体様の</p>
                        </div>
                        <div class="title-primary">
                            <p>こんな悩み解決します！</p>
                        </div>
                        <div class="box-icon">
                            <div class="icon-boy">
                                <picture>
                                    <source media="(max-width: 767px)"
                                        srcset="<?php echo get_stylesheet_directory_uri(); ?>/module-g/images/sending-tour/sending_navi_icon_boy.png 2x">
                                    <source media="(min-width: 768px)"
                                        srcset="<?php echo get_stylesheet_directory_uri(); ?>/module-g/images/sending-tour/sending_navi_icon_boy.png 2x">
                                    <img class="sizes" src="<?php echo get_stylesheet_directory_uri(); ?>/module-g/images/sending-tour/sending_navi_icon_boy.png" alt="">
                                </picture>
                            </div>
                            <div class="icon-girl">
                                <picture>
                                    <source media="(max-width: 767px)"
                                        srcset="<?php echo get_stylesheet_directory_uri(); ?>/module-g/images/sending-tour/sending_navi_icon_girl.png 2x">
                                    <source media="(min-width: 768px)"
                                        srcset="<?php echo get_stylesheet_directory_uri(); ?>/module-g/images/sending-tour/sending_navi_icon_girl.png 2x">
                                    <img class="sizes" src="<?php echo get_stylesheet_directory_uri(); ?>/module-g/images/sending-tour/sending_navi_icon_girl.png" alt="">
                                </picture>
                            </div>
                        </div>
                    </div>
                    <div class="list-item">
                        <div class="item">
                            <div class="icon">
                                <picture>
                                    <source media="(max-width: 767px)"
                                        srcset="<?php echo get_stylesheet_directory_uri(); ?>/module-g/images/sending-tour/sending_navi_icon_green.png 2x">
                                    <source media="(min-width: 768px)"
                                        srcset="<?php echo get_stylesheet_directory_uri(); ?>/module-g/images/sending-tour/sending_navi_icon_green.png 2x">
                                    <img class="sizes" src="<?php echo get_stylesheet_directory_uri(); ?>/module-g/images/sending-tour/sending_navi_icon_green.png" alt="">
                                </picture>
                            </div>
                            <div class="content">
                                <p>
                                    受入機関からのオーダーが増え、法令の変わったため、<span class="text-green">提携送出機関を増やしたい。</span>
                                </p>
                            </div>
                        </div>
                        <div class="item">
                            <div class="icon">
                                <picture>
                                    <source media="(max-width: 767px)"
                                        srcset="<?php echo get_stylesheet_directory_uri(); ?>/module-g/images/sending-tour/sending_navi_icon_red.png 2x">
                                    <source media="(min-width: 768px)"
                                        srcset="<?php echo get_stylesheet_directory_uri(); ?>/module-g/images/sending-tour/sending_navi_icon_red.png 2x">
                                    <img class="sizes" src="<?php echo get_stylesheet_directory_uri(); ?>/module-g/images/sending-tour/sending_navi_icon_red.png" alt="">
                                </picture>
                            </div>
                            <div class="content">
                                <p>
                                    これから本格的に技能実習の活動をする。<span class="text-green">どんな送出機関と提携</span>したらよいか分からない。
                                </p>
                            </div>
                        </div>
                        <div class="item">
                            <div class="icon">
                                <picture>
                                    <source media="(max-width: 767px)"
                                        srcset="<?php echo get_stylesheet_directory_uri(); ?>/module-g/images/sending-tour/sending_navi_icon_green.png 2x">
                                    <source media="(min-width: 768px)"
                                        srcset="<?php echo get_stylesheet_directory_uri(); ?>/module-g/images/sending-tour/sending_navi_icon_green.png 2x">
                                    <img class="sizes" src="<?php echo get_stylesheet_directory_uri(); ?>/module-g/images/sending-tour/sending_navi_icon_green.png" alt="">
                                </picture>
                            </div>
                            <div class="content">
                                <p>
                                    実習生が負担する手数料問題を重要視しているため、<span class="text-green">安心できる送出機関</span>を知りたい。
                                </p>
                            </div>
                        </div>
                        <div class="item">
                            <div class="icon">
                                <picture>
                                    <source media="(max-width: 767px)"
                                        srcset="<?php echo get_stylesheet_directory_uri(); ?>/module-g/images/sending-tour/sending_navi_icon_red.png 2x">
                                    <source media="(min-width: 768px)"
                                        srcset="<?php echo get_stylesheet_directory_uri(); ?>/module-g/images/sending-tour/sending_navi_icon_red.png 2x">
                                    <img class="sizes" src="<?php echo get_stylesheet_directory_uri(); ?>/module-g/images/sending-tour/sending_navi_icon_red.png" alt="">
                                </picture>
                            </div>
                            <div class="content">
                                <p>
                                    オンラインの打ち合わせだけでは、送出機関の<span class="text-green">実際の取り組み</span>が正しく把握できない。
                                </p>
                            </div>
                        </div>
                        <div class="item">
                            <div class="icon">
                                <picture>
                                    <source media="(max-width: 767px)"
                                        srcset="<?php echo get_stylesheet_directory_uri(); ?>/module-g/images/sending-tour/sending_navi_icon_green.png 2x">
                                    <source media="(min-width: 768px)"
                                        srcset="<?php echo get_stylesheet_directory_uri(); ?>/module-g/images/sending-tour/sending_navi_icon_green.png 2x">
                                    <img class="sizes" src="<?php echo get_stylesheet_directory_uri(); ?>/module-g/images/sending-tour/sending_navi_icon_green.png" alt="">
                                </picture>
                            </div>
                            <div class="content">
                                <p>
                                    効率的に複数の送出機関を視察できるなら、<span class="text-green">訪越して視察</span>したい。
                                </p>
                            </div>
                        </div>
                        <div class="item">
                            <div class="icon">
                                <picture>
                                    <source media="(max-width: 767px)"
                                        srcset="<?php echo get_stylesheet_directory_uri(); ?>/module-g/images/sending-tour/sending_navi_icon_red.png 2x">
                                    <source media="(min-width: 768px)"
                                        srcset="<?php echo get_stylesheet_directory_uri(); ?>/module-g/images/sending-tour/sending_navi_icon_red.png 2x">
                                    <img class="sizes" src="<?php echo get_stylesheet_directory_uri(); ?>/module-g/images/sending-tour/sending_navi_icon_green.png" alt="">
                                </picture>
                            </div>
                            <div class="content">
                                <p>
                                    送出機関側からの情報だけでは、その真意が分からないため、<span class="text-green">第三者目線でアドバイス</span>して欲しい。
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
				<a class="company_contact__link scroll" href="#contact-page" title="お問い合わせ相談">お問い合わせ相談</a>
        </div>
		
	
		
        <div class="merit">
            <div class="inner">
                <div class="label-bl">
                    <p>MERIT</p>
                </div>
                <div class="title-bl">
                    <p>ツアーに参加するメリット</p>
                </div>
                <div class="list-item">
                    <div class="item">
                        <div class="text-label">
                            <p>MERIT <span class="number">01</span></p>
                        </div>
                        <div class="content-mr">
                            <div class="text-desc">
                                <p>相談や見積は無料。</p>
                            </div>
                            <div class="image-desc">
                                <picture>
                                    <source media="(max-width: 767px)"
                                        srcset="<?php echo get_stylesheet_directory_uri(); ?>/module-g/images/sending-tour/sending_navi_merit_01.png 2x">
                                    <source media="(min-width: 768px)"
                                        srcset="<?php echo get_stylesheet_directory_uri(); ?>/module-g/images/sending-tour/sending_navi_merit_01.png 2x">
                                    <img class="sizes" src="<?php echo get_stylesheet_directory_uri(); ?>/module-g/images/sending-tour/sending_navi_merit_01.png" alt="">
                                </picture>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="text-label">
                            <p>MERIT <span class="number">02</span></p>
                        </div>
                        <div class="content-mr">
                            <div class="text-desc">
                                <p>弊社現地取材員が対応するため、最新で正確な情報が把握可能。
                                </p>
                            </div>
                            <div class="image-desc">
                                <picture>
                                    <source media="(max-width: 767px)"
                                        srcset="<?php echo get_stylesheet_directory_uri(); ?>/module-g/images/sending-tour/sending_navi_merit_03.png 2x">
                                    <source media="(min-width: 768px)"
                                        srcset="<?php echo get_stylesheet_directory_uri(); ?>/module-g/images/sending-tour/sending_navi_merit_03.png 2x">
                                    <img class="sizes" src="<?php echo get_stylesheet_directory_uri(); ?>/module-g/images/sending-tour/sending_navi_merit_03.png" alt="">
                                </picture>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="text-label">
                            <p>MERIT <span class="number">03</span></p>
                        </div>
                        <div class="content-mr">
                            <div class="text-desc">
                                <p>送出機関は社長・会長に直接接触し、アポイント取るため、TOPの意向がその場で把握できる。</p>
                            </div>
                            <div class="image-desc">
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="text-label">
                            <p>MERIT <span class="number">04</span></p>
                        </div>
                        <div class="content-mr">
                            <div class="text-desc">
                                <p>視察（打ち合わせ）時に、通訳が必要な場合でも追加料金なしで対応。</p>
                            </div>
                            <div class="image-desc">
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="text-label">
                            <p>MERIT <span class="number">05</span></p>
                        </div>
                        <div class="content-mr">
                            <div class="text-desc">
                                <p>既に視察したい送出機関が決まっていない場合も、重要視されるポイントを踏まえた上で、第三者目線で視察先の提案。</p>
                            </div>
                            <div class="image-desc">
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="text-label">
                            <p>MERIT <span class="number">06</span></p>
                        </div>
                        <div class="content-mr">
                            <div class="text-desc">
                                <p>日本円での支払いが可能。</p>
                            </div>
                            <div class="image-desc">
                                <picture>
                                    <source media="(max-width: 767px)"
                                        srcset="<?php echo get_stylesheet_directory_uri(); ?>/module-g/images/sending-tour/sending_navi_merit_02.png 2x">
                                    <source media="(min-width: 768px)"
                                        srcset="<?php echo get_stylesheet_directory_uri(); ?>/module-g/images/sending-tour/sending_navi_merit_02.png 2x">
                                    <img class="sizes" src="<?php echo get_stylesheet_directory_uri(); ?>/module-g/images/sending-tour/sending_navi_merit_02.png" alt="">
                                </picture>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
			<a class="company_contact__link scroll" href="#contact-page" title="お問い合わせ相談">お問い合わせ相談</a>
        </div>
        <div class="example">
            <div class="inner">
                <div class="label-bl">
                    <p>EXAMPLE</p>
                </div>
                <div class="title-bl">
                    <p>モデルコース例</p>
                </div>
                <div class="example-content">
                    <div class="flex-pc">
                        <div class="table-info">
                            <div class="table">
                                <div class="line">
                                    <div class="info-l">
                                        <p>視察エリア</p>
                                    </div>
                                    <div class="info-right">
                                        <p>ハノイ近郊</p>
                                    </div>
                                </div>
                                <div class="line">
                                    <div class="info-l">
                                        <p>コース</p>
                                    </div>
                                    <div class="info-right">
                                        <p>一日</p>
                                    </div>
                                </div>
                                <div class="line">
                                    <div class="info-l">
                                        <p>業種</p>
                                    </div>
                                    <div class="info-right">
                                        <p>介護業</p>
                                    </div>
                                </div>
                                <div class="line">
                                    <div class="info-l">
                                        <p>視察目的</p>
                                    </div>
                                    <div class="info-right">
                                        <p>新しい送出機関と取引するために、研修施設や日本語学校など直接で自分の目で見て選定基準を作る</p>
                                    </div>
                                </div>
                                <div class="line">
                                    <div class="info-l">
                                        <p>希望訪問先</p>
                                    </div>
                                    <div class="info-right">
                                        <p>介護業に強い送出機関、研修施設、日本語学校、寮</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="bl-timeline">
                            <div class="table">
                                <div class="line">
                                    <div class="icon">
                                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/module-g/images/sending-tour/sending_navi_icon_radio.png" alt="">
                                    </div>
                                    <div class="hour">
                                        <p>9:00</p>
                                    </div>
                                    <div class="text-desc">
                                        <p>ホテルにお迎え</p>
                                    </div>
                                </div>
                                <div class="line">
                                    <div class="message">
                                        <p>送出機関2,3社を回ります</p>
                                    </div>
                                </div>
                                <div class="line">
                                    <div class="icon">
                                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/module-g/images/sending-tour/sending_navi_icon_radio.png" alt="">
                                    </div>
                                    <div class="hour">
                                        <p>12:00</p>
                                    </div>
                                    <div class="text-desc">
                                        <p>昼食</p>
                                    </div>
                                </div>
                                <div class="line">
                                    <div class="icon">
                                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/module-g/images/sending-tour/sending_navi_icon_radio.png" alt="">
                                    </div>
                                    <div class="hour">
                                        <p>13:00</p>
                                    </div>
                                    <div class="text-desc">
                                        <p>移動開始</p>
                                    </div>
                                </div>
                                <div class="line">
                                    <div class="message">
                                        <p>送出機関2,3社を回ります</p>
                                    </div>
                                </div>
                                <div class="line">
                                    <div class="icon">
                                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/module-g/images/sending-tour/sending_navi_icon_radio.png" alt="">
                                    </div>
                                    <div class="hour">
                                        <p>17:00</p>
                                    </div>
                                    <div class="text-desc">
                                        <p>ホテルまでお見送り</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="list-image">
                        <div class="image-item">
                            <picture>
                                <source media="(max-width: 767px)"
                                    srcset="<?php echo get_stylesheet_directory_uri(); ?>/module-g/images/sending-tour/sending_navi_image_list_01.png 2x">
                                <source media="(min-width: 768px)"
                                    srcset="<?php echo get_stylesheet_directory_uri(); ?>/module-g/images/sending-tour/sending_navi_image_list_01.png 2x">
                                <img class="sizes" src="<?php echo get_stylesheet_directory_uri(); ?>/module-g/images/sending-tour/sending_navi_image_list_01.png" alt="">
                            </picture>
                            <div class="text-desc">
                                <p>研修施設で学ぶ実習生の授業も見学可能です</p>
                            </div>
                        </div>
                        <div class="image-item">
                            <picture>
                                <source media="(max-width: 767px)"
                                    srcset="<?php echo get_stylesheet_directory_uri(); ?>/module-g/images/sending-tour/sending_navi_image_list_02.png 2x">
                                <source media="(min-width: 768px)"
                                    srcset="<?php echo get_stylesheet_directory_uri(); ?>/module-g/images/sending-tour/sending_navi_image_list_02.png 2x">
                                <img class="sizes" src="<?php echo get_stylesheet_directory_uri(); ?>/module-g/images/sending-tour/sending_navi_image_list_02.png" alt="">
                            </picture>
                            <div class="text-desc">
                                <p>お昼はがおすすめのベトナム料理をピックアップ <br>
                                    ※極力ご希望に沿ってお連れいたします</p>
                            </div>
                        </div>
                        <div class="image-item">
                            <picture>
                                <source media="(max-width: 767px)"
                                    srcset="<?php echo get_stylesheet_directory_uri(); ?>/module-g/images/sending-tour/sending_navi_image_list_03.png 2x">
                                <source media="(min-width: 768px)"
                                    srcset="<?php echo get_stylesheet_directory_uri(); ?>/module-g/images/sending-tour/sending_navi_image_list_03.png 2x">
                                <img class="sizes" src="<?php echo get_stylesheet_directory_uri(); ?>/module-g/images/sending-tour/sending_navi_image_list_03.png" alt="">
                            </picture>
                            <div class="text-desc">
                                <p>送出機関の中で働く方々の雰囲気も見ることができます</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
			<a class="company_contact__link scroll" href="#contact-page" title="お問い合わせ相談">お問い合わせ相談</a>
        </div>
        <div class="flow">
            <div class="inner">
                <div class="label-bl">
                    <p>FLOW</p>
                </div>
                <div class="title-bl">
                    <p>サービスの流れ</p>
                </div>
                <div class="flow-content">
                    <div class="flow-list">
                        <div class="flow-item step-1">
                            <div class="label">
                                <div class="text">STEP 1</div>
                                <div class="icon">
                                    <img class="sizes" src="<?php echo get_stylesheet_directory_uri(); ?>/module-g/images/sending-tour/sending_navi_icon_mail.png" alt="">
                                </div>
                            </div>
                            <div class="text-desc">
                                <div class="box-step">
                                    <div class="title-primary">
                                        <p>お問い合わせ</p>
                                    </div>
                                    <div class="content">
                                        <p>お問い合わせ・ご相談フォームからお気軽にお問い合わせください。</p>
                                        <p>こんな情報が欲しい、こんなことも可能かなど、小さなことでもお気軽にご相談ください!</p>
                                    </div>
                                    <a class="btn-contact" href ="/contact/">
                                        <img class="sizes" src="<?php echo get_stylesheet_directory_uri(); ?>/module-g/images/sending-tour/sending_navi_icon_mail_red.png"
                                            alt="">
                                        <p>お問い合わせ相談</p>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="text-desc-green">
                            <p>ここまで完全無料！！</p>
                        </div>
                        <div class="flow-item step-2">
                            <div class="label">
                                <div class="text">STEP 2</div>
                                <div class="icon">
                                    <img class="sizes" src="<?php echo get_stylesheet_directory_uri(); ?>/module-g/images/sending-tour/sending_navi_icon_mess.png" alt="">
                                </div>
                            </div>
                            <div class="text-desc">
                                <div class="title-primary">
                                    <p>ご要望のヒアリング</p>
                                </div>
                                <div class="content">
                                    <p>ご要望を詳しくお伺いし、工程表とお見積りを作成します。</p>
                                </div>
                            </div>
                        </div>
                        <div class="flow-item step-3">
                            <div class="label">
                                <div class="text">STEP 3</div>
                                <div class="icon">
                                    <img class="sizes" src="<?php echo get_stylesheet_directory_uri(); ?>/module-g/images/sending-tour/sending_navi_icon_folder.png" alt="">
                                </div>
                            </div>
                            <div class="text-desc">
                                <div class="title-primary">
                                    <p>お支払い</p>
                                </div>
                                <div class="content">
                                    <p>ご納得頂けましたら、契約書の取り交わしと代金の振込をお願い致します。<br>
                                        ※銀行送金のみとなります。</p>
                                </div>
                            </div>
                        </div>
                        <div class="flow-item step-4">
                            <div class="label">
                                <div class="text">STEP 4</div>
                                <div class="icon">
                                    <img class="sizes" src="<?php echo get_stylesheet_directory_uri(); ?>/module-g/images/sending-tour/sending_navi_icon_flag.png" alt="">
                                </div>
                            </div>
                            <div class="text-desc">
                                <div class="title-primary">
                                    <p>現地にてツアー催行</p>
                                </div>
                                <div class="content">
                                    <p>当日、ご宿泊先のホテルや空港などご指定の場所にお迎えに行きます。</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
		
<!--         <div class="price">
            <div class="inner">
                <div class="label-bl">
                    <p>PRICE</p>
                </div>
                <div class="title-bl">
                    <p>料金</p>
                </div>
                <div class="price-content">
                    <div class="title-box">
                        <div class="title-bold">
                            <p>コーディネーター同行のみ</p>
                        </div>
                        <div class="title-normal">
                            <p>車両はお客様にて手配いただきます</p>
                        </div>
                    </div>
                    <div class="card-price">
                        <div class="card">
                            <div class="title">
                                <p>一日コース</p>
                                <p>（8 時間以内）</p>
                            </div>
                            <div class="content">
                                <p>30,000 円</p>
                            </div>
                        </div>
                        <div class="card">
                            <div class="title">
                                <p>半日コース</p>
                                <p>（8 時間以内）</p>
                            </div>
                            <div class="content">
                                <p>18,000 円</p>
                            </div>
                        </div>
                    </div>
                    <div class="box-info">
                        <div class="title">
                            <p>お支払い方法</p>
                        </div>
                        <div class="content">
                            <p>
                                ベトナムの銀行口座に日本円にて送金のみとなります。<br>
                                現地での現金受け渡しによるお支払いはできません。<br>
                                銀行送金手数料はお客様負担となります。
                            </p>
                        </div>
                    </div>
                    <div class="btn-contact">
                        <img class="sizes" src="<?php echo get_stylesheet_directory_uri(); ?>/module-g/images/sending-tour/sending_navi_icon_mail_red.png" alt="">
                        <p>お問い合わせ相談</p>
                    </div>
                </div>
            </div>
        </div> -->
		
        <div class="note">
            <div class="bg-blur">
                <div class="inner">
                    <div class="title">
                        <p>ご注意事項・キャンセル</p>
                    </div>
                    <div class="note-content">
                        <div class="note-content-bg">
                            <div class="title-primary">ご注意事項</div>
                            <ul>
                                <li>・車両はお客様にて手配いただきます</li>
                                <li>・実施地域はハノイおよびその周辺地域に限ります。</li>
                                <li>・現地指定場所集合、現地場所解散が基本プランとなっております。</li>
                                <li>・ベトナムのサービスのため、別途付加価値税(VAT)が発生します。</li>
                                <li>・駐車場、有料道路、空港入場料など実費で発生するものなどはお客様負担となります。</li>
                                <li>・昼食はお客様負担となります。</li>
                                <li>・弊社の紹介によって契約締結した送出機関との損害が発生した場合について、弊社は一切の責任を負いかねますのであらかじめご了承ください。</li>
                                <li>・工程中の事故やケガについての弊社からの補償はございませんので、各自の傷害保険等でご対応ください。</li>
                                <li>・所持品の管理: 紛失・破損・盗難については責任を負いかねます。ツアー参加中はお荷物、お手回り品にはお客様ご自身で管理し、十分ご注意ください。</li>
                            </ul>

                            <div class="title-primary">当社の免責事項</div>
                            <p>当社のサービスを受けられた際、以下の事由によりお客様が被られた損害などに関して当社はその責任を負いません。</p>
                            <ul>
                                <li>・天災、戦乱、暴動などに起因する場合</li>
                                <li>・現地公安など政府関連機関の公務、命令に起因する場合</li>
                                <li>・運輸機関、宿泊施設および第3機関のサービス内容の変更に起因する場合</li>
                                <li>・お客様、または第3者の故意、または過失に起因する場合</li>
                            </ul>
                            <p>当日の天候、交通などの事由により当社表示のサービス内容から時間、内容が予告なく変更される場合があります。</p>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="page-sending-form" id="contact-page">
            <?php echo do_shortcode('[contact-form-7 id="3537" title="Form Visit /inspection/"]'); ?>
        </div>
    </div>
    <script>
		window.onload = function(){
			document.getElementById("submit_b").disabled = true;
		}
        jQuery(document).ready(function($) {
			$('#wpcf7-f3289-o1').on('blur keyup change', 'input', function(event) {
			  $('#company-name-input, #person-input, #email-input, #phone-number-input').each(function() {
			  if ($(this).val() == '') {
				
			  }
			});
			});
			$('#company-name-input').on('input', function() {
				var input=$(this);
				var is_name=input.val();
				if(is_name){input.removeClass("invalid").addClass("valid");}
				else{input.removeClass("valid").addClass("invalid");}
			});
			

			 $("input:checkbox[name='checkbox-plolicy']").click(function () {
				if ($(this).prop('checked')) {  
				    $(':input[type="submit"]').prop('disabled', false);
				}
				else {      
				    $(':input[type="submit"]').prop('disabled', true);
				}
			  });
             $('#confirm').click(function(){
                $('.wrap-datetime').addClass('active');
				
                
            });
            $('#unsettled-b').click(function(){
                $('.wrap-datetime').removeClass('active');
                $(".wrap-datetime .wpcf7-form-control").val("");
				 document.getElementById("submit_b").disabled = true;
				
            });
			    //scroll
				$(function () {
					$('.scroll').click(function (event) {
						event.preventDefault();
						var url = $(this).attr('href');
						var dest = url.split('#');
						var target = dest[1];
						var target_offset = $('#' + target).offset();
						var target_top = target_offset.top - 100;
						$('html, body').animate({scrollTop: target_top}, 500, 'swing');
						return false;
					});
				});	
        });
        
    </script>
</main>
<?php get_footer(); ?>