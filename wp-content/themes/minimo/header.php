<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/FONTS/fonts.css">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/custom-css/style.css">
    <title>Minimo</title>
</head>

<body>
    <header>
        <h1>MINIMO</h1>
        <nav>
            <ul>
                <li><a href="<?php echo permalink_link(7) ?>">LIFESTYLE</a></li>
                <li><a href="<?php echo permalink_link(9) ?>">PHOTODIARY</a></li>
                <li><a href="<?php echo permalink_link(11) ?>">MUSIC</a></li>
                <li><a href="<?php echo permalink_link(13) ?>">TRAVEL</a></li>
            </ul>
        </nav>
    </header>