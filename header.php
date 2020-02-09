<?php
/**
 * Theme Header
 *
 * Header data.
 *
 * @since   1.0.0
 * @package WP
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>
<?php show_admin_bar( true ); ?>
<header>
    <div class="container">
    <?php 

    $custom_logo_id = get_theme_mod( 'custom_logo' );
    $image = wp_get_attachment_image_src( $custom_logo_id , 'full' );

    ?>
    <a class="logo" href="<?php echo site_url(); ?>"><img src="<?php echo $image[0]; ?>" alt=""></a>
    <?php get_search_form(); ?>
    <div class="title-event"><?php echo get_theme_mod( "mytheme_company-event" );?></div>
    <?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
    <button class="menu-mobile">
        <span></span>
        <span></span>
        <span></span>
    </button>
    </div>
</header>
<body <?php body_class(); ?>>
