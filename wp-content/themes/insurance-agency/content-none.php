<?php
/**
 *  The template part for displaying a message that posts cannot be found
 *
 */
get_header(); ?>
  <h4><?php esc_html_e( 'Nothing Found', 'insurance-agency' ); ?></h4>
    <?php if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>
      <p><?php printf( esc_html__( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'insurance-agency' ), esc_url( admin_url( 'post-new.php' ) ) ); ?></p>
    <?php elseif ( is_search() ) : ?>
			<p><?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'insurance-agency' ); ?></p>
		<?php get_search_form(); ?>
    <?php else : ?>
			<p><?php esc_html_e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'insurance-agency' ); ?></p>
		<?php get_search_form(); ?>
		<?php endif; ?>
