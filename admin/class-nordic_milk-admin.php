<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://www.taifuun.ee
 * @since      1.0.0
 *
 * @package    Nordic_milk
 * @subpackage Nordic_milk/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Nordic_milk
 * @subpackage Nordic_milk/admin
 * @author     Taifuun OÜ <info@taifuun.ee>
 */
class Nordic_milk_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Nordic_milk_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Nordic_milk_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/nordic_milk-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Nordic_milk_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Nordic_milk_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/nordic_milk-admin.js', array( 'jquery' ), $this->version, false );

	}

	/**
	* Register the products custom post type
 	*
 	* @since    1.0.0
 	*/
	public function register_product_type_taxonomy() {

		$labels = array(
			'name'                  => _x( 'Product Types', 'Post Type General Name', 'nordic_milk' ),
			'singular_name'         => _x( 'Product Type', 'Post Type Singular Name', 'nordic_milk' ),
			'search_items'          => __( 'Search Product Types', 'nordic_milk' ),
			'popular_items'				 	=> __( 'Popular Product Types', 'nordic_milk' ),
			'all_items'             => __( 'All Product Types', 'nordic_milk' ),
			'edit_item'             => __( 'Edit Product Type', 'nordic_milk' ),
			'view_item'             => __( 'View Product Type', 'nordic_milk' ),
			'update_item'           => __( 'Update Product Type', 'nordic_milk' ),
			'add_new_item'          => __( 'Add New Product Type', 'nordic_milk' ),
			'new_item_name'					=> __( 'New Product Type Name', 'nordic_milk' ),
			'separate_items_with_commas' => __( 'Separate product types with commas', 'nordic_milk' ),
			'add_or_remove_items'		=> __( 'Add or remove product types', 'nordic_milk' ),
			'choose_from_most_used'	=> __( 'Choose from the most used product types', 'nordic_milk' ),
			'not_found'							=> __( 'No product types found', 'nordic_milk'),
			'no_terms'							=> __( 'No product type', 'nordic_milk' ),
			'filter_by_item'				=> __( 'Filter by product types', 'nordic_milk' ),
			'items_list_navigation'	=> __( 'Product type list navigation', 'nordic_milk' ),
			'item_list'							=> __( 'Product type list', 'nordic_milk' ),
			'most_used'							=> __( 'Most used product types', 'nordic_milk' ),
			'back_to_items'					=> __( 'Back to product types', 'nordic_milk' ),
			'item_link'							=> __( 'Product types Link', 'nordic_milk' ),
			'item_link_description' => __( 'A link to a product type', 'nordic_milk')
		);

		$args = array(
			'labels'								=> $labels,
			'description'						=> __( 'Product types to be shown on products page', 'nordic_milk' ),
			'public'								=> true,
			'hierarchical'					=> false,
			'show_in_rest'					=> false,
			'show_admin_column'			=> true,
		);

		register_taxonomy('product_types', 'products', $args);
	}

	/**
	* Register the products custom post type
 	*
 	* @since    1.0.0
 	*/
	public function register_packages_taxonomy() {

		$labels = array(
			'name'                  => _x( 'Packages', 'Post Type General Name', 'nordic_milk' ),
			'singular_name'         => _x( 'Package', 'Post Type Singular Name', 'nordic_milk' ),
			'search_items'          => __( 'Search Packages', 'nordic_milk' ),
			'popular_items'				 	=> __( 'Popular Packages', 'nordic_milk' ),
			'all_items'             => __( 'All Packages', 'nordic_milk' ),
			'edit_item'             => __( 'Edit Package', 'nordic_milk' ),
			'view_item'             => __( 'View Package', 'nordic_milk' ),
			'update_item'           => __( 'Update Package', 'nordic_milk' ),
			'add_new_item'          => __( 'Add New Package', 'nordic_milk' ),
			'new_item_name'					=> __( 'New Package Name', 'nordic_milk' ),
			'separate_items_with_commas' => __( 'Separate packages with commas', 'nordic_milk' ),
			'add_or_remove_items'		=> __( 'Add or remove packages', 'nordic_milk' ),
			'choose_from_most_used'	=> __( 'Choose from the most used packages', 'nordic_milk' ),
			'not_found'							=> __( 'No packages found', 'nordic_milk'),
			'no_terms'							=> __( 'No packages', 'nordic_milk' ),
			'filter_by_item'				=> __( 'Filter by packages', 'nordic_milk' ),
			'items_list_navigation'	=> __( 'Packages list navigation', 'nordic_milk' ),
			'item_list'							=> __( 'Packages list', 'nordic_milk' ),
			'most_used'							=> __( 'Most used packages', 'nordic_milk' ),
			'back_to_items'					=> __( 'Back to packages', 'nordic_milk' ),
			'item_link'							=> __( 'Packages Link', 'nordic_milk' ),
			'item_link_description' => __( 'A link to a package', 'nordic_milk')
		);

		$args = array(
			'labels'								=> $labels,
			'description'						=> __( 'Packages to be shown on products page', 'nordic_milk' ),
			'public'								=> true,
			'hierarchical'					=> false,
			'show_in_rest'					=> false,
			'show_admin_column'			=> true,
		);

		register_taxonomy('packages', 'products', $args);
	}

	/**
	* Register the products custom post type
 	*
 	* @since    1.0.0
 	*/

	public function register_products_cpt() {

		$labels = array(
			'name'                  => _x( 'Products', 'Post Type General Name', 'nordic_milk' ),
			'singular_name'         => _x( 'Product', 'Post Type Singular Name', 'nordic_milk' ),
			'menu_name'             => __( 'Products', 'nordic_milk' ),
			'name_admin_bar'        => __( 'Products', 'nordic_milk' ),
			'archives'              => __( 'Our Products', 'nordic_milk' ),
			'attributes'            => __( 'Product Attributes', 'nordic_milk' ),
			'parent_item_colon'     => __( 'Parent product:', 'nordic_milk' ),
			'all_items'             => __( 'All products', 'nordic_milk' ),
			'add_new_item'          => __( 'Add new product', 'nordic_milk' ),
			'add_new'               => __( 'Add new', 'nordic_milk' ),
			'new_item'              => __( 'New product', 'nordic_milk' ),
			'edit_item'             => __( 'Edit product', 'nordic_milk' ),
			'update_item'           => __( 'Update product', 'nordic_milk' ),
			'view_item'             => __( 'View product', 'nordic_milk' ),
			'view_items'            => __( 'View products', 'nordic_milk' ),
			'search_items'          => __( 'Search products', 'nordic_milk' ),
			'not_found'             => __( 'Not found', 'nordic_milk' ),
			'not_found_in_trash'    => __( 'Not found in Trash', 'nordic_milk' ),
			'insert_into_item'      => __( 'Insert into product sheet', 'nordic_milk' ),
			'uploaded_to_this_item' => __( 'Uploaded to this product sheet', 'nordic_milk' ),
			'items_list'            => __( 'Product list', 'nordic_milk' ),
			'item_published'				=> __( 'Product published', 'nordic_milk' ),
			'items_list_navigation' => __( 'Product list navigation', 'nordic_milk' ),
			'filter_items_list'     => __( 'Filter product list', 'nordic_milk' ),
		);

		$args = array(
			'label'                 => __( 'Products', 'nordic_milk' ),
			'description'           => __( 'Products to be shown on the product page', 'nordic_milk' ),
			'labels'                => $labels,
			'supports'              => array( 'title', 'author'),
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
			'has_archive'           => true,
			'exclude_from_search'   => false,
			'publicly_queryable'    => true,
			'capability_type'       => 'post',
			'show_in_rest'	    => false
		);

		register_post_type( 'products', $args );
	}
}
