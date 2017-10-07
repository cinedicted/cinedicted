<!DOCTYPE html>
<html>
    <head>
        <title>Cinedicted</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
        <?php  wp_head(); ?>
        <link href="https://fonts.googleapis.com/css?family=EB+Garamond|Quicksand:300,400,500,700" rel="stylesheet">
    </head>
    <body class="cinedicted-container container-fluid" id="cinedicted-container">
        <header class="cinedicted-header col-lg-12 ">
            <div class="hamburger hidden-lg">
              <div class="bar1"></div>
              <div class="bar2"></div>
              <div class="bar3"></div>
            </div>
            <div class="logo-container">
                <img src="http://localhost:8888/wordpress/wp-content/uploads/2017/10/dark_logo_transparent_background.png" alt="logo" />
            </div>
            <div class="search-icon hidden-lg">
            </div>
            <div class="header-right visible-lg">
                <ul class="primary-menu-list">
                    <li class="primary-menu-list__item">
                        <a href="">English</a>
                    </li>
                    <li class="primary-menu-list__item">
                        <a href="">Hindi</a>
                    </li>
                    <li class="primary-menu-list__item">
                        <a href="">Tamil</a>
                    </li>
                    <li class="primary-menu-list__item">
                        <a href="">Telugu</a>
                    </li>
                    <li class="primary-menu-list__item">
                        <a href="">Malayalam</a>
                    </li>
                </ul>
                <div class="header-bottom">
                    <div class="hamburger">
                      <div class="bar1"></div>
                      <div class="bar2"></div>
                      <div class="bar3"></div>
                    </div>
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
                        <a href="">English</a>
                    </li>
                    <li class="primary-menu-list__item">
                        <a href="">Hindi</a>
                    </li>
                    <li class="primary-menu-list__item">
                        <a href="">Tamil</a>
                    </li>
                    <li class="primary-menu-list__item">
                        <a href="">Telugu</a>
                    </li>
                    <li class="primary-menu-list__item">
                        <a href="">Malayalam</a>
                    </li>
            </ul>
            <ul class="secondary-menu-list">
                    <li class="secondary-menu-list__item">
                        <a href="">latest articles</a>
                    </li>
                    <li class="secondary-menu-list__item">
                        <a href="">reviews</a>
                    </li>
                    <li class="secondary-menu-list__item">
                        <a href="">pick of the week</a>
                    </li>
                    <li class="secondary-menu-list__item">
                        <a href="">previews</a>
                    </li>
                    <li class="secondary-menu-list__item">
                        <a href="">archives</a>
                    </li>
                    <li class="secondary-menu-list__item">
                        <a href="">tv news</a>
                    </li>
                    <li class="secondary-menu-list__item">
                        <a href="">qna</a>
                    </li>
                    <li class="secondary-menu-list__item">
                        <a href="">technical</a>
                    </li>
                    <li class="secondary-menu-list__item">
                        <a href="">analysis</a>
                    </li>
                </ul>
        </div>
        
