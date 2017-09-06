<?php
/**
 * Template Name: matches
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
    <div class="max-width esport-headlines">
        <?php the_content() ;?>
    </div>
    <div class="max-width">
        <div class="two-col reverse-col">
            <div class="left-col">
                <div class="home-grid">

                    <?php
                    $loop = new WP_Query( array( 'post_type' => array('match'), 'posts_per_page' => -1, 'category_name' => get_the_title($parent), 'meta_key' => 'match_start_date', 'orderby' => 'meta_value', 'order' => 'ASC' ) ); ?>
                    <?php if ( $loop->have_posts() ) : ?>
                        <?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
                            <?php $smallexcerpt = get_the_excerpt();
//                            $categories = get_the_category();
                            $posttags = get_the_tags(); ?>
                            <div class="home-grid-content">
                                <a class="absolute-link" href="<?php the_permalink() ; ?>"></a>
                                <div class="home-grid-img background-img" style="background-image: url('<?php the_post_thumbnail_url() ; ?>')">
                                    <?php if($posttags[0]->name == 'Video') : ?>
                                        <i class="material-icons">play_circle_filled</i>
                                    <?php endif ; ?>
                                </div>
                                <div class="home-grid-text">
                                    <span><?php the_field('match_start_date') ; ?></span>
                                    <h3><?php the_title() ; ?></h3>
                                    <p><?php echo wp_trim_words( $smallexcerpt , '20' ); ?></p>
                                    <div class="home-grid-tags">
                                        <p><i class="material-icons">bookmark_border</i><?php echo esc_html( $posttags[0]->name ) ; ?></p>
<!--                                        <a href="#">--><?php //echo esc_html( $categories[0]->name ) ; ?><!--</a>-->
                                    </div>
                                </div>
                            </div>
                        <?php endwhile; ?>
                    <?php endif; ?>
                    <?php wp_reset_query(); ?>
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

