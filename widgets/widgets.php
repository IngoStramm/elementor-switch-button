<?php

function register_oembed_widget($widgets_manager)
{
    require_once 'elementor-switch-button-widget.php';
    $widgets_manager->register(new \Elementor_Switch_Button_Widget());
}

add_action('elementor/widgets/register', 'register_oembed_widget');
