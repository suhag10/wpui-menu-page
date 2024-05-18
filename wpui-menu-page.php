<?php
/**
 * Plugin Name:     WPUI Menu Page
 * Description:     A plugin for WPUI Menu Page in WordPress.
 * Version:         1.0.0
 * Author:          Suhag Ahmed
 * Author URI:      https://github.com/suhag10/
 * Plugin URI:      #
 * Text Domain:     wpui-menu-page
 * Requires at least: 5.2
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

class WPUI_Menu_Page {
    function __construct() {
        add_action('init', [$this, 'init']);
    }

    function init() {
        $this->save_form();
        add_action('admin_menu', [$this, 'add_admin_menu']);
        
        // admin enqueue script - tailwind cdn
        add_action('admin_enqueue_scripts', [$this, 'admin_enqueue_scripts']);
    }

    function add_admin_menu() {
        add_menu_page(
            __('WPUI Menu', 'wpui-menu-page'),
            __('WPUI Menu', 'wpui-menu-page'),
            'manage_options',
            'wpui-menu',
            [$this, 'wpui_menu_page_content'],
            'dashicons-shield',
            20
        );

        // add one submenu pages 
        add_submenu_page(
            'wpui-menu',
            __('Submenu One', 'wpui-menu-page'),
            __('Submenu One', 'wpui-menu-page'),
            'manage_options',
            'submenu-one',
            [$this, 'submenu_page_content_one']
        );

        // add two submenu pages 
        add_submenu_page(
            'wpui-menu',
            __('Submenu Two', 'wpui-menu-page'),
            __('Submenu Two', 'wpui-menu-page'),
            'manage_options',
            'submenu-two',
            [$this, 'submenu_page_content_two']
        );
    }

    function wpui_menu_page_content() {
        include_once (plugin_dir_path(__FILE__) . 'pages/admin.php');
    }

    function submenu_page_content_one() {
        include_once (plugin_dir_path(__FILE__) . 'pages/submenuOne.php');
    }

    function submenu_page_content_two() {
        include_once (plugin_dir_path(__FILE__) . 'pages/submenuTwo.php');
    }

    function admin_enqueue_scripts( $hook ) {

        // die($hook); // Check-in page slug

        if ($hook == 'toplevel_page_wpui-menu' || $hook == 'wpui-menu_page_submenu-one' || $hook == 'wpui-menu_page_submenu-two') {
            wp_enqueue_script('wpui-menu-page-tailwind', '//cdn.tailwindcss.com', [], '1.0', [
                'in_footer' => true,
                'strategy' => 'defer'
            ]);
        }
    }

    function save_form(){
        if(isset($_POST['action']) && $_POST['action'] == 'save_name'){
            if(!isset($_POST['save_name_nonce']) || !wp_verify_nonce($_POST['save_name_nonce'], 'save_name')){
                return;
            }
            if(!current_user_can('manage_options')){
                return;
            }
            if(!isset($_POST['user_name']) || empty($_POST['user_name'])){
                return;
            }
            update_option('user_name', sanitize_text_field($_POST['user_name']));
        }
    }

}

new WPUI_Menu_Page();