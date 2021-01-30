<?php get_header(); ?>

<main role="main" id="page-content">
	<section>

		<h1><?php _e( 'Archives', 'theme5150' ); ?></h1>

		<?php get_template_part('loop'); ?>

		<?php get_template_part('pagination'); ?>

	</section>
</main>

<?php get_sidebar(); ?>

<?php get_footer(); ?>
