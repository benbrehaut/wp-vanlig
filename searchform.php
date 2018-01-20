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

<form role="search" method="get" id="searchform" class="c-search-form" action="<?php echo home_url( '/' ); ?>">
	<div class="c-input-group">
		<div class="c-input-group__field">
      <label class="_sr-hidden" for="s">Search the site</label>
			<input type="text" class="input-field" value="" name="s" id="s" placeholder="<?php esc_attr_e( 'Search', 'vanlig' ); ?>">
		</div>
		<div class="c-input-group__button">
			<button type="submit" id="searchsubmit" class="btn btn-secondary">
			    <?php esc_attr_e( 'Search', 'vanlig' ); ?>
			</button>
		</div>
	</div>
</form>
