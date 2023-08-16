<?php

namespace HbPostGenerator;

use Faker\Factory;

class Generator
{
    public static function generateActionFormExec()
    {
        if(!empty($_POST['post-count'])) {

            if($_POST['post-count'] < 1 || $_POST['post-count'] > 100) {
                wp_redirect($_SERVER['HTTP_REFERER'] . "&status=error&error_type=incorrect_values");
                exit();
            }

            for ($i = 0; $i < $_POST['post-count']; $i++) {
                self::generateOnePost();
            }

            wp_redirect($_SERVER['HTTP_REFERER'] . "&status=success");

        } else {
            wp_redirect($_SERVER['HTTP_REFERER'] . '&status=error');
        }

        exit();
    }

    public static function generateOnePost()
    {
        $faker = Factory::create('fr_FR');

        wp_insert_post([
            'post_type' => 'post',
            'post_title' => $faker->realTextBetween(20,80),
            'post_content' => $faker->realTextBetween(250, 1000),
            'post_status' => 'publish',
            'post_date' => $faker->dateTimeBetween('-1 week', 'now')->format('Y-m-d H:i:s'),
        ]);
    }
}
