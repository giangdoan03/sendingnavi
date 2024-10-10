<?php /*Template Name: 検索結果一覧*/?>
<?php get_header(); ?>
<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/module-t/css/company.css">
<?php
global $wp_query;
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
$keyword = isset($_REQUEST['keyword']) ? $_REQUEST['keyword'] : '';
$order = isset($_REQUEST['order']) ? $_REQUEST['order'] : '';
$locations = isset($_REQUEST['location']) ? $_REQUEST['location'] : '';
$region = isset($_REQUEST['region']) ? $_REQUEST['region'] : '';
$occupations = isset($_REQUEST['occupation']) ? $_REQUEST['occupation'] : '';
$specific_skill = isset($_REQUEST['specific_skill']) ? $_REQUEST['specific_skill'] : '';
$args = array(
  'post_type' => 'post',
  'posts_per_page' => 10,
  'exact' => false,
  'sentence' => true,
  'paged' => $paged,
  'tax_query' => [],
  'post_status' => 'publish'
);
if ($keyword != '') {
  $args['s'] = $keyword;
}
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
$args['order'] = $orderValue;
$args['orderby'] = $orderColumn;
if ($occupations != '') {
  $occupation = [
    'taxonomy' => 'occupation',
    'field' => 'term_id',
    'terms' => [$occupations],
  ];
  array_push($args['tax_query'], $occupation);
}

if ($region != '') {
  $location = [
    'taxonomy' => 'location',
    'field' => 'term_id',
    'terms' => [$region],
  ];
  if ($locations != ''){
	  $location['terms'] = [$region,$locations];
  }
  array_push($args['tax_query'], $location);
}

if ($specific_skill != "") {
  $args['meta_query'] = [
    [
      'key' => 'specific_skill',
      'value' => '有',
      'compare' => 'LIKE',
    ]
  ];
}
?>
<?php
$postItems = new WP_Query($args);
?>
<main>
  <?php get_template_part("paths/breacrumb", null, ['static' => true, 'type' => 'archive-posts']); ?>
  <div id="company_archive">
    <div class="container">
      <section id="banner">
        <?php get_template_part("paths/form", null, ['hide_title' => true]); ?>
      </section>
      <?php if ($keyword != ""): ?>
        <h1 class="page_title">
          <svg xmlns="http://www.w3.org/2000/svg" width="18.686" height="40.291" viewBox="0 0 18.686 40.291">
            <g id="Group_243" data-name="Group 243" transform="translate(0)">
              <path id="Path_212" data-name="Path 212" d="M0,0,11.679,19.077h7.007L7.007,0Z" transform="translate(0)"
                fill="#f54d4d" />
              <path id="Path_213" data-name="Path 213" d="M11.678,51.5,0,70.577H7.007L18.686,51.5Z"
                transform="translate(0 -30.286)" fill="#3dce97" />
            </g>
          </svg>
          “
          <?php echo $keyword; ?>”の検索結果
        </h1>
      <?php else: ?>
        <!--送出機関一覧 -->
      <?php endif; ?>
      <?php
      $params = array(
        'occupation' => $occupations,
        'keyword' => $keyword,
        'location' => $locations,
        'specific_skill' => $specific_skill,
        'order' => $order,
        'region' => $region
      );
      ?>
	  
      <?php get_template_part("paths/form_result", null, ['postItems' => $postItems, 'params' => $params]); ?>
      <?php
      global $post;
      if ($postItems->have_posts()): ?>
        <div class="company_items">
          <?php while ($postItems->have_posts()):
            $postItems->the_post(); ?>
            <?php get_template_part("paths/company_item", null); ?>
          <?php endwhile; ?>
        </div>
        <?php cpagination($postItems->max_num_pages); ?>
      <?php else: ?>
        <p class="no-result">ありませんでした</p>
      <?php endif; ?>
    </div>
  </div>
</main>
<?php get_footer(); ?>