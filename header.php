<!DOCTYPE html>
<html>
    <head>
        <title>Cinedicted</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
        <?php  wp_head(); ?>
        <link href="https://fonts.googleapis.com/css?family=EB+Garamond|Quicksand:300,400,500,700" rel="stylesheet">
        <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-108127129-1"></script>
        <script>
          window.dataLayer = window.dataLayer || [];
          function gtag(){dataLayer.push(arguments);}
          gtag('js', new Date());

          gtag('config', 'UA-108127129-1');
        </script>
    </head>
    <body class="cinedicted-container container-fluid" id="cinedicted-container">
        <header class="cinedicted-header">
            <div class="hamburger hidden-lg">
              <div class="bar1"></div>
              <div class="bar2"></div>
              <div class="bar3"></div>
            </div>
            <div class="logo-container">
               <a href="/">
                <img src="http://localhost:8888/wordpress/wp-content/uploads/2017/10/dark_logo_transparent_background.png" alt="logo" />
            </a>
            </div>
            <div class="search-icon hidden-lg">
            </div>
            <div class="header-right visible-lg">
                <ul class="primary-menu-list">
                    <li class="primary-menu-list__item">
                        <a href="<?php echo add_query_arg('tag', 'bollywood', esc_url(home_url('/sections/')))?>">Bollywood</a>
                    </li>
                    <li class="primary-menu-list__item">
                        <a href="<?php echo add_query_arg('tag', 'hollywood', esc_url(home_url('/sections/')))?>">Hollywood</a>
                    </li>
                    <li class="primary-menu-list__item">
                        <a href="<?php echo add_query_arg('tag', 'kollywood', esc_url(home_url('/sections/')))?>">Kollywood</a>
                    </li>
                    <li class="primary-menu-list__item">
                        <a href="<?php echo add_query_arg('tag', 'tollywood', esc_url(home_url('/sections/')))?>">Tollywood</a>
                    </li>
                </ul>
                <div class="header-bottom">
                    <div class="hamburger">
                      <div class="bar1"></div>
                      <div class="bar2"></div>
                      <div class="bar3"></div>
                    </div>
                    <ul class="secondary-menu-list visible-lg">
                        <li class="secondary-menu-list__item">
                            <a href="<?php echo add_query_arg('category', 'reviews', esc_url(home_url('/sections/')))?>">reviews</a>
                        </li>
                        <li class="secondary-menu-list__item">
                            <a href="<?php echo add_query_arg('category', 'pickoftheweek', esc_url(home_url('/sections/')))?>">pick of the week</a>
                        </li>
                        <li class="secondary-menu-list__item">
                            <a href="<?php echo add_query_arg('category', 'previews', esc_url(home_url('/sections/')))?>">previews</a>
                        </li>
                        <li class="secondary-menu-list__item">
                            <a href="<?php echo add_query_arg('category', 'archives', esc_url(home_url('/sections/')))?>">Memory Lane</a>
                        </li>
                        <li class="secondary-menu-list__item">
                            <a href="<?php echo add_query_arg('category', 'tvnews', esc_url(home_url('/sections/')))?>">Tv Shows</a>
                        </li>
                        <li class="secondary-menu-list__item">
                            <a href="<?php echo add_query_arg('category', 'technical', esc_url(home_url('/sections/')))?>">technical</a>
                        </li>
                        <li class="secondary-menu-list__item">
                            <a href="">analysis</a>
                        </li>
                    </ul>
                    <div class="search-icon">
                    </div>
                </div>
            </div>
            
        </header>
        <div class="search-box">
            <?php get_search_form(); ?>
            <span class="close-search"></span>
        </div>
        <div class="menu-items">
            <ul class="primary-menu-list hidden-md hidden-lg">
                    <li class="primary-menu-list__item">
                        <a href="<?php echo add_query_arg('tag', 'bollywood', esc_url(home_url('/sections/')))?>">Bollywood</a>
                    </li>
                    <li class="primary-menu-list__item">
                        <a href="<?php echo add_query_arg('tag', 'hollywood', esc_url(home_url('/sections/')))?>">Hollywood</a>
                    </li>
                    <li class="primary-menu-list__item">
                        <a href="<?php echo add_query_arg('tag', 'kollywood', esc_url(home_url('/sections/')))?>">Kollywood</a>
                    </li>
                    <li class="primary-menu-list__item">
                        <a href="<?php echo add_query_arg('tag', 'tollywood', esc_url(home_url('/sections/')))?>">Tollywood</a>
                    </li>
            </ul>
            <ul class="secondary-menu-list">
                    <li class="secondary-menu-list__item">
                        <a href="<?php echo add_query_arg('category', 'latestarticle', esc_url(home_url('/sections/')))?>">Latest Articles</a>
                    </li>
                    <li class="secondary-menu-list__item">
                        <a href="<?php echo add_query_arg('category', 'qna', esc_url(home_url('/sections/')))?>">qna</a>
                    </li>
                    <li class="secondary-menu-list__item hidden-md hidden-lg">
                        <a href="<?php echo add_query_arg('category', 'reviews', esc_url(home_url('/sections/')))?>">reviews</a>
                    </li>
                    <li class="secondary-menu-list__item hidden-md hidden-lg">
                        <a href="<?php echo add_query_arg('category', 'pickoftheweek', esc_url(home_url('/sections/')))?>">pick of the week</a>
                    </li>
                    <li class="secondary-menu-list__item hidden-md hidden-lg">
                        <a href="<?php echo add_query_arg('category', 'previews', esc_url(home_url('/sections/')))?>">previews</a>
                    </li>
                    <li class="secondary-menu-list__item hidden-md hidden-lg">
                        <a href="<?php echo add_query_arg('category', 'archives', esc_url(home_url('/sections/')))?>">Memory Lane</a>
                    </li>
                    <li class="secondary-menu-list__item hidden-md hidden-lg">
                        <a href="<?php echo add_query_arg('category', 'tvnews', esc_url(home_url('/sections/')))?>">Tv Shows</a>
                    </li>
                    <li class="secondary-menu-list__item hidden-md hidden-lg">
                        <a href="<?php echo add_query_arg('category', 'technical', esc_url(home_url('/sections/')))?>">technical</a>
                    </li>
                    <li class="secondary-menu-list__item hidden-md hidden-lg">
                        <a href="">analysis</a>
                    </li>
                </ul>
        </div>
        
