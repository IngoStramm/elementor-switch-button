<?php

/**
 * Plugin Name: Elementor Switch Button
 * Plugin URI: https://agencialaf.com
 * Description: Descrição do Elementor Switch Button.
 * Version: 0.0.1
 * Author: Ingo Stramm
 * Text Domain: esb
 * License: GPLv2
 */

defined('ABSPATH') or die('No script kiddies please!');

define('ESB_DIR', plugin_dir_path(__FILE__));
define('ESB_URL', plugin_dir_url(__FILE__));

function esb_debug($debug)
{
    echo '<pre>';
    var_dump($debug);
    echo '</pre>';
}

require_once 'tgm/tgm.php';
require_once 'classes/classes.php';
require_once 'scripts.php';
require_once 'widgets/widgets.php';

require 'plugin-update-checker-4.10/plugin-update-checker.php';
$updateChecker = Puc_v4_Factory::buildUpdateChecker(
    'https://raw.githubusercontent.com/IngoStramm/elementor-switch-button/master/info.json',
    __FILE__,
    'elementor-switch-button'
);
