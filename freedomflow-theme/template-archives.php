<?php get_header(); ?>
<!-- template: index.php -->
<h1 class="display-3"><?php echo single_cat_title(); ?></h1>
<?php get_template_part('includes/section','archive'); ?>
<?php previous_posts_link();  ?>
<?php next_posts_link();  ?>
<?php get_footer(); ?>