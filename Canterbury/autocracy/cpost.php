<?php

$prefix = 'YOUR_PREFIX_';
global $meta_boxes;
$meta_boxes = array();

$meta_boxes[] = array(
    'id' => 'product',
    'title' => 'Product Info',
    'pages' => array('products'),
    'context' => 'normal',
    'priority' => 'high',
    'fields' => array(
     array(
        'name' => 'SKU #',
        'id' => 'SKU',
        'type' => 'text',
        ),
     array(
        'name' => 'Price',
        'id' => 'price',
        'type' => 'text',
        ),
     array(
        'name' => 'Weight',
        'id' => 'weight',
        'type' => 'text',
        ),
     array(
        'name' => 'Dimensions',
        'id' => 'dimensions',
        'type' => 'text',
        ),
     ),
    );

/* * ******************* META BOX REGISTERING ********************** */

/**
 * Register meta boxes
 *
 * @return void
 */
function YOUR_PREFIX_register_meta_boxes() {
    global $meta_boxes;

    // Make sure there's no errors when the plugin is deactivated or during upgrade
    if (class_exists('RW_Meta_Box')) {
        foreach ($meta_boxes as $meta_box) {
            new RW_Meta_Box($meta_box);
        }
    }
}

// Hook to 'admin_init' to make sure the meta box class is loaded before
// (in case using the meta box class in another plugin)
// This is also helpful for some conditionals like checking page template, categories, etc.
add_action('admin_init', 'YOUR_PREFIX_register_meta_boxes');
?>