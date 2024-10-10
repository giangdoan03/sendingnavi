<?php

add_filter('rwmb_meta', 'polylang_filter', 9, 4);

function polylang_filter()
{

	$args = func_get_args();

	if (count($args) == 4) {

		list($meta, $key, $opts, $option_name) = $args;

		$lang = pll_current_language();

		$field = rwmb_get_field_settings($key, $opts, $option_name);

		if ($field['type'] == 'image_advanced') {

			if (count($meta) == 0) {

				return [["full_url" => get_template_directory_uri() . '/images/no-image.svg', "url" => get_template_directory_uri() . '/images/no-image.svg']];
			}
		}

		if ($lang != "en") {

			$nkey = $key . "_" . $lang;

			$value = rwmb_get_value($nkey, $opts, $option_name);

			if ($value === FALSE) {

				return $meta;
			}

			return $value;
		}

		return $meta;
	}
}

pll_register_string('scroll down', 'scroll_down', 'tech5s', true);
pll_register_string('about us', 'about_us', 'tech5s', true);
pll_register_string('product', 'product', 'tech5s', true);
pll_register_string('collection', 'collection', 'tech5s', true);
pll_register_string('view all', 'view_all', 'tech5s', true);
pll_register_string('see details', 'see_details', 'tech5s', true);
pll_register_string('advantage', 'advantage', 'tech5s', true);
pll_register_string('feedback', 'feedback', 'tech5s', true);
pll_register_string('certificate', 'certificate', 'tech5s', true);
pll_register_string('blog', 'blog', 'tech5s', true);
pll_register_string('contact us', 'contact_us', 'tech5s', true);
pll_register_string('please leave your personal', 'please_leave_your', 'tech5s', true);
pll_register_string('pulmonary system', 'pulmonary_system', 'tech5s', true);
pll_register_string('policy', 'policy', 'tech5s', true);
pll_register_string('detail', 'detail', 'tech5s', true);
pll_register_string('specification', 'specification', 'tech5s', true);
pll_register_string('relate product', 'relate_product', 'tech5s', true);
pll_register_string('branch', 'branch', 'tech5s', true);
pll_register_string('search', 'search', 'tech5s', true);
pll_register_string('blog highlight', 'blog_highlight', 'tech5s', true);
pll_register_string('most view', 'most_view', 'tech5s', true);
pll_register_string('relate news', 'relate_news', 'tech5s', true);
pll_register_string('all news', 'all_news', 'tech5s', true);
pll_register_string('news watched', 'news_watched', 'tech5s', true);
pll_register_string('branch network', 'branch_network', 'tech5s', true);
pll_register_string('product category', 'product_category', 'tech5s', true);
pll_register_string('Not found', 'not_found', 'tech5s', true);
pll_register_string('country', 'country', 'tech5s', true);
pll_register_string('city', 'city', 'tech5s', true);
pll_register_string('pulmonary_social', 'pulmonary_social', 'tech5s', true);
