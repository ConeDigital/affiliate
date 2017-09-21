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
                    $args = array(
                        'post_type' => array('match'),
                        'posts_per_page' => -1,
                        'category_name' => get_the_title($parent),
                        'meta_query' => array( 
                            'relation' => 'AND', 
                            'match_end' => array(
                                'key' => 'match_start_date',
                                'type' => 'DATETIME',
                                'value' => date("Y-m-d H:i:s", time() - 60 * 60 * 24),
                                'compare' => '>',
                            ),
                            'match_start' => array(
                                'key' => 'match_start_date',
                                'compare' => 'EXISTS',
                            ),
                        ),
                        'orderby' => array( 
                            'match_start' => 'ASC',
                        )
                    );
                    $loop = new WP_Query( $args ); ?>
                    <?php if ( $loop->have_posts() ) : ?>
                        <?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
                            <?php $smallexcerpt = get_the_excerpt();
//                            $categories = get_the_category();
                            $posttags = get_the_tags(); ?>
                            <div class="home-grid-content">
                                <a class="absolute-link" href="<?php the_permalink() ; ?>"></a>
                                <div class="home-grid-img background-img" style="background-image: url('<?php echo esc_url(home_url( '/wp-content/themes/affiliate/assets/images/match-backgr.jpg' ) ); ?>')">
                                    <div class="team-card">
                                        <img src="<?php the_field('home-team-logo') ; ?>">
                                        <span>VS</span>
                                        <img src="<?php the_field('away-team-logo') ; ?>">
                                    </div>
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
                <?php get_template_part( 'template-parts/bonus', get_post_format() ); ?>
            </div>
        </div>
    </div>
</section>

<?php get_footer() ; ?>

