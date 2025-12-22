<?php

/**
 * WP CLI Command to import menu from JSON
 * 
 * Usage: wp airflow import_menu
 */

namespace App\Commands;

use WP_CLI;

class ImportMenu
{
    /**
     * Import navigation menu from JSON file
     *
     * ## EXAMPLES
     *
     *     wp airflow import_menu
     *
     * @when after_wp_load
     */
    public function __invoke($args, $assoc_args)
    {
        $menu_file = get_theme_file_path('resources/data/menu-primary_navigation.json');
        
        if (!file_exists($menu_file)) {
            WP_CLI::error("Menu file not found: {$menu_file}");
            return;
        }

        $menu_data = json_decode(file_get_contents($menu_file), true);
        
        if (!$menu_data) {
            WP_CLI::error("Failed to parse menu JSON");
            return;
        }

        // Create or get the menu
        $menu_name = 'Primary Navigation';
        $menu_exists = wp_get_nav_menu_object($menu_name);
        
        if ($menu_exists) {
            WP_CLI::warning("Menu '{$menu_name}' already exists. Deleting and recreating...");
            wp_delete_nav_menu($menu_exists->term_id);
        }

        $menu_id = wp_create_nav_menu($menu_name);
        
        if (is_wp_error($menu_id)) {
            WP_CLI::error("Failed to create menu: " . $menu_id->get_error_message());
            return;
        }

        WP_CLI::log("Created menu: {$menu_name}");

        // Import menu items
        $imported = 0;
        foreach ($menu_data as $item) {
            $this->import_menu_item($item, $menu_id);
            $imported++;
        }

        // Set menu location
        $locations = get_theme_mod('nav_menu_locations');
        $locations['primary_navigation'] = $menu_id;
        set_theme_mod('nav_menu_locations', $locations);

        WP_CLI::success("Imported {$imported} top-level menu items with children");
        WP_CLI::success("Menu assigned to 'primary_navigation' location");
    }

    /**
     * Recursively import menu item and its children
     */
    private function import_menu_item($item, $menu_id, $parent_id = 0)
    {
        // Determine the menu item type and object
        $item_data = [
            'menu-item-title' => $item['text'],
            'menu-item-url' => $item['original_url'] ?? $item['url'],
            'menu-item-status' => 'publish',
            'menu-item-parent-id' => $parent_id,
        ];

        // If it's a page type, try to find the page by slug
        if ($item['type'] === 'post_type' && $item['object'] === 'page') {
            // Extract slug from URL
            $url = $item['original_url'] ?? $item['url'];
            $slug = trim(parse_url($url, PHP_URL_PATH), '/');
            
            $page = get_page_by_path($slug);
            if ($page) {
                $item_data['menu-item-object-id'] = $page->ID;
                $item_data['menu-item-object'] = 'page';
                $item_data['menu-item-type'] = 'post_type';
                unset($item_data['menu-item-url']); // Use page link instead
            } else {
                // Page not found, use custom link
                $item_data['menu-item-type'] = 'custom';
            }
        } else {
            // Custom link
            $item_data['menu-item-type'] = 'custom';
        }

        $menu_item_id = wp_update_nav_menu_item($menu_id, 0, $item_data);

        if (is_wp_error($menu_item_id)) {
            WP_CLI::warning("Failed to import menu item '{$item['text']}': " . $menu_item_id->get_error_message());
            return;
        }

        WP_CLI::log("  → Imported: {$item['text']}");

        // Import children
        if (isset($item['children']) && is_array($item['children'])) {
            foreach ($item['children'] as $child) {
                $this->import_menu_item($child, $menu_id, $menu_item_id);
            }
        }
    }
}

// Only register WP_CLI command when WP_CLI is available
if (defined('WP_CLI') && WP_CLI) {
    WP_CLI::add_command('airflow import_menu', 'App\\Commands\\ImportMenu');
}
