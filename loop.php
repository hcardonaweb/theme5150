<?php if (have_posts()): while (have_posts()) : the_post(); ?>

	<!-- article -->
	<article id="post-<?php the_ID(); ?>" <?php post_class('clear'); ?>>

		<!-- post thumbnail -->
		<?php if ( has_post_thumbnail()) : // Check if thumbnail exists ?>
			<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="post-thumb">
				<?php the_post_thumbnail(); // Declare pixel size you need inside the array ?>
			</a>
		<?php endif; ?>

		<div class="post-content">
            <!-- post category -->
            <span class="thumb-category"><?php $category = get_the_category(); echo $category[0]->cat_name; ?></span>
			<!-- post title -->
			<h2>
				<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
			</h2>

			<!-- post details -->
			<div class="post-details">
				<span class="date"><?php the_time('F j, Y'); ?></span>
			</div>

			<?php html5wp_excerpt('html5wp_index'); // Build your custom callback length in functions.php ?>
		</div>

		<?php //edit_post_link(); ?>

	</article>

<?php endwhile; ?>

<?php else: ?>

	<!-- article -->
	<article>
		<h2><?php _e( 'Sorry, nothing to display.', 'theme5150' ); ?></h2>
	</article>

<?php endif; ?>
