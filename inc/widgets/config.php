<?php
include_once("homepages/wg_slide_home.php");
include_once("homepages/wg_product_category_home.php");
include_once("homepages/wg_intro_home.php");

function init_widget_area()
{
	register_sidebar(array(
		'name'          => 'Home Center Widget Area',
		'id'            => 'wg_home_center_area',
		'before_widget' => '',
		'after_widget'  => '',
		'before_title'  => '',
		'after_title'   => '',
	));
	register_sidebar(array(

		'name'          => 'Danh mục sản phẩm',

		'id'            => 'wg_product_cat',

		'before_widget' => '',

		'after_widget'  => '',

		'before_title'  => '',

		'after_title'   => '',

	));
}
add_action('widgets_init', 'init_widget_area');
function create_custom_widget()
{
	register_widget("Wg_Slide_Home");
	register_widget("Wg_Product_Category_Home");
	register_widget("Wg_Intro_Home");
}
add_action('widgets_init', 'create_custom_widget');
