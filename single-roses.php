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

<!-- <?php $cat = new WPSEO_Primary_Term('collections', get_the_ID()); $termRose = $cat->get_primary_term();?>
<?php $catName = get_term( $termRose, 'collections' );?>

<article class="box-collection">
	<div class="container">
		<div class="row">
			<div class="logo-collection">
        <?php 
        $logoCollection = get_field('logo_collections', 'category_'.$termRose); 
        if( !empty($logoCollection) ){ ?><img src="<?php echo $logoCollection['url']; ?>" alt="<?php echo $logoCollection['alt']; ?>" /> <?php } else {?>  
        <span class="term-name"><?php echo $catName->name; ?></span>
        <?php } ?>
			</div>
		</div>
	</div>
</article>
<section class="block-breadcrumb">
  <div class="container"><?php the_breadcrumb(); ?></div>
</section> -->

<!-- <section class="hero-image">
  <?php $imageHero = get_field('hero_image', 'category_'.$termRose[0]->term_id); 
  if( !empty($imageHero) ): ?><img src="<?php echo $imageHero['url']; ?>" alt="<?php echo $imageHero['alt']; ?>" /> <?php endif; ?>  
</section> -->

<div class="container">
  <div class="row">
    <div class="col-7">
      <?php $images = get_field('images');
      $size = 'full'; // (thumbnail, medium, large, full or custom size)
      if( $images ): ?>
          <ul class="slider-rose">
              <?php foreach( $images as $image ): ?>
                  <li>
                    <?php echo wp_get_attachment_image( $image['ID'], $size ); ?>
                  </li>
              <?php endforeach; ?>
          </ul>
          <ul class="carousel">
              <?php foreach( $images as $image ): ?>
                  <li>
                    <?php echo wp_get_attachment_image( $image['ID'], $size ); ?>
                  </li>
              <?php endforeach; ?>
          </ul>
      <?php endif; ?>
    </div>
    <div class="col-5 details">
      <figure class="logo">
          <?php $logoRose = get_field('logo');
          if( !empty($logoRose) ): ?><img src="<?php echo $logoRose['url']; ?>" alt="<?php echo $logoRose['alt']; ?>" /> <?php endif; ?>
          <figcaption><?php if (have_posts()) : while (have_posts()) : the_post(); ?>
<?php the_content(); ?>
<?php endwhile; endif; ?></figcaption>
      </figure>
      <dl class="features">
        <?php $color = get_field_object('color'); ?>
				<dt><?php echo $color['label']; ?>: </dt>
        <dd><?php echo $color['value']; ?></dd><br>
        <?php $bloom_form = get_field_object('bloom_form'); ?>
        <dt><?php echo $bloom_form['label']; ?>: </dt>
        <dd><?php echo $bloom_form['value']; ?></dd><br>

			  <?php $petal_count = get_field_object('petal_count'); ?>
        <dt><?php echo $petal_count['label']; ?>: </dt>
        <dd><?php echo $petal_count['value']; ?></dd><br>

        <?php $fragrance_intensity = get_field_object('fragrance_intensity'); ?>
        <dt><?php echo $fragrance_intensity['label']; ?>: </dt>
        <dd><?php echo $fragrance_intensity['value']; ?></dd><br>


        <?php $fragrance = get_field_object('fragrance'); ?>
        <dt><?php echo $fragrance['label']; ?>: </dt>
        <dd><?php echo $fragrance['value']; ?></dd><br>

        <?php $vase_life = get_field_object('vase_life'); if(!empty($vase_life)){?>
        <dt><?php echo $vase_life['label']; ?>: </dt>
        <dd><?php echo $vase_life['value']; ?></dd><br> <?php } ?>

				
				<?php $breeder = get_field_object('breeder');?>
        <dt><?php echo $breeder['label']; ?>: </dt>
        <dd><?php echo $breeder['value']; ?></dd><br>

        <?php $substitute = get_field('substitute'); if(!empty($substitute)):?>
        <dt><?php $substituteObject = get_field_object('breeder');  echo $substituteObject['label']; ?>: </dt>
        <dd>
        <ul>
        <?php foreach( $substitute as $post): // variable must be called $post (IMPORTANT) ?>
            <?php setup_postdata($post); ?>
            <li>
                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
            </li>
        <?php endforeach; ?>
        </ul>
        <?php wp_reset_postdata(); ?>
        </dd><br> 
        
        <?php endif; ?>

				<br>
			</dl>
      <?php if( have_rows('pantones') ): ?>
        <ul class="pantones">
          <?php while( have_rows('pantones') ): the_row();?>
            <li>
              <p><?php get_sub_field('name_pantone') ?></p>
              <div class="color-pantone" style="background-color:<?php get_sub_field('color_pantone'); ?>"></div>
            </li>
          <?php endwhile; ?>
        </ul>
      <?php endif; ?>
    </div>
  </div>
  <?php if (get_field('url_video')){?>
  <div class="row">
    <div class="col video-responsive ">
      <?php the_field('url_video'); ?>
    </div>
  </div>
  <?php } ?>
</div>





<script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
<script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>

<?php wp_enqueue_style('slick', get_stylesheet_directory_uri().'/assets/css/slick.css', array(), '1',false); ?>
<?php wp_enqueue_style('slick-theme', get_stylesheet_directory_uri().'/assets/css/slick-theme.css', array(), '1',false); ?>
<?php wp_enqueue_script('slick', get_stylesheet_directory_uri().'/assets/js/slick.min.js', array(), '1',true); ?>

  <script type="text/javascript">
    $(document).ready(function(){
      $('.slider-rose').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        adaptiveHeight: true,
        arrows: false,
        fade: true,
        speed: 500,
        asNavFor: '.carousel'
      });
      $('.carousel').slick({
        slidesToShow: 4,
        slidesToScroll: 1,
        asNavFor: '.slider-rose',
        centerMode: true,
        focusOnSelect: true,
        arrows: true
      });
    });
  </script>

<?php get_footer(); ?>

