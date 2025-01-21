<?php
// Template Name: Шаблон Головної
?>

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
    'no_found_rows' => false,
    'cache_results' => false,
    'update_post_meta_cache' => false,
    'update_post_term_cache' => false,
);
$query = new WP_Query($args);
?>

<?php
if (!empty($query->posts)) {
    $post = $query->posts[0];
    setup_postdata($post);
?>

    <section class="main-banner">
        <img src="<?php echo esc_url(get_the_post_thumbnail_url($post, 'full')); ?>" alt="<?php echo esc_attr(get_the_title($post)); ?>">
    </section>

    <section class="article-section">
        <a href="<?php echo esc_url(get_permalink($post)); ?>">
            <?php
            $categories = get_the_category($post);
            foreach ($categories as $category) {
                echo esc_html($category->name) . ' ';
            }
            ?>
        </a>
        <h1><?php echo esc_html(get_the_title($post)); ?></h1>
        <p><?php echo esc_html(get_the_excerpt($post)); ?></p>
        <a href="<?php echo esc_url(get_permalink($post)); ?>">Leave a comment</a>
    </section>

<?php
    wp_reset_postdata();
}
?>

<section class="grid">
    <?php
    $query_posts_length = count($query->posts);

    foreach ($query->posts as $post) {
        setup_postdata($post);
    ?>
        <div>
            <img src="<?php echo esc_url(get_the_post_thumbnail_url($post, 'medium')); ?>" alt="<?php echo esc_attr(get_the_title($post)); ?>">
            <a href="<?php echo esc_url(get_permalink($post)); ?>">
                <?php
                $categories = get_the_category($post);
                foreach ($categories as $category) {
                    echo esc_html($category->name) . ' ';
                }
                ?>
            </a>
            <h3><?php echo esc_html(get_the_title($post)); ?></h3>
            <p><?php echo esc_html(get_the_excerpt($post)); ?></p>
        </div>
    <?php
    }
    wp_reset_postdata();
    ?>
</section>

<section class="newsletter">
    <h2>Sign up for our newsletter!</h2>
    <?php echo do_shortcode('[contact-form-7 id="1a192ad" title="Contact form 1"]'); ?>
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

<nav class="pagination">
    <?php
    if ($query->max_num_pages > 1) {
        echo paginate_links(array(
            'base' => user_trailingslashit(trailingslashit(remove_query_arg('s', get_pagenum_link(1))) . 'page/%#%/'),
            'format' => '?paged=%#%',
            'current' => max(1, $paged),
            'total' => $query->max_num_pages,
            'prev_text' => __('« Previous'),
            'next_text' => __('Next »'),
            'type' => 'list',
        ));
    }
    ?>
</nav>
<?php
get_footer();
