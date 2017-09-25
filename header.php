<!DOCTYPE html>
<html>
    <head>
        <title>Cinedicted Theme</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
        <?php  wp_head(); ?>
    </head>
    <body class="cinedicted-container container-fluid" id="cinedicted-container">
        <header class="cinedicted-header">
            <?php wp_nav_menu(); ?>
            <h1 class="cinedicted-logo">
                Cinedicted
            </h1>
            <?php get_search_form(); ?>
        </header>
        