<?php /* Template Name: PickOfTheWeek */ ?>
<?php get_header(); ?>
<?php
  $path = get_path();
    $slug = $path[call_parts][1];
    if(!$slug){
        $slug = 1;
    }
    $picWeekPost = get_post($slug);
?>
<div class="pick-of-the-week-container container">
<?php comments_template(); ?>
<div class="pick-of-the-week-page">
    <div class="pick-of-the-week-header col-lg-12">
        <h1 class="pick-of-the-week-title">
            <?php echo $picWeekPost->post_title?>
        </h1>
        <div class="byline">
            <span class="author"><?php echo the_author_meta( 'nickname' , $picWeekPost->post_author);?>,</span>
            <time datetime=""><?php echo date_format(date_create($picWeekPost->post_date), "d F Y")?></time>
        </div>
    </div>
    <div class="pick-of-the-week-body col-lg-8">
        <div class="cover-image">
            <figure>
                <img src="<?php echo get_post_meta($slug, 'image_link', true); ?>" alt="image" />
            </figure>
        </div>
        <div class="pick-of-the-week-description">
           <p>
              <?php echo $picWeekPost->post_content ?>
           </p>
        </div>
        <?php comments_open( $post_id ); ?>
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
        
    </div>
    <div class="right-side col-md-4">
       <div class="connect-to-us-container">
       <?php echo do_shortcode('[wysija_form id="2"]'); ?>
       </div>
        <div class="trending-container col-lg-12">
            <h2 class="trending-header">Trending</h2>
            <ul class="trending-list col-lg-12">
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
        <?php $orig_post = $post;
global $post;
$tags = get_the_tags($slug);
if ($tags) {
$tag_ids = array();
foreach($tags as $individual_tag) $tag_ids[] = $individual_tag->term_id;
$args=array(
'tag__in' => $tag_ids,
'post__not_in' => array($picWeekPost->ID),
'posts_per_page'=>5, // Number of related posts that will be shown.
'caller_get_posts'=>1
);
$my_query = new wp_query( $args );
if( $my_query->have_posts() ) {
echo '<div id="relatedposts"><h3>Related Posts</h3><ul>';
while( $my_query->have_posts() ) {
$my_query->the_post(); ?>
<li>
<div class="image-container">
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
<h3><a href="<? the_permalink()?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?></a></h3>
<time><?php the_time('M j, Y') ?></time>
</div>
</li>
<? }
echo '</ul></div>';
}
}
$post = $orig_post;
wp_reset_query(); ?>
    </div>
</div>
</div>
<?php get_footer(); ?>
