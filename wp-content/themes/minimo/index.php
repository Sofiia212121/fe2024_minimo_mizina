<?php
get_header();
?>

<?php
if (get_query_var('paged')) {
    $paged = get_query_var('paged');
} elseif (get_query_var('page')) {
    $paged = get_query_var('page');
} else {
    $paged = 1;
}


$args = array(
    'post_type' => 'post',
    'paged' => $paged,
    'posts_per_page' => 4,
    'post_status' => 'publish',
    'category__in' => array(2, 3, 4, 5),
);
$query = new WP_Query($args);
?>

<?php
$post = $query->posts[0];
if ($post) {
    setup_postdata($post);
?>

    <section class="main-banner">
        <img src="<?php the_post_thumbnail_url('full'); ?>" alt="<?php the_title_attribute(); ?>">
    </section>

    <!-- <?php
            wp_reset_postdata();
            ?> -->

    <section class="article-section">
        <a href="<?php echo get_permalink(); ?>"><?php
                                                    $categories = get_the_category();
                                                    foreach ($categories as $category) {
                                                        echo $category->name . ' ';
                                                    }
                                                    ?></a>
        <h1><?php echo get_the_title(); ?></h1>
        <p><?php echo get_the_excerpt(); ?></p>
        <a href="<?php echo get_permalink(); ?>">Leave a comment</a>
    </section>

<?php
    wp_reset_postdata();
}
?>

<section class="grid">
    <?php
    $query_posts_length = count($query->posts);

    for ($i = 0; $i < min($query_posts_length, 5); $i++) {
        $post = $query->posts[$i];
        setup_postdata($post);
    ?>

        <div>
            <img src="<?php the_post_thumbnail_url('medium'); ?>" alt="<?php the_title_attribute(); ?>">
            <a href="<?php echo get_permalink(); ?>"><?php
                                                        $categories = get_the_category();
                                                        if (!empty($categories)) {
                                                            $category_names = array_map(function ($category) {
                                                                return $category->name;
                                                            }, $categories);
                                                            echo implode(' ', $category_names);
                                                        } else {
                                                            echo "Uncategorized";
                                                        }
                                                        ?></a>
            <h3><?php echo get_the_title(); ?></h3>
            <p><?php echo get_the_excerpt(); ?></p>
        </div>
    <?php
    }
    wp_reset_postdata();
    ?>
</section>

<section class="newsletter">
    <h2>Sign up for our newsletter!</h2>
    <form>
        <input type="email" placeholder="Enter a valid email address">
        <button>&#10148;</button>
    </form>
</section>

<section class="grid">
    <?php
    $args = array(
        'posts_per_page' => 2,
        'category' => 2,
    );
    $query = new WP_Query($args);

    if ($query->have_posts()) {
        while ($query->have_posts()) {
            $query->the_post();
    ?>
            <div>
                <img src="<?php the_post_thumbnail_url('medium'); ?>" alt="<?php the_title_attribute(); ?>">
                <a href="<?php the_permalink(); ?>"><?php
                                                    $categories = get_the_category();
                                                    foreach ($categories as $category) {
                                                        echo $category->name . ' ';
                                                    }
                                                    ?></a>
                <h3><?php the_title(); ?></h3>
                <p><?php the_excerpt(); ?></p>
            </div>
    <?php
        }
        wp_reset_postdata();
    }
    ?>
</section>

<section class="load-more">
    <button>Load more</button>
</section>
<?php
get_footer();
