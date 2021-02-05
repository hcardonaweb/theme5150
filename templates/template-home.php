<?php
/*
 * Template Name: Homepage Template
 */

get_header(); ?>

<main role="main" id="page-content">
    <article>
        <?php
        $portfolio_link = get_sub_field('portfolio_button');
        $portfolio_link_url = $portfolio_link['url'];
        $portfolio_link_title = $portfolio_link['title'];
        $portfolio_link_target = $portfolio_link['target'] ? $portfolio_link['target'] : '_self';
        $about_link = get_sub_field('about_button');
        $about_link_url = $about_link['url'];
        $about_link_title = $about_link['title'];
        $about_link_target = $about_link['target'] ? $about_link['target'] : '_self';
        ?>
        <section class="homepage-hero">
            <div class="container">
                <div class="hero-text">
                    <h1><?php the_field( 'headline_text' ); ?></h1>
                </div>
            </div>
        </section>

        <?php if ( have_rows( 'cta_banner' ) ) : ?>
            <?php while ( have_rows( 'cta_banner' ) ) : the_row(); ?>
            <section class="cta-banner">
                <div class="container">
                    <h2><?php the_sub_field( 'cta_headline' ); ?></h2>
                </div>
            </section>
            <?php endwhile; ?>
        <?php endif; ?>

    </article>
</main>

<?php get_footer(); ?>
