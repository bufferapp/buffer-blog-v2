<?php
/**
 * @package Buffer
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title"><span class="title-nolink">', '</span></h1>' ); ?>

			<div class="featured-image">
				<span class="gradient-overlay"></span>
				<?php
				// Must be inside a loop.

				if ( has_post_thumbnail() ) {
					the_post_thumbnail();
				}
				else {
					echo '<img src="' . get_bloginfo( 'stylesheet_directory' ) . '/images/article-header-default.png" />';
				}
				?>
			</div>

	</header><!-- .entry-header -->

	<div class="entry-meta">
		<?php buffer_posted_on(); ?>
	</div><!-- .entry-meta -->

	<div class="entry-content">
		<?php the_content(); ?>

		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'buffer' ),
				'after'  => '</div>',
			) );
		?>

		<div class="tags-list">
			<?php echo get_the_tag_list(); ?>
		</div>

	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<div class="author-bio-avatar"><a href="<?php the_author_meta('user_url'); ?>"><?php echo get_avatar( get_the_author_meta('ID')); ?></a></div>
		<p class="footer-byline">Written by <a href="<?php the_author_meta('user_url'); ?>"><?php the_author_meta('display_name'); ?></a></p>
		<p class="footer-author-bio"><?php the_author_meta('description'); ?></a></p>
		<div class="twitter-badge"><a href="<?php the_author_meta('twitter'); ?>" class="twitter-follow-button" data-width="250" data-size="small" data-show-count="true">Follow @<?php the_author_meta('twitter'); ?></a></div>
		<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="http://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
	</footer><!-- .entry-footer -->

</article><!-- #post-## -->

<?php buffer_post_nav(); ?>
