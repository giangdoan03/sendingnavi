<?php
define('CPATHCHILD', get_stylesheet_directory() . '/inc');
require_once(CPATHCHILD . '/settings/config.php');
require_once(CPATHCHILD . '/widgets/config.php');
require_once(CPATHCHILD . '/custom_collum_admin/config.php');
if (!function_exists('theme_setup')):
function theme_setup()
{
	add_theme_support('automatic-feed-links');
	add_theme_support('title-tag');
	add_theme_support('post-thumbnails');
	register_nav_menus(
		array(
			'primary-menu' => __('Menu Header'),
			'footer-menu' => __('Menu Footer'),
			'policy-menu' => __('Menu Policy'),
		)
	);
	add_theme_support('post-thumbnails');
	add_image_size('small', 150, 0, array('center', 'center'));
	add_image_size('medium', 400, 0, array('center', 'center'));
	add_image_size('large', 600, 0, array('center', 'center'));
	add_image_size('full', 0, 0, true);
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption'
		)
	);
}
endif;
add_theme_support('woocommerce');
add_action('after_setup_theme', 'theme_setup');
add_action('wp_enqueue_scripts', 'enqueue_parent_styles');
function enqueue_parent_styles()
{
	wp_enqueue_style('parent-style', get_template_directory_uri() . '/style.css');
}
function gt_get_post_view()
{
	$count = get_post_meta(get_the_ID(), 'post_views_count', true);
	return $count > 0 ? $count : 0;
}
function gt_set_post_view()
{
	$key = 'post_views_count';
	$post_id = get_the_ID();
	$count = (int) get_post_meta($post_id, $key, true);
	$count++;
	update_post_meta($post_id, $key, $count);
}
function gt_posts_column_views($columns)
{
	$columns['post_views'] = 'Views';
	return $columns;
}
function gt_posts_custom_column_views($column)
{
	if ($column === 'post_views') {
		echo gt_get_post_view();
	}
}
function getPostViews($postID)
{
	$count_key = 'post_views_count';
	$count = get_post_meta($postID, $count_key, true);
	if ($count == '') {
		delete_post_meta($postID, $count_key);
		add_post_meta($postID, $count_key, '0');
		return "0";
	}
	return $count;
}
function setPostViews($postID)
{
	$count_key = 'post_views_count';
	$count = get_post_meta($postID, $count_key, true);
	if ($count == '') {
		$count = 0;
		delete_post_meta($postID, $count_key);
		add_post_meta($postID, $count_key, '0');
	} else {
		$count++;
		update_post_meta($postID, $count_key, $count);
	}
}
function mytheme_custom_excerpt_length($length)
{
	return 25;
}
add_filter('excerpt_length', 'mytheme_custom_excerpt_length', 999);
function remove_admin_login_header()
{
	remove_action('wp_head', '_admin_bar_bump_cb');
}
add_action('get_header', 'remove_admin_login_header');
function add_query_vars_filter($vars)
{
	$vars[] = "paged";
	$vars[] = "location";
	$vars[] = "keyword";
	$vars[] = "region";
	$vars[] = "specific_skill";
	$vars[] = "occupation";
	return $vars;
}
// add_filter('query_vars', 'add_query_vars_filter');



// add_action('pre_get_posts', 'add_query_filter');

function add_query_filter($query)
{
	if (is_page_template("pages/facility-archive.php") && $query->is_main_query() && isset($query->query['post_type'])) {

		$keyword = $query->query['keyword'];
		$order = $query->query['order'];
		$location = $query->query['location'];
		$region = $query->query['region'];
		$occupation = $query->query['occupation'];
		$specific_skill = $query->query['specific_skill'];
		$post_type = $query->query['post_type'];
		if ($post_type == 'post') {
			if ($keyword != NULL) {

				$query->set('orderby', 'ID');
				$query->set('order', $order);
			}
			if ($order != NULL) {
				switch ($order) {
					case 'time-desc': {
						$orderColumn = 'publish_date';
						$orderValue = 'DESC';
						break;
					}
					case 'time-asc': {
						$orderColumn = 'publish_date';
						$orderValue = 'ASC';
						break;
					}
					case 'name-asc': {
						$orderColumn = 'title';
						$orderValue = 'ASC';
						break;
					}
					case 'name-desc': {
						$orderColumn = 'title';
						$orderValue = 'DESC';
						break;
					}
					default: {
						$orderColumn = 'ID';
						$orderValue = 'DESC';
					}
				}
				$query->set('orderby', $orderColumn);
				$query->set('order', $orderValue);
			}
			if ($location != NULL) {

			}
			if ($region != NULL) {

			}
			if ($occupation != NULL) {

			}
			if ($specific_skill != NULL) {

			}
		}
	}
	return $query;
}

function c_get_image($field_name, $post_id = "false")
{
	$image_url = get_field($field_name, $post_id);

	if ($image_url && @getimagesize($image_url)) {
		return $image_url;
	} else {
		return get_stylesheet_directory_uri() . "/images/no-image.svg";
	}
}
function trim_title($num)
{
	$base_title = get_the_title();
	$trim_title = mb_substr($base_title, 0, $num, "utf-8");
	$count_title = mb_strlen($trim_title, "utf-8");
	if ($count_title > $num - 1) {
		echo $trim_title . '…';
	} else {
		echo $trim_title;
	}
}
add_action('wp_ajax_get_news', 'getNews');
add_action('wp_ajax_nopriv_get_news', 'getNews');
function getNews()
{
	$categoryId = isset($_GET['category']) ? $_GET['category'] : '';
	$args = array(
		'post_type' => 'news',
		'orderby' => 'date',
		'order' => 'DESC',
		'posts_per_page' => 6,
	);
	if ($categoryId != 0) {
		$args['tax_query'] = array(
			array(
				'taxonomy' => 'news_cat',
				'field' => 'term_id',
				'terms' => $categoryId,
			)
		);
	}
	$post_list = get_posts($args);
	$html = get_template_part("paths/news", "news", ['post_list' => $post_list]);
	echo $html;
	wp_die();
}
function custom_post_thumbnail($html, $post_id, $post_thumbnail_id, $size, $attr)
{
	$image_url = wp_get_attachment_image_src($post_thumbnail_id, $size);
	if ($image_url && file_exists($image_url[0])) {
		return $html;
	} else {
		$default_image_url = "https://placehold.jp/24/eeeeee/999999/600x600.png?text=%E7%94%BB%E5%83%8F%E3%81%8C%E3%81%82%E3%82%8A%E3%81%BE%E3%81%9B%E3%82%93";
		$html = '<img src="' . esc_url($default_image_url) . '" alt="No Image" />';
		return $html;
	}
}
// add_filter('post_thumbnail_html', 'custom_post_thumbnail', 10, 5);

function validateImageUrl($url)
{
	return $url;
}
function revcon_change_post_label() {
	global $menu;
	global $submenu;
	$menu[5][0] = 'Companies';
	$submenu['edit.php'][5][0] = 'Companies';
	$submenu['edit.php'][10][0] = 'Add Company';
	$submenu['edit.php'][15][0] = 'Company Categories';
	$submenu['edit.php'][16][0] = 'Company Tags';
}
function revcon_change_post_object() {
	global $wp_post_types;
	$labels = &$wp_post_types['post']->labels;
	$labels->name = 'Companies';
	$labels->singular_name = 'Companies';
	$labels->add_new = 'Add Company';
	$labels->add_new_item = 'Add Company';
	$labels->edit_item = 'Edit Company';
	$labels->new_item = 'Companies';
	$labels->view_item = 'View Company';
	$labels->search_items = 'Search Company';
	$labels->not_found = 'No Company found';
	$labels->not_found_in_trash = 'No Company found in Trash';
	$labels->all_items = 'All Company';
	$labels->menu_name = 'Company';
	$labels->name_admin_bar = 'Company';
}

add_action( 'admin_menu', 'revcon_change_post_label' );
add_action( 'init', 'revcon_change_post_object' );
add_filter( 'wpcf7_form_autocomplete', function ( $autocomplete ) {
	$autocomplete = 'off';
	return $autocomplete;
}, 10, 1 );
function maybe_add_mix_content_column_to_posts()
{
	global $wpdb;
	$table_name = $wpdb->posts;
	$column_name = 'mix_content';
	$column_exists = $wpdb->get_results(
		$wpdb->prepare(
			"SHOW COLUMNS FROM `$table_name` LIKE %s",
			$column_name
		)
	);
	if (empty($column_exists)) {
		$wpdb->query(
			"ALTER TABLE `$table_name` ADD `$column_name` LONGTEXT"
		);
	}
}
add_action('after_setup_theme', 'maybe_add_mix_content_column_to_posts');
function save_post_mix_content($post_id)
{
	if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)
		return;
	if (!current_user_can('edit_post', $post_id))
		return;
	$post = get_post($post_id);
	if($post->post_type != "post"){
		return;
	}
	$post_title = get_the_title($post_id);
	$meta_values = get_post_meta($post_id);
	$mix_content = $post_title . ' | ';
	foreach ($meta_values as $key => $values) {
		foreach ($values as $value) {
			$mix_content .= $value . ' | ';
		}
	}
	$taxonomies = get_object_taxonomies(get_post_type($post_id));
	foreach ($taxonomies as $taxonomy) {
		$terms = get_the_terms($post_id, $taxonomy);
		if (!empty($terms) && !is_wp_error($terms)) {
			foreach ($terms as $term) {
				$mix_content .= $term->name . ' | ';
			}
		}
	}
	$mix_content = rtrim($mix_content, ' | ');
	global $wpdb;
	$wpdb->update(
		$wpdb->posts,
		array('mix_content' => $mix_content),
		array('ID' => $post_id),
		array('%s'),
		array('%d')
	);
}
add_action('save_post', 'save_post_mix_content');
function custom_search_in_mix_content($where, $wp_query)
{
	global $wpdb;
	if ($wp_query->is_search() && !empty($wp_query->query_vars['s'])) {
		$search_term = $wp_query->query_vars['s'];
		$search_term = $wpdb->esc_like($search_term);
		$search_term = '%' . $search_term . '%';
		$where .= $wpdb->prepare(" OR {$wpdb->posts}.mix_content LIKE %s", $search_term);
		$where .= $wpdb->prepare(" AND {$wpdb->posts}.post_type = %s", "post");
		$where .= $wpdb->prepare(" AND {$wpdb->posts}.post_status = %s", "publish");
	}
	return $where;
}
add_filter('posts_where', 'custom_search_in_mix_content', 10, 2);
function isLighthouseRequest() {
	if (isset($_SERVER['HTTP_USER_AGENT'])) {
		$userAgent = $_SERVER['HTTP_USER_AGENT'];
		if (strpos($userAgent, 'Lighthouse') !== false) {
			return true;
		}
	}
	return false;
}
function my_custom_admin_css() {
	echo '<style>
        .column-taxonomy-occupation {     white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
}
    </style>';
}
add_action('admin_head', 'my_custom_admin_css');


function add_custom_js_for_occupation_taxonomy_with_all_parents() {
?>
<script type="text/javascript">
	document.addEventListener('DOMContentLoaded', function() {
		// Kiểm tra taxonomy 'occupation'
		const allowedTaxonomy = 'occupation'; // Taxonomy cụ thể bạn muốn
		const taxonomyWrapper = document.getElementById(`${allowedTaxonomy}div`);

		if (taxonomyWrapper) {
			// Lấy tất cả các checkbox trong taxonomy 'occupation'
			const categoryCheckboxes = taxonomyWrapper.querySelectorAll('input[type="checkbox"]');

			categoryCheckboxes.forEach(function(checkbox) {
				checkbox.addEventListener('change', function() {
					if (this.checked) {
						// Gọi hàm để chọn tất cả các Parent Categories
						checkAllParentCategories(this);
					}
				});
			});
		}

		// Hàm để chọn tất cả các Parent Categories
		function checkAllParentCategories(checkbox) {
			let parentListItem = checkbox.closest('li').closest('ul').previousElementSibling;
			if (parentListItem && parentListItem.tagName === 'LABEL') {
				let parentCheckbox = parentListItem.querySelector('input[type="checkbox"]');
				if (parentCheckbox && !parentCheckbox.checked) {
					parentCheckbox.checked = true;
					// Đệ quy để chọn Parent Category của Parent Category
					checkAllParentCategories(parentCheckbox);
				}
			}
		}
	});
</script>
<?php
}
add_action('admin_footer', 'add_custom_js_for_occupation_taxonomy_with_all_parents');
