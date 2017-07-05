<?php
/**
 * The template for displaying all single posts and attachments
 *
 * @package cone
 */

get_header(); ?>

<?php while ( have_posts() ) : the_post(); ?>

    <?php get_template_part( 'template-parts/content', get_post_format() ); ?>

<?php endwhile; ?>

<?php get_footer(); ?>