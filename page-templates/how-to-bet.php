<?php
/**
 * Template Name: How to bet
 */
?>
<?php get_header() ;
$current = $post->ID;
$parent = $post->post_parent;
?>

    <div class="second-header">
        <div class="max-width">
            <?php wp_nav_menu( array( 'theme_location' => get_the_title($parent), 'menu_class' => '' ) ); ?>
        </div>
    </div>
    <section class="single-section">
        <div class="max-width">
            <div class="two-col reverse-col">
                <div class="left-col">
                    <h1><?php the_title() ; ?></h1>
                    <div class="single-content">
                        <?php if( get_the_content()) : ?>
                            <div class="single-content-text">
                                <?php the_content() ; ?>
                            </div>
                        <?php endif ; ?>
                    </div>
                </div>
                <div class="right-col">
                    <?php get_template_part( 'template-parts/bonus', get_post_format() ); ?>
                </div>
            </div>
        </div>
    </section>

<?php get_footer() ; ?>