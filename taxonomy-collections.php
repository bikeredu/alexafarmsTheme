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
$term_name = $queried_object->name;
?>
<?php $colorText = get_field('color_text', $queried_object);?>

<script type="text/javascript">
// boolean outputs "" if false, "1" if true
var body = document.body;
body.classList.add('<?php echo $colorText ?>');
</script>
<?php $logoCollection = get_field('logo_collections', $queried_object); ?>

    <article class="box-collection">
        <div class="container">
            <div class="row">
                <div class="logo-collection">
                <?php if( !empty($logoCollection) ){ ?>
                  <img src="<?php echo $logoCollection['url']; ?>" alt="<?php echo $logoCollection['alt']; ?>" /> 
                <?php } else { ?> 
                  <span class="term-name"><?php echo $term_name; ?></span>
                <?php } ?>
                </div>
            </div>
        </div>
    </article>
 
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

<section class="rose-list <?php echo $colorText; ?>">
  <div class="container">
    <div class="row">
      
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
</section>
<?php endif; ?>


<?php get_footer(); ?>

