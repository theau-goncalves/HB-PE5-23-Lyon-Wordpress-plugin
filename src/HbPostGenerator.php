<?php

namespace HbPostGenerator;
class HbPostGenerator
{

    public static function init(): void
    {
        add_action( 'admin_menu', [self::class, 'addCustomMenuItem']);
        add_action('admin_action_hb_generate_post', [self::class, 'generatePost']);
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

    public static function generatePost()
    {
        if(!empty($_POST['post-count'])) {
            for ($i = 0; $i < $_POST['post-count']; $i++) {
                wp_insert_post([
                    'post_type' => 'post',
                    'post_title' => "Post" . uniqid(),
                    'post_content' => '',
                    'post_status' => 'publish'
                ]);
            }

            wp_redirect($_SERVER['HTTP_REFERER'] . "&status=success");

        } else {
            wp_redirect($_SERVER['HTTP_REFERER']);
        }

        exit();
    }
}
