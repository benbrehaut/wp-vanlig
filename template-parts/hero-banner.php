<?php
/**
 * The template for displaying the banner (featured image).
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage vanlig
 * @since 1.0
 * @version 2.0
 */

// If a feature image is set, get the id, so it can be injected as a css background property
if ( has_post_thumbnail( $post->ID ) ) :
	$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' );
	$image = $image[0]; ?>

	<header class="hero-banner" style="background-image: url('<?php echo $image; ?>')"></header>
<?php
	endif;
?>
