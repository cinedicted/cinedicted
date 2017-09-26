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
<div class="container">
<div class="pick-of-the-week-page col-lg-8">
    <div class="pick-of-the-week-header">
        <h1 class="pick-of-the-week-title">
            <?php echo $picWeekPost->post_title?>
        </h1>
        <div class="byline">
            <span class="author">By <?php echo the_author_meta( 'nickname' , $picWeekPost->post_author);?></span>
            <time datetime=""><?php echo date_format(date_create($picWeekPost->post_date), "d F Y")?></time>
            <span class="source">Source: <?php echo get_post_meta($slug, 'source', true); ?></span>
        </div>
    </div>
    <div class="pick-of-the-week-body">
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
    </div>
</div>
</div>
<?php get_footer(); ?>