<?php
/**
 * Template Name: Tournaments
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
                    <div class="tournament-grid">
                        <h5>January</h5>
                        <div class="home-grid">
                            <?php
                            $loop = new WP_Query( array( 'post_type' => 'tournament', 'posts_per_page' => -1, 'category_name' => get_the_title($parent))); ?>
                            <?php if ( $loop->have_posts() ) : ?>
                                <?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
                                    <?php $smallexcerpt = get_the_excerpt();
    //                            $categories = get_the_category();
                                    $posttags = get_the_tags(); ?>
                                    <div class="home-grid-content">
                                        <a class="absolute-link" href="<?php the_permalink() ; ?>"></a>
                                        <div class="home-grid-img background-img" style="background-image: url('<?php the_post_thumbnail_url() ; ?>')"></div>
                                        <div class="home-grid-text">
                                            <span><?php the_field('tournament-start-date') ; ?> - <?php the_field('tournament-end-date') ; ?></span>
                                            <h3><?php the_title() ; ?></h3>
                                            <p><?php the_field('tournament-location') ; ?></p>
                                            <div class="home-grid-tags">
                                                <div>
                                                    <span>Teams</span>
                                                    <p><?php the_field('tournament-teams') ; ?></p>
                                                </div>
                                                <div>
                                                    <span>Prize</span>
                                                    <p><?php the_field('tournament-prize') ; ?></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endwhile; ?>
                            <?php endif; ?>
                            <?php wp_reset_query(); ?>
                        </div>
                    </div>
                    <div class="tournament-grid">
                        <h5>February</h5>
                        <div class="home-grid">
                            <div class="home-grid-content">
                                <a class="absolute-link" href="<?php the_permalink() ; ?>"></a>
                                <div class="home-grid-img background-img" style="background-image: url('<?php the_post_thumbnail_url() ; ?>')">
                                    <i class="material-icons">play_circle_filled</i>
                                </div>
                                <div class="home-grid-text">
                                    <span><?php echo get_the_date() ; ?></span>
                                    <h3><?php the_title() ; ?></h3>
                                    <p>Malmö, Stockholm</p>
                                    <div class="home-grid-tags">
                                        <div>
                                            <span>Teams</span>
                                            <p>16</p>
                                        </div>
                                        <div>
                                            <span>Price</span>
                                            <p>$250,000</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
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