<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @package flik
 */

get_header(); ?>

<div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">

        <section class="error-404 not-found">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <header class="page-header">
                            <h1 class="page-title"><?php esc_html_e( "The page you are looking for can't be found.", 'flik' ); ?></h1>
                        </header><!-- .page-header -->

                        <div class="page-content">
                            <p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'flik' ); ?></p>

                            <?php get_search_form(); ?>
                        </div><!-- .page-content -->
                    </div>
                </div>
            </div>
        </section><!-- .error-404 -->

    </main><!-- #main -->
</div><!-- #primary -->

<?php get_footer(); ?>
