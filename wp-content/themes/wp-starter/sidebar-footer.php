<?php
/**
 * The Footer Sidebar. This sidebar contains the three footer widget areas.
 *
 * If no active widgets are in either sidebar, they will be hidden completely.
 *
 * @package WordPress
 * @subpackage WP_Forge
 * @since WP-Forge 5.5.1.7
 */

/*
 * The footer widget area is triggered if any of the areas have widgets. So let's check that first.
 *
 * If none of the sidebars have widgets, we wont see anything.
 */
// if ( ! is_active_sidebar( 'footer-sidebar-1' )
// 	&& ! is_active_sidebar( 'footer-sidebar-2' )
// 	&& ! is_active_sidebar( 'footer-sidebar-3' )	
	
// 	)
// 	return;

// If we get this far, we have widgets. Let do this.
?>

<div class="sidebar_container">

    <div id="secondary-sidebar" class="sidebar_wrap row widget-area" role="complementary">
        <div class="medium-4 large-3 columns">
        </div>
    	<div class="medium-8 large-9 columns">

            <a href="http://www.nachc.com/client/Hometown%20Letter%20NACHC%20ATSU.pdf" target="_blank" style="text-decoration:none !important;"><img src="/wp-content/uploads/2015/09/stills-ad.gif" /></a>
            <a href="http://nhsc.hrsa.gov/" target="_blank" style="text-decoration:none !important;"><img src="http://nachc.com/client/images/ads/NHSC%20updated%20logo.JPG" /></a>
            <a href="http://www.rchnfoundation.org" target="_blank" style="text-decoration:none !important;"><img src="http://nachc.com/client/images/ads/RCHN.jpg" /></a> 

    	</div><!-- /columns -->    
                
    </div><!-- #secondary -->

</div><!-- end .sidebar_container -->