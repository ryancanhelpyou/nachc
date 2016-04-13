<?php
/**
 * The sidebar containing the main widget area.
 *
 * If no active widgets in sidebar, let's hide it completely.
 *
 * @package WordPress
 * @subpackage WP_Forge
 * @since WP-Forge 5.5.1.7
 */
?>

	<?php if ( is_active_sidebar( 'main-sidebar' ) ) : ?>
		<div id="secondary" class="medium-3 large-3 columns widget-area" role="complementary">
			<?php dynamic_sidebar( 'main-sidebar' ); ?>

			<?php get_template_part( 'content', 'social_menu' ); ?>

			<div class="subscribe-section">
        <h3 style="font-size: 100%;line-height: 1.2; color: #FDF9F2 !important;margin: 2em 0 0 0;opacity: .9;">Stay updated on <span style="font-weight: bold;font-size: 140%;line-height: 1;">Community<br /> Health Care</span></h3>
			 	<div class="row input">
                    <div class="large-12 columns">
                      <div class="row collapse">
                        <div class="small-9 columns">
                          <input type="text" placeholder="Email Address">
                        </div>
                        <div class="small-3 columns">
                          <a href="#" class="button postfix">Go</a>
                        </div>
                      </div>
                    </div>
                </div>
             <p style="color: #FDF9F2 !important;opacity: .9;">Get it via our RSS feed</p>
             	<div class="row input">
                    <div class="large-12 columns">
                      <div class="row collapse">
                        <div class="small-9 columns">
                          <input type="text" placeholder="Email Address">
                        </div>
                        <div class="small-3 columns">
                          <a href="#" class="button postfix">Go</a>
                        </div>
<a href="http://saveourchcs.org"><img src="http://dev.nachc.org/wp-content/uploads/2016/04/cfahc.jpg" alt="Campaign for America's Health Centers"></a>
                      </div>
                    </div>
                </div>
			</div>

			

		</div><!-- #secondary -->
	<?php endif; ?>