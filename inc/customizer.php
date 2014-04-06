<?php
/**
 * Tatva Theme Customizer support
 *
 * @package WordPress
 * @subpackage Tatva
 * @since Tatva 1.0
 */

/**
 * Implement Theme Customizer additions and adjustments.
 *
 * @since Tatva 1.0
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function tatva_customize_register($wp_customize) {

    /** ===============
     * Extends CONTROLS class to add textarea
     */
    class tatva_customize_textarea_control extends WP_Customize_Control {

        public $type = 'textarea';

        public function render_content() {
            ?>

            <label>
                <span class="customize-control-title"><?php echo esc_html($this->label); ?></span>
                <textarea rows="5" style="width:98%;" <?php $this->link(); ?>><?php echo esc_textarea($this->value()); ?></textarea>
            </label>

            <?php
        }

    }

    // Displays a list of categories in dropdown
    class WP_Customize_Dropdown_Categories_Control extends WP_Customize_Control {

        public $type = 'dropdown-categories';

        public function render_content() {
            $dropdown = wp_dropdown_categories(
                    array(
                        'name' => '_customize-dropdown-categories-' . $this->id,
                        'echo' => 0,
                        'hide_empty' => false,
                        'show_option_none' => '&mdash; ' . __('Select', 'tatva') . ' &mdash;',
                        'hide_if_empty' => false,
                        'selected' => $this->value(),
                    )
            );

            $dropdown = str_replace('<select', '<select ' . $this->get_link(), $dropdown);

            printf(
                    '<label class="customize-control-select"><span class="customize-control-title">%s</span> %s</label>', $this->label, $dropdown
            );
        }

    }


    // Add new section for theme layout and color schemes
    $wp_customize->add_section('tatva_theme_layout_settings', array(
        'title' => __('Layout & Color Scheme', 'tatva'),
        'priority' => 30,
    ));

    // Add setting for theme layout
    $wp_customize->add_setting('tatva_theme_layout', array(
        'default' => 'full-width',
    ));

    $wp_customize->add_control('tatva_theme_layout', array(
        'label' => 'Theme Layout',
        'section' => 'tatva_theme_layout_settings',
        'type' => 'radio',
        'choices' => array(
            'full-width' => __('Full Width', 'smartshop'),
            'boxed' => __('Boxed', 'smartshop'),
        ),
    ));

    
    // Add color scheme options
   
    $wp_customize->add_setting('tatva_color_scheme', array(
        'default' => 'blue',
    ));

    $wp_customize->add_control('tatva_color_scheme', array(
        'label' => 'Color Schemes',
        'section' => 'tatva_theme_layout_settings',
        'default' => 'red',
        'type' => 'radio',
        'choices' => array(
            'blue' => __('Blue', 'tatva'),
            'red' => __('Red', 'tatva'),
            'green' => __('Green', 'tatva'),
            'gray' => __('Gray', 'tatva'),
            'purple' => __('Purple', 'tatva'),
            'orange' => __('Orange', 'tatva'),
            'brown' => __('Brown', 'tatva'),
            'pink' => __('Pink', 'tatva'),
        ),
    ));

    // Add new section for displaying Featured Posts on Front Page
    $wp_customize->add_section('tatva_front_page_post_options', array(
        'title' => __('Front Page Featured Posts', 'tatva'),
        'description' => __('Settings for displaying featured posts on Front Page', 'tatva'),
        'priority' => 60,
    ));
    // enable featured posts on front page?
    $wp_customize->add_setting('tatva_front_featured_posts_check', array('default' => 0));
    $wp_customize->add_control('tatva_front_featured_posts_check', array(
        'label' => __('Show featured posts on Front Page', 'tatva'),
        'section' => 'tatva_front_page_post_options',
        'priority' => 10,
        'type' => 'checkbox',
    ));

    // Front featured posts section headline
    $wp_customize->add_setting('tatva_front_featured_posts_title', array('default' => __('Latest Posts', 'tatva')));
    $wp_customize->add_control('tatva_front_featured_posts_title', array(
        'label' => __('Main Title', 'tatva'),
        'section' => 'tatva_front_page_post_options',
        'settings' => 'tatva_front_featured_posts_title',
        'priority' => 10,
    ));

    // select number of posts for featured posts on front page
    $wp_customize->add_setting('tatva_front_featured_posts_count', array('default' => 4));
    $wp_customize->add_control('tatva_front_featured_posts_count', array(
        'label' => __('Number of posts to display (multiple of 4)', 'tatva'),
        'section' => 'tatva_front_page_post_options',
        'settings' => 'tatva_front_featured_posts_count',
        'priority' => 20,
    ));

    // select category for featured posts 
    $wp_customize->add_setting('tatva_front_featured_posts_cat', array('default' => 0));
    $wp_customize->add_control(new WP_Customize_Dropdown_Categories_Control($wp_customize, 'tatva_front_post_category', array(
        'label' => __('Post Category', 'tatva'),
        'section' => 'tatva_front_page_post_options',
        'type' => 'dropdown-categories',
        'settings' => 'tatva_front_featured_posts_cat',
        'priority' => 20,
    )));

    // featured post read more link
    $wp_customize->add_setting('tatva_front_featured_link_text', array('default' => __('Read more', 'tatva')));
    $wp_customize->add_control('tatva_front_featured_link_text', array(
        'label' => __('Posts Read More Link Text', 'tatva'),
        'section' => 'tatva_front_page_post_options',
        'settings' => 'tatva_front_featured_link_text',
        'priority' => 30,
    ));

    /** ===============
     * Easy Digital Downloads Options
     */
    // only if EDD is activated
    if (class_exists('Easy_Digital_Downloads')) {
        $wp_customize->add_section('tatva_edd_options', array(
            'title' => __('EDD Store Page', 'tatva'),
            'description' => __('All other EDD options are under Dashboard => Downloads.', 'tatva'),
            'priority' => 60,
        ));
        // store product archive headline
        $wp_customize->add_setting('tatva_edd_store_archives_title', array('default' => null));
        $wp_customize->add_control('tatva_edd_store_archives_title', array(
            'label' => __('Store/Product Archives Main Title', 'tatva'),
            'section' => 'tatva_edd_options',
            'settings' => 'tatva_edd_store_archives_title',
            'priority' => 10,
        ));
        // store product archive description
        $wp_customize->add_setting('tatva_edd_store_archives_description', array('default' => null));
        $wp_customize->add_control(new tatva_customize_textarea_control($wp_customize, 'tatva_edd_store_archives_description', array(
            'label' => __('Store/Product Archives Description', 'tatva'),
            'section' => 'tatva_edd_options',
            'settings' => 'tatva_edd_store_archives_description',
            'priority' => 20,
        )));
        // product read more link
        $wp_customize->add_setting('tatva_product_view_details', array('default' => __('View Details', 'tatva')));
        $wp_customize->add_control('tatva_product_view_details', array(
            'label' => __('Store Item Details Link Text', 'tatva'),
            'section' => 'tatva_edd_options',
            'settings' => 'tatva_product_view_details',
            'priority' => 30,
        ));
        // store archive item count
        $wp_customize->add_setting('tatva_store_archive_count', array('default' => 9));
        $wp_customize->add_control('tatva_store_archive_count', array(
            'label' => __('Store Archive Item Count', 'tatva'),
            'section' => 'tatva_edd_options',
            'settings' => 'tatva_store_archive_count',
            'priority' => 40,
        ));
        

        /* ========================================================= */
        // Add new section for EDD featured products on Front Page
        /* ========================================================= */
        $wp_customize->add_section('tatva_edd_front_page_options', array(
            'title' => __('EDD Front Page', 'tatva'),
            'description' => __('Settings for displaying featured products on Front Page', 'tatva'),
            'priority' => 60,
        ));
        // enable featured products on front page?
        $wp_customize->add_setting('tatva_edd_front_featured_products', array('default' => 0));
        $wp_customize->add_control('tatva_edd_front_featured_products', array(
            'label' => __('Show featured products on Front Page', 'tatva'),
            'section' => 'tatva_edd_front_page_options',
            'priority' => 10,
            'type' => 'checkbox',
        ));
        // Front featured products section headline
        $wp_customize->add_setting('tatva_edd_front_featured_title', array('default' => __('Latest Products', 'tatva')));
        $wp_customize->add_control('tatva_edd_front_featured_title', array(
            'label' => __('Main Title', 'tatva'),
            'section' => 'tatva_edd_front_page_options',
            'settings' => 'tatva_edd_front_featured_title',
            'priority' => 10,
        ));

        // store front item count
        $wp_customize->add_setting('tatva_edd_store_front_count', array('default' => 3));
        $wp_customize->add_control('tatva_edd_store_front_count', array(
            'label' => __('Number of products to display', 'tatva'),
            'section' => 'tatva_edd_front_page_options',
            'settings' => 'tatva_edd_store_front_count',
            'priority' => 20,
        ));
        // sotre link text
        $wp_customize->add_setting('tatva_edd_store_link_text', array('default' => __('Browse All Products', 'tatva')));
        $wp_customize->add_control('tatva_edd_store_link_text', array(
            'label' => __('Store Link Text', 'tatva'),
            'section' => 'tatva_edd_front_page_options',
            'settings' => 'tatva_edd_store_link_text',
            'priority' => 30,
        ));
        // sotre link
        $wp_customize->add_setting('tatva_edd_store_link_url', array('default' => __('', 'tatva')));
        $wp_customize->add_control('tatva_edd_store_link_url', array(
            'label' => __('Store Page Link URL', 'tatva'),
            'section' => 'tatva_edd_front_page_options',
            'settings' => 'tatva_edd_store_link_url',
            'priority' => 40,
        ));
    }
    
     // Add footer text section
    $wp_customize->add_section('tatva_footer', array(
        'title' => 'Footer Text', // The title of section
        'priority' => 70,
    ));

    $wp_customize->add_setting('tatva_footer_footer_text', array(
        'default' => null,
    ));
    $wp_customize->add_control(new tatva_customize_textarea_control($wp_customize, 'tatva_footer_footer_text', array(
        'section' => 'tatva_footer', // id of section to which the setting belongs
        'settings' => 'tatva_footer_footer_text',
    )));

    
    // Add custom CSS section
    $wp_customize->add_section('tatva_custom_css', array(
        'title' => 'Custom CSS', // The title of section
        'priority' => 80,
    ));
    
    $wp_customize->add_setting('tatva_custom_css');
    
    $wp_customize->add_control(new tatva_customize_textarea_control($wp_customize, 'tatva_custom_css', array(
        'section' => 'tatva_custom_css', // id of section to which the setting belongs
        'settings' => 'tatva_custom_css', 
    )));
    
    // Add postMessage for EDD store title and description
    $wp_customize->get_setting('tatva_edd_store_archives_title')->transport = 'postMessage';
    $wp_customize->get_setting('tatva_edd_store_archives_description')->transport = 'postMessage';

    // Add postMessage for EDD front page settings
    $wp_customize->get_setting('tatva_edd_front_featured_title')->transport = 'postMessage';
    $wp_customize->get_setting('tatva_edd_store_link_text')->transport = 'postMessage';
    $wp_customize->get_setting('tatva_edd_store_link_url')->transport = 'postMessage';

    // Add postMessage for featured posts on front page settings
    $wp_customize->get_setting('tatva_front_featured_posts_title')->transport = 'postMessage';
    $wp_customize->get_setting('tatva_front_featured_link_text')->transport = 'postMessage';

    //remove default customizer sections
    $wp_customize->remove_section('background_image');
    $wp_customize->remove_section('colors');
}

add_action('customize_register', 'tatva_customize_register');


/**
 * Bind JS handlers to make Theme Customizer preview reload changes asynchronously.
 *
 * @since Tatva 1.0
 */
function tatva_customize_preview_js() {
    wp_enqueue_script('tatva_customizer', get_template_directory_uri() . '/js/customizer.js', array('customize-preview'), '20131205', true);
}

add_action('customize_preview_init', 'tatva_customize_preview_js');


function tatva_header_output() {
    ?>
    <!--Customizer CSS--> 
    <style type="text/css">
    <?php echo esc_attr(get_theme_mod('tatva_custom_css')); ?>
    </style> 
    <!--/Customizer CSS-->
    <?php
}

// Output custom CSS to live site
add_action('wp_head', 'tatva_header_output');
