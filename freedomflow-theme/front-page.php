<?php get_header(); ?>
<!-- IF: featured image -->
<?php if ( get_header_image() ) : ?>
    <div class="container text-center site-header">
        <div class="row">
            <div class="col-lg-12">
            <img class="header-image" src="<?php header_image(); ?>" width="<?php echo absint( get_custom_header()->width ); ?>" height="<?php echo absint( get_custom_header()->height ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>">
            </div>
        </div>
    </div>
<?php endif; ?>
<div>
    <div class="container-fluid__front-para p-5">
        <div class="row">
            <div class="col-lg-12 ">
                        <?php
                // TO SHOW THE PAGE CONTENTS
                while ( have_posts() ) : the_post(); ?> <!--Because the_content() works only inside a WP Loop -->
                    <div class="entry-content-page">
                        <?php the_content(); ?> <!-- Page Content -->
                    </div><!-- .entry-content-page -->

                <?php
                endwhile; //resetting the page loop
                wp_reset_query(); //resetting the page query
                ?>
            </div>
        </div>
    </div>
    <div class="donation">
        <div class="donation__content text-center">
            <h2>Let us be period poverty free</h2>
            <p>Working together with schools, work place environments and local communities, we have what it takes to end this poverty .Be part of the change.</p><br>
            <a href="" class="btn btn-primary uppercase">Donate</a> 
        </div>
    </div>
</div>

<?php get_footer(); ?>       