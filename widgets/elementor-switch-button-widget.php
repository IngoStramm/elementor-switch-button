<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

/**
 * Elementor List Widget.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */
class Elementor_Switch_Button_Widget extends \Elementor\Widget_Base
{

    /**
     * Get widget name.
     *
     * Retrieve list widget name.
     *
     * @since 1.0.0
     * @access public
     * @return string Widget name.
     */
    public function get_name()
    {
        return 'switch-button';
    }

    /**
     * Get widget title.
     *
     * Retrieve list widget title.
     *
     * @since 1.0.0
     * @access public
     * @return string Widget title.
     */
    public function get_title()
    {
        return esc_html__('Switch Button', 'esb');
    }

    /**
     * Get widget icon.
     *
     * Retrieve list widget icon.
     *
     * @since 1.0.0
     * @access public
     * @return string Widget icon.
     */
    public function get_icon()
    {
        return 'eicon-dual-button';
    }

    /**
     * Get widget categories.
     *
     * Retrieve the list of categories the list widget belongs to.
     *
     * @since 1.0.0
     * @access public
     * @return array Widget categories.
     */
    public function get_categories()
    {
        return ['basic'];
    }

    /**
     * Get widget keywords.
     *
     * Retrieve the list of keywords the list widget belongs to.
     *
     * @since 1.0.0
     * @access public
     * @return array Widget keywords.
     */
    public function get_keywords()
    {
        return ['switch', 'toggle', 'button', 'btn'];
    }

    protected function register_controls()
    {

        $this->start_controls_section(
            'option_1_content_section',
            [
                'label' => esc_html__('Opção #1', 'esb'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'option_1_title',
            [
                'label' => esc_html__('Título #1', 'esb'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Opção #1', 'esb'),
                'placeholder' => esc_html__('Digite seu título aqui', 'esb'),
            ]
        );

        $this->add_control(
            'option_1_content',
            [
                'label' => esc_html__('Conteúdo #1', 'esb'),
                'type' => \Elementor\Controls_Manager::WYSIWYG,
                'default' => esc_html__('Lorem ipsum dolor...', 'esb'),
                'placeholder' => esc_html__('Digite seu conteúdo aqui', 'esb'),
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'option_2_content_section',
            [
                'label' => esc_html__('Opção #2', 'esb'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'option_2_title',
            [
                'label' => esc_html__('Título #2', 'esb'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Opção #2', 'esb'),
                'placeholder' => esc_html__('Digite seu título aqui', 'esb'),
            ]
        );

        $this->add_control(
            'option_2_content',
            [
                'label' => esc_html__('Conteúdo #2', 'esb'),
                'type' => \Elementor\Controls_Manager::WYSIWYG,
                'default' => esc_html__('Lorem ipsum dolor...', 'esb'),
                'placeholder' => esc_html__('Digite seu conteúdo aqui', 'esb'),
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'style_section',
            [
                'label' => esc_html__('Estilo', 'esb'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'active_control_bgcolor',
            [
                'label' => esc_html__('Cor de Fundo da opção ativa', 'esb'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .control' => 'bgcolor: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'active_control_txtcolor',
            [
                'label' => esc_html__('Cor de Texto da opção ativa', 'esb'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .control' => 'txtcolor: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'default_control_bgcolor',
            [
                'label' => esc_html__('Cor de Fundo padrão', 'esb'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .control' => 'bgcolor: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'default_control_txtcolor',
            [
                'label' => esc_html__('Cor de Texto padrão', 'esb'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .control' => 'txtcolor: {{VALUE}}',
                ],
            ]
        );

        $this->end_controls_section();
    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();
        $output = '';
        $output .= '
        <style>
        .esb-wrapper .esb-controls label {
                background-color: ' . $settings['default_control_bgcolor'] . ';
                color: ' . $settings['default_control_txtcolor'] . ';
        }
        .esb-wrapper .esb-controls label.active {
                background-color: ' . $settings['active_control_bgcolor'] . ';
                color: ' . $settings['active_control_txtcolor'] . ';
        }
        </style>
        ';
        $output .=   '<div class="esb-wrapper" data-esb-wrapper>';
        $output .=      '<div class="esb-controls" data-toggle="buttons" data-esb-controls>
                            <label for="option1" class="active">
                                <input type="radio" name="selected-option" id="option1" value="data-esb-panel-1" checked="">';
        $output .= $settings['option_1_title'];
        $output .=          '</label>
                            <label for="option2" class="">
                                <input type="radio" name="selected-option" id="option2" value="data-esb-panel-2">';
        $output .= $settings['option_2_title'];
        $output .=          '</label>
                        </div><!-- /.esb-controls -->';
        $output .=      '<div class="esb-panels" data-esb-panels>';
        $output .=          '<div class="esb-panel active" data-esb-panel-1>';
        $output .=              $settings['option_1_content'];
        $output .=          '</div>
                            <div class="esb-panel" data-esb-panel-2>';
        $output .=              $settings['option_2_content'];
        $output .=          '</div>';
        $output .=      '</div><!-- /.esb-panels -->';
        $output .=   '</div><!-- /.esb-wrapper -->';
        echo $output;
    }

    protected function content_template()
    {
?>
        <style>
            .esb-wrapper .esb-controls label {
                background-color: {{{ settings.default_control_bgcolor }}};
                color: {{{ settings.default_control_txtcolor }}};
            }

            .esb-wrapper .esb-controls label.active {
                background-color: {{{ settings.active_control_bgcolor }}};
                color: {{{ settings.active_control_txtcolor }}};
            }
        </style>
        <div class="esb-wrapper" data-esb-wrapper>
            <div class="esb-controls" data-toggle="buttons" data-esb-controls>
                <label for="option1" class="active">
                    <input type="radio" name="selected-option" id="option1" value="data-esb-panel-1" checked="">
                    {{{ settings.option_1_title }}}
                </label>
                <label for=" option2" class="">
                    <input type="radio" name="selected-option" id="option2" value="data-esb-panel-2">
                    {{{ settings.option_2_title }}}
                </label>
            </div><!-- /.esb-controls -->
            <div class="esb-panels" data-esb-panels>
                <div class="esb-panel active" data-esb-panel-1>{{{ settings.option_1_content }}}</div>
                <div class="esb-panel" data-esb-panel-2>{{{ settings.option_2_content }}}</div>
            </div><!-- /.esb-panels -->
        </div><!-- /.esb-wrapper -->
<?php
    }
}
