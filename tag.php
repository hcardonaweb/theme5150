<?php get_header(); ?>

	<main role="main" id="page-content">
		<section>

			<h1><?php _e( 'Tag Archive: ', 'theme5150' ); echo single_tag_title('', false); ?></h1>

			<?php get_template_part('loop'); ?>

			<?php get_template_part('pagination'); ?>

		</section>
	</main>

<?php get_sidebar(); ?>

<?php get_footer(); ?>
