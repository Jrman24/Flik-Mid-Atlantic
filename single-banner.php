<?php
/**
 * Template Name: Single Banner
 *
 * @package flik
 */

get_header(); ?>

<?php $banner_text = get_field('banner_text');?>

<section class="property-intro">
    <div class="prop-img" style="background: url(<?php	 if ( has_post_thumbnail() )  {
             the_post_thumbnail_url( );
			} elseif ( $img ) {
				echo wp_get_attachment_image_url( $img, ' ' );
			}else{
            echo get_stylesheet_directory_uri(). '/images/flik-other-properties.jpg';
        }
        ?>);">
    </div>
    <!--intro end-->
    <?php if(!empty($banner_text)){?>
        <div class="container">
            <?php echo $banner_text?>
        </div>
    <?php } ?>
</section>
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
<div class="form-content container">
    <?php if ( is_active_sidebar( 'contact-form' ) ) {?>
        <div class="col-md-8">
            <?php  dynamic_sidebar( 'contact-form' );?>
        </div>
    <?php };?>
</div>
<?php if ( is_active_sidebar( 'see-how' ) ) {
    dynamic_sidebar( 'see-how' );
};?>
<?php if ( is_active_sidebar( 'food-philosophy' ) ) {
    dynamic_sidebar( 'food-philosophy' );
};?>


<?php get_footer(); ?>
