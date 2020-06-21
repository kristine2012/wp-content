<?php
/*
Template Name: Contact
*/
?>
[wpforms id="112" title="false" description="false"]

<?php get_header(); ?>

<section class="page-wrap">
  <div class="container ">
        <div class="contact-form">
          <div class="row">
            <div class="col-lg-12">
              <h1><?php the_title();?></h1>
              <div class="form-group">
                <label class="label" for="input-first-name">Enter your First Name</label>
                <input type="text" class="form-control mb-3" placeholder="First name">
                <label class="label" for="input-last-name">Enter your Last Name</label>
                <input type="text" class="form-control mb-3" placeholder="Last name">
                <label class="label" for="input-email">Enter your Email</label>
                <input type="text" class="form-control mb-3" placeholder="Email">
              </div> 
              <div class="form-group">
                <label for="exampleFormControlTextarea1">Example textarea</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Your comment or message..."></textarea>
                <br>
                <a class="btn btn-primary mt-3 mb-3" href="<?php the_permalink(); ?>">Submit</a> 
              </div>
              
              <div class="col">
                    <?php get_template_part('includes/section','content'); ?>
              </div>
          </div>
       </div>
  </div>
</section>

<?php get_footer(); ?>