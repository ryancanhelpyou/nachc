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


		<div id="content" class="medium-9 large-9 columns" role="main">
		<div class="row banner">
		
			<!-- <img class="alignnone wp-image-637 size-full" src="http://104.236.113.187/wp-content/uploads/2015/06/Screenshot-2015-06-02-00.35.34-e1433219854545.png" alt="Screenshot 2015-06-02 00.35.34" width="1506" height="381" /> -->

			<a href="http://meetings.nachc.com/c-training/national-farmworkers-health-conference/"><img src="http://dev.nachc.org/wp-content/uploads/2016/04/cawh.png" alt="Conference for Agricultural Worker Health"/></a>
			<a href="http://ourstories.nachc.org"><img src="/wp-content/uploads/2015/06/healthcenterstories.png" alt="NACHC Stories"/></a>
	
		</div>
		<div class="row">

				<div class="medium-8 large-8 columns">

					<div class="nachc-alerts">
						<h2><?php the_field('news_alerts_title', 'option'); ?></h2>
						<?php $args = array( 
						'post_type' => 'news_center', 
						'posts_per_page' => get_field('number_of_alerts_to_display', 'option'),
						'tax_query' => array(
						        array(
						            'taxonomy' => 'news_category',
						            'field' => 'slug',
						            'terms' => 'alerts'
						        )
						    )
						);
						$loop = new WP_Query( $args );
						while ( $loop->have_posts() ) : $loop->the_post(); ?>
						  <div class="entry-content">
						  <p><?php echo the_date('m.d.Y', '<strong>', '</strong>');?></p>
						  <h3><a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php echo the_title();?></a></h3>
						  <p><?php echo the_excerpt();?></p>
						  </div>
						<?php endwhile; ?>
					</div>

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

					<hr />

					<form name="mvsearch" id="mvsearch" action="http://communityhealthcentersbuyersguide.com/results.php?wS=1&amp;v=2.0" method="get" target="_self">
					  <input type="hidden" name="search_type" value="keyword"><input type="hidden" name="si" value="nachc"><input type="hidden" name="wS" value="1"><input type="hidden" name="v" value="2.2">
					  	<h4>Community Health Center Buyer's Guide</h4>
					  	<div class="row input">
		                    <div class="large-12 columns">
		                      <div class="row collapse">
		                        <div class="small-9 columns">
		                          <input type="text" size="22" id="term" name="term" placeholder="Search" />
		                        </div>
		                        <div class="small-3 columns">
		                        	<input name="submit" type="submit" class="postfix" value="Go" />
		                       <!--    <a href="#" class="button postfix">Go</a> -->
		                        </div>
		                      </div>
		                    </div>
		                </div>
					</form>

				</div>
				<div class="medium-4 large-4 columns nachc-news">
					<h2><?php the_field('news_sidebar_title', 'option'); ?></h2>
					<?php $args2 = array( 
						'post_type' => 'news_center', 
						'posts_per_page' => get_field('number_of_news_to_display', 'option'),
						'tax_query' => array(
						        array(
						            'taxonomy' => 'news_category',
						            'field' => 'slug',
						            'terms' => 'press-releases'
						        )
						    )
						);
						$loop2 = new WP_Query( $args2 );
					while ( $loop2->have_posts() ) : $loop2->the_post(); ?>
					  	<div class="entry-content">
						  <p><strong><?php echo get_the_date('m.d.Y');?></strong></p>
						  <h3><a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php echo the_title();?></a></h3>
						  <p><?php echo the_excerpt();?></p>
						</div>
					<?php endwhile; ?>
				</div>
			     
			</div><!-- row -->

	</div><!-- #content -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>