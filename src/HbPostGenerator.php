<?php

namespace HbPostGenerator;

use Faker\Factory;
class HbPostGenerator
{

    public static function init(): void
    {
        add_action( 'admin_menu', [self::class, 'addCustomMenuItem']);
        add_action('admin_action_hb_generate_post', [self::class, 'generatePosts']);
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

    public static function generatePosts()
    {

        $faker = Factory::create();

        if(!empty($_POST['post-count'])) {

            if($_POST['post-count'] < 1 || $_POST['post-count'] > 100) {
                wp_redirect($_SERVER['HTTP_REFERER'] . "&status=error&error_type=incorrect_values");
                exit();
            }

            for ($i = 0; $i < $_POST['post-count']; $i++) {
                wp_insert_post([
                    'post_type' => 'post',
                    'post_title' => $faker->sentence,
                    'post_content' => '',
                    'post_status' => 'publish'
                ]);
            }

            wp_redirect($_SERVER['HTTP_REFERER'] . "&status=success");

        } else {
            wp_redirect($_SERVER['HTTP_REFERER'] . '&status=error');
        }

        exit();
    }

    public static function addAdminStyle() {
        wp_enqueue_style('hb-admin-styles',plugin_dir_url( __DIR__ ) .'assets/css/style.css');
    }
}
