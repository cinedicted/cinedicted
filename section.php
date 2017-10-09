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
    wp_reset_query();
    $query = new WP_Query($args);
 ?>

<div class="container">
    <div class="section-page col-xs-8">
        <div class="section-page-header">
            <h1 class="section-name">
                <?php
                    $tagname = get_term_by('slug', get_query_var('tag'), post_tag);
                    $categoryname = get_term_by('slug', get_query_var('category'), category);
                    echo $tagname->name." Movies ".$categoryname->name;
                ?>
            </h1>
            <div class="sort-container">
                <?php if(get_query_var('category') == 'reviews' || get_query_var('category') == 'archives') {?>
                <div class="sort-by">Sort By:</div>
                <div class="sort-by-rating">
                    <div class="dropdown">
                      <button class="btn btn-default dropdown-toggle" type="button" id="rating" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                        Rating
                        <span class="caret"></span>
                      </button>
                      <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                        <li><a href="<?php echo add_query_arg('rating', 5); ?>">*****</a></li>
                        <li><a href="<?php echo add_query_arg('rating', 4); ?>">****</a></li>
                        <li><a href="<?php echo add_query_arg('rating', 3); ?>">***</a></li>
                        <li><a href="<?php echo add_query_arg('rating', 2); ?>">**</a></li>
                        <li><a href="<?php echo add_query_arg('rating', 1); ?>">*</a></li>
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
                if($query->have_posts()){
                    while($query->have_posts()) : $query->the_post();
            ?>
            <div class="story">
                <div class="story-image-container col-lg-4">
                    <figure>
                        <img src="<?php echo get_post_meta(get_the_ID(), 'poster_link', true); ?>" alt="image">
                    </figure>
                    <?php 
                        $post_rating = get_post_meta(get_the_ID(), 'yasr_overall_rating', true);
                        if($post_rating) {?>
                    <div class="star-rating">
                        <?php echo get_post_meta(get_the_ID(), 'yasr_overall_rating', true); ?>
                    </div>
                    <?php } ?>
                </div>
                <div class="story-content-container col-lg-8">
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
            <?php endwhile; 
            }else{
                echo "No posts found";
            }
            ?>
        </div>
        <nav aria-label="...">
          <ul class="pager">
            <li><?php previous_posts_link( 'Previous' ); ?></li>
            <li><?php next_posts_link( 'Next', $query->max_num_pages ); ?></li>
          </ul>
        </nav>
        <?php wp_reset_query(); ?>
    </div>
</div>