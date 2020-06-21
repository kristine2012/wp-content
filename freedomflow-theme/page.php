
<?php get_header(); ?>


<section class="page-wrap container-fluid">
  <div class="woocommerce-page">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <h1 class="display-3"><php the_title(); ?></h1>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-12">
             <?php if(has_post_thumbnail()): ?>
            This has a featured image
            <div>
              <img src="<?php the_post_thumbnail_url('blog-large'); ?>" alt="<?php the_title(); ?>" class="mb-3 img-fluid img-thumbnail">
            </div>
            <?php endif; ?> 
        </div>
      </div>
    </div>
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <h1 class="title display-3"><?php the_title(); ?></h1>
          <div class="container">
            <?php get_template_part('includes/section','content'); ?>
          </div>
        </div>
        <div class="col-lg-3 widget">
          <?php if(is_active_sidebar('page-sidebar')) :?>
            <?php dynamic_sidebar('page-sidebar'); ?>
          <?php endif; ?> 
        </div>
      </div>
    </div>
  </div>
</section>

<?php get_footer(); ?>
