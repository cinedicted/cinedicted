<?php /* Template Name: SearchResults */ ?>
<?php get_header(); ?>

<?php
    if(get_query_var('search')){
        $text = get_query_var('search');
    };
    $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
        $args = array(
            'post_type' => 'post',
            'posts_per_page' => 10,
            'paged' => $paged,
            's' => $text,
            'order' => $order
        );
        if($cat && !empty($cat)){
            $args['category_name'] = $cat;
        }
        if($tag && !empty($tag)){
            $args['tag_slug__in'] = $tag;
        }
        wp_reset_query();
        $query = new WP_Query($args);
?>

<div class="container">
    <div class="section-page col-xs-8">
        <div class="section-page-header">
            <h1 class="section-name">Displaying <?php echo $query->found_posts; ?> results for <?php echo $text; ?></h1>
            <div class="sort-container">
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
            <?php endwhile; ?>
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