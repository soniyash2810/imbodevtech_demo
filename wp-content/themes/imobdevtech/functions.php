<?php
/**
 * Functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package WordPress
 * @subpackage Imobdev Technology
 * @since Imobdev Technology 1.0
 */

if (!function_exists('imobdev_technology_setup')) {
    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which
     * runs before the init hook. The init hook is too late for some features, such
     * as indicating support for post thumbnails.
     *
     * @since Imobdev Technology 1.0
     *
     * @return void
     */
    function imobdev_technology_setup()
    {
        /*
         * Make theme available for translation.
         * Translations can be filed in the /languages/ directory.
         * If you're building a theme based on Imobdev Technology, use a find and replace
         * to change 'Imobdev Technology' to the name of your theme in all the template files.
         */
        load_theme_textdomain('imobdev-technology', get_template_directory() . '/languages');

        // Add default posts and comments RSS feed links to head.
        add_theme_support('automatic-feed-links');

        /*
         * Let WordPress manage the document title.
         * This theme does not use a hard-coded <title> tag in the document head,
         * WordPress will provide it for us.
         */
        add_theme_support('title-tag');

        /**
         * Add post-formats support.
         */
        add_theme_support(
            'post-formats',
            array(
                'link',
                'aside',
                'gallery',
                'image',
                'quote',
                'status',
                'video',
                'audio',
                'chat',
            )
        );

        /*
         * Enable support for Post Thumbnails on posts and pages.
         *
         * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
         */
        add_theme_support('post-thumbnails');

        register_nav_menus(
            array(
                'primary-menu' => esc_html__('Home menu', 'imobdev-technology'),
            )
        );

        /*
         * Switch default core markup for search form, comment form, and comments
         * to output valid HTML5.
         */
        add_theme_support(
            'html5',
            array(
                'comment-form',
                'comment-list',
                'gallery',
                'caption',
                'style',
                'script',
                'navigation-widgets',
            )
        );

        /*
         * Add support for core custom logo.
         *
         * @link https://codex.wordpress.org/Theme_Logo
         */
        $logo_width = 300;
        $logo_height = 100;

        add_theme_support(
            'custom-logo',
            array(
                'height' => $logo_height,
                'width' => $logo_width,
                'flex-width' => true,
                'flex-height' => true,
                'unlink-homepage-logo' => true,
            )
        );

        // Add theme support for selective refresh for widgets.
        add_theme_support('customize-selective-refresh-widgets');

        // Add support for Block Styles.
        add_theme_support('wp-block-styles');

        // Add support for full and wide align images.
        add_theme_support('align-wide');

        // Add support for editor styles.
        add_theme_support('editor-styles');

        // Add custom editor font sizes.
        add_theme_support(
            'editor-font-sizes',
            array(
                array(
                    'name' => esc_html__('Extra small', 'imobdev-technology'),
                    'shortName' => esc_html_x('XS', 'Font size', 'imobdev-technology'),
                    'size' => 16,
                    'slug' => 'extra-small',
                ),
                array(
                    'name' => esc_html__('Small', 'imobdev-technology'),
                    'shortName' => esc_html_x('S', 'Font size', 'imobdev-technology'),
                    'size' => 18,
                    'slug' => 'small',
                ),
                array(
                    'name' => esc_html__('Normal', 'imobdev-technology'),
                    'shortName' => esc_html_x('M', 'Font size', 'imobdev-technology'),
                    'size' => 20,
                    'slug' => 'normal',
                ),
                array(
                    'name' => esc_html__('Large', 'imobdev-technology'),
                    'shortName' => esc_html_x('L', 'Font size', 'imobdev-technology'),
                    'size' => 24,
                    'slug' => 'large',
                ),
                array(
                    'name' => esc_html__('Extra large', 'imobdev-technology'),
                    'shortName' => esc_html_x('XL', 'Font size', 'imobdev-technology'),
                    'size' => 40,
                    'slug' => 'extra-large',
                ),
                array(
                    'name' => esc_html__('Huge', 'imobdev-technology'),
                    'shortName' => esc_html_x('XXL', 'Font size', 'imobdev-technology'),
                    'size' => 96,
                    'slug' => 'huge',
                ),
                array(
                    'name' => esc_html__('Gigantic', 'imobdev-technology'),
                    'shortName' => esc_html_x('XXXL', 'Font size', 'imobdev-technology'),
                    'size' => 144,
                    'slug' => 'gigantic',
                ),
            )
        );

        // Custom background color.
        add_theme_support(
            'custom-background',
            array(
                'default-color' => 'd1e4dd',
            )
        );

        // Editor color palette.
        $black = '#000000';
        $dark_gray = '#28303D';
        $gray = '#39414D';
        $green = '#D1E4DD';
        $blue = '#D1DFE4';
        $purple = '#D1D1E4';
        $red = '#E4D1D1';
        $orange = '#E4DAD1';
        $yellow = '#EEEADD';
        $white = '#FFFFFF';

        add_theme_support(
            'editor-color-palette',
            array(
                array(
                    'name' => esc_html__('Black', 'imobdev-technology'),
                    'slug' => 'black',
                    'color' => $black,
                ),
                array(
                    'name' => esc_html__('Dark gray', 'imobdev-technology'),
                    'slug' => 'dark-gray',
                    'color' => $dark_gray,
                ),
                array(
                    'name' => esc_html__('Gray', 'imobdev-technology'),
                    'slug' => 'gray',
                    'color' => $gray,
                ),
                array(
                    'name' => esc_html__('Green', 'imobdev-technology'),
                    'slug' => 'green',
                    'color' => $green,
                ),
                array(
                    'name' => esc_html__('Blue', 'imobdev-technology'),
                    'slug' => 'blue',
                    'color' => $blue,
                ),
                array(
                    'name' => esc_html__('Purple', 'imobdev-technology'),
                    'slug' => 'purple',
                    'color' => $purple,
                ),
                array(
                    'name' => esc_html__('Red', 'imobdev-technology'),
                    'slug' => 'red',
                    'color' => $red,
                ),
                array(
                    'name' => esc_html__('Orange', 'imobdev-technology'),
                    'slug' => 'orange',
                    'color' => $orange,
                ),
                array(
                    'name' => esc_html__('Yellow', 'imobdev-technology'),
                    'slug' => 'yellow',
                    'color' => $yellow,
                ),
                array(
                    'name' => esc_html__('White', 'imobdev-technology'),
                    'slug' => 'white',
                    'color' => $white,
                ),
            )
        );

        add_theme_support(
            'editor-gradient-presets',
            array(
                array(
                    'name' => esc_html__('Purple to yellow', 'imobdev-technology'),
                    'gradient' => 'linear-gradient(160deg, ' . $purple . ' 0%, ' . $yellow . ' 100%)',
                    'slug' => 'purple-to-yellow',
                ),
                array(
                    'name' => esc_html__('Yellow to purple', 'imobdev-technology'),
                    'gradient' => 'linear-gradient(160deg, ' . $yellow . ' 0%, ' . $purple . ' 100%)',
                    'slug' => 'yellow-to-purple',
                ),
                array(
                    'name' => esc_html__('Green to yellow', 'imobdev-technology'),
                    'gradient' => 'linear-gradient(160deg, ' . $green . ' 0%, ' . $yellow . ' 100%)',
                    'slug' => 'green-to-yellow',
                ),
                array(
                    'name' => esc_html__('Yellow to green', 'imobdev-technology'),
                    'gradient' => 'linear-gradient(160deg, ' . $yellow . ' 0%, ' . $green . ' 100%)',
                    'slug' => 'yellow-to-green',
                ),
                array(
                    'name' => esc_html__('Red to yellow', 'imobdev-technology'),
                    'gradient' => 'linear-gradient(160deg, ' . $red . ' 0%, ' . $yellow . ' 100%)',
                    'slug' => 'red-to-yellow',
                ),
                array(
                    'name' => esc_html__('Yellow to red', 'imobdev-technology'),
                    'gradient' => 'linear-gradient(160deg, ' . $yellow . ' 0%, ' . $red . ' 100%)',
                    'slug' => 'yellow-to-red',
                ),
                array(
                    'name' => esc_html__('Purple to red', 'imobdev-technology'),
                    'gradient' => 'linear-gradient(160deg, ' . $purple . ' 0%, ' . $red . ' 100%)',
                    'slug' => 'purple-to-red',
                ),
                array(
                    'name' => esc_html__('Red to purple', 'imobdev-technology'),
                    'gradient' => 'linear-gradient(160deg, ' . $red . ' 0%, ' . $purple . ' 100%)',
                    'slug' => 'red-to-purple',
                ),
            )
        );

        // Add support for responsive embedded content.
        add_theme_support('responsive-embeds');

        // Add support for custom line height controls.
        add_theme_support('custom-line-height');

        // Add support for experimental link color control.
        add_theme_support('experimental-link-color');

        // Add support for experimental cover block spacing.
        add_theme_support('custom-spacing');

        // Add support for custom units.
        // This was removed in WordPress 5.6 but is still required to properly support WP 5.5.
        add_theme_support('custom-units');
    }
}
add_action('after_setup_theme', 'imobdev_technology_setup');


/**
 * Register widget area.
 *
 * @since Imobdev Technology 1.0
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 *
 * @return void
 */
function imobdev_technology_widgets_init()
{

    // Arguments used in all register_sidebar() calls.
    $shared_args = array(
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
        'before_widget' => '<div class="widget wow fadeInUp %2$s"><div class="widget-content">',
        'after_widget'  => '</div></div>',
    );

    register_sidebar(
        array(
            'name' => esc_html__('Footer', 'imobdev-technology'),
            'id' => 'sidebar-1',
            'description' => esc_html__('Add widgets here to appear in your footer.', 'imobdev-technology'),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget' => '</section>',
            'before_title' => '<h2 class="widget-title">',
            'after_title' => '</h2>',
        )
    );

    // Shop Sidebar
    register_sidebar(
        array_merge(
            $shared_args,
            array(
                'name'        => __( 'Shop Sidebar', 'imobdev-technology' ),
                'id'          => 'shop-sidebar',
                'description' => __( 'Shop sidebar for left side', 'imobdev-technology' ),
                'class'         => 'list-group',
            )
        )
    );
}
add_action('widgets_init', 'imobdev_technology_widgets_init');

/**
 * Enqueue styles.
 *
 * @since Imobdev Technology 1.0
 *
 * @return void
 */
function imobdev_technology_register_styles()
{

    $theme_version = wp_get_theme()->get('Version');

    wp_register_style('imobdev-technology-bootstrap-style', get_template_directory_uri() . '/assets/css/bootstrap.min.css', '', '5.3.0');
    wp_register_style('imobdev-technology-fontawesome-style', get_template_directory_uri() . '/assets/css/fontawesomemin.css', '', '5.15.3');
    wp_register_style('imobdev-technology-fonts-stylesheet-style', get_template_directory_uri() . '/assets/Document fonts/font-family/stylesheet.css', '', $theme_version);
    wp_register_style('imobdev-technology-responsive-style', get_template_directory_uri() . '/assets/css/Responsive.css', '', $theme_version);
    wp_register_style('imobdev-technology-main-style', get_template_directory_uri() . '/assets/css/style.css', '', $theme_version);
    wp_register_style('imobdev-technology-custom-style', get_template_directory_uri() . '/assets/css/custom.css', '', $theme_version);
    

    wp_enqueue_style('imobdev-technology-bootstrap-style');
    wp_enqueue_style('imobdev-technology-fontawesome-style');
    wp_enqueue_style('imobdev-technology-fonts-stylesheet-style');
    wp_enqueue_style('imobdev-technology-responsive-style');
    wp_enqueue_style('imobdev-technology-main-style');
    wp_enqueue_style('imobdev-technology-custom-style');

}
//add_action('wp_enqueue_scripts', 'imobdev_technology_register_styles');

/**
 * Enqueue Scripts.
 *
 * @since Imobdev Technology 1.0
 *
 * @return void
 */
function imobdev_technology_register_scripts()
{

    wp_enqueue_script('jquery');

    $theme_version = wp_get_theme()->get('Version');

    if ((!is_admin()) && is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }

    // wp_register_script('imobdev-technology-bootstrap-js', get_template_directory_uri() . '/assets/js/bootstrap.min.js', array(), '5.3.0', true);
    // wp_enqueue_script('imobdev-technology-bootstrap-js');

    // wp_register_script('imobdev-technology-fontawesomemin-js', get_template_directory_uri() . '/assets/js/fontawesomemin.js', array(), '6.2.0', true);
    // wp_enqueue_script('imobdev-technology-fontawesomemin-js');

    // wp_register_script('imobdev-technology-custom-ajax-js', get_template_directory_uri() . '/assets/js/custom.js', array(), $theme_version, true);
    // wp_enqueue_script('imobdev-technology-custom-ajax-js');

    // $GoFood_localize['admin_url'] = admin_url('admin-ajax.php');
    // wp_localize_script(

    //     'imobdev-technology-custom-ajax-js',

    //     'gofoodguidesVars',

    //     $GoFood_localize

    // );

}
add_action('wp_enqueue_scripts', 'imobdev_technology_register_scripts');

/*==============================================================*/
/* Start SVG Icon */
/*==============================================================*/

function imobdev_technology_mime_types($mimes)
{

    // New allowed mime types.
    $mimes['svg'] = 'image/svg+xml';
    $mimes['svgz'] = 'image/svg+xml';
    $mimes['doc'] = 'application/msword';

    // Optional. Remove a mime type.
    unset($mimes['exe']);

    return $mimes;

}
add_filter('upload_mimes', 'imobdev_technology_mime_types');

/*==============================================================*/
/* End SVG Icon */
/*==============================================================*/


/*==============================================================*/
/* Acf General Settings */
/*==============================================================*/

if( function_exists('acf_add_options_page') ) {
    
    acf_add_options_page(array(
        'page_title'    => 'Theme General Settings',
        'menu_title'    => 'Theme Settings',
        'menu_slug'     => 'theme-general-settings',
        'capability'    => 'edit_posts',
        'redirect'      => false
    ));
}

/*==============================================================*/
/* End Acf General Settings */
/*==============================================================*/


/*==============================================================*/
/* Start Fevicon Icon */
/*==============================================================*/

if( ! function_exists( 'imobdev_technology_add_site_favicon' ) ){
    function imobdev_technology_add_site_favicon() {
        
        $add_favicon_image = get_field('add_favicon_image','option');
        if( $add_favicon_image ){
            echo '<link rel="shortcut icon" href="'.$add_favicon_image.'">';
            echo '<link rel="icon" href="'.$add_favicon_image.'" type="image/x-icon">';
        }
    }
}
add_action( 'admin_head', 'imobdev_technology_add_site_favicon' );

/*==============================================================*/
/* End Fevicon Icon */
/*==============================================================*/


/*==============================================================*/
/* Start require file list */
/*==============================================================*/


require get_template_directory() . '/inc/imobdev-technology-register-post-type.php';

require get_template_directory() . '/inc/imobdev-technology-register-custom-taxonomy.php';

require get_template_directory() . '/inc/imobdev-technology-custom-functions.php';

/*==============================================================*/
/* End require file list */
/*==============================================================*/

/*==============================================================*/
/* Start Handle custom sitemap rewrite rule */
/*==============================================================*/
function custom_sitemap_rewrite_rule() {
    if (isset($_GET['sitemap']) && $_GET['sitemap'] == 1) {
        // Load the sitemap template file
        include get_stylesheet_directory() . '/sitemap.php';
        exit;
    }
}
add_action('template_redirect', 'custom_sitemap_rewrite_rule');

/*==============================================================*/
/* End Handle custom sitemap rewrite rule */
/*==============================================================*/