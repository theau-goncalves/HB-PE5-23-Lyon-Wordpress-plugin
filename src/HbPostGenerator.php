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
        dump($_POST);
        die;
    }
}
