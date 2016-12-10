<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @package WordPress
 * @subpackage halos
 * @since 1.0
 * @version 1.0
 */
get_header();
?>

    <section class="error-page">
        <header class="error-page__header">
            <h1>404 - File not Found</h1>
        </header>
        <div class="error-page__content">
            <p>The page you are looking for might have been removed, had its name changed or is unavailable.</p>
            <p>If you are still stuck, please try some of these suggestions.</p>
            <ul>
                <li>Check your spelling.</li>
                <li>Return to the <a href="<?php echo esc_url( home_url( '/' ) ); ?>">home page</a></li>
                <li>Go back to your <a href="javascript:history.back()">last page</a></li>
            </ul>
        </div>
    </section>

<?php get_footer();
