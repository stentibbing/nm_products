=== Nordic Milk Products ===
Contributors: https://www.kbuum.com
Author https://www.taifuun.ee
Tags: products, product types, packaging
Requires at least: 3.0.1
Tested up to: 3.4
Stable tag: 4.3
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

== Description ==

This plugin creates custom post type for Products and custom taxonomies Product Types and Packaging. Products post
type supports title, thumbnail, content, excerpt and additional meta info field for nutrient information.

Following shortcodes are available:

    - list_products
      Renders list of products. Accepts string product_type as an argument which filters products by product
      type taxonomy.
    - list_packages
      Renders list of packages taxonomies. 
    - show_products
      Renders products in a grid view with thumbnail, title and excerpt visible.

If both list of products and packages are rendered, products with certain packages taxonomies and vice versa are 
highlighted in the public side.

Automatic updating is available via Git Updater.

== Installation ==

1. Upload `nordic_milk.php` to the `/wp-content/plugins/` directory
2. Activate the plugin through the 'Plugins' menu in WordPress
3. Use one of the shortcodes to render prodcuts list, packages list or products in grid view in the public page.