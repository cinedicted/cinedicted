<?php /* Template Name: HomePage */ ?>
<?php get_header(); ?>
<?php
    $args = array(
    'post_type' => 'post',
    'post_status' => 'publish',
    'posts_per_page' => 3,
    'category_name' => 'pickoftheweek', 'previews',
    'order' => 'DESC'
    );
    wp_reset_query();
    $query = new WP_Query($args);
?>
<div class="cinedicted-home">
    <div class="top-deck">
        <?php
            $post_idx = 0;
            if($query->have_posts()){
                while($query->have_posts()) : $query->the_post();
        ?>
        <?php
            if($post_idx == 0){
        ?>
        <div class="top-stories col-lg-8">
            <div class="initial-story story col-lg-8">
                <div class="section-name">
                    <?php $category_name = get_the_category();
                        echo $category_name[0]->name;
                    ?>
                </div>
                <figure>
                    <img src="<?php echo get_post_meta(get_the_ID(), 'image_link', true); ?>" alt="image" />
                </figure>
                <div class="story-info">
                    <h2 class="story-headline">
                        <?php the_title(); ?>
                    </h2>
                    <div class="author-info">
                        <span class="by">By</span>
                        <div class="author-name"><?php echo get_the_ID(); ?></div>
                    </div>
                </div>
            </div>
            <div class="rest-stories col-lg-4">
            <?php
                }else{
            ?>
                <div class="story">
                    <div class="section-name">
                        <?php $category_name = get_the_category();
                            echo $category_name[0]->name;
                        ?>
                    </div>
                    <figure>
                        <img src="<?php echo get_post_meta(get_the_ID(), 'image_link', true); ?>" alt="image" />
                    </figure>
                    <div class="story-info">
                        <h2 class="story-headline">
                            <?php the_title(); ?>
                        </h2>
                        <div class="author-info">
                            <span class="by">By</span>
                            <div class="author-name"><?php echo get_the_ID(); ?></div>
                        </div>
                    </div>
                </div>
                <?php
                    }  $post_idx++;
                ?>
        <?php endwhile; wp_reset_query();
            }else{
                echo "No posts found";
            }
        ?>
    </div>
</div>
        <?php
            $args = array(
            'post_type' => 'post',
            'post_status' => 'publish',
            'posts_per_page' => 5,
            'category_name' => 'reviews',
            'order' => 'DESC'
            );
            wp_reset_query();
            $query = new WP_Query($args);
        ?>
        <div class="reviews-container col-lg-4">
            <h2 class="reviews-header">reviews</h2>
            <ul class="reviews-list">
            <?php 
            if($query->have_posts()){
                while($query->have_posts()) : $query->the_post();
            ?>
                <li class="review-story">
                    <div class="review-image">
                        <figure>
                            <img src="<?php echo get_post_meta(get_the_ID(), 'poster_link', true); ?>" alt="image" />
                        </figure>
                    </div>
                    <div class="review-info">
                        <div class="star-rating">
                            <?php echo do_shortcode('[yasr_overall_rating size="medium"]');?>
                        </div>
                        <div class="title"><?php the_title(); ?></div>
                        <div class="excerpt"><?php echo the_excerpt(); ?></div>
                        <div class="author-info">
                            <span class="by">By</span>
                            <div class="author-name"><?php echo get_the_ID(); ?></div>
                        </div>
                    </div>
                </li>
                <?php endwhile; 
                }else{
                    echo "No posts found";
                }
                wp_reset_query();
                ?>
            </ul>
        </div>
    </div>
    <div class="bottom-deck container col-lg-12">
        <div class="five-block">
            <div class="left-block col-lg-8">
                <?php
                    $args = array(
                    'post_type' => 'post',
                    'post_status' => 'publish',
                    'posts_per_page' => 5,
                    'category_name' => 'pickoftheweek', 'previews',
                    'offset' => 3,
                    'order' => 'DESC'
                    );
                    wp_reset_query();
                    $query = new WP_Query($args);
                    while($query->have_posts()) : $query->the_post();
                ?>
                <div class="story">
                   <div class="image-container">
                       <div class="section-name">
                           <?php $category_name = get_the_category();
                                echo $category_name[0]->name;
                            ?>
                       </div>
                        <figure>
                            <img src="<?php echo get_post_meta(get_the_ID(), 'image_link', true); ?>" alt="image" />
                        </figure>
                   </div>
                    <div class="story-info">
                        <h2 class="story-headline">
                            <?php the_title(); ?>
                        </h2>
                        <div class="excerpt">
                            <?php echo the_excerpt(); ?>
                        </div>
                        <div class="author-info">
                            <span class="by">By</span>
                            <div class="author-name"><?php echo get_the_ID(); ?></div>
                        </div>
                        <div class="publish-time">
                            <?php the_date(); ?>
                        </div>
                    </div>
                </div>
                <?php endwhile; wp_reset_query(); ?>
            </div>
            <div class="right-block col-lg-4">
                <div class="t-bar col-lg-12">
                    <div class="t-bar__header">
                        <h2 class="trending current" data-tab="trending">Trending</h2>
                        <h2 class="trailers" data-tab="trailers">Trailers</h2>
                    </div>
                    <ul class="trending-movie-list movie-list current">
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
                                echo "rating".gettype((float)$r);
                        ?>
                        <li class="trending-movie-item">
                            <div class="image-container">
                                <figure>
                                    <img src="<?php echo get_post_meta(get_the_ID(), 'poster_link', true); ?>" src="img" />
                                </figure>
                            </div>
                            <div class="trending-movie-info">
                                <h4 class="movie-title">
                                    <?php the_title(); ?>
                                </h4>
                                <div class="star-rating"><?php echo do_shortcode('[yasr_overall_rating size="small"]');?></div>
                            </div>
                        </li>
                        <?php endwhile; 
                            }else{
                                echo "No posts found";
                            }
                            wp_reset_query();
                        ?>
                    </ul>
                    <ul class="trailers-movie-list movie-list">
                        <li class="trailers-movie-item">
                            <div class="image-container">
                                <figure>
                                    <img src="http://static2.srcdn.com/wp-content/uploads/2017/02/lego-ninjago-movie-images-master-wu.jpg?cs=tinysrgb&q=50&w=423&h=265&fit=crop" src="img" />
                                </figure>
                            </div>
                            <div class="trailers-movie-info">
                                <h4 class="movie-title">
                                    Lego Ninjango
                                </h4>
                            </div>
                        </li>
                        <li class="trailers-movie-item">
                            <div class="image-container">
                                <figure>
                                    <img src="http://bangaloremirror.indiatimes.com/thumb/msid-60531869,width-320,height-240,resizemode-4/IMG_4758.jpg" src="img" />
                                </figure>
                            </div>
                            <div class="trailers-movie-info">
                                <h4 class="movie-title">
                                    BHARJARI
                                </h4>
                            </div>
                        </li>
                        <li class="trailers-movie-item">
                            <div class="image-container">
                                <figure>
                                    <img src="http://images.indianexpress.com/2017/09/lucknow-central-movie-review-759.jpg" src="img" />
                                </figure>
                            </div>
                            <div class="trailers-movie-info">
                                <h4 class="movie-title">
                                    Lucknow Central
                                </h4>
                            </div>
                        </li>
                        <li class="trailers-movie-item">
                            <div class="image-container">
                                <figure>
                                    <img src="http://media2.intoday.in/indiatoday/images/stories/new-simran-review-story_647_091517035503.jpg" src="img" />
                                </figure>
                            </div>
                            <div class="trailers-movie-info">
                                <h4 class="movie-title">
                                    Simran
                                </h4>
                            </div>
                        </li>
                        <li class="trailers-movie-item">
                            <div class="image-container">
                                <figure>
                                    <img src="http://media2.intoday.in/indiatoday/images/stories/647_091517100040.jpg" src="img" />
                                </figure>
                            </div>
                            <div class="trailers-movie-info">
                                <h4 class="movie-title">
                                    Magilir Mattum
                                </h4>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="slot-placeholder col-lg-12">
                    <a href="https://placeholder.com"><img src="http://via.placeholder.com/300x250"></a>
                </div>
                <div class="polls-container">
                   <h2 class="polls-header">polls</h2>
                    <?php $catquery = new WP_Query( 'cat=5&posts_per_page=10' ); ?>
                        <ul class="reviews-list">
                            <?php while($catquery->have_posts()) : $catquery->the_post(); ?>
                                <li class="reviews-list__item">
                                    <?php the_content(); ?>
                                </li>
                            <?php endwhile; ?> 
                        </ul>
                    <?php wp_reset_postdata(); ?>
                </div>
            </div>
        </div>
        <div class="five-block">
            <div class="left-block col-lg-8">
                <?php
                    $args = array(
                    'post_type' => 'post',
                    'post_status' => 'publish',
                    'posts_per_page' => 5,
                    'category_name' => 'pickoftheweek', 'previews',
                    'offset' => 8,
                    'order' => 'DESC'
                    );
                    wp_reset_query();
                    $query = new WP_Query($args);
                    while($query->have_posts()) : $query->the_post();
                ?>
                <div class="story">
                   <div class="image-container">
                       <div class="section-name">
                           <?php $category_name = get_the_category();
                                echo $category_name[0]->name;
                            ?>
                       </div>
                        <figure>
                            <img src="<?php echo get_post_meta(get_the_ID(), 'image_link', true); ?>" alt="image" />
                        </figure>
                   </div>
                    <div class="story-info">
                        <h2 class="story-headline">
                            <?php the_title(); ?>
                        </h2>
                        <div class="excerpt">
                            <?php echo the_excerpt(); ?>
                        </div>
                        <div class="author-info">
                            <span class="by">By</span>
                            <div class="author-name"><?php echo get_the_ID(); ?></div>
                        </div>
                        <div class="publish-time">
                            <?php the_date(); ?>
                        </div>
                    </div>
                </div>
                <?php endwhile; wp_reset_query(); ?>
            </div>
            <?php
                $args = array(
                'post_type' => 'post',
                'post_status' => 'publish',
                'posts_per_page' => 5,
                'category_name' => 'memes',
                'order' => 'DESC'
                );
                wp_reset_query();
                $query = new WP_Query($args);
            ?>
            <div class="right-block col-lg-4">
                <div class="memes-container col-lg-12">
                    <h2 class="memes-header">memes</h2>
                    <ul class="memes-list">
                        <?php 
                            if($query->have_posts()){
                                while($query->have_posts()) : $query->the_post();
                        ?>
                        <li class="memes-list__item">
                            <figure>
                                <img src="http://images.memes.com/meme/1702400" src="img" />
                            </figure>
                        </li>
                                <?php endwhile; 
                        }else{
                            echo "<h3>No posts found</h3>";
                        }
                        ?>
                    </ul>
                </div>
                <div class="slot-placeholder col-lg-12">
                    <a href="https://placeholder.com"><img src="http://via.placeholder.com/300x250"></a>
                </div>
            </div>
    </div>
    <div class="five-block">
        <div class="left-block col-lg-8">
            <?php echo do_shortcode('[ajax_load_more post_type="post" category="pickoftheweek,previews" offset="13" pause="false" scroll="true"]'); ?>
         </div> 
     </div>
</div>
<?php get_footer(); ?>