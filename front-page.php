<?php get_header() ; ?>

    <section class="single-section home-section">
        <div class="max-width">
            <div class="two-col reverse-col">
                <div class="left-col">
                    <div class="home-grid">
                        <?php $loop = new WP_Query( array( 'post_type' => array( 'match' ), 'posts_per_page' => -1, 'meta_key' => 'match_start_date', 'orderby' => 'meta_value', 'order' => 'ASC' ) ); ?>
                        <?php if ( $loop->have_posts() ) : ?>
                            <?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
                                <?php $smallexcerpt = get_the_excerpt();
                                    $categories = get_the_category();
                                    $posttags = get_the_tags(); ?>
                                <div class="home-grid-content">
                                    <a class="absolute-link" href="<?php the_permalink() ; ?>"></a>
                                    <?php if( get_the_post_thumbnail_url()) : ?>
                                    <div class="home-grid-img background-img" style="background-image: url('<?php the_post_thumbnail_url() ; ?>')">
                                    <?php if($posttags[0]->name == 'Video') : ?>
                                        <i class="material-icons">play_circle_filled</i>
                                    <?php endif ; ?>
                                    </div>
                                    <?php endif ; ?>
                                    <div class="home-grid-text">
                                        <span><?php the_field('match_start_date') ; ?></span>
                                        <h3><?php the_title() ; ?></h3>
                                        <p><?php echo wp_trim_words( $smallexcerpt , '20' ); ?></p>
                                        <div class="home-grid-tags">
                                            <p><i class="material-icons">bookmark_border</i><?php echo esc_html( $posttags[0]->name ) ; ?></p>
                                            <a style="<?php if($categories[0]->name == 'LOL') : ?> color: #4a90e2 ;background: #b2d0f3; <?php elseif($categories[0]->name == 'Dota') : ?> color:#feae57;background: #ffeed7; <?php elseif($categories[0]->name == 'Other') : ?> color:#2E7D32;background: #81C784;  <?php endif ; ?>" href="#"><?php echo esc_html( $categories[0]->name ) ; ?></a>
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