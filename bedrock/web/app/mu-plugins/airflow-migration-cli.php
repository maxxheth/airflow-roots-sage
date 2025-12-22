<?php
/**
 * Plugin Name: Airflow Migration CLI
 * Description: WP-CLI commands for migrating Meta Box data to ACF and mapping templates to pages
 * Version: 1.0.0
 */

if (!defined('WP_CLI') || !WP_CLI) {
    return;
}

class Airflow_Migration_CLI {
    
    /**
     * Field mappings from Meta Box to ACF
     * Format: meta_box_field_id => acf_field_name
     */
    private $field_mappings = [
        // Home page fields (with underscore prefix from Hyde frontmatter)
        '_hero_title' => 'hero_title',
        '_hero_description' => 'hero_description',
        '_heating_title' => 'heating_title',
        '_heating_description' => 'heating_description',
        '_cooling_card_title' => 'cooling_card_title',
        '_cooling_card_description' => 'cooling_card_description',
        '_maintenance_card_title' => 'maintenance_card_title',
        '_maintenance_card_description' => 'maintenance_card_description',
        '_geothermal_card_title' => 'geothermal_card_title',
        '_geothermal_card_description' => 'geothermal_card_description',
        
        // About page fields
        '_about_hero_title' => 'about_hero_title',
        '_about_hero_intro' => 'about_hero_intro',
        '_about_hero_description' => 'about_hero_description',
        '_about_mission_title' => 'about_mission_title',
        '_about_mission_paragraph_1' => 'about_mission_paragraph_1',
        '_about_mission_paragraph_2' => 'about_mission_paragraph_2',
        '_about_mission_paragraph_3' => 'about_mission_paragraph_3',
        '_about_values_title' => 'about_values_title',
        '_about_values_description' => 'about_values_description',
        '_about_community_title' => 'about_community_title',
        '_about_community_description' => 'about_community_description',
        '_about_timeline_title' => 'about_timeline_title',
        '_about_timeline_description' => 'about_timeline_description',
        
        // Services page fields
        '_services_tagline' => 'services_tagline',
        '_services_hero_title' => 'services_hero_title',
        '_services_hero_desc' => 'services_hero_desc',
        '_services_why_title' => 'services_why_title',
        '_services_why_desc' => 'services_why_desc',
    ];

    /**
     * Template mappings: slug => template file
     */
    private $template_mappings = [
        'index' => 'template-home',
        'home' => 'template-home',
        'about-us' => 'template-about',
        'about' => 'template-about',
        'services' => 'template-services',
    ];

    /**
     * Map templates to pages based on slug
     *
     * ## OPTIONS
     *
     * [--dry-run]
     * : Preview changes without writing to database
     *
     * [--page=<slug>]
     * : Process only a specific page by slug
     *
     * ## EXAMPLES
     *
     *     wp airflow map-templates
     *     wp airflow map-templates --dry-run
     *     wp airflow map-templates --page=about-us
     *
     * @when after_wp_load
     */
    public function map_templates($args, $assoc_args) {
        $dry_run = isset($assoc_args['dry-run']);
        $specific_page = $assoc_args['page'] ?? null;
        
        if ($dry_run) {
            WP_CLI::log("--- DRY RUN MODE ---\n");
        }
        
        $updated = 0;
        $skipped = 0;
        
        foreach ($this->template_mappings as $slug => $template) {
            if ($specific_page && $specific_page !== $slug) {
                continue;
            }
            
            $page = get_page_by_path($slug);
            
            if (!$page) {
                WP_CLI::warning("Page not found: {$slug}");
                $skipped++;
                continue;
            }
            
            $current_template = get_page_template_slug($page->ID);
            $template_file = "{$template}.blade.php";
            
            if ($current_template === $template_file) {
                WP_CLI::log("Already set: {$slug} -> {$template_file}");
                $skipped++;
                continue;
            }
            
            if ($dry_run) {
                WP_CLI::log("Would set: {$slug} (ID: {$page->ID}) -> {$template_file}");
            } else {
                update_post_meta($page->ID, '_wp_page_template', $template_file);
                WP_CLI::success("Set template: {$slug} (ID: {$page->ID}) -> {$template_file}");
            }
            
            $updated++;
        }
        
        WP_CLI::log("\n--- Summary ---");
        WP_CLI::log("Updated: {$updated}");
        WP_CLI::log("Skipped: {$skipped}");
    }

    /**
     * Migrate Meta Box data to ACF fields
     *
     * ## OPTIONS
     *
     * [--dry-run]
     * : Preview changes without writing to database
     *
     * [--page=<slug>]
     * : Process only a specific page by slug
     *
     * [--force]
     * : Overwrite existing ACF values
     *
     * ## EXAMPLES
     *
     *     wp airflow migrate-metabox-to-acf
     *     wp airflow migrate-metabox-to-acf --dry-run
     *     wp airflow migrate-metabox-to-acf --page=about-us
     *     wp airflow migrate-metabox-to-acf --force
     *
     * @when after_wp_load
     */
    public function migrate_metabox_to_acf($args, $assoc_args) {
        $dry_run = isset($assoc_args['dry-run']);
        $specific_page = $assoc_args['page'] ?? null;
        $force = isset($assoc_args['force']);
        
        if ($dry_run) {
            WP_CLI::log("--- DRY RUN MODE ---\n");
        }
        
        // Get all pages to process
        $pages_query = [
            'post_type' => 'page',
            'post_status' => 'any',
            'posts_per_page' => -1,
        ];
        
        if ($specific_page) {
            $pages_query['name'] = $specific_page;
        }
        
        $pages = get_posts($pages_query);
        
        if (empty($pages)) {
            WP_CLI::warning('No pages found to process.');
            return;
        }
        
        WP_CLI::log(sprintf("Processing %d page(s)...\n", count($pages)));
        
        $total_migrated = 0;
        $total_skipped = 0;
        
        foreach ($pages as $page) {
            WP_CLI::log("--- Page: {$page->post_name} (ID: {$page->ID}) ---");
            
            $migrated = 0;
            $skipped = 0;
            
            foreach ($this->field_mappings as $metabox_key => $acf_key) {
                // Get Meta Box value (stored with underscore prefix typically)
                $metabox_value = get_post_meta($page->ID, $metabox_key, true);
                
                if (empty($metabox_value)) {
                    continue;
                }
                
                // Check if ACF field already has value
                $existing_acf_value = get_field($acf_key, $page->ID);
                
                if (!empty($existing_acf_value) && !$force) {
                    WP_CLI::log("  Skipped (ACF has value): {$metabox_key} -> {$acf_key}");
                    $skipped++;
                    continue;
                }
                
                if ($dry_run) {
                    $preview = strlen($metabox_value) > 50 
                        ? substr($metabox_value, 0, 50) . '...' 
                        : $metabox_value;
                    WP_CLI::log("  Would migrate: {$metabox_key} -> {$acf_key}");
                    WP_CLI::log("    Value: {$preview}");
                } else {
                    update_field($acf_key, $metabox_value, $page->ID);
                    WP_CLI::log("  Migrated: {$metabox_key} -> {$acf_key}");
                }
                
                $migrated++;
            }
            
            WP_CLI::log("  Migrated: {$migrated}, Skipped: {$skipped}\n");
            $total_migrated += $migrated;
            $total_skipped += $skipped;
        }
        
        WP_CLI::log("--- Total Summary ---");
        WP_CLI::log("Total Fields Migrated: {$total_migrated}");
        WP_CLI::log("Total Fields Skipped: {$total_skipped}");
        
        if (!$dry_run && $total_migrated > 0) {
            WP_CLI::success("Migration complete!");
        }
    }

    /**
     * Verify migration status
     *
     * ## OPTIONS
     *
     * [--page=<slug>]
     * : Verify only a specific page by slug
     *
     * ## EXAMPLES
     *
     *     wp airflow verify-migration
     *     wp airflow verify-migration --page=about-us
     *
     * @when after_wp_load
     */
    public function verify_migration($args, $assoc_args) {
        $specific_page = $assoc_args['page'] ?? null;
        
        WP_CLI::log("=== Migration Verification Report ===\n");
        
        // Check templates
        WP_CLI::log("--- Template Assignments ---");
        foreach ($this->template_mappings as $slug => $template) {
            if ($specific_page && $specific_page !== $slug) {
                continue;
            }
            
            $page = get_page_by_path($slug);
            
            if (!$page) {
                WP_CLI::warning("Page not found: {$slug}");
                continue;
            }
            
            $current_template = get_page_template_slug($page->ID);
            $expected = "{$template}.blade.php";
            
            if ($current_template === $expected) {
                WP_CLI::log("✓ {$slug}: {$expected}");
            } else {
                WP_CLI::warning("✗ {$slug}: Expected {$expected}, got " . ($current_template ?: '(default)'));
            }
        }
        
        // Check ACF fields
        WP_CLI::log("\n--- ACF Field Data ---");
        
        $pilot_pages = ['index', 'home', 'about-us', 'services'];
        
        foreach ($pilot_pages as $slug) {
            if ($specific_page && $specific_page !== $slug) {
                continue;
            }
            
            $page = get_page_by_path($slug);
            
            if (!$page) {
                continue;
            }
            
            WP_CLI::log("\nPage: {$slug} (ID: {$page->ID})");
            
            $has_data = false;
            foreach ($this->field_mappings as $metabox_key => $acf_key) {
                $value = get_field($acf_key, $page->ID);
                
                if (!empty($value)) {
                    $preview = strlen($value) > 40 ? substr($value, 0, 40) . '...' : $value;
                    WP_CLI::log("  ✓ {$acf_key}: {$preview}");
                    $has_data = true;
                }
            }
            
            if (!$has_data) {
                WP_CLI::log("  (No ACF data found)");
            }
        }
        
        WP_CLI::log("\n=== End Report ===");
    }

    /**
     * List all pages and their templates
     *
     * ## EXAMPLES
     *
     *     wp airflow list-pages
     *
     * @when after_wp_load
     */
    public function list_pages($args, $assoc_args) {
        $pages = get_posts([
            'post_type' => 'page',
            'post_status' => 'any',
            'posts_per_page' => -1,
            'orderby' => 'title',
            'order' => 'ASC',
        ]);
        
        if (empty($pages)) {
            WP_CLI::warning('No pages found.');
            return;
        }
        
        WP_CLI::log("=== Pages in Database ===\n");
        WP_CLI::log(sprintf("%-30s %-8s %-40s %s", "SLUG", "ID", "TITLE", "TEMPLATE"));
        WP_CLI::log(str_repeat("-", 100));
        
        foreach ($pages as $page) {
            $template = get_page_template_slug($page->ID) ?: '(default)';
            $title = strlen($page->post_title) > 38 
                ? substr($page->post_title, 0, 38) . '..' 
                : $page->post_title;
            
            WP_CLI::log(sprintf(
                "%-30s %-8s %-40s %s",
                $page->post_name,
                $page->ID,
                $title,
                $template
            ));
        }
        
        WP_CLI::log("\nTotal: " . count($pages) . " pages");
    }
}

WP_CLI::add_command('airflow', 'Airflow_Migration_CLI');
