<?php

namespace HbPostGenerator;
class HbPostGenerator
{

    public static function init()
    {
        add_action( 'admin_menu', [self::class, 'addCustomMenuItem']);
    }

    public static function addCustomMenuItem() {
        add_menu_page(
            __( 'Post Generator', 'textdomain' ),
            'Post Generator',
            'update_core',
            'hb-post-generator/admin.php',
            '',
            'dashicons-database-import',
            80
        );
    }
}
