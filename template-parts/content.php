<?php
/**
 * The default template for displaying content
 *
 * Used for both single and index/archive/search.
 *
 * @package cone
 */
?>

<?php if ( is_single() || is_page() ) : ?>

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
                            <?php the_content() ; ?>
                        </div>
                        <?php endif ; ?>
                        <?php if(get_field('best-bonus-text')) : ?>
                        <div class="single-affiliate-button">
                            <a target="_blank" href="<?php the_field('best-bonus-link') ?>"><?php the_field('best-bonus-text') ?> <i class="material-icons">arrow_forward</i></a>
                        </div>
                        <?php endif ; ?>
                    </div>
                </div>
                <div class="right-col">
                    <?php get_template_part( 'template-parts/bonus', get_post_format() ); ?>
                </div>
            </div>
        </div>
    </section>

    <?php else : ?>

<!--        the_title( '<h2><a href="' . esc_url( get_permalink() ) . '">', '</a></h2>' );-->
    
<?php endif ; ?>
