<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package WordPress
 * @subpackage WP_Forge
 * @since WP-Forge 5.5.1.7
 */
?>

	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		
		<header class="entry-header">
			<h1 class="entry-title"><?php the_title(); ?></h1>
		</header>

		<!-- <div class="row"> -->
		
				<?php  
			    $current = $post->ID;
			    $parent = $post->post_parent;
			    $grandparent_get = get_post($parent);
			    $grandparent = $grandparent_get->post_parent;
			    ?>

    			<?php 
    			if ($root_parent = get_the_title($grandparent) 
    			!== $root_parent = get_the_title($current)) 
    				{$children = wp_list_pages('title_li=&child_of='.$post->post_parent.'&echo=0&depth=1'); }
    				else 
    				{$children = wp_list_pages('title_li=&child_of='.$post->ID.'&echo=0&depth=1'); }
    			?>
		
				<?php
					if ( $children ) {
					  echo '<div class="row"><div class="medium-3 columns"><aside class="widget submenu"><div class="widget-content"><h3 class="widget-title">In this section:</h3><ul class="menu">';
					  echo $children;
					  echo '</ul></div><div class="clear"></div></aside></div><div class="medium-9 columns">';
					  echo the_content();
					  //echo wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'wp-forge' ), 'after' => '</div>' ) );
					  echo '</div><!-- .entry-content --></div><!-- .row -->';
					}
					else
					  echo the_content(); wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'wp-forge' ), 'after' => '</div>' ) );
				?>

		<!-- </div> -->
		<footer class="entry-meta">
			<?php edit_post_link( __( 'Edit Page', 'wp-forge' ), '<span class="edit-link"><span class="genericon genericon-edit"></span>', '</span>' ); ?>
		</footer><!-- .entry-meta -->
	</article><!-- #post -->
