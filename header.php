<!DOCTYPE html>
<html lang="ja"
	  class="<?php echo is_page_template("pages/contact.php") || is_page_template("pages/visit.php") ? 'style-old' : 'style-all'; ?> <?php echo is_page_template("pages/about.php") || is_singular("news") || is_page_template("pages/contact-confirm.php") ? 'bg' : 'bg-none'; ?>">

	<head>
		<?php if(!isLighthouseRequest()): ?>
		<!-- Google Tag Manager -->
		<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
															  new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
				j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
					'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
									})(window,document,'script','dataLayer','GTM-PDN8QKP9');</script>
		<!-- End Google Tag Manager -->

		<!-- Google tag (gtag.js) -->
		<script async src="https://www.googletagmanager.com/gtag/js?id=G-73Z5RJ8C0R"></script>
		<script>
			window.dataLayer = window.dataLayer || [];
			function gtag(){dataLayer.push(arguments);}
			gtag('js', new Date());

			gtag('config', 'G-73Z5RJ8C0R');
		</script>
		<?php endif ?>

		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
		<meta name="robots" content="noindex">
		<meta http-equiv=x-dns-prefetch-control content=on>
		<link rel=dns-prefetch href="<?php echo site_url(); ?>">
		<link rel="preconnect" href="<?php echo site_url(); ?>">
		<meta name="site_url" content="<?php echo site_url(); ?>">
		<link rel="shortcut icon" href="<?php echo c_get_image('favicon', 'option'); ?>" type="image/x-icon">
		<link rel="icon" href="<?php echo c_get_image('favicon', 'option'); ?>" type="image/x-icon" />
		<meta http-equiv=x-dns-prefetch-control content=on>
		<link rel=dns-prefetch href="<?php echo site_url(); ?>">
		<meta name="site_url" content="<?php echo site_url(); ?>">
		<meta name="ajax_url" content="<?php echo admin_url('admin-ajax.php'); ?>">
		<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/module-t/css/swiper-bundle.min.css">
		<?php if(!isLighthouseRequest()): ?>
		<script src="<?php echo get_stylesheet_directory_uri(); ?>/module-t/js/swiper-bundle.min.js"></script>
		<?php endif; ?>
		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/module-t/css/reset.css">
		<link rel="stylesheet"
			  href="<?php echo get_stylesheet_directory_uri(); ?>/module-t/css/style.css?v=<?php echo time(); ?>">
		<?php
		$user_agent = strtolower(isset($_SERVER['HTTP_USER_AGENT']) ? $_SERVER['HTTP_USER_AGENT'] : '');
		if (strpos($user_agent, 'lighthouse') === false) {
			echo get_field("insert_script_header", "option");
		}
		?>
		<?php wp_head(); ?>
	</head>

	<body>
		<?php if(!isLighthouseRequest()): ?>
		<!-- Google Tag Manager (noscript) -->
		<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-PDN8QKP9" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
		<!-- End Google Tag Manager (noscript) -->
		<?php endif; ?>

		<?php
		if (strpos($user_agent, 'lighthouse') === false) {
			echo get_field("insert_script_before_body", "option");
		}
		?>
		<header>
			<div class="container">
				<div class="box">
					<a href="<?php echo site_url(); ?>" title="<?php echo bloginfo(); ?>" class="header_logo">
						<img src="<?php echo c_get_image("logo", "option"); ?>" alt="<?php echo bloginfo(); ?>">
						<span class="header_logo__text">送出機関紹介サイト</span>
					</a>
					<div class="header_nav">
						<?php
						if (has_nav_menu('primary-menu')) {
							wp_nav_menu(
								array(
									'theme_location' => 'primary-menu',
									'menu_class' => '',
									'container' => '',
								)
							);
						}
						?>
						<a href="<?php echo getTplPageURL("contact.php"); ?>" title="お問い合わせ" class="header_contact">
							<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="15.75" height="12"
								 viewBox="0 0 15.75 12">
								<defs>
									<clipPath id="clip-path">
										<rect id="Rectangle_27" data-name="Rectangle 27" width="15.75" height="12" fill="#fff" />
									</clipPath>
								</defs>
								<g id="Group_34" data-name="Group 34" clip-path="url(#clip-path)">
									<path id="Path_2" data-name="Path 2"
										  d="M14.355,0a1.485,1.485,0,0,1,.891,2.673L8.514,7.722a.993.993,0,0,1-1.188,0L.594,2.673A1.485,1.485,0,0,1,1.485,0ZM15.84,3.465V9.9a1.982,1.982,0,0,1-1.98,1.98H1.98A1.982,1.982,0,0,1,0,9.9V3.465L6.732,8.514a1.977,1.977,0,0,0,2.376,0Z"
										  fill="#fff" />
								</g>
							</svg>
							お問い合わせ
						</a>
					</div>
					<label for="menu" class="header_nav__overlay"></label>
					<a href="<?php echo getTplPageURL("contact.php"); ?>" title="お問い合わせ" class="header_contact">
						<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="15.75" height="12"
							 viewBox="0 0 15.75 12">
							<defs>
								<clipPath id="clip-path">
									<rect id="Rectangle_27" data-name="Rectangle 27" width="15.75" height="12" fill="#fff" />
								</clipPath>
							</defs>
							<g id="Group_34" data-name="Group 34" clip-path="url(#clip-path)">
								<path id="Path_2" data-name="Path 2"
									  d="M14.355,0a1.485,1.485,0,0,1,.891,2.673L8.514,7.722a.993.993,0,0,1-1.188,0L.594,2.673A1.485,1.485,0,0,1,1.485,0ZM15.84,3.465V9.9a1.982,1.982,0,0,1-1.98,1.98H1.98A1.982,1.982,0,0,1,0,9.9V3.465L6.732,8.514a1.977,1.977,0,0,0,2.376,0Z"
									  fill="#fff" />
							</g>
						</svg>
						お問い合わせ
					</a>
					<a href="<?php echo getTplPageURL("facility-archive.php"); ?>" title="送出機関を探す" class="search">
						<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20.004" viewBox="0 0 20 20.004">
							<path id="Path_333" data-name="Path 333"
								  d="M16.251,8.125a8.105,8.105,0,0,1-1.563,4.793l4.946,4.949a1.251,1.251,0,0,1-1.77,1.77l-4.946-4.949a8.127,8.127,0,1,1,3.332-6.563M8.125,13.751A5.625,5.625,0,1,0,2.5,8.125a5.625,5.625,0,0,0,5.625,5.625"
								  fill="#0c2447" />
						</svg>
					</a>
					<label for="menu" class="menu">
						<span class="menu_line__1"></span>
						<span class="menu_line__2"></span>
						<span class="menu_line__3"></span>
						<input type="checkbox" id="menu">
					</label>
				</div>
			</div>
		</header>