<?php get_header(); ?>

<main role="main" id="page-content">
    <div class="container">
        <div class="d-flex justify-content-between flex-wrap container">
            <section class="post-thumbnail-container">

                <?php get_template_part('loop'); ?>

                <?php get_template_part('pagination'); ?>

            </section>
            <!-- /section -->
            <?php get_sidebar(); ?>
        </div>
    </div>
</main>

<?php get_footer(); ?>
