<?php

/**
 * Public side of the plugin
 */
class NM_Products_Public {

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
	 * Include public scripts
	 */
	public function enqueue_scripts() {
		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/nm_products-public.js', array( 'jquery' ), $this->version, false );
	}

	/**
	 * Register public shortcodes
	 */
	public function add_shortcodes() {
		add_shortcode( 'list_products', array($this, 'render_products_list') );
		add_shortcode( 'list_packages', array($this, 'render_packages_list') );	
		add_shortcode( 'show_products' , array($this, 'render_products'));
	}

	/**
	 * Render list of products by product type
	 */
	public function render_products_list( $atts ) {
		$args = array(
			'post_type' => 'product',	
			'nopaging' => true
		);

		// Incase product_type arg is passed, look for posts only with that term
		if (!empty($atts['product_type'])) {
			$args['tax_query'] = array(
			array(
				'taxonomy' => 'product_types',
				'field' => 'slug',
				'terms' => $atts['product_type']
				),
			);
		}
		
		wp_reset_query();
		$loop = new WP_Query($args);
		
		if($loop->have_posts()) {			
			$output = '<ul class="nm-products-list">';
			while($loop->have_posts()) : $loop->the_post();
				$output .= '<li';
				$package_classes = ' class="nm-product';
				$packages = get_the_terms(get_the_ID(), 'packages');
				$data_packages = '';
				if ($packages) {
					$data_packages .= ' data-packages="';
					for ($i = 0; $i <= count($packages) - 1; $i++) {
						if ($i != 0) $data_packages .= ' ';
						$package_classes .= ' package-' . esc_html($packages[$i]->slug);
						$data_packages .= esc_html($packages[$i]->slug);
					}
					$data_packages .= '"';
				};
				$output .= $package_classes . '"' . $data_packages . '>' . esc_html(get_the_title()) . "</li>";
			endwhile;
			$output .= '</ul>';
			return $output;
		} else {
			return 'No products found';
		}
	}

	/**
	 * Render list of packages
	 */
	public function render_packages_list() {
		$packages = get_terms('packages');
		if (!empty($packages)) {
			$output = '<ul class="nm-packages-list">';
			foreach($packages as $package) {

				if (!empty($package->description)) {
					$package_desc = '<span class="nm-package-desc">(' . esc_html($package->description) . ')</span>'; 
				} else {
					$package_desc = "";
				}

				$output .= '<li class="nm-package package-' . 
					esc_html($package->slug) . '" data-package="' . 
					esc_html($package->slug) . '"><span class="nm-package-title">' . 
					esc_html($package->name) . $package_desc . '</span>' .
					'<span class="nm-package-title-hidden">' . 
					esc_html($package->name) . $package_desc . '</span></li>';
			}
			$output .= '</ul>';
			return $output;
		} else {
			return 'No packages found!';
		} 
	}

	/**
	 * Render products view
	 */
	public function render_products() {
		$output = '';
		$args = array(
			'orderby' 	=> 'menu_order',
			'order' 		=> 'ASC',
			'post_type' => 'product',
			'nopaging' 	=> true,
		);

		$products = get_posts($args);

		if( !empty($products) ) {
			$output .= '<div class="nm-products">';
			foreach ($products as $product) {
				if ($product->post_status != 'publish') continue;				
				$output .= '<article class="nm-single-product">';	
					$output .= '<div class="nm-product-image">';
					$output .= get_the_post_thumbnail($product);
					$output .= '</div>';
					$output .= '<div class="nm-product-info">';
						$output .= '<a href="' . get_permalink($product) . '" class="nm-product-title">';	
						$output .= '<h2>';
							$output .= $product->post_title;
						$output .= '</h2>';
						$output .= '</a>';
					$output .= '</div>';
					
				$output .= '</article>';
			}

			$output .= '</div>';
		}
		return $output;
	}
}


