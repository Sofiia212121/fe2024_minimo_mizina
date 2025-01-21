<?php

/**
 * Minimo functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Minimo
 */

if (! defined('_S_VERSION')) {
	// Replace the version number of the theme on each release.
	define('_S_VERSION', '1.0.0');
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function minimo_setup()
{
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on Minimo, use a find and replace
		* to change 'minimo' to the name of your theme in all the template files.
		*/
	load_theme_textdomain('minimo', get_template_directory() . '/languages');

	// Add default posts and comments RSS feed links to head.
	add_theme_support('automatic-feed-links');

	/*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
	add_theme_support('title-tag');

	/*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
	add_theme_support('post-thumbnails');

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'menu-1' => esc_html__('Primary', 'minimo'),
		)
	);

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'minimo_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support('customize-selective-refresh-widgets');

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action('after_setup_theme', 'minimo_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function minimo_content_width()
{
	$GLOBALS['content_width'] = apply_filters('minimo_content_width', 640);
}
add_action('after_setup_theme', 'minimo_content_width', 0);

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function minimo_widgets_init()
{
	register_sidebar(
		array(
			'name'          => esc_html__('Sidebar', 'minimo'),
			'id'            => 'sidebar-1',
			'description'   => esc_html__('Add widgets here.', 'minimo'),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action('widgets_init', 'minimo_widgets_init');

/**
 * Enqueue scripts and styles.
 */
function minimo_scripts()
{
	wp_enqueue_style('minimo-style', get_stylesheet_uri(), array(), _S_VERSION);
	wp_style_add_data('minimo-style', 'rtl', 'replace');

	wp_enqueue_script('minimo-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true);

	if (is_singular() && comments_open() && get_option('thread_comments')) {
		wp_enqueue_script('comment-reply');
	}
}
add_action('wp_enqueue_scripts', 'minimo_scripts');

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if (defined('JETPACK__VERSION')) {
	require get_template_directory() . '/inc/jetpack.php';
}


/*
 * Функция создает дубликат поста в виде черновика и редиректит на его страницу редактирования
 */
function true_duplicate_post_as_draft()
{
	global $wpdb;
	if (! (isset($_GET['post']) || isset($_POST['post'])  || (isset($_REQUEST['action']) && 'true_duplicate_post_as_draft' == $_REQUEST['action']))) {
		wp_die('Нечего дублировать!');
	}

	/*
	 * получаем ID оригинального поста
	 */
	$post_id = (isset($_GET['post']) ? $_GET['post'] : $_POST['post']);
	/*
	 * а затем и все его данные
	 */
	$post = get_post($post_id);

	/*
	 * если вы не хотите, чтобы текущий автор был автором нового поста
	 * тогда замените следующие две строчки на: $new_post_author = $post->post_author;
	 * при замене этих строк автор будет копироваться из оригинального поста
	 */
	$current_user = wp_get_current_user();
	$new_post_author = $current_user->ID;

	/*
	 * если пост существует, создаем его дубликат
	 */
	if (isset($post) && $post != null) {

		/*
	   * массив данных нового поста
	   */
		$args = array(
			'comment_status' => $post->comment_status,
			'ping_status'    => $post->ping_status,
			'post_author'    => $new_post_author,
			'post_content'   => $post->post_content,
			'post_excerpt'   => $post->post_excerpt,
			'post_name'      => $post->post_name,
			'post_parent'    => $post->post_parent,
			'post_password'  => $post->post_password,
			'post_status'    => 'draft', // черновик, если хотите сразу публиковать - замените на publish
			'post_title'     => $post->post_title,
			'post_type'      => $post->post_type,
			'to_ping'        => $post->to_ping,
			'menu_order'     => $post->menu_order
		);

		/*
	   * создаем пост при помощи функции wp_insert_post()
	   */
		$new_post_id = wp_insert_post($args);

		/*
	   * присваиваем новому посту все элементы таксономий (рубрики, метки и т.д.) старого
	   */
		$taxonomies = get_object_taxonomies($post->post_type); // возвращает массив названий таксономий, используемых для указанного типа поста, например array("category", "post_tag");
		foreach ($taxonomies as $taxonomy) {
			$post_terms = wp_get_object_terms($post_id, $taxonomy, array('fields' => 'slugs'));
			wp_set_object_terms($new_post_id, $post_terms, $taxonomy, false);
		}

		/*
	   * дублируем все произвольные поля
	   */
		$post_meta_infos = $wpdb->get_results("SELECT meta_key, meta_value FROM $wpdb->postmeta WHERE post_id=$post_id");
		if (count($post_meta_infos) != 0) {
			$sql_query = "INSERT INTO $wpdb->postmeta (post_id, meta_key, meta_value) ";
			foreach ($post_meta_infos as $meta_info) {
				$meta_key = $meta_info->meta_key;
				$meta_value = addslashes($meta_info->meta_value);
				$sql_query_sel[] = "SELECT $new_post_id, '$meta_key', '$meta_value'";
			}
			$sql_query .= implode(" UNION ALL ", $sql_query_sel);
			$wpdb->query($sql_query);
		}


		/*
	   * и наконец, перенаправляем пользователя на страницу редактирования нового поста
	   */
		wp_redirect(admin_url('post.php?action=edit&post=' . $new_post_id));
		exit;
	} else {
		wp_die('Ошибка создания поста, не могу найти оригинальный пост с ID=: ' . $post_id);
	}
}
add_action('admin_action_true_duplicate_post_as_draft', 'true_duplicate_post_as_draft');

/*
   * Добавляем ссылку дублирования поста для post_row_actions
   */
function true_duplicate_post_link($actions, $post)
{
	if (current_user_can('edit_posts')) {
		$actions['duplicate'] = '<a href="admin.php?action=true_duplicate_post_as_draft&post=' . $post->ID . '" title="Дублировать этот пост" rel="permalink">Дублировать</a>';
	}
	return $actions;
}

add_filter('post_row_actions', 'true_duplicate_post_link', 10, 2);

// Функція для кастомізації вигляду коментарів
function my_comment_callback($comment, $args, $depth)
{
?>
	<div class="comment">
		<?php echo get_avatar($comment, 64); ?>
		<div class="comment-content">
			<p class="name">
				<?php echo get_comment_author_link() ?: 'Анонім'; ?>
			</p>
			<p class="description">
				<?php comment_text() ?: 'Коментар відсутній.'; ?>
			</p>
			<h3>
				<?php
				$max_depth = isset($args['max_depth']) ? $args['max_depth'] : 5;
				if (isset($depth)) {
					comment_reply_link(array_merge($args, array(
						'depth' => $depth,
						'max_depth' => $max_depth
					)));
				} else {
					echo 'Відповіді недоступні.';
				}
				?>
			</h3>
		</div>
	</div>
<?php
}

// multilang
function my_site_custom_languages_selector_template()
{
	if (function_exists('wpm_get_languages')) {
		$languages = wpm_get_languages();
		$current = wpm_get_language();

		$out = '<div class="b-language-selector">';

		foreach ($languages as $code => $language) {
			$toggle_url = esc_url(wpm_translate_current_url($code));
			$css_classes = 'b-language-selector-link ';

			if ($code === $current) {
				$css_classes .= 'b-language-selector-link--active';
			}

			$out .= '<a href="' . $toggle_url . '" class="' . $css_classes . '" data-lang="' . esc_attr($code) . '">';
			$out .= $language['name'];
			$out .= '</a>';
			$out .= '&nbsp;';
		}

		$out .= '</div>';

		return $out;
	}
}
