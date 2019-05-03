<?php
/**
 * Template Name: Banner Page
 *
 * @package flik
 */

get_header(); ?>

<?php $banner_text = get_field('banner_text');?>


<div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">

        <?php while ( have_posts() ) : the_post(); ?>

            <?php get_template_part( 'template-parts/content', 'page' ); ?>

            <?php
            // If comments are open or we have at least one comment, load up the comment template
            if ( comments_open() || get_comments_number() ) :
                comments_template();
            endif;
            ?>

        <?php endwhile; // end of the loop. ?>

    </main><!-- #main -->
</div><!-- #primary -->

<?php if ( is_active_sidebar( 'see-how' ) ) {
    dynamic_sidebar( 'see-how' );
};?>


<?php get_footer(); ?>
