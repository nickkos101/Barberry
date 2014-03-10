<?php 

include 'autocracy/autocracy.php';

//Theme Supports

add_theme_support( 'post-thumbnails' );
add_theme_support( 'menus' );

//Menu Registration
register_nav_menus( array(
	'Header_Nav' => 'Header Navigation Area',
	) );

//Sidebar Registration
register_sidebar( array(
	'name' => __( 'Blog Sidebar', 'wpb' ),
	'id' => 'sidebar-1',
	'description' => __( 'The blog sidebar appears on the right hand side.', 'wpb' ),
	'before_widget' => '<div class="widget">',
	'after_widget' => '</div>',
	'before_title' => '<h4">',
	'after_title' => '</h4>',
	) 
);

//Custom Post Types
function canterbury_create_post_type() {
	register_post_type('products', array(
		'labels' => array(
			'name' => __('Products'),
			'singular_name' => __('product')
			),
		'public' => true,
		'has_archive' => true,
		'rewrite' => array('slug' => 'products'),
		'supports' => array('title','editor','thumbnail', 'author', 'comments'),
		'taxonomies' => array('category'), 
		)
	);
}
add_action('init', 'canterbury_create_post_type');


//Review Img Class Filter

add_filter('get_avatar','add_gravatar_class');

function add_gravatar_class($class) {
	$class = str_replace("class='avatar", "class='avatar review-photo", $class);
	return $class;
}

//Taxonomy Additions

add_action( 'init', 'create_canterbury_tax' );

function create_canterbury_tax() {
	register_taxonomy(
		'brands',
		'products',
		array(
			'label' => __( 'Brands' ),
			'rewrite' => array( 'slug' => 'brand' ),
			'hierarchical' => true,
			)
		);
	register_taxonomy(
		'colors',
		'products',
		array(
			'label' => __( 'Colors' ),
			'rewrite' => array( 'slug' => 'colors' ),
			'hierarchical' => true,
			)
		);
	register_taxonomy(
		'sizes',
		'products',
		array(
			'label' => __( 'Sizes' ),
			'rewrite' => array( 'slug' => 'sizes' ),
			'hierarchical' => true,
			)
		);
}


function get_brands($postID) {
	$brandlist =  wp_get_post_terms($postID, 'brands');
	foreach ($brandlist as $brand) {
		echo $brand->name;
		echo ', ';
	}
}

function get_colors($postID) {
	$colors =  wp_get_post_terms($postID, 'colors');
	foreach ($colors as $color) {
		echo $color->name;
		echo ', ';
	}
}

function get_sizes($postID) {
	$sizes =  wp_get_post_terms($postID, 'sizes');
	foreach ($sizes as $size) {
		echo $size->name;
		echo ', ';
	}
}

function list_info($postID) {
	$brandlist =  wp_get_post_terms($postID, 'brands');
	foreach ($brandlist as $brand) {
		echo "<h5>";
		echo $brand->name;
		echo "</h5>";
		echo "<p>";
		if($brand->description === '') {
			echo "DESCRIPTION TEXT FOR - ".$brand->name." IS MISSING!";
		}
			else {
				echo $brand->description;
			}
			echo "</p>";
		}

	}


	?>