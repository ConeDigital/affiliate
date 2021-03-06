<?php
/**
 * Template Name: single e-sport
 */
?>
<?php get_header() ;
$pageTitle = get_the_title();
?>

<div class="second-header">
    <div class="max-width">
        <?php wp_nav_menu( array( 'theme_location' => $pageTitle, 'menu_class' => '' ) ); ?>
    </div>
</div>
<section class="single-section home-section">
    <div class="max-width esport-headlines">

    </div>
    <div class="max-width">
        <div class="two-col reverse-col">
            <div class="left-col">
                <div class="home-grid">
                    <div class="single-esport-content">
                        <?php the_content() ;?>
                    </div>
                    <?php
                    $args = array( 
                        'post_type' => array('tournament'),
                        'posts_per_page' => 4,
                        'meta_query' => array( 
                            'relation' => 'AND', 
                            'tournament_end' => array(
                                'key' => 'tournament-end-date',
                                'type' => 'DATE',
                                'value' => date('Ymd'),
                                'compare' => '>',
                            ),
                            'tournament_start' => array(
                                'key' => 'tournament-start-date',
                                'compare' => 'EXISTS',
                            ),
                        ),
                        'orderby' => array( 
                            'tournament_start' => 'ASC',
                        )
                    );
                    $loop = new WP_Query( $args ); ?>
                    <?php if ( $loop->have_posts() ) : ?>
                    <div class="single-esport-section">
                        <h2>Upcoming tournaments</h2>
                        <div class="tournament-grid">
                            <div class="home-grid">
                                    <?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
                                        <?php $smallexcerpt = get_the_excerpt();
                                        //$categories = get_the_category();
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
                                    <?php 
                                    endwhile;  ?>
                            </div>
                        </div>
                    </div>
                    <?php endif; 
                    wp_reset_query(); ?>
                    <?php
                    $args = array(
                        'post_type' => array('match'),
                        'posts_per_page' => -1,
                        'category_name' => $pageTitle,
                        'meta_query' => array( 
                            'relation' => 'AND', 
                            'match_end' => array(
                                'key' => 'match_start_date',
                                'type' => 'DATETIME',
                                'value' => date("Y-m-d H:i:s"), //date("Y-m-d H:i:s", time() - 60 * 60 * 24) - to include matches yesterday
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
                    <div class="single-esport-section">
                        <h2>Upcoming matches</h2>
                        <div class="home-grid">
                                <?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
                                    <?php $smallexcerpt = get_the_excerpt();
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
                                <?php
                                endwhile; ?>
                        </div>
                    </div>
                    <?php endif; 
                    wp_reset_query(); ?>
                    <div class="other-list single-esport-section">
                        <?php if( have_rows('others') ): ?>
                            <?php while( have_rows('others') ) : the_row();?>
                                <div class="other-list-item">
                                    <h2><?php the_sub_field('others-headline') ; ?></h2>
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
            </div>
            <div class="right-col">
                <?php get_template_part( 'template-parts/bonus', get_post_format() ); ?>
            </div>
        </div>
    </div>
</section>

<?php get_footer() ; ?>

