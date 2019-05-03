<?php
/**
 * The template for displaying Banner Images
 */
?>

	
<?php 
function inherited_featured_image( $page = NULL ) {
  if ( is_numeric( $page ) ) {
    $page = get_post( $page );
  } elseif( is_null( $page ) ) {
   $page = isset( $GLOBALS['post'] ) ? $GLOBALS['post'] : NULL;
  }
  if ( ! $page instanceof WP_Post ) return false;
   //if we are here we have a valid post object to check,
  // get the ancestors
  $ancestors = get_ancestors( $page->ID, $page->post_type );
 if ( empty( $ancestors ) ) return false;
  // ancestors found, let's check if there are featured images for them
 global $wpdb;
  $metas = $wpdb->get_results(
    "SELECT post_id, meta_value
    FROM {$wpdb->postmeta}
    WHERE meta_key = '_thumbnail_id'
    AND post_id IN (" . implode( ',', $ancestors ) . ");"
  );
  if ( empty( $metas ) ) return false;
  // extract only post ids from meta values
  $post_ids = array_map( 'intval', wp_list_pluck( $metas, 'post_id' ) ); 
  // compare each ancestor and if return meta value for nearest ancestor 
  foreach ( $ancestors as $ancestor ) {
    if ( ( $i = array_search( $ancestor, $post_ids, TRUE ) ) !== FALSE ) {
      return $metas[$i]->meta_value;
    }
 }
  return false;
}

$img = inherited_featured_image();
?>


    <section class="property-intro">
        <div class="prop-img" style="background: url(<?php	if ( is_single() || is_page('blog')) {
            echo get_stylesheet_directory_uri(). '/images/banner-blog.jpg';
        } else {
            if ( has_post_thumbnail() ) {
                the_post_thumbnail_url( );
            } elseif ( $img ) {
                echo wp_get_attachment_image_url( $img, ' ' );
            }
            else {
                echo get_stylesheet_directory_uri(). '/images/flik-other-properties.jpg';
            }
        }
        ?>);">
        </div>
        <div class="container">
                <?php if(is_single() || is_page('blog')){ ?>
                    <h3><span>Blog</span></h3>
                <?php } elseif (is_search()){?>
                    <h3>Search</h3>
                <?php } elseif (is_404()){?>
                    <h3>404</h3>
                <?php }else { ?>
                    <?php $banner_text = get_field('banner_text');?>
                    <?php if (!empty($banner_text)){?>
                        <h3>
                            <?php echo $banner_text?>
                        </h3>
                    <?php }?>
                <?php } ?>
        </div>
    </section>





