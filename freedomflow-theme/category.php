<?php
/**
 * The template for displaying archive freedomflowposts

 */

get_header();
?>

<?php if (have_posts()) :?> 
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <header class="archive-header"><h1 class="h1"><?php single_cat_title( __( 'Currently browsing: ', 'textdomain' ) ); ?></h1></header>
<?php
  while (have_posts()):
    the_post();
    
?>
<div class="card">  
  <div class="row">
    <!-- IF: featured image -->
    <?php
      if (has_post_thumbnail()):
        $thumb_id = get_post_thumbnail_id();
        $thumb_url_array = wp_get_attachment_image_src($thumb_id, 'thumbnail-size', true);
        $thumb_url = $thumb_url_array[0];
    ?>
    <div class="col-lg-6 feature-image" style="background-image: url('<?php echo $thumb_url?>')">
      <?php echo the_post_thumbnail( 'thumbnail', array( 'class' => 'thumbnail-image' ) ); // <img /> ?>
    </div>
    <?php endif; ?>
    <div class="col-lg-6 post-content">
      <span class="timestamp"><?php $post_date = get_the_date( 'l F j, Y' ); echo $post_date;; //check php date format ?></span>
      <br>
      <h1 class="title display-3"><?php the_title(); ?> </h1>
        <?php
          the_excerpt();
        ?>
        <a class="btn btn-primary mt-3 mb-3" href="<?php the_permalink(); ?>">Read more</a>
    </div>
  </div>
</div>
<?php endwhile; ?>
        </div>
    </div>
</div>
<?php
 else:
endif;
?>


<!-- <div class="container">
    <div class="row">
        <div class="col-lg-12">
        <?php
                if(have_posts()) : 
                    while(have_posts()) : 
            ?>
                    <div class="card">
                        <?php the_post(); ?>
                        <a href="<?php the_permalink(); ?>"><h3><?php the_title(); ?></h3></a>
                        <?php the_content(); ?>
                    </div>
            <?php
                    endwhile; 
                endif;
            ?>
        </div>
    </div>
</div> -->

<?php get_footer();?>
