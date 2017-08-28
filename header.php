<?php
/**
 * The template for displaying the header
 *
 * @package cone
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Baloo+Bhaijaan" rel="stylesheet">
    <title><?php wp_title( ' - ', true, 'right' ); ?></title>

    <?php cone_og_meta_tags(); ?>

    <?php wp_head(); ?>
</head>
<body>
    <header>
        <div class="header max-width">
            <div class="header-left">
                <div class="header-logo">
                    <a class="absolute-link" href="<?php echo esc_url(home_url()); ?>"></a>
                    <p>Geek<span>Odds</span></p>
                </div>
                <?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => '' ) ); ?>
            </div>
            <div class="header-right">
                <div class="social-list">
                    <div class="social-icon">
                        <a class="absolute-link" href="https://www.facebook.com/geekodds/?fref=ts" target="_blank"></a>
                        <i class="fa fa-facebook" aria-hidden="true"></i>
                    </div>
                    <div class="social-icon">
                        <a class="absolute-link" href="https://twitter.com/geekodds?lang=sv" target="_blank"></a>
                        <i class="fa fa-twitter" aria-hidden="true"></i>
                    </div>
                    <div class="social-icon">
                        <a class="absolute-link" href="https://www.youtube.com/channel/UCZMB7LB1IIh1F427rf4Y40Q" target="_blank"></a>
                        <i class="fa fa-youtube" aria-hidden="true"></i>
                    </div>
                </div>
            </div>
            <button class="hamburger hamburger--spin" type="button">
                <span class="hamburger-box">
                    <span class="hamburger-inner"></span>
                </span>
            </button>
        </div>
    </header>
    <div class="mobile-menu">
        <?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => '' ) ); ?>
    </div>

    <div class="big-wrapper">
