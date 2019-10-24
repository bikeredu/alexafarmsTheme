<?php
/**
 * Footer
 *
 * The footer template.
 *
 * @since   1.0.0
 * @package WP
 */


 
// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}?>
<footer>
	<div class="container">
		<div class="row">
			<div class="col footer-menu">
				<h3>Company</h3>
				<?php wp_nav_menu( array( 'theme_location' => 'footerCompany', 'container' => '', 'menu_class' => 'menu-bottom') ); ?>
			</div>
			<div class="col footer-menu">
				<h3>Connect</h3>
				<?php wp_nav_menu( array( 'theme_location' => 'footerConnect', 'container' => '', 'menu_class' => 'menu-bottom' ) ); ?>


				<div class="Socialmedia">
					<?php if( !get_theme_mod( "mytheme_social_facebook" ) ==''){ ?><a  href="<?php echo get_theme_mod( "mytheme_social_facebook" );?>"><i class="fab fa-facebook-f"></i></a> <?php } ?>
					<?php if( !get_theme_mod( "mytheme_social_twitter" ) ==''){ ?><a href="<?php echo get_theme_mod( "mytheme_social_twitter" );?>"><i class="fab fa-twitter"></i></a> <?php } ?>
					<?php if( !get_theme_mod( "mytheme_social_youtube" ) ==''){ ?><a href="<?php echo get_theme_mod( "mytheme_social_youtube" );?>"><i class="fab fa-youtube"></i></a> <?php } ?>
					<?php if( !get_theme_mod( "mytheme_social_pinterest" ) ==''){ ?><a href="<?php echo get_theme_mod( "mytheme_social_pinterest" );?>"><i class="fab fa-pinterest-p"></i></a> <?php } ?>
					<?php if( !get_theme_mod( "mytheme_social_instagram" ) ==''){ ?><a href="<?php echo get_theme_mod( "mytheme_social_instagram" );?>"><i class="fab fa-instagram"></i></a> <?php } ?>

				</div>
			</div>
			<div class="col footer-menu">
				<h3>Resources</h3>
				<?php wp_nav_menu( array( 'theme_location' => 'footerResources', 'container' => '', 'menu_class' => 'menu-bottom' ) ); ?>
			</div>
		</div>
		<div class="row copyright">
			<p> Copyright <?php echo date("Y");?> . All Rights Reserved. - Powered by Arango Studios.</p>
		</div>
	</div>
</footer>

<?php 
wp_footer(); ?>

</body>
</html>
