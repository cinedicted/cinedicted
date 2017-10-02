<?php

function cinedicted_script_enqueue() {
    wp_enqueue_script('jquery_migrate', get_template_directory_uri() . '/js/jquery.migrate.min.js');
    wp_enqueue_script('jquerymin', get_template_directory_uri() . '/js/jquery.min.js');
    wp_enqueue_script('slickjs', get_template_directory_uri() . '/js/slick.js');
    wp_enqueue_style('bootstrap_css', get_template_directory_uri() . '/css/bootstrap.min.css');
    wp_enqueue_script('bootstrap_js', get_template_directory_uri() . '/js/bootstrap.min.js');
    wp_enqueue_style('customstyle', get_template_directory_uri() . '/css/cinedicted.css', array(), 1.0, 'all');
    wp_enqueue_style('slick', get_template_directory_uri() . '/css/slick.css', array(), 1.0, 'all');
    wp_enqueue_style('slickTheme', get_template_directory_uri() . '/css/slick-theme.css', array(), 1.0, 'all');
    wp_enqueue_style('normalize', get_template_directory_uri() . '/css/normalize.css');
    wp_enqueue_script('customscript', get_template_directory_uri() . '/js/cinedicted.js', array(), 1.0, true);
}

add_action('wp_enqueue_scripts', 'cinedicted_script_enqueue');

function cinedicted_theme_setup() {
    add_theme_support('menus');
    register_nav_menu('primary', 'this will be the main menu');
}

add_action('init', 'cinedicted_theme_setup');


/*Theme Support*/
add_theme_support('html5', array('search-form'));
add_theme_support( 'post-thumbnails' );

function get_path() {
    $path = array();
    if (isset($_SERVER['REQUEST_URI'])) {
        $request_path = explode('?', $_SERVER['REQUEST_URI']);
        $path['base'] = rtrim(dirname($_SERVER['SCRIPT_NAME']), '\/');
        $path['call_utf8'] = substr(urldecode($request_path[0]), strlen($path['base']) + 1);
        $path['call'] = utf8_decode($path['call_utf8']);
        if ($path['call'] == basename($_SERVER['PHP_SELF'])) {
            $path['call'] = '';
        }
        $path['call_parts'] = explode('/', $path['call']);
        $path['query_utf8'] = urldecode($request_path[1]);
        $path['query'] = utf8_decode(urldecode($request_path[1]));
        $vars = explode('&', $path['query']);
        foreach ($vars as $var) {
            $t = explode('=', $var);
            $path['query_vars'][$t[0]] = $t[1];
        }
    }
    return $path;
}

function add_query_vars_filter( $vars ){
  $vars[] = "rating";
  $vars[] = "category";
  $vars[] = "search";
  return $vars;
}
add_filter( 'query_vars', 'add_query_vars_filter' );