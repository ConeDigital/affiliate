<?php get_header() ; ?>

<section class="single-section">
    <div class="max-width">
        <div class="two-col">
            <div class="left-col">
                <div class="single-content">
                    <div class="single-img background-img" style="background-image: url('<?php the_post_thumbnail_url() ; ?>')">
                    <?php if( get_field('single-video') ): ?>
                        <iframe src="<?php the_field('single-video') ; ?>?showinfo=0" frameborder="0" allowfullscreen></iframe>
                    <?php endif ; ?>
                    </div>
                    <div class="single-content-text">
                        <h1><?php the_field('home-team') ; ?> VS. <?php the_field('away-team') ; ?></h1>
                        <?php the_content() ; ?>
                    </div>
                    <div class="single-affiliate-button">
                        <a target="_blank" href="<?php the_field('best-bonus-link') ?>">Go to <?php the_field('best-bonus-text') ?> <i class="material-icons">arrow_forward</i></a>
                    </div>
                </div>
                <div class="single-ods-section">
                    <div class="single-ods-headline single-ods-grid">
                        <a href="#" target="_blank" class="absolute-link"></a>
                        <div class="single-ods-item">
                            <h5>Bet on the game</h5>
                        </div>
                        <p>( 1 )</p>
                        <p>( 2 )</p>
                    </div>
                    <div class="single-ods-grid">
                        <a href="#" target="_blank" class="absolute-link"></a>
                        <div class="single-ods-item">
                            <img src="http://localhost/affiliate/wp-content/uploads/2017/07/logo-expekt.png">
                        </div>
                        <p>3.35</p>
                        <p>2.1</p>
                    </div>
                    <div class="single-ods-grid">
                        <a href="#" target="_blank" class="absolute-link"></a>
                        <div class="single-ods-item">
                            <img src="http://localhost/affiliate/wp-content/uploads/2017/07/Bet365.png">
                        </div>
                        <p>1.35</p>
                        <p>5.1</p>
                    </div>
                    <div class="single-ods-grid">
                        <a href="#" target="_blank" class="absolute-link"></a>
                        <div class="single-ods-item">
                            <img src="http://localhost/affiliate/wp-content/uploads/2017/07/unibet.png">
                        </div>
                        <p>2.35</p>
                        <p>3.1</p>
                    </div>
                </div>
            </div>
            <div class="right-col">
                <?php the_field('match-poll') ; ?>
<!--                <div class="apester-media" data-media-id="5959f50af2d4938713c3859d" height="271" style="height: 271px"></div>-->
                <div class="streams">
                    <h5>Streams</h5>
                    <div class="stream-grid">
                        <a class="absolute-link" href="#"></a>
                        <img src="http://pandyprotein.com/wp-content/uploads/2016/12/1480705084_Sweden_flat.png">
                        <p>PGL</p>
                    </div>
                    <div class="stream-grid">
                        <a class="absolute-link" href="#"></a>
                        <img src="http://pandyprotein.com/wp-content/uploads/2016/12/1480705084_Sweden_flat.png">
                        <p>Izak000</p>
                    </div>
                    <div class="stream-grid">
                        <a class="absolute-link" href="#"></a>
                        <img src="http://pandyprotein.com/wp-content/uploads/2016/12/1480705084_Sweden_flat.png">
                        <p>99Damage</p>
                    </div>
                    <div class="stream-grid">
                        <a class="absolute-link" href="#"></a>
                        <img src="http://pandyprotein.com/wp-content/uploads/2016/12/1480705084_Sweden_flat.png">
                        <p>SpillerTV</p>
                    </div>
                    <div class="stream-grid">
                        <a class="absolute-link" href="#"></a>
                        <img src="http://pandyprotein.com/wp-content/uploads/2016/12/1480705084_Sweden_flat.png">
                        <p>SLTV</p>
                    </div>
                </div>
                <?php $loop = new WP_Query( array( 'post_type' => 'bonus', 'posts_per_page' => -1)); ?>
                <?php if ( $loop->have_posts() ) : ?>
                    <div class="bonuses">
                        <h5>Bonuses</h5>
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
        <div class="single-team-stats">
            <div class="team-stats-filter">
                <h5 class="active-filter"><?php the_field('home-team') ; ?></h5>
                <h5><?php the_field('away-team') ; ?></h5>
            </div>
            <div class="team-stats-content">
                <div class="team-stats-grid">
                    <div class="team-stats-top">
                        <p>Global stat</p> / <span class="">+33.1%</span>
                    </div>
                    <div class="team-stats-bottom">
                        <p>2237</p>
                    </div>
                </div>
                <div class="team-stats-grid">
                    <div class="team-stats-top">
                        <p>Games played </p> / <span class="">+33.1%</span>
                    </div>
                    <div class="team-stats-bottom">
                        <p>209,571</p>
                    </div>
                </div>
                <div class="team-stats-grid">
                    <div class="team-stats-top">
                        <p>Wins</p> / <span class="negative-color">-12.45%</span>
                    </div>
                    <div class="team-stats-bottom">
                        <p>12,566</p>
                    </div>
                </div>
                <div class="team-stats-grid">
                    <div class="team-stats-top">
                        <p>losses</p> / <span class="">+33.1%</span>
                    </div>
                    <div class="team-stats-bottom">
                        <p>7,655</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php get_footer() ; ?>