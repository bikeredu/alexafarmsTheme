<?php
/**
 * Index
 *
 * Theme index.
 *
 * @since   1.0.0
 * @package WP
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header(); ?>

<div class="block-slider">
<?php echo do_shortcode('[smartslider3 slider=2]'); ?>

</div>

<?php get_footer(); ?>
