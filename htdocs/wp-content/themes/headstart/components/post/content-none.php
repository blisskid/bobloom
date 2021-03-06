<?php
/**
 * Template part for displaying a message that posts cannot be found.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package headstart
 */

?>

<section class="<?php if ( is_404() ) { echo 'error-404'; } else { echo 'no-results'; } ?> not-found hentry">
	<header class="entry-header">
		<h1 class="entry-title">
                    <?php 
                    if ( is_404() ) { esc_html_e( 'Nothing found', 'headstart' ); }
                    else if ( is_search() ) { printf( esc_html_e( 'Nothing found for ', 'headstart' ) . '<ins>' . get_search_query() . '</ins>' ); } 
                    else if ( is_page_template( 'page-templates/page-client.php' ) ) { esc_html_e( 'Additional Setup required', 'headstart' ); }
                    else { esc_html_e( 'Nothing found', 'headstart' ); }
                    ?>
                </h1>
	</header><!-- .page-header -->

	<div class="entry-content">
		<?php if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>

			<p><?php 
                            /* translators: %1$s: link to create a new post */
                            printf( wp_kses( __( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'headstart' ), array( 'a' => array( 'href' => array() ) ) ), esc_url( admin_url( 'post-new.php' ) ) ); 
                        ?></p>

		<?php elseif ( is_404() ) : ?>
                        
                        <p><?php esc_html_e( 'Looking for something? Try a search.', 'headstart' ); ?></p>
                        <?php get_search_form(); ?>
                             
                <?php elseif ( is_search() ) : ?>

			<p><?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'headstart' ); ?></p>
			<?php get_search_form(); ?>
                        
                <?php elseif ( is_page_template( 'page-templates/page-client.php' ) ) : ?>

			<p><?php esc_html_e( 'Please check the following THREE conditions to display client projects on this page:', 'headstart' ); ?></p>
                        <ol>
                            <li><?php esc_html_e( 'Be sure Jetpack and its Portfolio custom content type are activated.', 'headstart' ); ?></li>
                            <li><?php esc_html_e( 'In THIS PAGE assign a custom meta key of client with a value of the Clients name ie client WordPress.', 'headstart' ); ?></li>
                            <li><?php esc_html_e( 'On every Client Project page (i.e. something created for WordPress), be sure to Tag it with the same Client name.', 'headstart' ); ?></li>
                        </ol>
			<?php get_search_form(); ?>

		<?php else : ?>

			<p><?php esc_html_e( 'It seems we cant find what you are looking for. Perhaps searching can help.', 'headstart' ); ?></p>
			<?php get_search_form(); ?>

		<?php endif; ?>
	</div><!-- .page-content -->
    </section><!-- .no-results -->
