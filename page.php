<?php get_header(); ?>

	<main role="main" id="page-content" class="container">

		<?php if (have_posts()): while (have_posts()) : the_post(); ?>

			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <h1 class="mb-5"><?php the_title(); ?></h1>
				
				<?php the_content(); ?>

                <?php if ( have_rows( 'gray_buttons' ) ) : ?>
                    <?php include get_template_directory() . '/templates/part-bottom-cta-section.php'; ?>
                <?php endif; ?>

			</article>

		<?php endwhile; ?>
		<?php endif; ?>

	</main>

<?php //get_sidebar(); ?>

<?php get_footer(); ?>
