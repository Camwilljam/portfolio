<?php
/* =======================
ENQUEUE SCRIPTS AND STYLES
=========================*/
function my_theme_enqueue_styles() {
    $parent_style = 'parent-style'; // This is 'twentyfifteen-style' for the Twenty Fifteen theme.
    wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'child-style',
        get_stylesheet_directory_uri() . '/style.css',
        array( $parent_style ),
        wp_get_theme()->get('Version')
    );
    wp_enqueue_script( 'child-scripts', get_stylesheet_directory_uri() . '/js/scripts.js', array('jquery'), '', true );
    wp_enqueue_style( 'google-fonts', 'https://fonts.googleapis.com/css?family=Oxygen:400,700|PT+Sans:400,700');
}
add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles' );
/*==========================================
THEME OPTIONS : IMAGE SIZES
==========================================*/
function image_size_setup() {
            add_image_size( 'gallerythumb', 300, 240, true);
        add_image_size( 'gallery', 800, 600, false);
        //Blog
        add_image_size( 'blog_thumb', 600, 200, true);
        add_image_size( 'blog_full', 955, 300, true);
        //Featured Product
        add_image_size( 'featured_product', 250, 250, true);
        //Slider
        add_image_size( 'slider', 1920, 800, true);
        add_image_size( 'featuredImage', 500, 500, false);
        //Sample Pack
        add_image_size( 'sample_pack', 900, 900, true);
        //Banner
        add_image_size( 'banner', 1920, 400, true);
        /* Flexible Content Blocks*/
        //Blog Section
        add_image_size('blogthumb',500,500, array('center','center', true));
        add_image_size('blog-title',700,250, array('center','center'));
        add_image_size('blog-preview', 500, 250, true);
        //Graphic Links?
        add_image_size('featured_products',400,400, true);
        add_image_size('solution', 400, 300, true);
        //Photo Gallery
        add_image_size('gallery_thumb',400,400, array('center','center', true));
        add_image_size('gallery', 250, 250, true);
        add_image_size('activity', 300, 300, true);
        //Logo
        add_image_size('home-logo',150,200, false);
        //Single Column
        add_image_size('singl-col', 200, 100, false);
        //Centered
        add_image_size('centered', 500, 350, false);
        //Portfolio
        add_image_size('portfolio', 500, 300, true);
        //Full Screen
        add_image_size('fullscreen', 1920, 1080, false);
        add_image_size('feat', 400, 350, true);
        //Img With Text
        add_image_size('sideimage', 400, 400, true);
        //Grid Section
        add_image_size('gridthumb', 350, 280, true);
        //Resources
        add_image_size('preview', 200, 200, true);
        //Design Method
        add_image_size( 'designmethod', 720, 240, array( 'center', 'center' ) );
}
add_action( 'after_setup_theme', 'image_size_setup' );
include get_stylesheet_directory().'/functions/ops/customiser.php';

function register_child_menu() {
  register_nav_menu('top-menu',__( 'Top Menu' ));
}
add_action( 'init', 'register_child_menu' );

/* Theme 3 Specific Custom Fields */
// Mega Menu

if(function_exists("register_field_group"))
{
    register_field_group(array (
        'id' => 'acf_megamenu',
        'title' => 'MegaMenu',
        'fields' => array (
            array (
                'key' => 'field_596f61b6b15b0',
                'label' => 'Print Megamenu',
                'name' => 'print_megamenu',
                'type' => 'repeater',
                'sub_fields' => array (
                    array (
                        'key' => 'field_596f61cfb15b1',
                        'label' => 'Mega Menu Title',
                        'name' => 'mega_menu_title',
                        'type' => 'text',
                        'column_width' => '',
                        'default_value' => '',
                        'placeholder' => '',
                        'prepend' => '',
                        'append' => '',
                        'formatting' => 'html',
                        'maxlength' => '',
                    ),
                    array (
                        'key' => 'field_596f61e1b15b2',
                        'label' => 'Background Image',
                        'name' => 'side_bg',
                        'type' => 'image',
                        'column_width' => '',
                        'save_format' => 'object',
                        'preview_size' => 'thumbnail',
                        'library' => 'all',
                    ),
                    array (
                        'key' => 'field_596f6204b15b3',
                        'label' => 'Sidebar Heading',
                        'name' => 'side_heading',
                        'type' => 'text',
                        'column_width' => '',
                        'default_value' => '',
                        'placeholder' => '',
                        'prepend' => '',
                        'append' => '',
                        'formatting' => 'html',
                        'maxlength' => '',
                    ),
                    array (
                        'key' => 'field_596f621ab15b4',
                        'label' => 'Sidebar Subheading',
                        'name' => 'side_subheading',
                        'type' => 'text',
                        'column_width' => '',
                        'default_value' => '',
                        'placeholder' => '',
                        'prepend' => '',
                        'append' => '',
                        'formatting' => 'html',
                        'maxlength' => '',
                    ),
                    array (
                        'key' => 'field_596f66bd1913a',
                        'label' => 'Link',
                        'name' => 'link',
                        'type' => 'text',
                        'column_width' => '',
                        'default_value' => '',
                        'placeholder' => '',
                        'prepend' => '',
                        'append' => '',
                        'formatting' => 'html',
                        'maxlength' => '',
                    ),
                ),
                'row_min' => '',
                'row_limit' => 1,
                'layout' => 'table',
                'button_label' => 'Add Row',
            ),
            array (
                'key' => 'field_596f6234b15b5',
                'label' => 'Design Megamenu',
                'name' => 'design_megamenu',
                'type' => 'repeater',
                'sub_fields' => array (
                    array (
                        'key' => 'field_596f6234b15b6',
                        'label' => 'Designs Menu Title',
                        'name' => 'designs_menu_title',
                        'type' => 'text',
                        'column_width' => '',
                        'default_value' => '',
                        'placeholder' => '',
                        'prepend' => '',
                        'append' => '',
                        'formatting' => 'html',
                        'maxlength' => '',
                    ),
                    array (
                        'key' => 'field_596f6234b15b7',
                        'label' => 'Background Image',
                        'name' => 'designs_bg_img',
                        'type' => 'image',
                        'column_width' => '',
                        'save_format' => 'object',
                        'preview_size' => 'thumbnail',
                        'library' => 'all',
                    ),
                    array (
                        'key' => 'field_596f6234b15b8',
                        'label' => 'Sidebar Heading',
                        'name' => 'designs_heading',
                        'type' => 'text',
                        'column_width' => '',
                        'default_value' => '',
                        'placeholder' => '',
                        'prepend' => '',
                        'append' => '',
                        'formatting' => 'html',
                        'maxlength' => '',
                    ),
                    array (
                        'key' => 'field_596f6234b15b9',
                        'label' => 'Sidebar Subheading',
                        'name' => 'designs_sub_heading',
                        'type' => 'text',
                        'column_width' => '',
                        'default_value' => '',
                        'placeholder' => '',
                        'prepend' => '',
                        'append' => '',
                        'formatting' => 'html',
                        'maxlength' => '',
                    ),
                    array (
                        'key' => 'field_596f66c71913b',
                        'label' => 'Link',
                        'name' => 'link',
                        'type' => 'text',
                        'column_width' => '',
                        'default_value' => '',
                        'placeholder' => '',
                        'prepend' => '',
                        'append' => '',
                        'formatting' => 'html',
                        'maxlength' => '',
                    ),
                ),
                'row_min' => '',
                'row_limit' => 1,
                'layout' => 'table',
                'button_label' => 'Add Row',
            ),
        ),
        'location' => array (
            array (
                array (
                    'param' => 'page_type',
                    'operator' => '==',
                    'value' => 'front_page',
                    'order_no' => 0,
                    'group_no' => 0,
                ),
            ),
        ),
        'options' => array (
            'position' => 'normal',
            'layout' => 'no_box',
            'hide_on_screen' => array (
            ),
        ),
        'menu_order' => 0,
    ));
}

    
add_action( 'wp_footer', 'mycustom_wp_footer' );

function mycustom_wp_footer() {
?>
<script type="text/javascript">
document.addEventListener( 'wpcf7mailsent', function( event ) {
    if ( '38' == event.detail.contactFormId ) {
        ga( 'send', 'event', 'Contact Form', 'Sent' );
	 }
}, false );
</script>
<?php
}

/* END OF FILE */
?>