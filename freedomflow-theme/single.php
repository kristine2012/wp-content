<?php get_header(); ?>
  <!-- template: single.php -->
  <section class="page-wrap">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <h1 class="title text-center mt-7 mb-5"> <?php the_title(); ?>   </h1>
        </div>
      </div>
        
      <div class="row">
        <div class="col-12">
          <?php if(has_post_thumbnail()): ?>
              <div>
                <img src="<?php the_post_thumbnail_url('blog-large'); ?>" alt="<?php the_title(); ?>" class="mb-3 img-fluid img-thumbnail">
              </div>
          <?php endif; ?>
        </div>
      </div>
      <div class="row">
        <div class="col-12">
            <?php get_template_part('includes/section','blogcontent'); ?>
            <?php get_template_part('includes/section','post-navigation'); ?>
        </div>
      </div>    
    </div>
  </section>
<?php get_footer(); ?>