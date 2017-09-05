<?php
/**
 * Template Name: betting sites
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
<section class="single-section home-section">
    <div class="max-width small-width">
        <div class="other-headline">
            <?php the_content() ; ?>
        </div>
        <div class="other-list">
            <?php if( have_rows('others') ): ?>
                <?php while( have_rows('others') ) : the_row();?>
                    <div class="other-list-item">
                        <h3><?php the_sub_field('others-headline') ; ?></h3>
                        <?php if( have_rows('other') ): ?>
                            <div class="bonuses">
                                <?php while( have_rows('other') ) : the_row();?>
                                    <div class="bonus-grid">
                                        <a target="_blank" href="<?php the_sub_field('other-link') ; ?>" class="absolute-link"></a>
                                        <div class="bonus-logo">
                                            <img src="<?php the_sub_field('other-logo') ; ?>" />
                                        </div>
                                        <p><?php the_sub_field('other-bonus') ; ?></p>
                                    </div>
                                <?php endwhile; ?>
                            </div>
                        <?php endif; ?>
                    </div>
                <?php endwhile; ?>
            <?php endif; ?>
        </div>
    </div>
</section>

<?php get_footer() ; ?>
