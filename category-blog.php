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
$post_blog = new WP_Query(array(
    'post_type' => 'post',
    'category_name' => 'blog',
    'numberposts' => -1,
    'post_status' => 'publish',
    'orderby' => 'name', 
    'order' => 'ASC'
  ));
?>

<section class="blog-posts">
  <div class="container">
    <div class="row">
      <?php while ( $post_blog->have_posts() ) : $post_blog->the_post(); ?>
          <div class="col-12">
            <div class="block-post">
              <figure>
                <?php the_post_thumbnail('large');?>
              </figure>
              <article class="content-post">
                <span><?php the_date() ?></span>  
                <h2 class="title-rose"><a href="<?php echo the_permalink() ?>"><?php the_title() ?></a></h2>
                <?php the_excerpt() ?>
              </article>
            </div>
          </div>
      <?php endwhile; ?>
    </div>
  </div>
</section>

<?php get_footer(); ?>

