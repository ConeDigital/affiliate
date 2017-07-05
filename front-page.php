<?php get_header() ; ?>

    <section class="single-section home-section">
        <div class="max-width">
            <div class="two-col reverse-col">
                <div class="left-col">
                    <div class="home-grid">
                        <?php $loop = new WP_Query( array( 'post_type' => array( 'post', 'match'), 'posts_per_page' => -1)); ?>
                        <?php if ( $loop->have_posts() ) : ?>
                            <?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
                                <?php $smallexcerpt = get_the_excerpt();
                                    $categories = get_the_category();
                                    $posttags = get_the_tags(); ?>
                                <div class="home-grid-content">
                                    <a class="absolute-link" href="<?php the_permalink() ; ?>"></a>
                                    <div class="home-grid-img background-img" style="background-image: url('<?php the_post_thumbnail_url() ; ?>')"></div>
                                    <div class="home-grid-text">
                                        <h3><?php the_title() ; ?></h3>
                                        <p><?php echo wp_trim_words( $smallexcerpt , '20' ); ?></p>
                                        <div class="home-grid-tags">
                                            <p><i class="material-icons">bookmark_border</i><?php echo esc_html( $posttags[0]->name ) ; ?></p>
                                            <a style="<?php if($categories[0]->name == 'LOL') : ?> color: #4a90e2 ;background: #b2d0f3; <?php elseif($categories[0]->name == 'Dota') : ?> color:#feae57;background: #ffeed7; <?php endif ; ?>" href="#"><?php echo esc_html( $categories[0]->name ) ; ?></a>
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
<!--                            <h5>Bonuses</h5>-->
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