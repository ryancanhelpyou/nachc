<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package WordPress
 * @subpackage WP_Forge
 * @since WP-Forge 5.5.1.7
 */

get_header(); ?>

		<div id="content" class="medium-8 large-9 columns" role="main">
    		
    		<?php while ( have_posts() ) : the_post();

				if ( is_page() && $post->post_parent ) {
				    // This is a subpage
				    get_template_part( 'content', 'sub-page' );

				} else {
				    // This is not a subpage
				    get_template_part( 'content', 'page' );
					comments_template( '', true );
				}
				
			endwhile; // end of the loop. ?>

		<?php if ( ! is_front_page() && function_exists('yoast_breadcrumb') ) { yoast_breadcrumb('<p class="breadcrumbs">','</p>'); } ?>


	</div><!-- #content -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>