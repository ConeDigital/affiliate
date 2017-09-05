<?php get_header() ; ?>


<section class="single-section">
    <div class="max-width">
        <div class="two-col reverse-col">
            <div class="left-col">
                <h1><?php the_title() ; ?></h1>
                <div class="single-content">
                    <?php if( get_the_post_thumbnail_url()) : ?>
                        <div class="single-img background-img" style="background-image: url('<?php the_post_thumbnail_url() ; ?>')">
                            <?php if( get_field('single-video') ): ?>
                                <iframe src="<?php the_field('single-video') ; ?>?showinfo=0" frameborder="0" allowfullscreen></iframe>
                            <?php endif ; ?>
                        </div>
                    <?php endif ; ?>
                    <?php if( get_the_content()) : ?>
                        <div class="single-content-text">
                            <div class="single-tournament-info">
                                <div>
                                    <span>Date</span>
                                    <p><?php the_field('tournament-start-date') ; ?> - <?php the_field('tournament-end-date') ; ?></p>
                                </div>
                                <div>
                                    <span>Location</span>
                                    <p><?php the_field('tournament-location') ; ?></p>
                                </div>
                                <div>
                                    <span>Prize</span>
                                    <p><?php the_field('tournament-prize') ; ?></p>
                                </div>
                                <div>
                                    <span>Teams</span>
                                    <p><?php the_field('tournament-teams') ; ?></p>
                                </div>
                            </div>
                            <?php the_content() ; ?>
                        </div>
                    <?php endif ; ?>
                </div>
                <?php if( have_rows('recent-matches') ): ?>
                <div class="recent-matches">
                    <h2>Recent matches</h2>
                    <div class="recent-matches-grid">
                        <?php while( have_rows('recent-matches') ) : the_row();?>
                            <div class="recent-match bonus-grid">
                                <p><?php the_sub_field('recent-home-team') ; ?></p>
                                <div>
                                    <span><?php the_sub_field('recent-home-score') ; ?></span> - <span><?php the_sub_field('recent-away-score') ; ?></span>
                                </div>
                                <p><?php the_sub_field('recent-away-team') ; ?></p>
                                <?php if( get_sub_field('recent-bet-won') ): ?>
                                    <h6>Our bet won</h6>
                                <?php endif; ?>
                            </div>
                        <?php endwhile; ?>
                    </div>
                </div>
                <?php endif; ?>
                <div class="tournament-matches">
                    <h2>Upcoming matches</h2>
                    <div class="home-grid">
                        <?php
                        $loop = new WP_Query( array( 'post_type' => array( 'post', 'match'), 'posts_per_page' => 6 )); ?>
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
                                        <span><?php echo get_the_date() ; ?></span>
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