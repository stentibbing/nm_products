<?php

/**
 * Public side of the plugin
 */
class NM_Products_Public
{

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
    public function __construct($plugin_name, $version)
    {
        $this->plugin_name = $plugin_name;
        $this->version = $version;
    }

    /**
     * Include public scripts
     */
    public function enqueue_scripts()
    {
        wp_enqueue_script($this->plugin_name, plugin_dir_url(__FILE__) . 'js/nm_products-public.js', array( 'jquery' ), $this->version, false);
    }

    /**
     * Register public shortcodes
     */
    public function add_shortcodes()
    {
        add_shortcode('list_products', array($this, 'render_products_list'));
        add_shortcode('list_packages', array($this, 'render_packages_list'));
        add_shortcode('show_products', array($this, 'render_products'));
    }

    /**
     * Return rendered list of products by product type
     */
    public function render_products_list($atts)
    {
        $products = [];
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

        // Prepeare an array of products for the view to render
        foreach (get_posts($args) as $post) {
            if ($post->post_status == 'publish') {
                $product['title'] = $post->post_title;
                $packages = get_the_terms($post->ID, 'packages');
                if ($packages) {
                    foreach ($packages as $package) {
                        $product['packages'][] = $package;
                    }
                }
                $products[] = $product;
                $product = null;
            }
        }
        
        // If products were found, return the rendered view
        if (!empty($products)) {
            return require plugin_dir_path(__FILE__) . '/partials/nmp-products-list-view.php';
        } else {
            return __('Not enough products to display');
        }
    }

    /**
     * Render list of packages
     */
    public function render_packages_list(){
        $packages_terms = get_terms('packages');
        if (!empty($packages_terms)) {
            $packages	= [];
            foreach ($packages_terms as $package_term) {
                $package['slug'] = esc_html($package_term->slug);
                $package['name'] = esc_html($package_term->name);
                $package['desc'] = esc_html($package_term->description);
                $packages[] = $package;
            }
            return require plugin_dir_path(__FILE__) . '/partials/nmp-packages-list-view.php';
        } else {
            return 'No packages found!';
        }
    }

    /**
     * Render products view
     */
    public function render_products()
    {
        $args = array(
            'orderby' 	=> 'menu_order',
            'order' 		=> 'ASC',
            'post_type' => 'product',
            'nopaging' 	=> true,
        );
        $products = get_posts($args);
        if (!empty($products)) {
            return require plugin_dir_path(__FILE__) . '/partials/nmp-products-grid-view.php';
        } else {
            return 'No products found!';
        }
    }
}
