<?php
/**
 * The template for displaying search form
 *
 * @package WordPress
 * @subpackage vanlig
 * @since 1.0
 * @version 2.0
 */
 ?>

<form role="search" method="get" id="searchform" class="search-form" action="<?php echo home_url( '/' ); ?>">
	<div class="input-group">
        <label for="s">Search the site</label>
		<input type="text" class="input-group-field" value="" name="s" id="s" placeholder="<?php esc_attr_e( 'Search', 'halos' ); ?>">
		<div class="input-group-button">
			<button type="submit" id="searchsubmit" class="btn btn-primary">
			    <?php esc_attr_e( 'Search', 'halos' ); ?>
			</button>
		</div>
	</div>
</form>
