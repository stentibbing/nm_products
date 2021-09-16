<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://www.taifuun.ee
 * @since      1.0.0
 *
 * @package    Nordic_milk
 * @subpackage Nordic_milk/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Nordic_milk
 * @subpackage Nordic_milk/public
 * @author     Taifuun OÜ <info@taifuun.ee>
 */
class Nordic_milk_Public {

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
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
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

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/nordic_milk-public.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
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

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/nordic_milk-public.js', array( 'jquery' ), $this->version, false );

	}

	/**
	 * Register the shortcodes for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */


	public function add_shortcodes() {
		add_shortcode( 'list_products', array('Nordic_milk_Public', 'render_products_list') );
		add_shortcode( 'list_packages', array('Nordic_milk_Public', 'render_packages_list') );	
	}

	/**
	 * Render list of products by product type
	 * 
	 * @since		1.0.0
	 * @param		string
	 */
	public function render_products_list( $atts ) {
		$attributes = shortcode_atts( array(
			'product_type' => '',
		), $atts );	
		wp_reset_query();
		$args = array('post_type' => 'products',
				'tax_query' => array(
						array(
								'taxonomy' => 'product_types',
								'field' => 'slug',
								'terms' => $attributes['product_type'],
						),
				),
		);
		$loop = new WP_Query($args);
		if($loop->have_posts()) {			
			$output = '<ul class="nm-products-list">';
			while($loop->have_posts()) : $loop->the_post();
				$output .= '<li';
				$package_classes = ' class="nm-product';
				$packages = get_the_terms(get_the_ID(), 'packages');
				if ($packages) {
					$data_packages = ' data-packages="';
					for ($i = 0; $i <= count($packages) - 1; $i++) {
						if ($i != 0) $data_packages .= ' ';
						$package_classes .= ' package_' . $packages[$i]->slug;
						$data_packages .= $packages[$i]->slug;
					}
					$data_packages .= '"';
				};
				$output .= $package_classes . '"' . $data_packages . '>' . get_the_title() . "</li>";
			endwhile;
			$output .= '</ul>';
			return $output;
		} else {
			return 'No products found';
		}
	}

	public function render_packages_list() {
		$packages = get_terms('packages');
		if (!empty($packages)) {
			$output = '<ul class="nm-packages-list">';
			foreach($packages as $package) {
				$output .= '<li class="package_' . $package->slug . '" data-package="' . $package->slug . '">' . $package->name . '</li>';
			}
			$output .= '</ul>';
			return $output;
		} else {
			return 'No packages found!';
		} 
	}
}


