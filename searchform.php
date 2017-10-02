<form role="search" method="get" action="<?php echo home_url('/search-results/'); ?>">
    <input type="search" class="search-form" placeholder="search" value="<?php echo get_search_query() ?>"
    name="search" title="search" />
</form>