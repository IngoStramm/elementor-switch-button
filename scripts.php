<?php

add_action('wp_enqueue_scripts', 'esb_frontend_scripts');

function esb_frontend_scripts()
{

    $min = (in_array($_SERVER['REMOTE_ADDR'], array('127.0.0.1', '::1', '10.0.0.3'))) ? '' : '.min';

    if (empty($min)) :
        wp_enqueue_script('elementor-switch-button-livereload', 'http://localhost:35729/livereload.js?snipver=1', array(), null, true);
    endif;

    wp_register_script('elementor-switch-button-script', ESB_URL . 'assets/js/elementor-switch-button' . $min . '.js', array('jquery'), '1.0.0', true);

    wp_enqueue_script('elementor-switch-button-script');

    wp_localize_script('elementor-switch-button-script', 'ajax_object', array('ajax_url' => admin_url('admin-ajax.php')));
    wp_enqueue_style('elementor-switch-button-style', ESB_URL . 'assets/css/elementor-switch-button.css', array(), false, 'all');
}
