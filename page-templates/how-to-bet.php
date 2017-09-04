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
                    <?php $loop = new WP_Query( array( 'post_type' => 'bonus', 'posts_per_page' => -1)); ?>
                    <?php if ( $loop->have_posts() ) : ?>
                        <div class="bonuses">
                            <div class="bonus-top">
                                <span>Copmany</span>
                                <span>Bonus</span>
                            </div>
                            <?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
                                <div class="bonus-grid">
                                    <a target="_blank" href="<?php the_field('bonus-link') ; ?>" class="absolute-link"></a>
                                    <div class="bonus-logo">
                                        <img src="<?php the_field('bonus-logo') ; ?>" />
                                    </div>
                                    <p><?php the_field('bonus-text') ; ?></p>
                                </div>
                            <?php endwhile; ?>
                        </div>
                    <?php endif; ?>
                    <?php wp_reset_query(); ?>
                </div>
            </div>
        </div>
    </section>

<?php get_footer() ; ?>