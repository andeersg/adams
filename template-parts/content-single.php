<?php
/**
 * @package Adams
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
  	<?php if ( 'post' == get_post_type() ) : ?>
		<div class="post__meta">
			<?php adams_posted_on(); ?>
		</div><!-- .entry-meta -->
		<?php endif; ?>
		<?php the_title( sprintf( '<h1 class="post__title">', esc_url( get_permalink() ) ), '</h1>' ); ?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php the_content(); ?>

		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'adams' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->
	<footer class="post__footer">
		<?php adams_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->