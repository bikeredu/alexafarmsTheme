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

<section class="feature-image">
  <?php echo get_the_post_thumbnail(); ?>
</section>
<section class="block-breadcrumb">
  <div class="container"><?php the_breadcrumb(); ?></div>
</section>
<section class="block-head-title">
  <div class="container">
    <h1 class="block-head-title"><?php the_title(); ?></h1>
  </div>
</section>
<section class="block-page"> 
  <div class="container">
  <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
<?php the_content(); ?>
<?php endwhile; endif; ?>
  </div>
</section>
<?php get_footer(); ?>
