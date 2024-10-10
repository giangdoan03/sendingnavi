<footer>
	<div class="container">
		<a href="<?php echo site_url(); ?>" title="<?php echo bloginfo(); ?>" class="footer_logo">
			<img src="<?php echo c_get_image("logo_footer", "option"); ?>" alt="<?php echo bloginfo(); ?>">
			<span>送出機関紹介サイト</span>
		</a>
		<?php
		if (has_nav_menu('footer-menu')) {
			wp_nav_menu(
				array(
					'theme_location' => 'footer-menu',
					'menu_class' => '',
					'container' => '',
				)
			);
		}
		?>
		<div class="footer_bottom">
			<div class="box">
				<?php
				if (has_nav_menu('policy-menu')) {
					wp_nav_menu(
						array(
							'theme_location' => 'policy-menu',
							'menu_class' => '',
							'container' => '',
						)
					);
				}
				?>
				<p class="footer_bottom__copyright">Copyright © 送出機関紹介サイト Sending Navi. All Rights Reserved.</p>
			</div>
		</div>
	</div>
</footer>
<div class="job_modal">
	<div class="job_wrapper">
		<p class="job_title">対応職種</p>
		<div class="job_categories">

			<?php $terms = get_terms(
	array(
		'taxonomy' => 'occupation',
		'parent' => 0,
		'hide_empty' => false,
	)
); ?>
			<?php $terms_encode = []; ?>
			<?php foreach ($terms as $k => $term): ?>
			<div class="job_category">
				<p class="job_category__title">
					<?php echo $term->name; ?>
				</p>
				<?php
				$sub_terms = get_terms(
					array(
						'taxonomy' => 'occupation',
						'parent' => $term->term_id,
						'hide_empty' => false,
						'meta_key' => 'order',
						'orderby' => 'meta_value_num',
						'order' => 'ASC',
					)
				);
				$categoryIds = isset($_REQUEST['occupation']) ? explode(",", $_REQUEST['occupation']) : [];
				?>
				<?php if (empty(!$sub_terms)): ?>
				<div class="category_items">
					<?php foreach ($sub_terms as $k1 => $termChild): ?>
					<?php $termSplit = ['name' => $termChild->name, 'term_id' => $termChild->term_id]; ?>
					<?php array_push($terms_encode, ['name' => $term->name, 'arr' => $termSplit]); ?>
					<label for="category-<?php echo $k ?>-<?php echo $k1 ?>" class="category_item">
						<input name="category[]" <?php echo in_array($termChild->term_id, $categoryIds) ? 'checked' : '' ?>
							   type="checkbox" id="category-<?php echo $k; ?>-<?php echo $k1 ?>"
							   value="<?php echo $termChild->term_id; ?>" class="<?php echo in_array($termChild->term_id, $categoryIds) ? 'in-active' : '' ?>">
						<span>
							<?php echo $termChild->name; ?>
						</span>
					</label>
					<?php endforeach; ?>
				</div>
				<?php endif; ?>
			</div>
			<?php endforeach; ?>
		</div>
		<span class="job_modal__close">閉じる</span>
	</div>
</div>
<?php wp_footer(); ?>
<?php
$html = '';
$locationTerms = get_terms(
	array(
		'taxonomy' => 'location',
		'parent' => 0,
		'hide_empty' => false,
	)
);
$idx = 1;
foreach ($locationTerms as $k => $locationTerm):
$sub_locationTerms = get_terms(
	array(
		'taxonomy' => 'location',
		'parent' => $locationTerm->term_id,
		'hide_empty' => false,
	)
);
if (!empty($sub_locationTerms)):
$html .= '<div class="inputv-item input' . $idx . '">';
$html .= '<p class="head head' . $idx . '">' . $locationTerm->name . '</p>';
$html .= '<div class="dropdown">';
$html .= '<ul class="inputt"></ul>';
$html .= '<div class="ard"><p><img src="' . get_stylesheet_directory_uri() . '/module-tg/img/ard.png"></p></div>';
$html .= '<div class="scroll-bar">';
$html .= '<div class="scroll-bar-inner">';
foreach ($sub_locationTerms as $sub_locationTerm):
$itemPosts = get_posts(
	[
		'post_type' => 'post',
		'posts_per_page' => -1,
		'tax_query' => [
			[
				'taxonomy' => 'location',
				'terms' => [$sub_locationTerm->term_id]
			]
		],
	]
);
if (!empty($itemPosts)):
$html .= '<div class="scroll-item" data-location="' . $sub_locationTerm->term_id . '">';
$html .= '<p class="headb">' . $sub_locationTerm->name . '</p>';

$html .= '<ul class="check-list">';
foreach ($itemPosts as $itemPost):
if (isset($_GET['company']) && $_GET['company'] == $itemPost->post_title) {
	$html .= '<li class="check-item focus"  elm-target="region_' . $k . '">';
} else {
	$html .= '<li class="check-item"  elm-target="region_' . $k . '">';
}
$html .= '<p class="region-checkbox">' . $itemPost->post_title . '</p>';
$html .= '</li>';
endforeach;
wp_reset_postdata();
$html .= '</ul>';
endif;
$html .= '</div>';
endforeach;
$html .= '</div>';
$html .= '</div>';
$html .= '</div>';
$html .= '</div>';
$idx++;
endif;
endforeach;
?>

<script>
	const LOCATION_HTML = '<?php echo $html; ?>';
	const OCCUPATION_ENCODE = '<?php echo json_encode($terms_encode); ?>';

	function groupArrayByPropertyName(arr, propertyName) {
		return arr.reduce((acc, obj) => {
			const key = obj[propertyName];
			if (!acc[key]) {
				acc[key] = [];
			}
			acc[key].push(obj);
			return acc;
		}, {});
	}

	document.addEventListener("DOMContentLoaded", function () {
		var occupation_checkboxs = document.querySelector("#occupation_checkboxs");
		var location_checkboxs = document.querySelector("#location_checkboxs");
		if (occupation_checkboxs != null && JSON.parse(OCCUPATION_ENCODE) != null) {
			var terms = JSON.parse(OCCUPATION_ENCODE);
			var groupedTerms = groupArrayByPropertyName(terms, 'name');
			var html = ``;
			var j = 0;
			Object.keys(groupedTerms).forEach(function (key) {
				var i = 0;
				html += `<div class="checker ${j != 0 ? "mgt" : ''}">`;
				html += `<p class="head">${key}</p>`;
				html += `<dl><span class="wpcf7-form-control-wrap"><span class="wpcf7-form-control wpcf7-checkbox">`;
				groupedTerms[key].forEach(function (item) {
					html += `<span class="wpcf7-list-item ${i == 0 ? "first" : ''}${i == groupedTerms[key].length - 1 ? "last" : ''}">
<label for="${item.arr.name}">
<input class="occupation-checkbox" type="checkbox" elm-target="occupation_${j}" name="occupation[]" value="${item.arr.name}" id="${item.arr.name}"id />
<span class="wpcf7-list-item-label">${item.arr.name}</span>
	</label>
	</span>`;
					i = i + 1;
				});
				html += `</span></span></dl>`;
				i = 0;
				j++;
				html += `</div>`;
				html += `</div>`;
			});
			occupation_checkboxs.innerHTML = html;
		}
		if (location_checkboxs != null) {
			location_checkboxs.innerHTML = LOCATION_HTML;
		}
	});


	const PICKUP = new Swiper('#pickup .swiper', {
		loop: true,
		autoplay: {
			delay: 2500,
			disableOnInteraction: false,
		},
		navigation: {
			nextEl: '#pickup .control.next',
			prevEl: '#pickup .control.prev',
		},
		breakpoints: {
			0: {
				slidesPerView: 1.085,
				spaceBetween: 20
			},
			640: {
				slidesPerView: 3,
				spaceBetween: 20
			},
		}
	});
	var showFilter = document.querySelector(".show_jobs");
	var closeFilter = document.querySelector(".job_modal__close");
	var boxFilter = document.querySelector(".job_modal");
	var activeJobs = document.querySelector(".jobs");
	var categoryItems = document.querySelectorAll(".category_item");
	if (showFilter != null && closeFilter != null && categoryItems != null) {
		showFilter.addEventListener("click", function (e) {
			boxFilter.classList.toggle("active");
		});
		closeFilter.addEventListener("click", function (e) {
			boxFilter.classList.remove("active");
		});
		categoryItems.forEach(function (e, i) {
			e.addEventListener("click", function (event) {
				event.preventDefault;
				var _value = e.querySelector("span");

			});
		});
	}

	var occupations = document.querySelectorAll("[name='category[]']");
	var iOccupation = document.querySelector("#occupation");
	var jobs = document.querySelector(".jobs");

	function generateOccupations() {
		var arr = [];
		var texts = [];
		occupations.forEach(function (e, i) {
			if (e.checked) {
				arr.push(e.value);
				texts.push(e.parentElement.querySelector("span").innerHTML.trim());
			}
		});
		iOccupation.value = arr.join(",");
		var _checkeds = ``;
		texts.forEach(function (e, i) {
			_checkeds += `<strong>` + e + `</strong>`;
		});
		jobs.innerHTML = _checkeds;
	}
	occupations.forEach(function (e, i) {
		e.addEventListener("change", function (event) {
			event.preventDefault();
			generateOccupations();
		});
	});
	if (occupations != null && iOccupation != null && iOccupation.value != "") {

		generateOccupations();
	}
</script>
<script>
	document.addEventListener("DOMContentLoaded", function () {
		const occupations = document.querySelectorAll('.occupation-checkbox');
		occupations.forEach(function (checkbox) {
			checkbox.addEventListener('change', function () {
				const targetId = this.getAttribute('elm-target');
				const targetElement = document.getElementById(targetId);
				const occupationValues = [];
				occupations.forEach(function (cb) {
					if (cb.checked && cb.getAttribute('elm-target') === targetId) {
						occupationValues.push(cb.value);
					}
				});
				targetElement.value = occupationValues.join('/');
			});
		});


	});
</script>
<script>
	// 	function clearAllFormFields(form) {
	// 		const inputs = form.querySelectorAll('input, textarea, select');
	// 		inputs.forEach(input => {
	// 			if (input.type === 'checkbox' || input.type === 'radio') {
	// 				input.checked = false;
	// 				input.removeAttribute("checked");
	// 			} else {
	// 				input.value = '';
	// 				input.removeAttribute("value");
	// 			}
	// 		});

	// 		const selects = form.querySelectorAll('select');
	// 		selects.forEach(select => {
	// 			select.selectedIndex = -1;
	// 		});
	// 	}

	// 	document.addEventListener('DOMContentLoaded', function() {
	// 		const forms = document.querySelectorAll('.wpcf7-form');
	// 		forms.forEach(form => {
	// 			clearAllFormFields(form);
	// 		});
	// 	});
</script>



</body>

</html>