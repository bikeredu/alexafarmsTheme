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

<?php
$post_roses = new WP_Query(array(
    'post_type' => 'roses',
    'numberposts' => -1,
    'post_status' => 'publish',
    'orderby' => 'name', 
    'order' => 'ASC'
  ));
?>

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
  <?php the_content(); ?>
  </div>
</section>
<section class="rose-list">
  <div class="container">
    <div class="row">
      <?php while ( $post_roses->have_posts() ) : $post_roses->the_post(); ?>
          <div class="col-6">
            <div class="block-rose">
              <?php $postid = get_the_ID(); $image_cover = get_field('image_cover');
              if( !empty($image_cover) ): ?><img src="<?php echo $image_cover['url']; ?>" alt="<?php echo $image_cover['alt']; ?>" /> <?php endif; ?>
              <h2 class="title-rose"><?php the_title() ?></h2>
              <a class="see-more" href="<?php echo the_permalink() ?>">See more</a>
            </div>
          </div>
      <?php endwhile; ?>
    </div>
  </div>
</section>

<?php get_footer(); ?>

