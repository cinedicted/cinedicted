<?php /* Template Name: HomePage */ ?>
<?php get_header(); ?>
<?php
    $args = array(
    'post_type' => 'post',
    'post_status' => 'publish',
    'posts_per_page' => 3,
    'category_name' => 'Analysis', 'TV Shows', 'Pick Of The Week', 'Technical',
    'order' => 'DESC'
    );
    wp_reset_query();
    $query = new WP_Query($args);
?>
<div class="cinedicted-home">
   <div class="top-deck-stories">
       <div class="top-deck">
            <?php
                $post_idx = 0;
                if($query->have_posts()){
                    while($query->have_posts()) : $query->the_post();
            ?>
            <div class="story">
               <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
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
                        <div class="author-name"><?php echo get_the_author(); ?></div>
                    </div>
                </div>
                <?php
                    $post_idx++;
                ?>
                </a>
            </div>
            <?php endwhile; wp_reset_query();
                }else{
                    echo "No posts found";
                }
            ?>
            <div class="reviews-container">
               <?php
                    $args = array(
                    'post_type' => 'post',
                    'post_status' => 'publish',
                    'posts_per_page' => 5,
                    'category_name' => 'Reviews',
                    'order' => 'DESC'
                    );
                    wp_reset_query();
                    $query = new WP_Query($args);
                ?>
                <?php
                    $category_id = get_cat_ID( 'reviews' );
                    $category_link = get_category_link( $category_id );
                ?>
                <h2 class="reviews-header"><a href="<?php echo add_query_arg('category', 'reviews', esc_url(home_url('/sections/')))?>">reviews</a></h2>
                <ul class="reviews-list">
                   <?php 
                    if($query->have_posts()){
                        while($query->have_posts()) : $query->the_post();
                    ?>
                    <li class="review-story">
                       <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
                        <div class="review-image">
                            <figure>
                                <img src="<?php echo get_post_meta(get_the_ID(), 'poster_link', true); ?>" alt="image" />
                            </figure>
                        </div>
                        <div class="review-info">
                            <div class="star-rating"> <?php echo do_shortcode('[yasr_overall_rating size="medium"]');?> </div>
                            <div class="title"><?php the_title(); ?></div>
                            <div class="excerpt"><?php echo the_excerpt(); ?></div>
                            <div class="author-info">
                                <span class="by">By</span>
                                <div class="author-name"><?php the_author(); ?></div>
                            </div>
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
        </div>
   </div>
    <?php
        $args = array(
        'post_type' => 'post',
        'post_status' => 'publish',
        'posts_per_page' => 5,
        'category_name' => 'pickoftheweek',
        'order' => 'DESC'
        );
        wp_reset_query();
        $query = new WP_Query($args);
    ?>
    <div class="potw-container container">
        <h2 class="potw-header"><a href="<?php echo add_query_arg('category', 'pickoftheweek', esc_url(home_url('/sections/')))?>">Pick Of The Week</a></h2>
        <ul class="potw-list">
           <?php 
            if($query->have_posts()){
                while($query->have_posts()) : $query->the_post();
            ?>
            <li class="potw-story col-lg-2">
               <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
                    <div class="potw-image">
                        <figure>
                            <img src="<?php echo get_post_meta(get_the_ID(), 'image_link', true); ?>" alt="image" />
                        </figure>
                    </div>
                    <div class="potw-info">
                        <div class="title"><?php the_title(); ?></div>
                        <div class="author-info">
                            <span class="by">By</span>
                            <div class="author-name"><?php the_author(); ?></div>
                        </div>
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
        <div class="more-button col-lg-12">
            <a href="<?php echo add_query_arg('category', 'pickoftheweek', esc_url(home_url('/sections/')))?>">More </a> 
        </div>
    </div>
    <div class="container">
       <div class="analysis-container col-lg-8">
            <?php
                $args = array(
                'post_type' => 'post',
                'post_status' => 'publish',
                'posts_per_page' => 6,
                'category_name' => 'Analysis',
                'order' => 'DESC'
                );
                wp_reset_query();
                $query = new WP_Query($args);
            ?>
            <h2 class="analysis-header"><a href="<?php echo add_query_arg('category', 'analysis', esc_url(home_url('/sections/')))?>">Analysis</a></h2>
            <ul class="analysis-list">
               <?php 
                if($query->have_posts()){
                    while($query->have_posts()) : $query->the_post();
                ?>
                <li class="analysis-story col-lg-6">
                   <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
                    <div class="analysis-image">
                        <figure>
                            <img src="<?php echo get_post_meta(get_the_ID(), 'image_link', true); ?>" alt="image" />
                        </figure>
                    </div>
                    <div class="analysis-info">
                        <div class="title"><?php the_title(); ?></div>
                        <div class="author-info">
                            <span class="by">By</span>
                            <div class="author-name"><?php the_author(); ?></div>
                        </div>
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
            <div class="more-button col-lg-12">
                <a href="<?php echo add_query_arg('category', 'analysis', esc_url(home_url('/sections/')))?>">More </a> 
            </div>
        </div>
        <div class="connect-to-us-container col-lg-4">
            <?php echo do_shortcode('[wysija_form id="2"]'); ?>
            <div class="follow-us-container">
                <h5 class="follow-us">Follow Us</h5>
                <ul class="social-icons">
                    <li>
                        <a href="https://www.facebook.com/Cinedicted/" target="_blank" class="fb"></a>
                    </li>
                    <li>
                        <a href="https://twitter.com/Cinedicted" target="_blank" class="twitter"></a>
                    </li>
                    <li>
                        <a href="https://plus.google.com/u/0/b/108618848351234518329/108618848351234518329" target="_blank" class="gplus"></a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="previews-container col-lg-8">
           <?php
                $args = array(
                'post_type' => 'post',
                'post_status' => 'publish',
                'posts_per_page' => 6,
                'category_name' => 'Previews',
                'order' => 'DESC'
                );
                wp_reset_query();
                $query = new WP_Query($args);
            ?>
            <h2 class="previews-header"><a href="<?php echo add_query_arg('category', 'previews', esc_url(home_url('/sections/')))?>">Previews</a></h2>
            <ul class="previews-list">
               <?php 
                if($query->have_posts()){
                    while($query->have_posts()) : $query->the_post();
                ?>
                <li class="preview-story col-lg-6">
                   <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
                    <div class="preview-image">
                        <figure>
                            <img src="<?php echo get_post_meta(get_the_ID(), 'image_link', true); ?>" alt="image" />
                        </figure>
                    </div>
                    <div class="preview-info">
                        <div class="title"><?php the_title(); ?></div>
                        <div class="author-info">
                            <span class="by">By</span>
                            <div class="author-name"><?php the_author(); ?></div>
                        </div>
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
            <div class="more-button col-lg-12">
                <a href="<?php echo add_query_arg('category', 'previews', esc_url(home_url('/sections/')))?>">More </a> 
            </div>
        </div>
        <div class="trending-container col-lg-4">
            <h2 class="trending-header">Trending</h2>
            <ul class="trending-list col-lg-12">
                <?php
                    $args = array(
                        'post_type' => 'post',
                        'post_status' => 'publish',
                        'posts_per_page' => 5,
                        'category_name' => 'Reviews',
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
        <div class="tv-shows-container col-lg-8">
           <?php
                $args = array(
                'post_type' => 'post',
                'post_status' => 'publish',
                'posts_per_page' => 6,
                'category_name' => 'tvshows',
                'order' => 'DESC'
                );
                wp_reset_query();
                $query = new WP_Query($args);
            ?>
            <h2 class="tv-shows-header"><a href="<?php echo add_query_arg('category', 'tvshows', esc_url(home_url('/sections/')))?>">TV Shows</a></h2>
            <ul class="tv-shows-list">
               <?php 
                if($query->have_posts()){
                    while($query->have_posts()) : $query->the_post();
                ?>
                <li class="tv-show-story col-lg-6">
                   <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
                    <div class="tv-show-image">
                        <figure>
                            <img src="<?php echo get_post_meta(get_the_ID(), 'image_link', true); ?>" alt="image" />
                        </figure>
                    </div>
                    <div class="tv-show-info">
                        <div class="title"><?php the_title(); ?></div>
                        <div class="author-info">
                            <span class="by">By</span>
                            <div class="author-name"><?php the_author(); ?></div>
                        </div>
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
            <div class="more-button col-lg-12">
                <a href="<?php echo add_query_arg('category', 'tvshows', esc_url(home_url('/sections/')))?>">More </a> 
            </div>
        </div>
        <div class="polls-container col-lg-4">
           <h2 class="poll-header">polls</h2>
            <?php $catquery = new WP_Query( 'cat=20&posts_per_page=10' ); ?>
                <ul class="poll-list">
                    <?php while($catquery->have_posts()) : $catquery->the_post(); ?>
                        <li class="poll-list__item">
                            <?php the_content(); ?>
                        </li>
                    <?php endwhile; ?>
                </ul>
            <?php wp_reset_postdata(); ?>
        </div>
         <div class="technical-container col-lg-8">
           <?php
                $args = array(
                'post_type' => 'post',
                'post_status' => 'publish',
                'posts_per_page' => 6,
                'category_name' => 'Technical',
                'order' => 'DESC'
                );
                wp_reset_query();
                $query = new WP_Query($args);
            ?>
            <h2 class="technical-header"><a href="<?php echo add_query_arg('category', 'technical', esc_url(home_url('/sections/')))?>">Technical</a></h2>
            <ul class="technical-list">
               <?php 
                if($query->have_posts()){
                    while($query->have_posts()) : $query->the_post();
                ?>
                <li class="technical-story col-lg-6">
                   <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
                    <div class="technical-image">
                        <figure>
                            <img src="<?php echo get_post_meta(get_the_ID(), 'image_link', true); ?>" alt="image" />
                        </figure>
                    </div>
                    <div class="technical-info">
                        <div class="title"><?php the_title(); ?></div>
                        <div class="author-info">
                            <span class="by">By</span>
                            <div class="author-name"><?php the_author(); ?></div>
                        </div>
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
            <div class="more-button col-lg-12">
                <a href="<?php echo add_query_arg('category', 'analysis', esc_url(home_url('/sections/')))?>">More </a> 
            </div>
        </div>
        <div class="trailers-container col-lg-4">
            <h2 class="trailers-header">Trailers</h2>
            <?php
                    $args = array(
                    'post_type' => 'post',
                    'post_status' => 'publish',
                    'posts_per_page' => 6,
                    'category_name' => 'Trailers',
                    'order' => 'DESC'
                    );
                    wp_reset_query();
                    $query = new WP_Query($args);
                ?>
            <ul class="trailers-list col-lg-12">
                <?php 
                if($query->have_posts()){
                    while($query->have_posts()) : $query->the_post();
                ?>
                <li class="trailers-story">
                   <a href="javascript:void(0)" title="<?php the_title_attribute(); ?>">
                    <div class="trailers-image">
                      <figure>
                          <img src="<?php echo get_post_meta(get_the_ID(), 'image_link', true); ?>" />
                      </figure>
                    </div>
                    <div class="trailers-info">
                        <h4 class="title">
                            <?php the_title(); ?>
                        </h4>
                    </div>
                    </a>
                </li>
                <div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                </div>
                                <div class="modal-body">
                                    <iframe width="800" height="400" src="<?php echo get_post_meta(get_the_ID(), 'video_link', true); ?>" frameborder="0" allowfullscreen></iframe>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endwhile; 
                    }else{
                        echo "No posts found";
                    }
                    wp_reset_query();
                ?>
            </ul>
        </div>
        <div class="qna-container col-lg-12">
           <?php
                $args = array(
                'post_type' => 'post',
                'post_status' => 'publish',
                'posts_per_page' => 3,
                'category_name' => 'QnA',
                'order' => 'DESC'
                );
                wp_reset_query();
                $query = new WP_Query($args);
            ?>
            <h2 class="qna-header"><a href="<?php echo add_query_arg('category', 'qna', esc_url(home_url('/sections/')))?>">QNA</a></h2>
            <ul class="qna-list">
               <?php 
                if($query->have_posts()){
                    while($query->have_posts()) : $query->the_post();
                ?>
                <li class="qna-story col-lg-4">
                  <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
                   <div class="qna-info">
                      <figure>
                        <img src="<?php echo get_post_meta(get_the_ID(), 'image_link', true); ?>" alt="image" />
                      </figure>
                       <div class="title"><?php the_title(); ?></div>
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
            <div class="more-button col-lg-12">
                <a href="<?php echo add_query_arg('category', 'qna', esc_url(home_url('/sections/')))?>">More </a> 
            </div>
        </div>
        <div class="memory-lane-container col-lg-8">
            <?php
                $args = array(
                'post_type' => 'post',
                'post_status' => 'publish',
                'posts_per_page' => 6,
                'category_name' => 'memorylane',
                'order' => 'DESC'
                );
                wp_reset_query();
                $query = new WP_Query($args);
            ?>
            <h2 class="memory-lane-header"><a href="<?php echo add_query_arg('category', 'memorylane', esc_url(home_url('/sections/')))?>">Memory Lane</a></h2>
            <ul class="memory-lane-list">
               <?php 
                if($query->have_posts()){
                    while($query->have_posts()) : $query->the_post();
                ?>
                <li class="memory-lane-story col-lg-6">
                   <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
                    <div class="memory-lane-image">
                        <figure>
                            <img src="<?php echo get_post_meta(get_the_ID(), 'poster_link', true); ?>" alt="image" />
                        </figure>
                    </div>
                    <div class="memory-lane-info">
                        <div class="title"><?php the_title(); ?></div>
                        <div class="star-rating"> <?php echo do_shortcode('[yasr_overall_rating size="medium"]');?> </div>
                        <div class="author-info">
                            <span class="by">By</span>
                            <div class="author-name"><?php the_author(); ?></div>
                        </div>
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
            <div class="more-button col-lg-12">
                <a href="<?php echo add_query_arg('category', 'memorylane', esc_url(home_url('/sections/')))?>">More </a> 
            </div>
        </div>
        <div class="memes-container col-lg-4">
           <?php
                $args = array(
                'post_type' => 'post',
                'post_status' => 'publish',
                'posts_per_page' => 10,
                'category_name' => 'Memes',
                'order' => 'DESC'
                );
                wp_reset_query();
                $query = new WP_Query($args);
            ?>
            <h2 class="memes-header">Memes</h2>
            <ul class="memes-list col-lg-12">
               <?php 
                if($query->have_posts()){
                    while($query->have_posts()) : $query->the_post();
                ?>
                <li class="memes-story">
                   <div class="memes-image">
                       <figure>
                            <img src="<?php echo the_post_thumbnail_url(); ?>" src="img" />
                        </figure>
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
    <?php get_footer(); ?>
