<?php get_header() ; ?>

<section class="hero background-img" style="background-image: url('<?php  the_post_thumbnail_url(); ?>')">
    <div class="max-width">
        <div class="hero-content">
           <?php the_content() ; ?>
        </div>
    </div>
</section>
<section class="tables-section">
    <div class="max-width table-content">
        <div class="left-col">
            <div class="filter-header">
                <p class="current-filter">All sites</p>
                <?php
                $cats = get_terms(array('hide_empty' => false));
                foreach($cats as $types){
                ?>
                    <p><?php echo $types->name?></p>
                <?php }?>
            </div>
            <div class="betting-col">
                <div class="betting-header">
                    <div class="col-item">
                        <p>Website</p>
                    </div>
                    <div class="col-item">
                        <p>Bonus</p>
                    </div>
                    <div class="col-item">
                        <p>Code</p>
                    </div>
                    <div class="col-item">
                        <p>Type</p>
                    </div>
                </div>
                <?php if( have_rows('deals') ): ?>
                    <?php while( have_rows('deals') ) : the_row();?>
                        <?php
                        $term = get_sub_field('deals-categories');
                        ?>
                        <div class="col-grid">
                            <a target="_blank" href="<?php the_sub_field('deals-link') ; ?>" class="absolute-link"></a>
                            <div class="col-item">
                                <img src="<?php the_sub_field('deals-logo') ; ?>">
                            </div>
                            <div class="col-item">
                               <?php the_sub_field('deal-bonus') ; ?>
                            </div>
                            <div class="col-item black-p">
                               <p><?php the_sub_field('deals-code') ; ?></p>
                            </div>
                            <div class="col-item col-item-type">
                                <?php foreach($term as $type){ ?>
                                <div class="betting-type"><p><?php echo  $type->name ; ?></p></div>
                                <?php } ?>
                            </div>
                        </div>
                    <?php endwhile; ?>
                <?php endif; ?>
                <div class="col-grid">
                    <a href="#" class="absolute-link"></a>
                    <div class="col-item">
                        <img src="<?php echo esc_url(home_url( '/wp-content/themes/affiliate/assets/images/polygon.png' ) ); ?>">
                    </div>
                    <div class="col-item">
                        <p>Get <span>100</span> free credits</p>
                    </div>
                    <div class="col-item black-p">
                        <p>SkinIGXE</p>
                    </div>
                    <div class="col-item col-item-type">
                        <div class="betting-type"><p>Free to start</p></div>
                        <div class="betting-type"><p>Roulette</p></div>
                        <div class="betting-type"><p>Coin Flip</p></div>
                        <div class="betting-type"><p>Betting</p></div>
                        <div class="betting-type"><p>Skins shop</p></div>
                    </div>
                </div>
                <div class="col-grid">
                    <div class="col-item">
                        <img src="<?php echo esc_url(home_url( '/wp-content/themes/affiliate/assets/images/crash.png' ) ); ?>">
                    </div>
                    <div class="col-item">
                        <p>Get <span>50</span> free coins</p>
                    </div>
                    <div class="col-item black-p">
                        <p>CSGO-Raffle</p>
                    </div>
                    <div class="col-item col-item-type">
                        <div class="betting-type"><p>Coin Flip</p></div>
                        <div class="betting-type"><p>Betting</p></div>
                        <div class="betting-type"><p>Skins shop</p></div>
                    </div>
                </div>
                <div class="col-grid">
                    <div class="col-item">
                        <img src="<?php echo esc_url(home_url( '/wp-content/themes/affiliate/assets/images/esport.png' ) ); ?>">
                    </div>
                    <div class="col-item">
                        <p>Get <span>6</span> free spins</p>
                    </div>
                    <div class="col-item black-p">
                        <p>CSGOGETWIN</p>
                    </div>
                    <div class="col-item col-item-type">
                        <div class="betting-type"><p>Free to start</p></div>
                        <div class="betting-type"><p>Roulette</p></div>
                        <div class="betting-type"><p>Betting</p></div>
                        <div class="betting-type"><p>Skins shop</p></div>
                    </div>
                </div>
                <div class="col-grid">
                    <div class="col-item">
                        <img src="<?php echo esc_url(home_url( '/wp-content/themes/affiliate/assets/images/polygon.png' ) ); ?>">
                    </div>
                    <div class="col-item">
                        <p>Get <span>100</span> free credits</p>
                    </div>
                    <div class="col-item black-p">
                        <p>1TBR2M</p>
                    </div>
                    <div class="col-item col-item-type">
                        <div class="betting-type"><p>Free to start</p></div>
                        <div class="betting-type"><p>Roulette</p></div>
                    </div>
                </div>
                <div class="col-grid">
                    <div class="col-item">
                        <img src="<?php echo esc_url(home_url( '/wp-content/themes/affiliate/assets/images/crash.png' ) ); ?>">
                    </div>
                    <div class="col-item">
                        <p>Get <span>50</span> free coins</p>
                    </div>
                    <div class="col-item black-p">
                        <p>CSGOGET</p>
                    </div>
                    <div class="col-item col-item-type">
                        <div class="betting-type"><p>Coin Flip</p></div>
                        <div class="betting-type"><p>Betting</p></div>
                        <div class="betting-type"><p>Skins shop</p></div>
                    </div>
                </div>
                <div class="col-grid">
                    <div class="col-item">
                        <img src="<?php echo esc_url(home_url( '/wp-content/themes/affiliate/assets/images/esport.png' ) ); ?>">
                    </div>
                    <div class="col-item">
                        <p>Get <span>6</span> free spins</p>
                    </div>
                    <div class="col-item black-p">
                        <p>SkinIGXE</p>
                    </div>
                    <div class="col-item col-item-type">
                        <div class="betting-type"><p>Free to start</p></div>
                        <div class="betting-type"><p>Roulette</p></div>
                        <div class="betting-type"><p>Betting</p></div>
                    </div>
                </div>
                <div class="col-grid">
                    <div class="col-item">
                        <img src="<?php echo esc_url(home_url( '/wp-content/themes/affiliate/assets/images/polygon.png' ) ); ?>">
                    </div>
                    <div class="col-item">
                        <p>Get <span>100</span> free credits</p>
                    </div>
                    <div class="col-item black-p">
                        <p>SkinIGXE</p>
                    </div>
                    <div class="col-item col-item-type">
                        <div class="betting-type"><p>Free to start</p></div>
                        <div class="betting-type"><p>Roulette</p></div>
                        <div class="betting-type"><p>Coin Flip</p></div>
                        <div class="betting-type"><p>Betting</p></div>
                        <div class="betting-type"><p>Skins shop</p></div>
                    </div>
                </div>
                <div class="col-grid">
                    <div class="col-item">
                        <img src="<?php echo esc_url(home_url( '/wp-content/themes/affiliate/assets/images/crash.png' ) ); ?>">
                    </div>
                    <div class="col-item">
                        <p>Get <span>50</span> free coins</p>
                    </div>
                    <div class="col-item black-p">
                        <p>CSGO-Raffle</p>
                    </div>
                    <div class="col-item col-item-type">
                        <div class="betting-type"><p>Coin Flip</p></div>
                        <div class="betting-type"><p>Betting</p></div>
                        <div class="betting-type"><p>Skins shop</p></div>
                    </div>
                </div>
                <div class="col-grid">
                    <div class="col-item">
                        <img src="<?php echo esc_url(home_url( '/wp-content/themes/affiliate/assets/images/esport.png' ) ); ?>">
                    </div>
                    <div class="col-item">
                        <p>Get <span>6</span> free spins</p>
                    </div>
                    <div class="col-item black-p">
                        <p>CSGOGETWIN</p>
                    </div>
                    <div class="col-item col-item-type">
                        <div class="betting-type"><p>Free to start</p></div>
                        <div class="betting-type"><p>Roulette</p></div>
                        <div class="betting-type"><p>Betting</p></div>
                        <div class="betting-type"><p>Skins shop</p></div>
                    </div>
                </div>
                <div class="col-grid">
                    <div class="col-item">
                        <img src="<?php echo esc_url(home_url( '/wp-content/themes/affiliate/assets/images/polygon.png' ) ); ?>">
                    </div>
                    <div class="col-item">
                        <p>Get <span>100</span> free credits</p>
                    </div>
                    <div class="col-item black-p">
                        <p>1TBR2M</p>
                    </div>
                    <div class="col-item col-item-type">
                        <div class="betting-type"><p>Free to start</p></div>
                        <div class="betting-type"><p>Roulette</p></div>
                    </div>
                </div>
                <div class="col-grid">
                    <div class="col-item">
                        <img src="<?php echo esc_url(home_url( '/wp-content/themes/affiliate/assets/images/crash.png' ) ); ?>">
                    </div>
                    <div class="col-item">
                        <p>Get <span>50</span> free coins</p>
                    </div>
                    <div class="col-item black-p">
                        <p>CSGOGET</p>
                    </div>
                    <div class="col-item col-item-type">
                        <div class="betting-type"><p>Coin Flip</p></div>
                        <div class="betting-type"><p>Betting</p></div>
                        <div class="betting-type"><p>Skins shop</p></div>
                    </div>
                </div>
                <div class="col-grid">
                    <div class="col-item">
                        <img src="<?php echo esc_url(home_url( '/wp-content/themes/affiliate/assets/images/esport.png' ) ); ?>">
                    </div>
                    <div class="col-item">
                        <p>Get <span>6</span> free spins</p>
                    </div>
                    <div class="col-item black-p">
                        <p>SkinIGXE</p>
                    </div>
                    <div class="col-item col-item-type">
                        <div class="betting-type"><p>Free to start</p></div>
                        <div class="betting-type"><p>Roulette</p></div>
                        <div class="betting-type"><p>Betting</p></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="right-col">
            <div class="right-col-content">
                <div class="right-col-header betting-header">
                    <p>Best today</p>
                </div>
                <div class="right-col-grid">
                    <a target="_blank" href="<?php the_field('best-toady-link') ; ?>" class="absolute-link"></a>
                    <img src="<?php the_field('best-toady-img') ; ?>">
                </div>
            </div>
            <div class="right-col-content">
                <div class="right-col-header betting-header">
                    <p>Deals of the month</p>
                </div>
                <div class="right-col-grid">
                <?php if( have_rows('monthly-deals') ): ?>
                    <?php while( have_rows('monthly-deals') ) : the_row();?>
                        <div class="right-grid">
                            <a target="_blank" href="<?php the_sub_field('monthly-link') ; ?>" class="absolute-link"></a>
                            <img src="<?php the_sub_field('monthly-logo') ; ?>">
                            <p class="code-p">Code: <span><?php the_sub_field('monthly-code') ; ?></span></p>
                            <?php the_sub_field('monthly-content') ; ?>
                        </div>
                    <?php endwhile; ?>
                <?php endif; ?>
                    <div class="right-grid">
                        <a href="#" class="absolute-link"></a>
                        <img src="<?php echo esc_url(home_url( '/wp-content/themes/affiliate/assets/images/polygon.png' ) ); ?>">
                        <p class="code-p">Code: <span>CSGOGETWIN</span></p>
                        <p>The Most Exclusive CSGO Platform. Join us and get <span>6</span> free spins</p>
                    </div>
                    <div class="right-grid">
                        <a href="#" class="absolute-link"></a>
                        <img src="<?php echo esc_url(home_url( '/wp-content/themes/affiliate/assets/images/crash.png' ) ); ?>">
                        <p class="code-p">Code: <span>CSGO-Raffle</span></p>
                        <p>We’re back! Come and play today to win skins in our medium-sized <span>jackpots</span></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php get_footer() ; ?>