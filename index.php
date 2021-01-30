<?php get_header(); ?>

<main role="main" id="page-content">
    <div class="container">
        <div class="blog-intro clearfix">
            <h1><?php single_post_title(); ?></h1>

            <form id='searchform' method='get'>
                <input type='text' name='s' id='s'>
                <input type='hidden' name='post_type' value='post' />
                <button type="submit" form="searchform" value="Submit">Submit</button>
            </form>
        </div>

        <section class="d-flex justify-content-between flex-wrap mt-5">

            <?php if (have_posts()): while (have_posts()) : the_post(); ?>

                <?php get_template_part( 'intro_text', get_post_format() ); ?>

                <article id="post-<?php the_ID(); ?>" class="d-flex justify-content-between flex-wrap">

                    <?php if ( has_post_thumbnail()) : // Check if thumbnail exists ?>
                        <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="post-thumb">
                            <?php the_post_thumbnail('full'); // Declare pixel size you need inside the array ?>
                        </a>
                    <?php endif; ?>

                    <div class="post-content">
                        <h2><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
                        <p><?php  the_excerpt(); ?></p>
                        <a class="read-more" href="<?php the_permalink(); ?>">Read More</a>
                    </div>

                </article>

            <?php endwhile; ?>
            <?php else: ?>
                <article>
                    <h2><?php _e( 'Sorry, nothing to display.', 'theme5150' ); ?></h2>
                </article>
            <?php endif; ?>


            <?php get_template_part('pagination'); ?>
        </section>

        <?php
        $post_id = false;
        if( is_home() ) {
            $post_id = 890; // specif ID of blog page
        } ?>
        <div class="bottom-services-links d-flex justify-content-center flex-wrap">
            <?php while ( have_rows( 'gray_buttons', $post_id ) ) : the_row();
                $icon = get_sub_field( 'icon' );
                $link = get_sub_field( 'link' );
                ?>
                <a class="service-link design-consultation" href="<?php echo $link['url']; ?>" target="<?php echo $link['target']; ?>">
                    <?php if ( get_sub_field( 'icon' ) ) : ?>
                        <img src="<?php echo $icon['url']; ?>" alt="<?php echo $icon['alt']; ?>" />
                    <?php endif; ?>
                    <span><?php the_sub_field( 'text' ); ?></span>
                </a>
            <?php endwhile; ?>
        </div>
    </div>
</main>

<?php get_footer(); ?>
