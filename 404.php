<?php get_header(); ?>

	<main role="main" id="page-content" style="margin-top: 4em;">
		<section>
			<div class="container">
                <span class="center divider"></span>
				<article id="post-404" class="center">

					<div><?php the_field( '404_message', 'option' ); ?></div>
					<h2>
						<a href="<?php echo home_url(); ?>"><?php _e( 'Return home?', 'theme5150' ); ?></a>
					</h2>

				</article>
                <span class="center divider"></span>
			</div>
		</section>
	</main>

<?php get_footer(); ?>
