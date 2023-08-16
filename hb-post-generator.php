<?php
/*
 * Plugin Name:       Human Booster post generator
 * Description:       Generate fake posts
 * Version:           1.0.0
 * Requires at least: 6.0
 * Requires PHP:      8.0
 * Author:            Théau Goncalves | Drosalys
 * Author URI:        https://drosalys.fr/
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       hb-post-generator
 */

use HbPostGenerator\HbPostGenerator;

require_once 'vendor/autoload.php';

HbPostGenerator::init();
