<?php get_header();?>
<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/module-t/css/ceo.css">
<?php
$terms = get_the_terms($post->ID, 'location');
usort($terms, function($a, $b) {
	if ($a->parent == 0 && $b->parent != 0) {
		return -1;
	} elseif ($a->parent != 0 && $b->parent == 0) {
		return 1;
	} else {
		return 0;
	}
});
?>
<main>
	<?php get_template_part("paths/breacrumb",null,['static'=>true,'type'=>'single']); ?>
	<section id="company-single" class="company">
		<div class="container">
			<div class="company_heading">
				<h1 class="company_title">
					<svg xmlns="http://www.w3.org/2000/svg" width="13.802" height="29.76" viewBox="0 0 13.802 29.76">
						<g id="Group_243" data-name="Group 243" transform="translate(0)">
							<path id="Path_212" data-name="Path 212" d="M0,0,8.626,14.091H13.8L5.176,0Z" transform="translate(0)" fill="#f54d4d" />
							<path id="Path_213" data-name="Path 213" d="M8.626,51.5,0,65.591H5.175L13.8,51.5Z" transform="translate(0 -35.83)" fill="#3dce97" />
						</g>
					</svg>
					<?php the_title(); ?>
				</h1>
				<?php if($terms && !is_wp_error($terms)): ?>
				<div class="company_tags company_tags__sp">
					<?php foreach($terms as $k =>$term): ?>
					<a href="<?php echo get_term_link($term); ?>" title="<?php echo $term->name; ?>"><?php echo $term->name; ?></a>
					<?php endforeach; ?>
				</div>
				<?php endif; ?>
				<div class="publish_time">
					公開日: <?php echo get_the_time('Y/m/d'); ?> / 最終更新日: <?php echo get_the_modified_date('Y/m/d'); ?>
				</div>
			</div>

			<?php if($terms && !is_wp_error($terms)): ?>
			<div class="company_tags">
				<?php foreach($terms as $k =>$term): ?>
				<a href="<?php echo get_term_link($term); ?>" title="<?php echo $term->name; ?>"><?php echo $term->name; ?></a>
				<?php endforeach; ?>
			</div>
			<?php endif; ?>
			<?php $images = get_field('gallery'); ?>
			<?php if ($images): ?>
			<div class="company_lib">
				<div class="box">
					<div class="column">
						<div class="swiper swiper-lib">
							<div class="swiper-wrapper">
								<?php foreach ($images as $image): ?>
								<div class="swiper-slide">
									<div class="lib_image">
										<img src="<?php echo esc_url(validateImageUrl($image)); ?>" alt="" />
									</div>
								</div>
								<?php endforeach; ?>
							</div>
						</div>
						<div class="controls">
							<div class="control prev">
								<svg id="btn" xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 40 40">
									<circle id="Ellipse_2" data-name="Ellipse 2" cx="20" cy="20" r="20" fill="#3dce97" />
									<path id="Path_231" data-name="Path 231" d="M10,0,5,4.643,0,0V3.021L5,7.664l5-4.643Z" transform="translate(23.837 15.134) rotate(91)" fill="#fff" />
								</svg>
							</div>
							<div class="control next">
								<svg id="btn" xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 40 40">
									<circle id="Ellipse_1" data-name="Ellipse 1" cx="20" cy="20" r="20" fill="#3dce97" />
									<path id="Path_221" data-name="Path 221" d="M10,0,5,4.643,0,0V3.021L5,7.664l5-4.643Z" transform="translate(17 25) rotate(-90)" fill="#fff" />
								</svg>
							</div>
						</div>
					</div>
					<div class="column">
						<div class="swiper swiper-thumb">
							<div class="swiper-wrapper">
								<?php foreach ($images as $image): ?>
								<div class="swiper-slide">
									<div class="lib_image">
										<img src="<?php echo esc_url(validateImageUrl($image)); ?>" alt="" />
									</div>
								</div>
								<?php endforeach; ?>
							</div>
						</div>
					</div>
				</div>
			</div>
			<?php endif; ?>
			<?php $impression_interviewer = get_field('impression_interviewer'); ?>
			<?php if ($impression_interviewer): ?>
			<div class="company_info">
				<div class="box">
					<div class="column">
						<div class="company_icon">
							<img src="<?php echo get_stylesheet_directory_uri() ?>/module-t/images/company-icon-info.png" alt="">
							<span class="company_text">取材担当者の印象</span>
							<div class="line"></div>
						</div>
					</div>
					<div class="column">
						<div class="company_intro">
							<?php echo nl2br($impression_interviewer); ?>
						</div>
					</div>
				</div>
			</div>
			<?php endif; ?>

			<div class="company_tabs">
				<?php
				$introduction_videos = get_field('list_video_youtube');
				$video_options = get_field('check_video');
				?>
				<div class="company_navs">
					<span class="company_nav active" onclick="togglePanel(0,this)">基本情報</span>
					<span class="company_nav" onclick="togglePanel(1,this)">研修施設情報</span>
					<?php if (!empty($introduction_videos) && $video_options[0] == "Video Youtube"): ?>
					<span class="company_nav" onclick="togglePanel(2,this)">学校施設紹介動画</span>
					<?php endif; ?>
				</div>
				<div class="company_panels">
					<div class="company_panel active" id="panel0">
						<div class="company_panel__wrapper">
							<?php $company = get_field('company');  ?>
							<?php if($company != ""): ?>
							<div class="line line-1">
								<div class="cell label">団体名</div>
								<div class="cell value"><?php echo $company; ?></div>
							</div>
							<?php endif; ?>
							<?php if($terms && !is_wp_error($terms)): ?>
							<div class="line line-2">
								<div class="cell label">エリア</div>
								<div class="cell value">
									<?php foreach($terms as $k =>$term): ?>
									<span title="<?php echo $term->name; ?>"><?php echo $term->name; ?></span>
									<?php echo $k+1 == count($terms) ? "":","; ?>
									<?php endforeach; ?>
								</div>
							</div>
							<?php endif; ?>


							<?php $address = get_field('address'); ?>
							<?php if($address != ""): ?>
							<div class="line line-3">
								<div class="cell label">所在地</div>
								<div class="cell value"><?php echo $address; ?></div>
							</div>
							<?php endif; ?>


							<?php if (have_rows('branch')): ?>
							<div class="line line-4">
								<div class="cell label">支社</div>
								<div class="cell value">
									<?php 
									while (have_rows('branch')): the_row(); 
									echo get_sub_field('branch_address') . '<br />'; 
									endwhile;
									?>
								</div>
							</div>
							<?php endif; ?>


							<?php $jp_language_center = get_field('jp_language_center');?>
							<?php if($jp_language_center != ""): ?>
							<div class="line line-5">
								<div class="cell label">日本語センター</div>
								<div class="cell value">
									<?php echo $jp_language_center; ?>
								</div>
							</div>
							<?php endif; ?>


							<?php $website_url = get_field('website_url');?>
							<?php if($website_url != ""): ?>
							<div class="line line-6">
								<div class="cell label">ホームページ</div>
								<div class="cell value">
									<a href="<?php echo esc_url($website_url); ?>" target="_blank"><?php echo esc_url($website_url); ?></a>
								</div>
							</div>
							<?php endif; ?>


							<?php if (have_rows('representatives')): ?>
							<div class="line line-8">
								<div class="cell label">代表役員</div>
								<div class="cell value">
									<?php 
									while (have_rows('representatives')): the_row(); 
									echo get_sub_field('representative_name') . '<br />'; 
									endwhile; 
									?>
								</div>
							</div>
							<?php endif; ?>


							<?php $year_of_establishment = get_field('year_of_establishment'); ?>
							<?php if($year_of_establishment != ""): ?>
							<div class="line line-9">
								<div class="cell label">設立年度</div>
								<div class="cell value">
									<?php echo $year_of_establishment; ?>
								</div>
							</div>
							<?php endif; ?>


							<?php $business_content = get_field('business_content'); ?>
							<?php if($business_content != ""): ?>
							<div class="line line-10">
								<div class="cell label">事業内容<br>（日本への送り出し事<br>業以外）</div>
								<div class="cell value"><?php echo get_field('business_content'); ?></div>
							</div>
							<?php endif; ?>


							<?php $specific_skill = get_field('specific_skill'); ?>
							<?php $specific_skill_description = get_field('specific_skill_description'); ?>
							<?php if($specific_skill): ?>
							<div class="line line-11">
								<div class="cell label">特定技能対応有無</div>
								<div class="cell value">
									<?php
									if ($specific_skill) {
										echo '有';
										if ($specific_skill_description) {
											echo '<br />' . $specific_skill_description; 
										}
									}
									?>
								</div>
							</div>
							<?php else: ?>
							<div class="line line-11">
								<div class="cell label">特定技能対応有無</div>
								<div class="cell value">無</div>
							</div>
							<?php endif; ?>


							<?php 
							$engineer_introduce_choice = get_field('engineer_introduce_choice'); 
							$engineer_introduce = get_field('engineer_introduce'); 
							?>
							<?php if ($engineer_introduce_choice != '不明'): ?>
							<div class="line line-12">
								<div class="cell label">技術者紹介対応有無</div>
								<div class="cell value">
									<?php if ($engineer_introduce_choice == '有') echo '有'; ?>
									<div>
										<?php
										if ($engineer_introduce_choice == '有')
											echo nl2br($engineer_introduce);
										else
											echo $engineer_introduce_choice; ?>
									</div>
								</div>
							</div>
							<?php else: ?>
							<?php if ($engineer_introduce_choice == '不明'): ?>
							<div class="line line-13">
								<div class="cell label">技術者紹介対応有無</div>
								<div class="cell value">
									<p><?php echo '不明'; ?></p>
								</div>
							</div>
							<?php endif; ?>
							<?php endif; ?>


							<?php $feature = get_field('feature'); if ($feature): ?>
							<div class="line line-14">
								<div class="cell label">特色</div>
								<div class="cell value">
									<?php echo nl2br($feature); ?>
								</div>
							</div>
							<?php endif; ?>


							<?php $educational_policy = get_field('educational_policy'); if ($educational_policy): ?>
							<div class="line line-15">
								<div class="cell label">教育方針</div>
								<div class="cell value"><?php echo nl2br($educational_policy); ?></div>
							</div>
							<?php endif; ?>


							<?php $performance_remarks = get_field('performance_remarks'); ?>
							<?php /* if ($performance_remarks != ""): */ ?>
							<div class="line line-16">
								<div class="cell label">送出実績</div>
								<div class="cell value performance_remarks">
									<?php if (have_rows('performance')): ?>
									<p>
										<?php if (have_rows('performance')): while (have_rows('performance')): the_row(); ?>
										<span><?php echo get_sub_field('year') . '年 ' . get_sub_field('people') . '人'?></span><br>
										<?php endwhile; endif; ?>       
									</p>
									<?php endif; ?>
									<?php if ($performance_remarks) echo nl2br($performance_remarks); ?>
								</div>
							</div>
							<?php /* endif; */ ?>


							<?php 
							$number_of_recruitment = get_field('number_of_recruitment'); 
							$recruitment_method = get_field('recruitment_method'); 
							$recruitment_area = get_field('recruitment_area'); 
							if($number_of_recruitment || $recruitment_method || $recruitment_area):
							?>
							<div class="line line-17">
								<div class="cell label">募集部</div>
								<div class="cell value">
									<?php  if($number_of_recruitment): ?>
									<p>募集部人数: <br /><?php echo $number_of_recruitment.'名' ; ?></p>
									<?php endif; ?>

									<?php  if($recruitment_method): ?>
									<p>募集方法: <br /><?php echo $recruitment_method; ?></p>
									<?php endif; ?>

									<?php  if($recruitment_area): ?>
									<p>募集を行う地域: <br /><?php echo $recruitment_area; ?></p>
									<?php endif; ?>
								</div>
							</div>
							<?php endif; ?>


							<!-- 							<?php $occupations = wp_get_post_terms($post->ID, 'occupation'); ?>
<?php if(!empty($occupations)): ?>
<?php 
foreach($occupations as $k =>$occupation):
if($occupation->parent != 0):
unset($occupations[$k]);
endif;	
endforeach;
?>
<?php if (!empty($occupations)): ?>
<div class="line line-18">
<div class="cell label">対応職種</div>
<div class="cell value">								
<?php foreach ($occupations as $k => $term): ?>
<p>
<strong>■<?php echo $term->name; ?></strong><br>
<?php
$sub_terms = get_terms(
	array(
		'taxonomy' => 'occupation',
		'parent' => $term->term_id,
		'hide_empty' => false,
		'orderby' => 'date',
		'order' => 'DESC',
	)
);
?>
<?php foreach ($sub_terms as $k1 => $occupation): ?>
<?php echo $occupation->name; ?>
<?php echo $k1 != count($sub_terms) - 1 ? ' / ' : '' ?>
<?php endforeach; ?>
</p>
<?php endforeach; ?>
</div>
</div>  
<?php endif; ?>
<?php endif; ?> -->
						</div>


						<?php
						$follow_up_system = get_field('follow_up_system');
						$list_of_bases = get_field('list_of_bases'); 
						?>
						<?php if ($follow_up_system || $list_of_bases): ?>
						<div class="company_map">
							<p class="company_map__title">フォロー体制（日本での駐在状況、拠点なども）</p>
							<div class="company_map__wrapper">
								<div class="company_map__text">
									<?php if ($follow_up_system): ?>
									<?php echo nl2br($follow_up_system); ?>
									<?php endif; ?>
								</div>
								<?php if ($list_of_bases): ?>
								<div class="company_map__link">
									<div class="company_map__icon">
										<img src="<?php echo get_stylesheet_directory_uri() ?>/module-t/images/map.png" alt="日本国内拠点">
									</div>
									<div class="company_map__link___text">
										<span class="company_map__text___title">日本国内拠点</span>
										<span class="company_map__text___desc">
											<?php echo nl2br($list_of_bases); ?>
										</span>
									</div>
								</div>
								<?php endif; ?>
							</div>
						</div>
						<?php endif; ?>

					</div>
					<?php
					$seating_capacity = get_field('seating_capacity');
					$japanese_teachers = get_field('japanese_teachers');
					$vietnamese_teachers = get_field('vietnamese_teachers');
					$practical_content = get_field('practical_content');
					$educational_efforts = get_field('educational_efforts');
					?>
					<div class="company_panel" id="panel1">
						<div class="company_panel__wrapper">
							<?php if ($seating_capacity || $japanese_teachers || $vietnamese_teachers || $practical_content || $educational_efforts || $introduction_video_id): ?>
							<?php if ($seating_capacity): ?>
							<div class="line line-1">
								<div class="cell label">収容人数</div>
								<div class="cell value"><?php echo nl2br($seating_capacity); ?></div>
							</div>
							<?php endif; ?>

							<?php
							$japanese_teachers_text = '日本人教師' . $japanese_teachers . '人';
							$vietnamese_teachers_text = 'ベトナム人教師' . $vietnamese_teachers . '人';
							if ($japanese_teachers && $vietnamese_teachers)
								$teachers = $japanese_teachers_text . ', ' . $vietnamese_teachers_text;
							elseif ($japanese_teachers && !$vietnamese_teachers)
								$teachers = $japanese_teachers_text;
							elseif (!$japanese_teachers && $vietnamese_teachers)
								$teachers = $vietnamese_teachers_text;
							else
								$teachers = '';
							if ($japanese_teachers || $vietnamese_teachers): ?>
							<div class="line line-2">
								<div class="cell label">教師数</div>
								<div class="cell value"><?php echo $teachers; ?></div>
							</div>
							<?php endif; ?>

							<?php if ($practical_content): ?>
							<div class="line line-3">
								<div class="cell label">実技内容</div>
								<div class="cell value"><?php echo nl2br($practical_content); ?></div>
							</div>
							<?php endif; ?>

							<?php if ($educational_efforts): ?>
							<div class="line line-4">
								<div class="cell label">教育の取り組み<br />(実技や日本語など)</div>
								<div class="cell value"><?php echo nl2br($educational_efforts); ?></div>
							</div>
							<?php endif; ?>
							<?php endif; ?>
						</div>
					</div>


					<div class="company_panel" id="panel2">
						<div class="company_panel__wrapper">
							<div class="company_video">
								<?php if (!empty($introduction_videos) && $video_options[0] == "Video Youtube"): ?>
								<?php foreach($introduction_videos as $k =>$introduction_video): ?>
								<dl class="item-video">
									<dd class="full-item-video">
										<div class="video-content">
											<?php echo '<iframe width="600" height="400" src="https://www.youtube.com/embed/' . $introduction_video['id_video_youtube'] . '"></iframe>'; ?>
										</div>
									</dd>
								</dl>
								<?php endforeach; ?>
								<?php endif; ?>
							</div>

							<div class="company_pdf">
								<div class="line line-2">
									<div class="cell label">PDF File</div>
									<div class="cell value">
										<?php
										if( have_rows('list_pdf') ): while( have_rows('list_pdf') ) : the_row(); 
										$file = get_sub_field('pdf_file');?>
										<a href="<?php echo $file['url']; ?>" target="_blank"><?php echo $file['filename']; ?></a>
										<?php endwhile; endif; ?>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>


				<?php 
				$students = get_field("voices_trainee");
				?>
				<?php if($students): ?>
				<div class="company_faq">
					<p class="company_faq__title">
						<img src="<?php echo get_stylesheet_directory_uri() ?>/module-t/images/ic-mes.png" alt="実習生の声">
						実習生の声
					</p>
					<div class="company_items">
						<?php foreach($students as $k =>$student): ?>

						<div class="company_item">
							<div class="company_faq__wrapper">
								<div class="company_faq__heading">
									<?php if($student['trainee_avatar'] != ""): ?>
									<div class="company_faq__icon">
										<img src="<?php echo $student['trainee_avatar'];?>" alt="<?php echo $student['trainee_name'];?>">
									</div>
									<?php endif; ?>
									<div class="company_faq__text">
										<span class="company_faq__icon___text"><?php echo $student['trainee_name']; ?></span>
										<div class="company_faq__lines">
											<div class="company_faq__line">
												<div class="company_faq__label">出身地:</div>
												<div class="company_faq__value"><?php echo $student['trainee_location']; ?></div>
											</div>
											<div class="company_faq__line">
												<div class="company_faq__label">年齢:</div>
												<div class="company_faq__value"><?php echo $student['trainee_age']; ?>歳</div>
											</div>
											<div class="company_faq__line">
												<div class="company_faq__label">来日した年:</div>
												<div class="company_faq__value"><?php echo $student['trainee_date']; ?></div>
											</div>
										</div>
										<div class="company_faq__arrow">
											<svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 40 40">
												<g id="btn" transform="translate(40) rotate(90)">
													<circle id="Ellipse_2" data-name="Ellipse 2" cx="20" cy="20" r="20" fill="#3dce97" />
													<g id="Group_359" data-name="Group 359">
														<rect id="Rectangle_319" data-name="Rectangle 319" width="12" height="2" transform="translate(19 26) rotate(-90)" fill="#fff" />
														<rect id="Rectangle_320" data-name="Rectangle 320" width="12" height="2" transform="translate(14 19)" fill="#fff" />
													</g>
												</g>
											</svg>
										</div>
									</div>
								</div>
								<?php $trainee_faq = $student['trainee_faq']; ?>
								<div class="company_faq__body none">
									<div class="company_faq__items">
										<?php foreach($trainee_faq as $k =>$faq): ?>
										<div class="company_faq__item">
											<p class="company_title"><?php echo $faq['trainee_q']; ?></p>
											<p class="company_value"><?php echo $faq['trainee_a']; ?></p>
										</div>
										<?php endforeach; ?>
									</div>
								</div>
							</div>
						</div>
						<?php endforeach; ?>
					</div>
				</div>
				<?php endif; ?>
				<a class="company_contact__link" href="<?php echo getTplPageURL("contact-facility.php"); ?>?company=<?php echo get_the_title(); ?>" title="この機関について問い合わせる">この機関について問い合わせる</a>
				<?php get_template_part("paths/website"); ?>
				<!--             <?php get_template_part("paths/socials"); ?> -->
				<?php
				$category = get_the_terms(get_the_ID(), 'category');
				$category = isset($category[0]) ? $category[0] : [];
				$relatedPosts = get_posts(
					array(
						'posts_per_page' => 6,
						'post_type' => 'post',
						'exclude' => [$post->ID],
						'tax_query' => array(
							array(
								'taxonomy' => 'category',
								'field' => 'term_id',
								'terms' => $category->term_id,
							)
						)
					)
				);
				?>
				<?php if (!empty($relatedPosts)): ?>
				<div class="company_related">
					<p class="company_related__title">同じエリアの他送出機関を見る</p>
					<div class="company_related__items">
						<?php foreach ($relatedPosts as $k => $post): global $post; ?>
						<div class="company_related__item">
							<a href="<?php the_permalink() ?>" title="<?php the_title(); ?>" class="related_item__image">
								<?php the_post_thumbnail(); ?>
							</a>
							<div class="related_box">
								<h2>
									<a href="<?php the_permalink() ?>" title="<?php the_title(); ?>" class="related_item__name"><?php the_title(); ?></a>
								</h2>
								<?php $terms = get_the_terms($post->ID, 'location');?>
								<?php
								usort($terms, function($a, $b) {
									if ($a->parent == 0 && $b->parent != 0) {
										return -1;
									} elseif ($a->parent != 0 && $b->parent == 0) {
										return 1;
									} else {
										return 0;
									}
								});
								?>
								<?php if($terms && !is_wp_error($terms)): ?>
								<div class="related_item__categories">
									<?php foreach($terms as $k =>$term): ?>
									<a class="related_item__category" href="<?php echo get_term_link($term); ?>" title="<?php echo $term->name; ?>"><?php echo $term->name; ?></a>
									<?php endforeach; ?>
								</div>
								<?php endif; ?>
							</div>
						</div>
						<?php endforeach; ?>
					</div>
					<a href="<?php echo getTplPageURL("facility-archive.php"); ?>" title="もっと見る" class="related_all">もっと見る</a>
				</div>
				<?php endif; ?>
			</div>
		</div>
	</section>
</main>
<script>
	function togglePanel(index, element) {
		var panels = document.querySelectorAll('.company_panel');
		panels.forEach(panel => {
			panel.style.display = 'none';
		});
		var navElements = document.querySelectorAll('.company_nav');
		navElements.forEach(nav => {
			nav.classList.remove('active');
		});
		var selectedPanel = document.getElementById('panel' + index);
		if (selectedPanel) {
			selectedPanel.style.display = 'block';
		}
		element.classList.add('active');
	}
	const swiperThumbProduct = new Swiper(".swiper-thumb", {
		slidesPerView: 4,
		autoHeight: true,
		breakpoints: {
			0: {
				slidesPerView: 3.5,
				spaceBetween: 5,
			},
			576: {
				slidesPerView: 3.5,
				spaceBetween: 5,
			},
			768: {
				slidesPerView: 3.5,
				spaceBetween: 5,
			},
			769: {
				slidesPerView: 4,
				spaceBetween: 5,
				direction: "vertical",
			},
		},
	});
	const swiperLibrary = new Swiper(".swiper-lib", {

		autoHeight: true,
		navigation: {
			nextEl: '.company_lib .control.next',
			prevEl: '.company_lib .control.prev',
		},
		thumbs: {
			swiper: swiperThumbProduct,
		},
	});
	var showInfos = document.querySelectorAll(".company_faq__arrow");
	showInfos.forEach(function (e, i) {
		e.addEventListener("click", function (event) {
			var _body = e.parentElement.parentElement.parentElement.querySelector(".company_faq__body");
			if (_body != null) {
				_body.classList.toggle("none");
			}
		});
	});
</script>
<?php get_footer(); ?>