<?php get_header(); ?>

	
<main role="main" id="page-content">
	<section>

	<?php if (have_posts()): while (have_posts()) : the_post(); ?>
        <div class="container">
            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

                <!-- post thumbnail -->
                <?php// if ( has_post_thumbnail()) : // Check if Thumbnail exists ?>
                    <?php// the_post_thumbnail(); // Fullsize image for the single post ?>
                <?php// endif; ?>

                <!-- post title -->
                <h1><?php the_title(); ?></h1>

                <!-- post details -->
<!--                <div class="post-details">-->
<!--                    <span class="date">--><?php //the_time('F j, Y'); ?><!-- --><?php //the_time('g:i a'); ?><!--</span>-->
<!--                    <span class="author">--><?php //_e( 'Published by', 'theme5150' ); ?><!-- --><?php //the_author_posts_link(); ?><!--</span>-->
<!--                </div>-->

                <?php the_content(); // Dynamic Content ?>

                <?php edit_post_link(); // Always handy to have Edit Post Links available ?>
            </article>
        </div>
	<?php endwhile; ?>
	<?php endif; ?>

    <?php if ( have_rows( 'gray_buttons', get_option('page_for_posts') ) ) : ?>
        <?php include get_template_directory() . '/templates/part-bottom-cta-section.php'; ?>
    <?php endif; ?>

	</section>
</main>

<?php get_footer(); ?>
