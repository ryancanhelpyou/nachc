<?php
/**
 * The template for displaying the search form.
 *
 * @package WordPress
 * @subpackage WP_Forge
 * @since WP-Forge 5.5.1.7
 */
?>

<form role="search" method="get" id="searchform" action="<?php echo home_url('/'); ?>">
	<div class="row collapse">
		<div class="small-9 columns">
			<input type="text" value="" name="s" id="s" placeholder="<?php esc_attr_e('Search', 'wp-forge'); ?>">
		</div>
		<div class="small-3 columns">
			<input type="submit" id="searchsubmit" value="<?php esc_attr_e('Go', 'wp-forge'); ?>" class="button postfix">
		</div>
	</div>
</form>


