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

                
<!-- <form action="/newsletter.cfm" id="newsform" name="newsform" method="post" class="sidebar-form">
<input type="hidden" name="optin" value="1"><input type="hidden" name="EmailType" value="0"><input type="text" size="16" name="email" value="Email Address" onclick="document.newsform.email.value=&quot;&quot;;" class="sidebar-formfield">&nbsp;&nbsp;<input type="image" name="submit" src="/site-images/btn-go-orange.jpg">
</form>
 -->


                
             <p style="color: #FDF9F2 !important;opacity: .9;"><a href="http://feeds.feedburner.com/NationalAssociationofCommunityHealthCenters" target="_blank">Get it via our RSS feed</a></p>
             	<div class="row input">
                    <div class="large-12 columns">
                      <div class="row collapse">
                        <div class="small-9 columns">
                          <!-- FeedBurner signin script -->
                          <form action="http://www.feedburner.com/fb/a/emailverifySubmit?feedId=1280921" name="rssForm" method="post" target="popupwindow" onsubmit="window.open('http://www.feedburner.com', 'popupwindow', 'scrollbars=yes,width=550,height=520');return true"><input type="hidden" value="http://feeds.feedburner.com/~e?ffid=1280921" name="url"><input type="hidden" value="National Association of Community Health Centers" name="title">
                          <input type="text" name="email" value="Email Address" onclick="document.rssForm.email.value=&quot;&quot;;" size="16" maxlength="40" class="sidebar-formfield" />
                        </div>
                        <div class="small-3 columns">
                          <input name="submit" type="submit" class="postfix" value="Go" />
                          </form>
                        </div>
                      </div>
                      <a href="http://saveourchcs.org"><img src="http://dev.nachc.org/wp-content/uploads/2016/04/cfahc.jpg" alt="Campaign for America's Health Centers"></a>
                    </div>
                </div>
			</div>
</div>


		</div><!-- #secondary -->
	<?php endif; ?>