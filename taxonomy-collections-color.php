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



<?php $queried_object = get_queried_object();
$term_id = $queried_object->term_id;
$description = $queried_object->description;
?>
<?php $logoCollection = get_field('logo_collections', $queried_object); 
if( !empty($logoCollection) ): ?>
    <article class="box-collection">
        <div class="container">
            <div class="row">
                <div class="logo-collection">
            <img src="<?php echo $logoCollection['url']; ?>" alt="<?php echo $logoCollection['alt']; ?>" />   
                </div>
            </div>
        </div>
    </article>
<?php endif; ?>    
<section class="block-breadcrumb">
  <div class="container"><?php the_breadcrumb(); ?></div>
</section>


<?php $imageHero = get_field('hero_image', $queried_object); 
if( !empty($imageHero) ): ?>
  <section class="hero-image">
  <img class="img-parallax" data-speed="-1.5" src="<?php echo $imageHero['url']; ?>" alt="<?php echo $imageHero['alt']; ?>" /> 
  </section>
<?php endif; ?>  

<section class="content-collection">
  <div class="container">
    <div class="row">
      <?php  echo $description ?>
    </div>
  </div>
</section>
<?php if(!empty(have_posts())):?>

<section class="rose-list">
  <div class="container">
    <div class="row">
      <div class="col-2">
        <?php 
          $terms = get_terms([
            'taxonomy' => 'collections',
            'hide_empty' => true,
            'child_of' => 10
          ]);
        ?>
        <ul class="menu-categories">
          <?php foreach ($terms as $term): ?>
          <li dataId="<?php echo $term->term_id;?>"><?php echo $term->name;?></li>
          <?php endforeach; ?>
        </ul>
      </div>
      <div class="col-10">
        <div class="row results-roses">
          <?php while ( have_posts() ) : the_post(); ?>
            <div class="col-6">
              <div class="block-rose">
                <?php $image_cover = get_field('image_cover');
                if( !empty($image_cover) ): ?><img src="<?php echo $image_cover['url']; ?>" alt="<?php echo $image_cover['alt']; ?>" /> <?php endif; ?>

                <!-- <?php $logoRose = get_field('logo');
                if( !empty($logoRose) ): ?><img class="logo-rose" src="<?php echo $logoRose['url']; ?>" alt="<?php echo $logoRose['alt']; ?>" /> <?php endif; ?> -->
                <h2 class="title-rose"><?php the_title() ?></h2>
                <a class="see-more" href="<?php echo the_permalink() ?>">See more</a>
              </div>
            </div>
          <?php endwhile; ?>
        </div>
      </div>
    </div>
  </div>
</section>
<?php endif; ?>


<?php get_footer(); ?>

