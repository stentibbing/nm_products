<?php

class NM_Products_Admin {

	/**
	 * The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 */
	public function __construct( $plugin_name, $version ) {
		$this->plugin_name = $plugin_name;
		$this->version = $version;
	}

	/**
	* Register the products types custom taxonomy for products
 	*/
	public function register_product_type_taxonomy() {
		$labels = array(
			'name'                  => _x( 'Product Types', 'Post Type General Name', 'nm_products' ),
			'singular_name'         => _x( 'Product Type', 'Post Type Singular Name', 'nm_products' ),
			'search_items'          => __( 'Search Product Types', 'nm_products' ),
			'popular_items'				 	=> __( 'Popular Product Types', 'nm_products' ),
			'all_items'             => __( 'All Product Types', 'nm_products' ),
			'edit_item'             => __( 'Edit Product Type', 'nm_products' ),
			'view_item'             => __( 'View Product Type', 'nm_products' ),
			'update_item'           => __( 'Update Product Type', 'nm_products' ),
			'add_new_item'          => __( 'Add New Product Type', 'nm_products' ),
			'new_item_name'					=> __( 'New Product Type Name', 'nm_products' ),
			'separate_items_with_commas' => __( 'Separate product types with commas', 'nm_products' ),
			'add_or_remove_items'		=> __( 'Add or remove product types', 'nm_products' ),
			'choose_from_most_used'	=> __( 'Choose from the most used product types', 'nm_products' ),
			'not_found'							=> __( 'No product types found', 'nm_products'),
			'no_terms'							=> __( 'No product type', 'nm_products' ),
			'filter_by_item'				=> __( 'Filter by product types', 'nm_products' ),
			'items_list_navigation'	=> __( 'Product type list navigation', 'nm_products' ),
			'item_list'							=> __( 'Product type list', 'nm_products' ),
			'most_used'							=> __( 'Most used product types', 'nm_products' ),
			'back_to_items'					=> __( 'Back to product types', 'nm_products' ),
			'item_link'							=> __( 'Product types Link', 'nm_products' ),
			'item_link_description' => __( 'A link to a product type', 'nm_products')
		);

		$args = array(
			'labels'								=> $labels,
			'description'						=> __( 'Product types to be shown on products page', 'nm_products' ),
			'public'								=> true,
			'hierarchical'					=> false,
			'show_in_rest'					=> false,
			'show_admin_column'			=> true,
		);

		register_taxonomy('product_types', 'product', $args);
	}

	/**
	* Register the packages taxonomy for products
 	*/
	public function register_packages_taxonomy() {

		$labels = array(
			'name'                  => _x( 'Packages', 'Post Type General Name', 'nm_products' ),
			'singular_name'         => _x( 'Package', 'Post Type Singular Name', 'nm_products' ),
			'search_items'          => __( 'Search Packages', 'nm_products' ),
			'popular_items'				 	=> __( 'Popular Packages', 'nm_products' ),
			'all_items'             => __( 'All Packages', 'nm_products' ),
			'edit_item'             => __( 'Edit Package', 'nm_products' ),
			'view_item'             => __( 'View Package', 'nm_products' ),
			'update_item'           => __( 'Update Package', 'nm_products' ),
			'add_new_item'          => __( 'Add New Package', 'nm_products' ),
			'new_item_name'					=> __( 'New Package Name', 'nm_products' ),
			'separate_items_with_commas' => __( 'Separate packages with commas', 'nm_products' ),
			'add_or_remove_items'		=> __( 'Add or remove packages', 'nm_products' ),
			'choose_from_most_used'	=> __( 'Choose from the most used packages', 'nm_products' ),
			'not_found'							=> __( 'No packages found', 'nm_products'),
			'no_terms'							=> __( 'No packages', 'nm_products' ),
			'filter_by_item'				=> __( 'Filter by packages', 'nm_products' ),
			'items_list_navigation'	=> __( 'Packages list navigation', 'nm_products' ),
			'item_list'							=> __( 'Packages list', 'nm_products' ),
			'most_used'							=> __( 'Most used packages', 'nm_products' ),
			'back_to_items'					=> __( 'Back to packages', 'nm_products' ),
			'item_link'							=> __( 'Packages Link', 'nm_products' ),
			'item_link_description' => __( 'A link to a package', 'nm_products')
		);

		$args = array(
			'labels'								=> $labels,
			'description'						=> __( 'Packages to be shown on products page', 'nm_products' ),
			'public'								=> true,
			'hierarchical'					=> false,
			'show_in_rest'					=> false,
			'show_admin_column'			=> true,
		);

		register_taxonomy('packages', 'product', $args);
	}

	/**
	* Register the products custom post type called Products
 	*/
	public function register_product_cpt() {

		$labels = array(
			'name'                  => _x( 'Nordic Milk Products', 'Post Type General Name', 'nm_products' ),
			'singular_name'         => _x( 'Product', 'Post Type Singular Name', 'nm_products' ),
			'menu_name'             => __( 'Products', 'nm_products' ),
			'name_admin_bar'        => __( 'Products', 'nm_products' ),
			'archives'              => __( 'Our Products', 'nm_products' ),
			'attributes'            => __( 'Product Attributes', 'nm_products' ),
			'parent_item_colon'     => __( 'Parent product:', 'nm_products' ),
			'all_items'             => __( 'All products', 'nm_products' ),
			'add_new_item'          => __( 'Add new product', 'nm_products' ),
			'add_new'               => __( 'Add new', 'nm_products' ),
			'new_item'              => __( 'New product', 'nm_products' ),
			'edit_item'             => __( 'Edit product', 'nm_products' ),
			'update_item'           => __( 'Update product', 'nm_products' ),
			'view_item'             => __( 'View product', 'nm_products' ),
			'view_items'            => __( 'View products', 'nm_products' ),
			'search_items'          => __( 'Search products', 'nm_products' ),
			'not_found'             => __( 'Not found', 'nm_products' ),
			'not_found_in_trash'    => __( 'Not found in Trash', 'nm_products' ),
			'insert_into_item'      => __( 'Insert into product sheet', 'nm_products' ),
			'uploaded_to_this_item' => __( 'Uploaded to this product sheet', 'nm_products' ),
			'items_list'            => __( 'Product list', 'nm_products' ),
			'item_published'				=> __( 'Product published', 'nm_products' ),
			'items_list_navigation' => __( 'Product list navigation', 'nm_products' ),
			'filter_items_list'     => __( 'Filter product list', 'nm_products' ),
		);

		$args = array(
			'label'                 => __( 'Products', 'nm_products' ),
			'description'           => __( 'Products to be shown on the product page', 'nm_products' ),
			'labels'                => $labels,
			'supports'              => array( 'title', 'editor', 'excerpt', 'page-attributes', 'thumbnail'),
			'taxonomies'						=> array( 'packages' ),
			'hierarchical'          => false,
			'public'                => true,
			'show_ui'               => true,
			'show_in_menu'          => true,
			'menu_position'         => 5,
			'menu_icon'             => 'dashicons-food',
			'show_in_admin_bar'     => true,
			'show_in_nav_menus'     => true,
			'can_export'            => true,
			'has_archive'           => false,
			'exclude_from_search'   => false,
			'publicly_queryable'    => true,
			'capability_type'       => 'post',
			'show_in_rest'	    => false
		);

		register_post_type( 'product', $args );
	}

	/**
	 * Register nutrition facts metabox for product custo post type
	 */
	function register_nutrition_facts_metabox() {
		add_meta_box( 'nm_nutrition_facts', __( 'Nutrition Facts', 'nm_products' ), array($this,'render_nutrition_facts_metabox'), 'product', 'advanced', );
	}

	/**
	 * Add nutrition facts metabox
	 */
	function render_nutrition_facts_metabox($post) {
		wp_nonce_field( 'nm_nutrition_facts', 'nm_nutrition_facts_wpnonce' );
		
		if ( get_post_meta($post->ID, 'nm_nutrition_facts', true ) ) {
			wp_editor( get_post_meta($post->ID, 'nm_nutrition_facts', true ), 'nm_nutrition_facts_submited');
		} else {
			wp_editor( '', 'nm_nutrition_facts_submited');
		}
	}

	/**
	 * Save nutrition facts
	 */

	function save_nutrition_facts( $post_id ) {
		if (	!isset( $_POST['nm_nutrition_facts_wpnonce'] ) || 
					!wp_verify_nonce( $_POST['nm_nutrition_facts_wpnonce'], 'nm_nutrition_facts' ) ||
					defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ||
					!current_user_can( 'edit_post', $post_id ) || 
					!isset( $_POST['nm_nutrition_facts_submited'])) {
			return;
		}
		update_post_meta( $post_id, 'nm_nutrition_facts', $_POST['nm_nutrition_facts_submited']);
	}
}
