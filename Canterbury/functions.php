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
	register_post_type('slides', array(
		'labels' => array(
			'name' => __('Slides'),
			'singular_name' => __('slide')
			),
		'public' => true,
		'has_archive' => true,
		'rewrite' => array('slug' => 'slides'),
		'supports' => array('title','editor','thumbnail', 'author'),
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
wp_enqueue_script('media-upload');
wp_enqueue_script('thickbox');
wp_enqueue_script('jquery');
wp_enqueue_style('thickbox');
wp_enqueue_script('upload_enable', get_template_directory_uri() . 'autocracy/theme-options.js', false, null);
?>
<?php
function canterbury_taxonomy_add_new_meta_field() {
	?>
	<div class="form-field">
		<label for="term_meta[taxonomy_image_url]"><?php _e( 'Example meta field', 'canterbury' ); ?></label>
		<input class="upload_image" type="text" name="term_meta[taxonomy_image_url]" id="term_meta[taxonomy_image_url]" value="<?php echo esc_attr( $term_meta['taxonomy_image_url'] ) ? esc_attr( $term_meta['taxonomy_image_url'] ) : ''; ?>">
		<input class="upload_image_button" type="button" value="Upload Image" />
		<p class="description"><?php _e( 'Enter a value for this field','canterbury' ); ?></p>
	</div>
	<?php
}
add_action( 'brands_add_form_fields', 'canterbury_taxonomy_add_new_meta_field', 10, 2 );
// Edit term page
function canterbury_taxonomy_edit_meta_field($term) {

	// put the term ID into a variable
	$t_id = $term->term_id;

	// retrieve the existing value(s) for this meta field. This returns an array
	$term_meta = get_option( "taxonomy_$t_id" ); ?>
	<tr class="form-field">
		<th scope="row" valign="top"><label for="term_meta[taxonomy_image_url]"><?php _e( 'Example meta field', 'canterbury' ); ?></label></th>
		<td>
			<input class="upload_image" type="text" name="term_meta[taxonomy_image_url]" id="term_meta[taxonomy_image_url]" value="<?php echo esc_attr( $term_meta['taxonomy_image_url'] ) ? esc_attr( $term_meta['taxonomy_image_url'] ) : ''; ?>">
			<input class="upload_image_button" type="button" value="Upload Image" />
			<p class="description"><?php _e( 'Enter a value for this field','canterbury' ); ?></p>
		</td>
	</tr>
	<?php
}
add_action( 'brands_edit_form_fields', 'canterbury_taxonomy_edit_meta_field', 10, 2 );
// Save extra taxonomy fields callback function.
function save_taxonomy_custom_meta( $term_id ) {
	if ( isset( $_POST['term_meta'] ) ) {
		$t_id = $term_id;
		$term_meta = get_option( "taxonomy_$t_id" );
		$cat_keys = array_keys( $_POST['term_meta'] );
		foreach ( $cat_keys as $key ) {
			if ( isset ( $_POST['term_meta'][$key] ) ) {
				$term_meta[$key] = $_POST['term_meta'][$key];
			}
		}
		// Save the option array.
		update_option( "taxonomy_$t_id", $term_meta );
	}
}  
add_action( 'edited_brands', 'save_taxonomy_custom_meta', 10, 2 );  
add_action( 'create_brands', 'save_taxonomy_custom_meta', 10, 2 );

?>
