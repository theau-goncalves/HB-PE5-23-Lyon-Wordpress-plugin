<?php

namespace HbPostGenerator;

use Faker\Factory;
class HbPostGenerator
{

    public static function init(): void
    {
        add_action( 'admin_menu', [self::class, 'addCustomMenuItem']);
        add_action('admin_action_hb_generate_post', [Generator::class, 'generateActionFormExec']);
        add_action('admin_enqueue_scripts', [self::class, 'addAdminStyle']);
    }


    public static function addCustomMenuItem(): void
    {
        add_menu_page(
            __( 'Post Generator', 'textdomain' ),
            'Post Generator',
            'update_core',
            'hb-post-generator/admin-page.php',
            '',
            'dashicons-database-import',
            80
        );
    }

    public static function addAdminStyle() {
        wp_enqueue_style('hb-admin-styles',plugin_dir_url( __DIR__ ) .'assets/css/style.css');
    }
}
