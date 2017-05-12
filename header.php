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
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <title><?php wp_title( ' - ', true, 'right' ); ?></title>

    <?php cone_og_meta_tags(); ?>

    <?php wp_head(); ?>
</head>
<body>

    <div class="header">
<!--        <img src="--><?php //echo esc_url(home_url( '/wp-content/themes/annatoresdotter/assets/images/atLogo.png' ) ); ?><!--">-->
<!--        --><?php //wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => '' ) ); ?>
    </div>
    <div class="big-wrapper">
