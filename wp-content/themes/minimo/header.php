<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/FONTS/fonts.css">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/custom-css/style.css">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/custom-css/single.css">
    <title>Minimo</title>
</head>

<body>
    <header>
        <h1><a href="<?php echo home_url(); ?>">MINIMO</a></h1>
        <nav>
            <ul>
                <li><a href="<?php echo get_permalink(7) ?>">LIFESTYLE</a></li>
                <li><a href="<?php echo get_permalink(9) ?>">PHOTODIARY</a></li>
                <li><a href="<?php echo get_permalink(11) ?>">MUSIC</a></li>
                <li><a href="<?php echo get_permalink(13) ?>">TRAVEL</a></li>
                <?php echo my_site_custom_languages_selector_template(); ?>
            </ul>
        </nav>
    </header>