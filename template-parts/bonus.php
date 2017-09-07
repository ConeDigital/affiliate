<?php $loop = new WP_Query( array( 'post_type' => 'bonus', 'posts_per_page' => -1)); ?>
<?php if ( $loop->have_posts() ) : ?>
    <div class="bonuses">
        <div class="bonus-top">
            <span>Top betting sites</span>
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