<?php

/**
 * The core plugin class.
 */
class NM_Products
{

    /**
     * The loader that's responsible for maintaining and registering all hooks that power
     * the plugin.
     */
    protected $loader;

    /**
     * The unique identifier of this plugin.
     */
    protected $plugin_name;

    /**
     * The current version of the plugin.
     */
    protected $version;

    /**
     * Define the core functionality of the plugin.
     */
    public function __construct()
    {
        if (defined('NM_Products_VERSION')) {
            $this->version = NM_Products_VERSION;
        } else {
            $this->version = '1.0.0';
        }
        $this->plugin_name = 'NM_Products';

        $this->load_dependencies();
        $this->set_locale();
        $this->define_admin_hooks();
        $this->define_public_hooks();
    }

    /**
     * Load the required dependencies for this plugin.
     */
    private function load_dependencies()
    {

        /**
         * The class responsible for orchestrating the actions and filters of the
         * core plugin.
         */
        require_once plugin_dir_path(dirname(__FILE__)) . 'includes/class-nm_products-loader.php';

        /**
         * The class responsible for defining internationalization functionality
         * of the plugin.
         */
        require_once plugin_dir_path(dirname(__FILE__)) . 'includes/class-nm_products-i18n.php';

        /**
         * The class responsible for defining all actions that occur in the admin area.
         */
        require_once plugin_dir_path(dirname(__FILE__)) . 'admin/class-nm_products-admin.php';

        /**
         * The class responsible for defining all actions that occur in the public-facing
         * side of the site.
         */
        require_once plugin_dir_path(dirname(__FILE__)) . 'public/class-nm_products-public.php';

        $this->loader = new NM_Products_Loader();
    }

    /**
     * Define the locale for this plugin for internationalization.
     */
    private function set_locale()
    {
        $plugin_i18n = new NM_Products_i18n();

        $this->loader->add_action('plugins_loaded', $plugin_i18n, 'load_plugin_textdomain');
    }

    /**
     * Register all of the hooks related to the admin area functionality
     * of the plugin.
     */
    private function define_admin_hooks()
    {
        $plugin_admin = new NM_Products_Admin($this->get_plugin_name(), $this->get_version());

        $this->loader->add_action('admin_enqueue_scripts', $plugin_admin, 'enqueue_styles');
        $this->loader->add_action('admin_enqueue_scripts', $plugin_admin, 'enqueue_scripts');
        $this->loader->add_action('init', $plugin_admin, 'register_product_type_taxonomy');
        $this->loader->add_action('init', $plugin_admin, 'register_packages_taxonomy');
        $this->loader->add_action('init', $plugin_admin, 'register_product_cpt');
        $this->loader->add_action('add_meta_boxes', $plugin_admin, 'register_multicolor_title_metabox');
        $this->loader->add_action('add_meta_boxes', $plugin_admin, 'register_quote_metabox');
        $this->loader->add_action('add_meta_boxes', $plugin_admin, 'register_nutrition_facts_metabox');
        $this->loader->add_action('add_meta_boxes', $plugin_admin, 'register_accent_color_metabox');
        $this->loader->add_action('save_post', $plugin_admin, 'save_multicolor_title');
        $this->loader->add_action('save_post', $plugin_admin, 'save_quote');
        $this->loader->add_action('save_post', $plugin_admin, 'save_nutrition_facts');
        $this->loader->add_action('save_post', $plugin_admin, 'save_accent_color');
    }

    /**
     * Register all of the hooks related to the public-facing functionality
     * of the plugin.
     */
    private function define_public_hooks()
    {
        $plugin_public = new NM_Products_Public($this->get_plugin_name(), $this->get_version());

        $this->loader->add_action('wp_enqueue_scripts', $plugin_public, 'enqueue_scripts');
        $this->loader->add_action('init', $plugin_public, 'add_shortcodes');
    }

    /**
     * Run the loader to execute all of the hooks with WordPress.
     */
    public function run()
    {
        $this->loader->run();
    }

    /**
     * The name of the plugin used to uniquely identify it within the context of
     * WordPress and to define internationalization functionality.
     */
    public function get_plugin_name()
    {
        return $this->plugin_name;
    }

    /**
     * The reference to the class that orchestrates the hooks with the plugin.
     */
    public function get_loader()
    {
        return $this->loader;
    }

    /**
     * Retrieve the version number of the plugin.
     */
    public function get_version()
    {
        return $this->version;
    }
}
