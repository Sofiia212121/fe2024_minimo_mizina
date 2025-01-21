<?php
get_header();
?>

<main class="main-content">
	<section class="hero">
		<img src="<?php echo esc_url(get_the_post_thumbnail_url()); ?>" alt="<?php the_title_attribute(); ?>" class="hero-image">
	</section>

	<article class="blog-post">
		<p class="category">
			<?php
			$categories = get_the_category();
			if (!empty($categories)) {
				echo esc_html($categories[0]->name);
			}
			?>
		</p>
		<h2 class="title"><?php the_title(); ?></h2>
		<p class="content"><?php echo get_the_excerpt(); ?></p>

		<div class="images">
			<img src="<?php echo get_template_directory_uri(); ?>/img/woman-scarf.jpg" alt="Walking with a scarf">
			<img src="<?php echo get_template_directory_uri(); ?>/img/woman-hills.jpg" alt="Standing near hills">
			<img src="<?php echo get_template_directory_uri(); ?>/img/woman-sand.jpg" alt="Back view near sand">
		</div>

		<?php
		if (get_field('quote')) {
			echo '<blockquote class="quote">' . wp_kses_post(get_field('quote')) . '</blockquote>';
		} else {
			echo '<p>Цитата не знайдена</p>';
		}
		?>


		<p class="content"><?php echo get_the_excerpt(); ?></p>

		<div class="share">
			<p>SHARE</p>
			<a href="https://facebook.com/sharer/sharer.php?u=<?php echo urlencode(get_permalink()); ?>" target="_blank">
				<img src="<?php echo get_template_directory_uri(); ?>/img/facebook.png" alt="Facebook">
			</a>
			<a href="https://twitter.com/share?url=<?php echo urlencode(get_permalink()); ?>&text=<?php echo urlencode(get_the_title()); ?>" target="_blank">
				<img src="<?php echo get_template_directory_uri(); ?>/img/twitter.png" alt="Twitter">
			</a>
			<a href="https://plus.google.com/share?url=<?php echo urlencode(get_permalink()); ?>" target="_blank">
				<img src="<?php echo get_template_directory_uri(); ?>/img/google.png" alt="Google">
			</a>
			<a href="https://pinterest.com/pin/create/button/?url=<?php echo urlencode(get_permalink()); ?>&media=<?php echo urlencode(get_the_post_thumbnail_url()); ?>&description=<?php echo urlencode(get_the_title()); ?>" target="_blank">
				<img src="<?php echo get_template_directory_uri(); ?>/img/pinterest.png" alt="Pinterest">
			</a>
		</div>
	</article>

	<section class="related-posts">
		<h3>YOU MAY ALSO LIKE</h3>
		<div class="related-cards">
			<?php
			$related_posts = new WP_Query(array(
				'category__in' => wp_get_post_categories(get_the_ID()),
				'posts_per_page' => 3,
				'post__not_in' => array(get_the_ID())
			));

			if ($related_posts->have_posts()) {
				while ($related_posts->have_posts()) {
					$related_posts->the_post();
			?>
					<div class="card">
						<?php
						if (has_post_thumbnail()) {
						?>
							<a href="<?php the_permalink(); ?>">
								<img src="<?php the_post_thumbnail_url('thumbnail'); ?>" alt="<?php the_title_attribute(); ?>">
							</a>
						<?php
						}
						?>
						<p><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></p>
					</div>
			<?php
				}
				wp_reset_postdata();
			}
			?>
		</div>
	</section>

	<section class="comments">
		<?php
		$args = array(
			'style'       => 'div',
			'short_ping'  => true,
			'avatar_size' => 64,
			'callback'    => 'my_comment_callback',
		);

		if (have_comments()) {
			echo '<h3>' . get_comments_number() . ' COMMENTS</h3>';
			wp_list_comments($args);
		} else {
			echo '<h3>No comments yet. Be the first to comment!</h3>';
		}
		?>

		<div class="comment">
			<?php
			$form_args = array(
				'title_reply' => __(''),
				'label_submit' => __('&#10148;'),
				'comment_field' => '<textarea placeholder="Join the discussion" name="comment" id="comment"></textarea>',
			);
			comment_form($form_args);
			?>
		</div>

		<div class="connected">
			<p>CONNECTED WITH</p>
			<a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo urlencode(get_permalink()); ?>" target="_blank">
				<img src="<?php echo get_template_directory_uri(); ?>/img/facebook.png" alt="Facebook">
			</a>
			<a href="https://twitter.com/intent/tweet?url=<?php echo urlencode(get_permalink()); ?>&text=<?php echo urlencode(get_the_title()); ?>" target="_blank">
				<img src="<?php echo get_template_directory_uri(); ?>/img/twitter.png" alt="Twitter">
			</a>
		</div>
	</section>
</main>

<?php
get_footer();
