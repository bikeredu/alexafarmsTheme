<?php
/**
 * The template for displaying all single posts and attachments
 */
 
get_header(); ?>
<section class="block-breadcrumb">
  <div class="container"><?php the_breadcrumb(); ?></div>
</section>
<?php
// Start the loop.
    while ( have_posts() ) : the_post();
?>
<section class="block-single-post">
    <div class="container">
        <h1 class="title"><?php the_title() ?></h1>
        <?php the_content(); ?>
       <?php 
        // Previous/next post navigation.
        // the_post_navigation( array(
        //     'next_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Next', 'twentyfifteen' ) . '</span> ' .
        //         '<span class="screen-reader-text">' . __( 'Next post:', 'twentyfifteen' ) . '</span> ' .
        //         '<span class="post-title">%title</span>',
        //     'prev_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Previous', 'twentyfifteen' ) . '</span> ' .
        //         '<span class="screen-reader-text">' . __( 'Previous post:', 'twentyfifteen' ) . '</span> ' .
        //         '<span class="post-title">%title</span>',
        // ) ); ?>
    </div><!-- .site-main -->
</section><!-- .content-area -->
<?php endwhile; ?>
<?php if ( comments_open() || get_comments_number() ) : ?>
<section class="block-comment">
    <div class="container">
        <?php comments_template(); ?>
    </div>
</section>
<?php endif; ?>
<?php
$args2 = array(
    'numberposts' => 3,
    'category'    => 27,
    'sort_order' => 'asc'
  );
$latest_post = get_posts( $args2 );
?>
<section class="block-news">
    <div class="container">
        <h2 class="title">Recent Post</h2>
        <div class="row">
            <?php
                foreach ( $latest_post as $post ) : 
                    setup_postdata( $post );?>
                    <div class="col-4">
                        <a href="<?php the_permalink(); ?>">
                            <?php $featureImagePost = get_field('image_feature', $post->ID); ?>
                            <img class="image-post" src="<?php echo $featureImagePost['url']; ?>" alt="<?php echo $featureImagePost['alt']; ?>" />
                            <h3 class="title-post"><?php the_title(); ?></h3>
                        </a>
                    </div>
                <?php
                endforeach;
                wp_reset_postdata();
            ?>
        </div>
    </div>
</section>
 
<?php get_footer(); ?>