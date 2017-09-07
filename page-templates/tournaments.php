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
    <?php 
    //$tou = get_posts( array( 'numberposts' => -1, 'post_type' => 'tournament' ) );
    //var_dump($tou);
    ?>
    <section class="single-section home-section">
        <div class="max-width esport-headlines">
            <?php the_content() ;?>
        </div>
        <div class="max-width">
            <div class="two-col reverse-col">
                <div class="left-col">
                <?php
                    $count = 0;
                    $loop = new WP_Query( array( 'post_type' => 'tournament', 'posts_per_page' => -1, 'category_name' => get_the_title($parent), 'meta_key' => 'tournament-start-date', 'orderby' => 'meta_value', 'order' => 'ASC', ) );
                
                    if ( $loop->have_posts() ) :
                        while ( $loop->have_posts() ) : $loop->the_post();
                            $smallexcerpt = get_the_excerpt();
                            $posttags = get_the_tags();
                            if ( $count == 0 || date('Ym', strtotime(get_field('tournament-start-date', false, false))) != $previousTournament ) : 
                                if ( $count != 0 && date('Ym', strtotime(get_field('tournament-start-date', false, false))) != $previousTournament ) :
                ?>              
                                        </div>
                                    </div>
                <?php
                                endif;
                ?>

                                <div class="tournament-grid">
                                    <h5><?php echo date('F', strtotime(get_field('tournament-start-date', false, false))); ?></h5>
                                    <div class="home-grid">
                <?php 
                            endif;
                ?>
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
                        $count++;
                        $previousTournament = date('Ym', strtotime(get_field('tournament-start-date', false, false)));
                        endwhile;
                    endif;
                        wp_reset_query();
                ?>
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