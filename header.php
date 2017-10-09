<!DOCTYPE html>
<html>
    <head>
        <title>Cinedicted</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
        <?php  wp_head(); ?>
        <link href="https://fonts.googleapis.com/css?family=EB+Garamond|Quicksand:300,400,500,700" rel="stylesheet">
        <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
        <script>
          (adsbygoogle = window.adsbygoogle || []).push({
            google_ad_client: "ca-pub-9983773352108986",
            enable_page_level_ads: true
          });
        </script>
    </head>
    <body class="cinedicted-container container-fluid" id="cinedcited-container">
        <header class="cinedicted-header">
            <h1 class="cinedicted-logo">
                <img src="http://via.placeholder.com/600x80" alt="cinedicted-logo" />
            </h1>
            <nav class="primary-menu menu col-xs-12 col-md-8">
                <div class="menu-hamburger hidden-lg">
                  <div class="bar1"></div>
                  <div class="bar2"></div>
                  <div class="bar3"></div>
                </div>
                <ul class="primary-menu-list">
                    <li class="primary-menu-list__item">
                        <a href="<?php echo add_query_arg('tag', 'english', esc_url(home_url('/sections/')))?>">English</a>
                    </li>
                    <li class="primary-menu-list__item">
                        <a href="<?php echo add_query_arg('tag', 'hindi', esc_url(home_url('/sections/')))?>">Hindi</a>
                    </li>
                    <li class="primary-menu-list__item">
                        <a href="<?php echo add_query_arg('tag', 'tamil', esc_url(home_url('/sections/')))?>">Tamil</a>
                    </li>
                    <li class="primary-menu-list__item">
                        <a href="<?php echo add_query_arg('tag', 'telugu', esc_url(home_url('/sections/')))?>">Telugu</a>
                    </li>
                </ul>
                <div class="col-lg-3 search-container">
                    <div class="input-group">
                      <input type="text" class="form-control" placeholder="Search for...">
                      <span class="input-group-btn">
                        <button class="btn btn-default" type="button">Go!</button>
                      </span>
                    </div>
                </div>
                 <?php get_search_form(); ?>
            </nav>
            
            <nav class="secondary-menu menu col-xs-12">
                <ul class="secondary-menu-list">
                    <li class="secondary-menu-list__item">
                        <a href="<?php echo add_query_arg('category', 'latestarticle', esc_url(home_url('/sections/')))?>">latest articles</a>
                    </li>
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
                        <a href="<?php echo add_query_arg('category', 'archives', esc_url(home_url('/sections/')))?>">archives</a>
                    </li>
                    <li class="secondary-menu-list__item">
                        <a href="<?php echo add_query_arg('category', 'tvnews', esc_url(home_url('/sections/')))?>">tv news</a>
                    </li>
                    <li class="secondary-menu-list__item">
                        <a href="<?php echo add_query_arg('category', 'qna', esc_url(home_url('/sections/')))?>">qna</a>
                    </li>
                    <li class="secondary-menu-list__item">
                        <a href="<?php echo add_query_arg('category', 'technical', esc_url(home_url('/sections/')))?>">technical</a>
                    </li>
                    <li class="secondary-menu-list__item">
                        <a href="">analysis</a>
                    </li>
                    <li class="secondary-menu-list__item">
                        <a href="">memes</a>
                    </li>
                    <li class="secondary-menu-list__item">
                        <a href="">polls</a>
                    </li>
                </ul>
            </nav>
        </header>