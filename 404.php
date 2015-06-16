<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @package Adams
 */

get_header(); ?>

	<div id="primary" class="content-area col-md-12">

			<section class="error-404 not-found">
				<header class="page-header">
					<h1 class="page-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'adams' ); ?></h1>
				</header><!-- .page-header -->

				<div class="page-content">
					<p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'adams' ); ?></p>

				</div><!-- .page-content -->
			</section><!-- .error-404 -->

	</div><!-- #primary -->

<?php get_footer(); ?>
