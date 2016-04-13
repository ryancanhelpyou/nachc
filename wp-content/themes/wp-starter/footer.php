<?php
/**
 * The template for displaying the footer.
 *
 * Contains footer content and the closing of the
 * #main and #page div elements.
 *
 * @package WordPress
 * @subpackage WP_Forge
 * @since WP-Forge 5.5.1.7
 */
?>
	</section><!-- end .content-wrap -->
    </div><!-- end .content_container -->

    <?php  get_sidebar( 'footer' ); ?>

    <div class="footer_container">

    	<footer id="footer" class="footer_wrap row" role="contentinfo">

            <div class="site-info medium-4 large-4 columns">
                <p>
                7501 Wisconsin Ave, Suite 1100W<br />
                Bethesda, MD 20814 <a href="https://www.google.com/maps/dir//7501+Wisconsin+Ave+%231100w,+Bethesda,+MD+20814/@38.9854212,-77.093595,17z/data=!4m8!4m7!1m0!1m5!1m1!1s0x89b7c96525096e87:0x5f7fe88855b6fc90!2m2!1d-77.093595!2d38.9854212">(map)</a></p>
                <hr />
                <p>© <?php echo date("Y") ?> <a href="<?php echo site_url(); ?>">NACHC</a></p>
            </div><!-- .site-info -->

            <?php if ( has_nav_menu( 'social' ) ) : ?>
                <div class="social_wrap medium-4 large-4 columns">
                    <nav id="social-navigation" class="social-navigation" role="navigation">
                        <?php
                            // Social links navigation menu.
                            wp_nav_menu( array(
                                'theme_location' => 'social',
                                'depth'          => 1,
                                'link_before'    => '<span class="screen-reader-text">',
                                'link_after'     => '</span>',
                            ) );
                        ?>
                    </nav><!-- .social-navigation -->
                </div><!-- .social_wrap -->
            <?php endif; ?>

            <div class="logo medium-4 large-4 columns">
                <a href="<?php echo site_url(); ?>"><img src="http://nachc.com/site-images/nachc-logo-small.jpg" /></a>
            </div>    

    	</footer><!-- .row -->

    </div><!-- end #footer_container -->

<?php if( get_theme_mod( 'wpforge_mobile_display' ) == 'yes') { ?>

	  <a class="exit-off-canvas"></a>

	</div><!-- .inner-wrap -->

</div><!-- #off-canvas-wrap -->

<?php } // end if ?>

    <div id="backtotop" class="hvr-fade">

        <span class="genericon genericon-collapse"></span>

    </div><!-- #backtotop -->

<?php wp_footer(); ?>
</body>
</html>