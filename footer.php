<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package flik
 */
?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="container">
            <div class="row">
                <div class="footer-logo col-md-6">
					<?php if ( get_theme_mod( 'flik_footer_logo' ) ) : ?>    
						<a href='<?php echo esc_url( home_url( '/' ) ); ?>' title='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>' rel='home'><img src='<?php echo esc_url( get_theme_mod( 'flik_footer_logo' ) ); ?>' alt='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>'></a>
                    <?php endif; ?>
					
                </div>
                <div class="footer-socials col-md-6">
                   	<?php if ( is_active_sidebar( 'footer-social' ) ) {
						dynamic_sidebar( 'footer-social' );
					};?> 
                </div>
            </div>

            <div class="row contact-info">
                <div class="contact-inner col-xs-12">
                    <div class="col-md-5 contact-content">
                        <div class="col-md-6">
							<?php if ( is_active_sidebar( 'footer-left' ) ) {
								dynamic_sidebar( 'footer-left' );
							};?>    
                        </div>
                        <div class="col-md-6">
                            <h4>Site Map</h4>
                            <div class="col-md-6 footer-nav-1">
                                <?php wp_nav_menu( array( 'theme_location' => 'footer', 'menu_id' => 'footer' ) ); ?>
                            </div>
                            <div class="col-md-6 footer-nav-2">
                                <?php wp_nav_menu( array( 'theme_location' => 'footer-2', 'menu_id' => 'footer-2' ) ); ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <p class="small-text">Website by <a href="http://www.marstudio.com" target="_blank">Marstudio</a></p>
                         <p class="small-text">&copy; <?php bloginfo( 'name' ); ?>.<br> All Rights reserved.</p>
                    </div>
                </div>
            </div>
            
		</div><!-- .container -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
