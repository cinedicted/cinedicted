<?php /* Template Name: ReviewPage */ ?>
<?php get_header(); ?>
<?php
    $path = get_path();
    $slug = $path[call_parts][1];
    if(!$slug){
        $slug = 1;
    }

    $reviewPost = get_post($slug);

     $d = get_post_meta($slug, 'release_date', true);

    $release_date = substr($d, 0,2).'-'.substr($d, 2,2).'-'.substr($d, 4,4);

    $query = $_GET;

?>
<div class="movie-review container">
    <div class="movie-review__headline col-sm-12">
        <h1 class="review-title"><?php echo $reviewPost->post_title?> Review</h1>
        <div class="byline">
            <span class="author"><?php echo the_author_meta( 'nickname' , $reviewPost->post_author);?>,</span>
            <time datetime=""><?php echo date_format(date_create($reviewPost->post_date), "d F Y")?></time>
        </div>
        <div class="rating-star">
           <div class="rating"><?php echo get_post_meta($slug, 'yasr_overall_rating', true); ?></div>
            <span class="rating-unfilled">★★★★★</span>
            <span class="rating-filled">★★★★★</span>
        </div>
    </div>
    <div class="movie-review__info col-md-3 col-sm-4">
        <div class="cover-image">
            <figure>
                <img alt="<?php echo $reviewPost->post_title?>" src="<?php echo get_post_meta($slug, 'poster_link', true); ?>" />
            </figure>
        </div>
        <div class="movie-info">
            <h4 class="movie-name"><?php echo $reviewPost->post_title?></h4>
            <h3 class="list-title">Genre</h3>
            <ul class="list-info">
                <?php 
                    foreach ((explode(",",get_post_meta($slug, 'genre', true))) as $item){
                        echo '<li>'.$item.'</li>';
                    }
                ?>
            </ul>
            <h3 class="list-title">directed by</h3>
            <ul class="list-info">
                <?php 
                    foreach ((explode(",",get_post_meta($slug, 'directed_by', true))) as $item){
                        echo '<li>'.$item.'</li>';
                    }
                ?>
            </ul>
            <h3 class="list-title">written by</h3>
            <ul class="list-info">
                <?php 
                    foreach ((explode(",",get_post_meta($slug, 'written_by', true))) as $item){
                        echo '<li>'.$item.'</li>';
                    }
                ?>
            </ul>
            <h3 class="list-title">Starring</h3>
            <ul class="list-info">
                <?php 
                    foreach ((explode(",",get_post_meta($slug, 'starring', true))) as $item){
                        echo '<li>'.$item.'</li>';
                    }
                ?>
            </ul>
            <h3 class="list-title">music by</h3>
            <ul class="list-info">
                <?php 
                    foreach ((explode(",",get_post_meta($slug, 'music_by', true))) as $item){
                        echo '<li>'.$item.'</li>';
                    }
                ?>
            </ul>
            <h3 class="list-title">cinematography</h3>
            <ul class="list-info">
                <?php 
                    foreach ((explode(",",get_post_meta($slug, 'cinematography', true))) as $item){
                        echo '<li>'.$item.'</li>';
                    }
                ?>
            </ul>
            <h3 class="list-title">edited by</h3>
            <ul class="list-info">
                <?php 
                    foreach ((explode(",",get_post_meta($slug, 'edited_by', true))) as $item){
                        echo '<li>'.$item.'</li>';
                    }
                ?>
            </ul>
            <h3 class="list-title">release date</h3>
            <ul class="list-info">
                <li><?php echo date_format(date_create($release_date), "d F Y") ?></li>
            </ul>
            <h3 class="list-title">running time</h3>
            <ul class="list-info">
                <?php 
                    foreach ((explode(",",get_post_meta($slug, 'running_time', true))) as $item){
                        echo '<li>'.$item.' Minutes</li>';
                    }
                ?>
            </ul>
            <h3 class="list-title">language</h3>
            <ul class="list-info">
                <?php 
                    foreach ((explode(",",get_post_meta($slug, 'language', true))) as $item){
                        echo '<li>'.$item.'</li>';
                    }
                ?>
            </ul>
        </div>
    </div>
    <div class="movie-review__body col-md-5 col-sm-8">
        <div class="review-content">
            <p><?php echo $reviewPost->post_content ?></p>
        </div>
        <div class="keywords">
           <div class="keywords-header">
                Keywords: 
            </div>
            <?php
                $posttags = get_the_tags($slug);
                if ($posttags) {
                  foreach($posttags as $tag) {
            ?>
            <span><a href="<?php echo add_query_arg('tag', $tag->slug, 'sections/')?>"><?php echo $tag->name ?></a></span>
            <?php
                  }
                }
            ?>
        </div>
        <aside></aside>
    </div>
    <div class="right-side col-md-4">
      <div class="connect-to-us-container">
       <?php echo do_shortcode('[wysija_form id="2"]'); ?>
       </div>
        <div class="trending-container">
            <h2 class="trending-header">Trending</h2>
            <ul class="trending-list">
                <?php
                    $args = array(
                        'post_type' => 'post',
                        'post_status' => 'publish',
                        'posts_per_page' => 5,
                        'category_name' => 'reviews',
                        'orderby' => 'meta_value_num',
                        'meta_key' => 'yasr_overall_rating',
                        'order' => 'DESC'
                    );
                    wp_reset_query();
                    $query = new WP_Query($args);
                    if($query->have_posts()){
                        while($query->have_posts()) : $query->the_post();
                        $r = get_post_meta(get_the_ID(), 'yasr_overall_rating', true);
                ?>
                <li class="trending-story">
                   <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
                    <div class="trending-image">
                        <figure>
                            <img src="<?php echo get_post_meta(get_the_ID(), 'poster_link', true); ?>" src="img" />
                        </figure>
                    </div>
                    <div class="trending-info">
                        <h4 class="title">
                            <?php the_title(); ?>
                        </h4>
                        <div class="star-rating"><?php echo do_shortcode('[yasr_overall_rating size="small"]');?></div>
                    </div>
                    </a>
                </li>
                <?php endwhile; 
                    }else{
                        echo "No posts found";
                    }
                    wp_reset_query();
                ?>
            </ul>
        </div>
        <?php
$orig_post = $reviewPost;
global $post;
$tags = get_the_tags($slug);
if ($tags) {
    $tag_ids = array();
    foreach ($tags as $individual_tag)
        $tag_ids[] = $individual_tag->term_id;
    $args     = array(
        'tag__in' => $tag_ids,
        'post__not_in' => array(
            $reviewPost->ID
        ),
        'posts_per_page' => 5, // Number of related posts that will be shown.
        'caller_get_posts' => 1
    );
    $my_query = new wp_query($args);
    if ($my_query->have_posts()) {
        echo '<div id="relatedposts"><h3>Related Posts</h3><ul>';
        while ($my_query->have_posts()) {
            $my_query->the_post();
?>

<li><div class="image-container">
<figure>
                       <?php 
                        $poster_link = get_post_meta(get_the_ID(), 'poster_link', true);
                            if($poster_link) {?>
                        <img src="<?php echo get_post_meta(get_the_ID(), 'poster_link', true); ?>" alt="image">
                        <?php } ?>
                        <?php 
                        $image_link = get_post_meta(get_the_ID(), 'image_link', true);
                            if($image_link) {?>
                        <img src="<?php echo get_post_meta(get_the_ID(), 'image_link', true); ?>" alt="image">
                        <?php } ?>
                    </figure>
    </div>
<div class="relatedcontent">
<h3><a href="<?
            the_permalink();
?>" rel="bookmark" title="<?php
            the_title();
?>"><?php
            the_title();
?></a></h3>
<time><?php
            the_time('M j, Y');
?></time>
</div>
</li>
<?
        }
        echo '</ul></div>';
    }
}
$post = $orig_post;
wp_reset_query();
?>
    </div>
</div>
<?php get_footer(); ?>
