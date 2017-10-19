<?php /* Template Name: Section */ ?>
<?php get_header(); ?>

<?php
    if(get_query_var('order')){
        $order = get_query_var('order');
    }
    if(get_query_var('rating')){
        $rating = get_query_var('rating');
    }
    if(get_query_var('category')){
        $cat = get_query_var('category');
    }
    if(get_query_var('tag')){
        $tag = array(get_query_var('tag'));
    }
    $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
    $args = array(
        'post_type' => 'post',
        'posts_per_page' => 10,
        'paged' => $paged,
        'order' => $order
    );
    if($cat && !empty($cat)){
        if($cat == 'latestarticle'){
            $args['category__not_in'] = array( 1, 2 );
        }else{
            $args['category_name'] = $cat;
        }
    }
    if($tag && !empty($tag)){
        $args['tag_slug__in'] = $tag;
    }
    if($rating && !empty($rating)){
        $args['meta_query'] = array(
            array(
                'key' => 'yasr_overall_rating',
                'value' => array((float)$rating - 0.49, (float)$rating + 0.5),
                'type' => 'DECIMALS',
                'compare' => 'BETWEEN'
            )
        );
    }
    $query = new WP_Query($args);
 ?>

<div class="listing-page container">
    <div class="section-page col-xs-12 col-lg-8">
        <div class="section-page-header">
            <h1 class="section-name">
                <?php
                    $tagname = get_term_by('slug', get_query_var('tag'), post_tag);
                    $categoryname = get_term_by('slug', get_query_var('category'), category);
                    echo $tagname->name.$categoryname->name;
                ?>
            </h1>
            <div class="sort-container">
               <div class="sort-by">Sort By:</div>
                <?php if(get_query_var('category') == 'reviews' || get_query_var('category') == 'archives') {?>
                <div class="sort-by-rating">
                    <div class="dropdown">
                      <button class="btn btn-default dropdown-toggle" type="button" id="rating" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                        Rating
                        <span class="caret"></span>
                      </button>
                      <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                        <li><a href="<?php echo add_query_arg('rating', 5); ?>">★★★★★</a></li>
                        <li><a href="<?php echo add_query_arg('rating', 4); ?>">★★★★</a></li>
                        <li><a href="<?php echo add_query_arg('rating', 3); ?>">★★★</a></li>
                        <li><a href="<?php echo add_query_arg('rating', 2); ?>">★★</a></li>
                        <li><a href="<?php echo add_query_arg('rating', 1); ?>">★</a></li>
                      </ul>
                    </div>
                </div>
                <?php } ?>
                <div class="sort-by-publish-date">
                    <div class="dropdown">
                      <button class="btn btn-default dropdown-toggle" type="button" id="publish-date" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                        Publish Date
                        <span class="caret"></span>
                      </button>
                      <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                        <li><a href="<?php echo add_query_arg('order', 'DESC'); ?>">Latest</a></li>
                        <li><a href="<?php echo add_query_arg('order', 'ASC'); ?>">Oldest</a></li>
                      </ul>
                    </div>
                </div>
                <div class="sort-by-language">
                    <div class="dropdown">
                      <button class="btn btn-default dropdown-toggle" type="button" id="language" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                        Language
                        <span class="caret"></span>
                      </button>
                      <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                        <li><a href="<?php echo add_query_arg('tag', 'english'); ?>">English</a></li>
                        <li><a href="<?php echo add_query_arg('tag', 'hindi'); ?>">Hindi</a></li>
                        <li><a href="<?php echo add_query_arg('tag', 'kannada'); ?>">Kannada</a></li>
                        <li><a href="<?php echo add_query_arg('tag', 'tamil'); ?>">Tamil</a></li>
                        <li><a href="<?php echo add_query_arg('tag', 'telugu'); ?>">Telugu</a></li>
                      </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="stories-container">
            <?php 
                while($query->have_posts()) : $query->the_post();
            ?>
            <div class="story">
                <div class="story-image-container col-xs-4">
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
                    <?php 
                        $post_rating = get_post_meta(get_the_ID(), 'yasr_overall_rating', true);
                        if($post_rating) {?>
                        <div class="star-rating-container">
                            <div class="rating-star">
                               <div class="rating"><?php echo get_post_meta(get_the_ID(), 'yasr_overall_rating', true); ?></div>
                                <span class="rating-unfilled">★★★★★</span>
                                <span class="rating-filled">★★★★★</span>
                            </div>
                        </div>
                    <?php } ?>
                </div>
                <div class="story-content-container col-xs-8">
                    <h3 class="story-headline">
                        <a href="<?php the_permalink() ?>">
                            <font color="0D5191"><span class="link"><?php the_title(); ?></span></font>
                        </a>
                    </h3>
                    <div class="story-excerpt">
                        <?php echo the_excerpt(); ?>
                    </div>
                    <div class="author-name">By <?php the_author(); ?></div>
                    <div class="publish-date"><?php the_date(); ?></div>
                </div>
            </div>
            <?php endwhile; ?>
        </div>
        <nav aria-label="...">
          <ul class="pager">
            <li><?php previous_posts_link( 'Previous' ); ?></li>
            <li><?php next_posts_link( 'Next', $query->max_num_pages ); ?></li>
          </ul>
        </nav>
    </div>
    <div class="right-side col-xs-12 col-lg-4">
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
        <div class="polls-container col-lg-12">
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
    </div>
</div>


<?php get_footer(); ?>
