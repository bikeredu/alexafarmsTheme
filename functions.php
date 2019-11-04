<?php
/**
 * Theme Functions
 *
 * Entire theme's function definitions.
 *
 * @since   1.0.0
 * @package WP
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Scripts & Styles.
 *
 * Frontend with no conditions, Add Custom styles to wp_head.
 *
 * @since  1.0.0
 */
function wpgt_scripts() {
	// Frontend scripts.
	if ( ! is_admin() ) {
		// Enqueue plugin jquery.
		wp_enqueue_script( 'wpgt_jqueryJs', get_template_directory_uri() . '/assets/js/jquery-3.3.1.min.js' );
		// Enqueue vendors first.
		wp_enqueue_script( 'wpgt_scroll', get_template_directory_uri() . '/assets/js/jquery.mCustomScrollbar.concat.min.js' );
		wp_enqueue_script( 'wpgt_bootstrap', get_template_directory_uri() . '/assets/js/bootstrap.min.js' );
		wp_enqueue_script( 'wpgt_vendorsJs', get_template_directory_uri() . '/assets/js/vendors.min.js' );

		// Enqueue custom JS after vendors.
		wp_enqueue_script( 'wpgt_customJs', get_template_directory_uri() . '/assets/js/custom.min.js', array( 'jquery' ) );

		// Minified and Concatenated styles.
		wp_enqueue_style( 'scroll_style', get_template_directory_uri() . '/assets/css/jquery.mCustomScrollbar.css', array(), '1.0', 'all' );
		wp_enqueue_style( 'fontaweasome_style', get_template_directory_uri() . '/assets/css/fontawesome.min.css', array(), '1.0', 'all' );
		wp_enqueue_style( 'bootstrap_style', get_template_directory_uri() . '/assets/css/bootstrap.min.css', array(), '1.0', 'all' );
		wp_enqueue_style( 'wpgt_style', get_template_directory_uri() . '/style.min.css', array(), '1.0', 'all' );
	}
}
// Hook.
add_action( 'wp_enqueue_scripts', 'wpgt_scripts' );

function wpdocs_after_setup_theme() {
	add_theme_support( 'html5', array( 'search-form' ) );
}
add_action( 'after_setup_theme', 'wpdocs_after_setup_theme' );

// Insertar Breadcrumb    
function the_breadcrumb() {
	if (!is_front_page()) {
		echo '<span class="removed_link" title="';
		echo get_option('home');
	        echo '"> <a href="'.esc_url( home_url( '/' ) ).'">Home</a>';
    echo "</span> <i class='fas fa-chevron-right'></i> ";
    } 
    if (is_front_page() && is_page()) {
		echo '';
    }elseif (is_page()) {
        echo the_title();
    }

    if ( is_search() ) {
      echo "Resultado de búsqueda";
    }
    if (is_tax()) {
        $queried_object = get_queried_object();
        $name = $queried_object->taxonomy;
        echo ucfirst($name).'<i class="fas fa-chevron-right"></i>'.single_cat_title( '', false );
    }
    if (is_category() || is_single()) {
        if (is_category()) {
            echo single_cat_title( '', false );
        }
        if (is_single()) {
            $post = get_post();
            $cat = new WPSEO_Primary_Term('category', $post->ID); $cat = $cat->get_primary_term(); $category_link = get_category_link( $cat );
            if($cat != ''){
                echo '<a href='.esc_url( $category_link ).'<i class="fas fa-chevron-right"></i>'.get_cat_name($cat).'</a> <i class="fas fa-chevron-right"></i>';
            }
            the_title();
        }
    }
}    
// fin breadcrumb






// Register Custom Navigation Walker
require_once get_template_directory() . '/class-wp-bootstrap-navwalker.php';
if ( ! file_exists( get_template_directory() . '/class-wp-bootstrap-navwalker.php' ) ) {
	// file does not exist... return an error.
	return new WP_Error( 'class-wp-bootstrap-navwalker-missing', __( 'It appears the class-wp-bootstrap-navwalker.php file may be missing.', 'wp-bootstrap-navwalker' ) );
} else {
	// file exists... require it.
	require_once get_template_directory() . '/class-wp-bootstrap-navwalker.php';
}


function mytheme_register_nav_menu(){
	register_nav_menus( array(
		'primary' => __( 'header-menu', 'Header Menu' ),
		'footerCompany' => __( 'footer-company', 'Footer Company' ),
		'footerConnect' => __( 'footer-connect', 'Footer Connnect' ),
		'footerResources' => __( 'footer-resources', 'Footer Resources' )
	) );
}
add_action( 'after_setup_theme', 'mytheme_register_nav_menu' );


function mytheme_customize_register( $wp_customize ) {

    $wp_customize->add_section( 'mytheme_company_section' , array(
        'title'      => __( 'Name event', 'mytheme' ),
        'priority'   => 30,
	));	
	$wp_customize->add_section( 'mytheme_company_section2' , array(
        'title'      => __( 'Social media', 'mytheme' ),
        'priority'   => 31,
    ));

    $wp_customize->add_setting( 'mytheme_company-event', array());
    $wp_customize->add_control( new WP_Customize_Control(
        $wp_customize,
        'mytheme_company_control',
            array(
                'label'      => __( 'Name Event', 'mytheme' ),
                'section'    => 'mytheme_company_section',
                'settings'   => 'mytheme_company-event',
                'priority'   => 1
            )
        )
	);
	$wp_customize->add_setting( 'mytheme_social_facebook', array());
	$wp_customize->add_control( new WP_Customize_Control(
        $wp_customize,
        'facebook',
            array(
                'label'      => __( 'Link faccebook', 'mytheme' ),
                'section'    => 'mytheme_company_section2',
                'settings'   => 'mytheme_social_facebook',
                'priority'   => 1
            )
        )
	);
	$wp_customize->add_setting( 'mytheme_social_twitter', array());
	$wp_customize->add_control( new WP_Customize_Control(
        $wp_customize,
        'Twitter',
            array(
                'label'      => __( 'Link twitter', 'mytheme' ),
                'section'    => 'mytheme_company_section2',
                'settings'   => 'mytheme_social_twitter',
                'priority'   => 2
            )
        )
	);
	$wp_customize->add_setting( 'mytheme_social_youtube', array());
	$wp_customize->add_control( new WP_Customize_Control(
        $wp_customize,
        'youtube',
            array(
                'label'      => __( 'Link youtube', 'mytheme' ),
                'section'    => 'mytheme_company_section2',
                'settings'   => 'mytheme_social_youtube',
                'priority'   => 2
            )
        )
	);
	$wp_customize->add_setting( 'mytheme_social_pinterest', array());
	$wp_customize->add_control( new WP_Customize_Control(
        $wp_customize,
        'pinterest',
            array(
                'label'      => __( 'Link pinterest', 'mytheme' ),
                'section'    => 'mytheme_company_section2',
                'settings'   => 'mytheme_social_pinterest',
                'priority'   => 2
            )
        )
	);
	$wp_customize->add_setting( 'mytheme_social_instagram', array());
	$wp_customize->add_control( new WP_Customize_Control(
        $wp_customize,
        'instagram',
            array(
                'label'      => __( 'Link instagram', 'mytheme' ),
                'section'    => 'mytheme_company_section2',
                'settings'   => 'mytheme_social_instagram',
                'priority'   => 2
            )
        )
	);
	

    // ..repeat ->add_setting() and ->add_control() for mytheme_company-division
}
add_action( 'customize_register', 'mytheme_customize_register' );


function cc_mime_types($mimes) {
	$mimes['svg'] = 'image/svg+xml';
	return $mimes;
}
add_filter('upload_mimes', 'cc_mime_types');

function theme_prefix_setup() {
	add_theme_support( 'custom-logo', array(
		'height'      => 100,
		'width'       => 400,
		'flex-width' => true,
		'flex-height' => true
	) );
}
add_action( 'after_setup_theme', 'theme_prefix_setup' );



/**
* Allow Pods Templates to use shortcodes
*
* NOTE: Will only work if the constant PODS_SHORTCODE_ALLOW_SUB_SHORTCODES is defined and set to true, which by default it IS NOT.
*/
add_filter( 'pods_shortcode', function( $tags )  {
    $tags[ 'shortcodes' ] = true;
    
    return $tags;
    
  });




 // post type Roses 
  function create_post_roses() {
    $labels = array(
		'name'                  => _x( 'Roses', 'Post Type General Name', 'text_domain' ),
		'singular_name'         => _x( 'Rose', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'             => __( 'Roses', 'text_domain' ),
		'name_admin_bar'        => __( 'Roses', 'text_domain' ),
		'archives'              => __( 'Rose Archives', 'text_domain' ),
		'attributes'            => __( 'Rose Attributes', 'text_domain' ),
		'parent_item_colon'     => __( 'Parent Rose:', 'text_domain' ),
		'all_items'             => __( 'All Roses', 'text_domain' ),
		'add_new_item'          => __( 'Add New Rose', 'text_domain' ),
		'add_new'               => __( 'Add New', 'text_domain' ),
		'new_item'              => __( 'New Rose', 'text_domain' ),
		'edit_item'             => __( 'Edit Rose', 'text_domain' ),
		'update_item'           => __( 'Update Rose', 'text_domain' ),
		'view_item'             => __( 'View Rose', 'text_domain' ),
		'view_items'            => __( 'View Roses', 'text_domain' ),
		'search_items'          => __( 'Search Rose', 'text_domain' ),
		'not_found'             => __( 'Not found', 'text_domain' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'text_domain' ),
		'featured_image'        => __( 'Featured Image', 'text_domain' ),
		'set_featured_image'    => __( 'Set featured image', 'text_domain' ),
		'remove_featured_image' => __( 'Remove featured image', 'text_domain' ),
		'use_featured_image'    => __( 'Use as featured image', 'text_domain' ),
		'insert_into_item'      => __( 'Insert into Rose', 'text_domain' ),
		'uploaded_to_this_item' => __( 'Uploaded to this Rose', 'text_domain' ),
		'items_list'            => __( 'Roses list', 'text_domain' ),
		'items_list_navigation' => __( 'Roses list navigation', 'text_domain' ),
		'filter_items_list'     => __( 'Filter roses list', 'text_domain' ),
	);
	$rewrite = array(
		'slug'                  => 'rose',
		'with_front'            => true,
		'pages'                 => true,
		'feeds'                 => true,
	);
	$args = array(
		'label'                 => __( 'Rose', 'text_domain' ),
		'description'           => __( 'Add roses', 'text_domain' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail', 'page-attributes' ),
		'taxonomies'            => array( 'collections' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 9,
		'menu_icon'             => 'dashicons-palmtree',
		'show_in_rest'			=> true,
		'rest_base'             => 'rose',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'rewrite'               => $rewrite,
		'capability_type'       => 'page',
	);
	register_post_type( 'roses', $args );
  }
add_action( 'init', 'create_post_roses' );

// Register Custom Taxonomy
function Collections() {

	$labels = array(
		'name'                       => _x( 'collections', 'Taxonomy General Name', 'text_domain' ),
		'singular_name'              => _x( 'collection', 'Taxonomy Singular Name', 'text_domain' ),
		'menu_name'                  => __( 'Collections', 'text_domain' ),
		'all_items'                  => __( 'All Items', 'text_domain' ),
		'parent_item'                => __( 'Parent Collection', 'text_domain' ),
		'parent_item_colon'          => __( 'Parent Collection:', 'text_domain' ),
		'new_item_name'              => __( 'New Collection', 'text_domain' ),
		'add_new_item'               => __( 'Add New Collection', 'text_domain' ),
		'edit_item'                  => __( 'Edit Collection', 'text_domain' ),
		'update_item'                => __( 'Update Collection', 'text_domain' ),
		'view_item'                  => __( 'View Collection', 'text_domain' ),
		'separate_items_with_commas' => __( 'Separate items with commas', 'text_domain' ),
		'add_or_remove_items'        => __( 'Add or remove collections', 'text_domain' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'text_domain' ),
		'popular_items'              => __( 'Popular Collection', 'text_domain' ),
		'search_items'               => __( 'Search Collection', 'text_domain' ),
		'not_found'                  => __( 'Not Found', 'text_domain' ),
		'no_terms'                   => __( 'No collection', 'text_domain' ),
		'items_list'                 => __( 'Collection list', 'text_domain' ),
		'items_list_navigation'      => __( 'Collection list navigation', 'text_domain' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
		'show_in_rest'			     => true,
	);
	register_taxonomy( 'collections', array( 'Roses' ), $args );

}
add_action( 'init', 'Collections', 0 );

//Insertar Javascript js y enviar ruta admin-ajax.php
// add_action('wp_enqueue_scripts', 'dcms_insertar_js');

// function dcms_insertar_js(){
// 	wp_register_script('dcms_miscript', get_template_directory_uri(). '/assets/js/custom.min.js', array('jquery'), '1', true );
// 	wp_enqueue_script('dcms_miscript');
// 	wp_localize_script('dcms_miscript','dcms_vars',['ajaxurl'=>admin_url('admin-ajax.php')]);
// }


function get_ajax_posts() {
    // Query Arguments
    $id_term = absint($_POST['id_term']);
    $args = array(
        'post_type' => array('rose'),
        'post_status' => array('publish'),
        'posts_per_page' => 2000,
        'nopaging' => true,
        'order' => 'DESC',
        'orderby' => 'date',
        'cat' => $id_term,
    );

    // The Query
    $ajaxposts = new get_posts( $args ); // changed to get_posts from wp_query, because `get_posts` returns an array

    echo json_encode( $ajaxposts );

    exit; // exit ajax call(or it will return useless information to the response)
}

// Fire AJAX action for both logged in and non-logged in users
add_action('wp_ajax_get_ajax_posts', 'get_ajax_posts');
add_action('wp_ajax_nopriv_get_ajax_posts', 'get_ajax_posts'); 


function get_post_primary_category($post_id, $term='category', $return_all_categories=false){
	$return = array();

	if (class_exists('WPSEO_Primary_Term')){
		// Show Primary category by Yoast if it is enabled & set
		$wpseo_primary_term = new WPSEO_Primary_Term( $term, $post_id );
		$primary_term = get_term($wpseo_primary_term->get_primary_term());

		if (!is_wp_error($primary_term)){
			$return['primary_category'] = $primary_term;
		}
	}

	if (empty($return['primary_category']) || $return_all_categories){
		$categories_list = get_the_terms($post_id, $term);

		if (empty($return['primary_category']) && !empty($categories_list)){
			$return['primary_category'] = $categories_list[0];  //get the first category
		}
		if ($return_all_categories){
			$return['all_categories'] = array();

			if (!empty($categories_list)){
				foreach($categories_list as &$category){
					$return['all_categories'][] = $category->term_id;
				}
			}
		}
	}

	return $return;
}  


function my_load_scripts() {
    wp_enqueue_script( 'my_js', get_theme_file_uri( 'assets/js/ajax-posts.js' ), array( 'jquery' ) );
 
    wp_localize_script( 'my_js', 'ajax_var', array(
        'url'    => rest_url( 'wp/v2/rose?collections=' ),
        'nonce'  => wp_create_nonce( 'wp_rest' ),
    ) );
}
add_action( 'wp_enqueue_scripts', 'my_load_scripts' );

add_theme_support( 'post-thumbnails' );
/**
 * Create REST field of ACF values for WordPress REST API
 */
function create_acf_fields_key_for_rest_api() {
	register_rest_field(
		[ 'post', 'page', 'roses' ], // add post types here
		'acf_fields', // name of the field
		array(
			'get_callback'    => 'get_acf_fields_for_api',
			'update_callback' => null,
			'schema'          => null,
		)
	);
}
add_action( 'rest_api_init', 'create_acf_fields_key_for_rest_api' );

/**
 * Get ACF fields of the current post for the REST API field
 *
 * @param array $object post object array
 * @return array acf fields related to current post
 */
function get_acf_fields_for_api( $object ) {
	$data = get_fields( get_the_ID() );
	return $data ?: false;
}


	
	
?>