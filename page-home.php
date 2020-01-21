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
echo do_shortcode('[smartslider3 slider=2]');
?>
<section class="block-page home"> 
  <div class="container">
  <?php the_content(); ?>
  </div>
</section>
<?php
$taxonomies = array( 
    'collections'    
);

$args = array(
    'orderby'       => 'name', 
    'order'         => 'ASC',
    'hide_empty'    => true, 
    'exclude'       => array(), 
    'exclude_tree'  => array(10, 9, 28), 
    'include'       => array(),
    'number'        => '', 
    'fields'        => 'all', 
    'slug'          => '', 
    'parent'         => '',
    'hierarchical'  => false, 
    'child_of'      => 0, 
    'get'           => '', 
    'name__like'    => '',
    'pad_counts'    => false, 
    'offset'        => '', 
    'search'        => '', 
    'cache_domain'  => 'core'
); 

$termsRoses = get_terms( $taxonomies , $args);
?>
<section class="category-roses">
    <div class="container">
        <div class="row">
            <?php foreach ($termsRoses as $term): ?>
                <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                    <div class="col-6">
                        <a href="<?php get_term_link($term)?>">
                        <?php $logoCollection = get_field('logo_collections', $term); ?>
                        <?php $featureImage = get_field('feature_image', $term); ?>
                        <img class="feature-image" src="<?php echo $featureImage['url']; ?>" alt="<?php echo $featureImage['alt']; ?>" />
                        <img class="logo" src="<?php echo $logoCollection['url']; ?>" alt="<?php echo $logoCollection['alt']; ?>" />
                        <h3 class="name-collection"><?php echo $term->name;?></h3>
                        </a>
                    </div>
                <?php endwhile; endif; ?>
            <?php endforeach; ?>
        </div>
        <div class="row">
            <div class="col-6">
                <a class="btn-collection" href="by-variety/">Search by Variety</a>
            </div>
            <div class="col-6"><a class="btn-collection" href="collections/color/">Search by Color</a></div>
        </div>
    </div>
</section>
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
        <h2 class="title">WHAT'S NEW?</h2>
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
