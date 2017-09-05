<?php
/**
 * cone functions and definitions
 *
 * Set up the theme and provides some helper functions, which are used in the
 * theme as custom template tags. Others are attached to action and filter
 * hooks in WordPress to change core functionality.
 *
 * When using a child theme you can override certain functions (those wrapped
 * in a function_exists() call) by defining them first in your child theme's
 * functions.php file. The child theme's functions.php file is included before
 * the parent theme's file, so the child theme functions would be used.
 *
 * @link https://codex.wordpress.org/Theme_Development
 * @link https://codex.wordpress.org/Child_Themes
 *
 * Functions that are not pluggable (not wrapped in function_exists()) are
 * instead attached to a filter or action hook.
 *
 * For more information on hooks, actions, and filters,
 * @link https://codex.wordpress.org/Plugin_API
 *
 * @package cone
 */

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function cone_theme_setup() {
 
    /*
     * Make theme available for translation.
     * Translations can be filed in the /languages/ directory.
     */
    load_theme_textdomain( 'cone', get_template_directory() . '/languages' );
 
    // Register nav menues to use wp_nav_menu()
    register_nav_menus( array(
        'primary' => __( 'Primary menu', 'cone' ),
        'secondary' => __( 'Secondary menu', 'cone' ),
        'footer' => __( 'Footer menu', 'cone' )
    ) );
 
    /*
     * Enable support for Post Thumbnails on posts and pages.
     *
     * See: https://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
     */
    add_theme_support( 'post-thumbnails' );
    // Add thumb sizes below
    add_image_size( 'rectangle-thumb', 375, 220, true );

    /*
     * Enable support for Post Formats.
     * See https://codex.wordpress.org/Post_Formats
     */
    add_theme_support( 'post-formats', array(
        'aside', 'image', 'video', 'audio', 'quote', 'link', 'gallery',
    ) );
 
    /*
     * Let WordPress manage the document title.
     * By adding theme support, we declare that this theme does not use a
     * hard-coded <title> tag in the document head, and expect WordPress to
     * provide it for us.
     */
    add_theme_support( 'title-tag' );
}
add_action( 'after_setup_theme', 'cone_theme_setup' );

/**
 * Register custom post types
 * 
 * @link https://codex.wordpress.org/Function_Reference/register_post_type
 */
function cone_register_post_types() {
    // Custom post types should be registered here
}
add_action( 'init', 'cone_register_post_types' );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function cone_widgets_init() {
    register_sidebar( array(
        'name'          => __( 'Sidebar', 'cone' ),
        'id'            => 'sidebar-1',
        'description'   => '',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ) );
}
add_action( 'widgets_init', 'cone_widgets_init' );

/**
 * Set the post excerpt length to 40 words.
 *
 * To override this length in a child theme, remove
 * the filter and add your own function tied to
 * the excerpt_length filter hook.
 *
 * @param int $length The number of excerpt characters.
 * @return int The filtered number of characters.
 */
function cone_set_excerpt_length( $length ) {
    return 40;
}
add_filter( 'excerpt_length', 'cone_set_excerpt_length' );

/**
 * Replace "[...]" in the Read More link with an ellipsis.
 *
 * The "[...]" is appended to automatically generated excerpts.
 *
 * To override this in a child theme, remove the filter and add your own
 * function tied to the excerpt_more filter hook.
 *
 * @param string $more The Read More text.
 * @return The filtered Read More text.
 */
function cone_excerpt_more( $more ) {
    if ( ! is_admin() ) {
        return ' &hellip;';
    }
    return $more;
}
add_filter( 'excerpt_more', 'cone_excerpt_more' );

/**
 * Add all the main scripts and styles here.
 */
function cone_enqueue_scripts() {

    // WordPress style.css
    wp_enqueue_style( 'default-style', get_stylesheet_uri() );

    wp_enqueue_style( 'hamburger-style', get_template_directory_uri() . '/assets/css/lib/hamburgers.min.css' );

    wp_enqueue_script( 'hamburger-scripts', get_template_directory_uri() . '/assets/js/lib/hamburgers.js', array('jquery'), 1.0, true );

    // vendor.css created with gulp
    wp_enqueue_style( 'main-min-style', get_template_directory_uri() . '/assets/css/main.min.css' );

    // vendor.js created with gulp
    wp_enqueue_script( 'main-min-scripts', get_template_directory_uri() . '/assets/js/src/main.min.js', array('jquery'), 1.0, true );

    wp_localize_script(
      'main-min-scripts', // this needs to match the name of our enqueued script
      'ajaxApi',      // the name of the object
      array('ajaxurl' => admin_url('admin-ajax.php')) // the property/value
    );
}
add_action( 'wp_enqueue_scripts', 'cone_enqueue_scripts' );

// Custom template tags
require get_template_directory() . '/inc/template-tags.php';

function api_pandascore_ajax() {

    //twitch clientid = c5kmmewfnf79tek39fntsivakta9ow

    // $twitch_clientid = 'c5kmmewfnf79tek39fntsivakta9ow';

    // $twitch_url = 'https://api.twitch.tv/kraken/streams/22859264?client_id='.$twitch_clientid;

    // $args = array(
    //     'headers' => array( 'Accept' => 'application/vnd.twitchtv.v5+json' ),
    // );

    // $result = wp_remote_get( $twitch_url, $args );



    //ID: geekodds
    //Secret: a121c9bc2aab773b2f6c5b9a12852ca7d394bcdc2aa12d4ab1

    $ID = 'geekodds';

    $secret = 'a121c9bc2aab773b2f6c5b9a12852ca7d394bcdc2aa12d4ab1';

    $token_credentials = 'grant_type=client_credentials&client_id='. $ID .'&client_secret=' . $secret;

    $token_url = 'https://api.abiosgaming.com/v2/oauth/access_token';// . $token_credentials;

    $args = array(
        'headers' => array( 'Content-Type'  => 'application/x-www-form-urlencoded'),
        //'body' => array( 'params' => array( 'grant_type' => 'client_credentials', 'client_id' => $ID, 'client_secret' => $secret ) ),
        'body' =>  array(
            'grant_type' => 'client_credentials',
            'client_id' => $ID,
            'client_secret' => $secret,
        )
    );

    $token = wp_remote_post( $token_url , $args);

    $new_token = json_decode($token['body'])->access_token;

    $url = 'https://api.abiosgaming.com/v2/tournaments?games[]=5&with[]=series&starts_after=2017-08-25T00:00:00Z&starts_before=2017-09-30T00:00:00Z&access_token='.$new_token;

    //$url = 'https://api.abiosgaming.com/v2/teams/876?with[]=game&with[]=team_stats&with[]=rosters&access_token='.$new_token;

    //$url = 'https://api.abiosgaming.com/v2/series?games[]=5&with[]=matches&is_over=true&access_token='.$new_token;

    $result = wp_remote_get( $url );
    wp_send_json( json_decode( $result['body'] ) );
    die();


}

add_action( 'wp_ajax_api_everysport_ajax', 'api_pandascore_ajax' );
add_action( 'wp_ajax_nopriv_api_everysport_ajax', 'api_pandascore_ajax' );