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

?>
<div class="movie-review container">
    <div class="movie-review__headline col-sm-12">
        <h1 class="review-title"><?php echo $reviewPost->post_title?> Review</h1>
        <div class="byline">
            <span class="author">By <?php echo the_author_meta( 'nickname' , $reviewPost->post_author);?></span>
            <time datetime=""><?php echo date_format(date_create($reviewPost->post_date), "d F Y")?></time>
        </div>
        <div class="rating">* * * * *</div>
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
            <h3 class="list-title">produced by</h3>
            <ul class="list-info">
                <?php 
                    foreach ((explode(",",get_post_meta($slug, 'produced_by', true))) as $item){
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
            <h3 class="list-title">production companies</h3>
            <ul class="list-info">
                <?php 
                    foreach ((explode(",",get_post_meta($slug, 'production_companies', true))) as $item){
                        echo '<li>'.$item.'</li>';
                    }
                ?>
            </ul>
            <h3 class="list-title">distributed by</h3>
            <ul class="list-info">
                <?php 
                    foreach ((explode(",",get_post_meta($slug, 'distributed_by', true))) as $item){
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
            <h3 class="list-title">country</h3>
            <ul class="list-info">
                <?php 
                    foreach ((explode(",",get_post_meta($slug, 'country', true))) as $item){
                        echo '<li>'.$item.'</li>';
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
    <div class="movie-review__body col-md-6 col-sm-8">
        <div class="review-content">
            <p><?php echo $reviewPost->post_content ?></p>
        </div>
        <aside></aside>
    </div>
</div>
<?php get_footer(); ?>