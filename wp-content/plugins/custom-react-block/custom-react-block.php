<?php
/**
 * Plugin Name: Custom React Block
 * Description: A custom react Gutenberg block.
 * Author: Ahmed Mahmoud
 */
include_once plugin_dir_path( __FILE__ ) . 'products.php';

function custom_react_block_register_block() {
    $asset_file = include( plugin_dir_path( __FILE__ ) . 'build/index.asset.php');
    wp_register_script(
        'custom-react-block-editor-script',
        plugins_url( 'build/index.js', __FILE__ ),
        $asset_file['dependencies'],
        $asset_file['version']
    );

    register_block_type( 'custom-react-block/block', array(
        'editor_script' => 'custom-react-block-editor-script',
        'render_callback' => 'render_product_listing_block',
    ) );
}
add_action( 'init', 'custom_react_block_register_block' );

add_action('rest_api_init', function () {
    register_rest_route('custom-react-block/v1', '/products/', array(
        'methods' => 'GET',
        'callback' => 'get_products_by_ids',
        'args' => array(
            'ids' => array(
                'required' => false,
                'sanitize_callback' => 'wp_parse_id_list',
            ),
        ),
        'permission_callback' => '__return_true', 
    ));
});
function get_products_by_ids($request) {
    $ids= $request->get_param('ids');
    global $products;
    $filtered_products = array_filter($products, function ($product) use ($ids) {
        return in_array($product['id'], $ids);
    });
    return new WP_REST_Response(array_values($filtered_products), 200);
}

