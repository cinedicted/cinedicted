<?php /* Template Name: PreviewPage */ ?>
<?php get_header(); ?>
<?php
    $path = get_path();
    $slug = $path[call_parts][1];
    if(!$slug){
        $slug = 1;
    }

    $peviewPost = get_post($slug);
?>
<div class="container">
<div class="preview-page col-lg-8">
    <div class="preview-header">
        <h1 class="preview-title">
            <?php echo $peviewPost->post_title?>
        </h1>
        <div class="byline">
            <span class="author">By <?php echo the_author_meta( 'nickname' , $peviewPost->post_author);?></span>
            <time datetime=""><?php echo date_format(date_create($peviewPost->post_date), "d F Y")?></time>
            <span class="source">Source: <?php echo get_post_meta($slug, 'source', true); ?></span>
        </div>
    </div>
    <div class="preview-body">
        <div class="cover-image">
            <figure>
                <img src="<?php echo get_post_meta($slug, 'preview_image_link', true); ?>" alt="image" />
            </figure>
        </div>
        <div class="preview-description">
           <p>
               <?php echo $peviewPost->post_content ?>
           </p>
        </div>
        <div class="video-container">
            <iframe width="800" height="400" src="<?php echo get_post_meta($slug, 'video_link', true); ?>" frameborder="0" allowfullscreen></iframe>
        </div>
        <div class="preview-description">
           <p>
            <?php echo get_post_meta($slug, 'more_description', true); ?>
            </p>
        </div>
    </div>
</div>
</div>
<?php get_footer(); ?>