<?php

add_action( 'wp_enqueue_scripts', 'test_style' );
add_action( 'wp_footer', 'test_script' );
add_action( 'after_setup_theme', 'test_menu');
add_action( 'widgets_init', 'test_sidebar');
add_action( 'init', 'test_regist_post');

// ФУНКЦИИ
function test_style() {
	wp_enqueue_style( 'style', get_stylesheet_uri());

	wp_enqueue_style( 'default', get_template_directory_uri() . "/assets/css/default.css");
	wp_enqueue_style( 'layot', get_template_directory_uri() . "/assets/css/layout.css");
	wp_enqueue_style( 'media', get_template_directory_uri() . "/assets/css/media-queries.css");
}

function test_script() {
	wp_enqueue_script('min', get_template_directory_uri() . "/assets/js/jquery-1.10.2.min.js");
	wp_enqueue_script('migrate', get_template_directory_uri() . "/assets/js/jquery-migrate-1.2.1.min.js");
	wp_enqueue_script('flexslider', get_template_directory_uri() . "/assets/js/jquery.flexslider.js");
	wp_enqueue_script('doubletaptogo', get_template_directory_uri() . "/assets/js/doubletaptogo.js");
	wp_enqueue_script('init', get_template_directory_uri() . "/assets/js/init.js");
}

function test_menu() {
	register_nav_menu('top', 'Шапка');
	register_nav_menu('bottom', 'Подвал');

	// ПОСТЫ
	add_theme_support( 'post-thumbnails', array( 'post', 'portfolio_posts' ) ); 
	add_image_size( 'post_size', 1300, 500, true ); 
	add_filter( 'excerpt_more', 'new_excerpt_more' );
	function new_excerpt_more( $more ){
		global $post;
		return '<a href="'. get_permalink($post) . '"> ...</a>';
	}

	// ШАБЛОН ПОСТОВ

	add_theme_support('post-formats', array( 'aside', 'gallery', 'video' ));
}

function test_sidebar() {
	register_sidebar(array(
		'name'          => 'Inform Sidebar',
		'id'            => "inform_sidebar",
		'description'   => '',
		'class'         => '',
		'before_widget' => '<div class="widget %2$s">',
		'after_widget'  => "</div>\n",
		'before_title'  => '<h5 class="widget-title">',
		'after_title'   => "</h5>\n",
	));
}

function test_regist_post(){
	// РЕГИСТРАЦИЯ ТАКСОНОМИИ

	register_taxonomy( 'skils', [ 'portfolio_posts' ], [
		'label'                 => '', // определяется параметром $labels->name
		'labels'                => [
			'name'              => 'Навыки',
			'singular_name'     => 'Навык',
			'search_items'      => 'Поиск навыков',
			'all_items'         => 'Все навыки',
			'view_item '        => 'Посмотреть навыки',
			'parent_item'       => 'Родительский навык',
			'parent_item_colon' => 'Родительский навык:',
			'edit_item'         => 'Редактировать навык',
			'update_item'       => 'Обновить навык',
			'add_new_item'      => 'Добавить новый навык',
			'new_item_name'     => 'Новое название навыка',
			'menu_name'         => 'Навык',
			'back_to_items'     => '← Вернуться к навыкам',
		],
		'description'           => 'Навыик используемые в проекте', // описание таксономии
		'public'                => true,
		// 'publicly_queryable'    => null, // равен аргументу public
		'hierarchical'          => false,

		'rewrite'               => true,
	] );

	// РЕГИСТРАЦИЯ ПОСТОВ
	register_post_type( 'portfolio_posts', [
		'label'  => null,
		'labels' => [
			'name'               => 'Работы', // основное название для типа записи
			'singular_name'      => 'Работа', // название для одной записи этого типа
			'add_new'            => 'Добавить Работу', // для добавления новой записи
			'add_new_item'       => 'Добавление Работы', // заголовка у вновь создаваемой записи в админ-панели.
			'edit_item'          => 'Редактирование Работу', // для редактирования типа записи
			'new_item'           => 'Новая работа', // текст новой записи
			'view_item'          => 'Смотреть работу', // для просмотра записи этого типа.
			'search_items'       => 'Искать работу в портфолио', // для поиска по этим типам записи
			'not_found'          => 'Не найдено', // если в результате поиска ничего не было найдено
			'not_found_in_trash' => 'Не найдено в корзине', // если не было найдено в корзине
			'parent_item_colon'  => '', // для родителей (у древовидных типов)
			'menu_name'          => 'Portfolio_Post', // название меню
		],
		'description'            => 'Посты для Portfolio',
		'public'                 => true,
		'publicly_queryable'  => true, // зависит от public
		'exclude_from_search' => true, // зависит от public
		'show_ui'             => true, // зависит от public
		'show_in_nav_menus'   => true, // зависит от public
		'show_in_menu'           => true, // показывать ли в меню админки
		'show_in_admin_bar'   => true, // зависит от show_in_menu
		'show_in_rest'        => true, // добавить в REST API. C WP 4.7
		'rest_base'           => null, // $post_type. C WP 4.7
		'menu_position'       => 4,
		'menu_icon'           => null,
		//'capability_type'   => 'post',
		//'capabilities'      => 'post', // массив дополнительных прав для этого типа записи
		//'map_meta_cap'      => null, // Ставим true чтобы включить дефолтный обработчик специальных прав
		'hierarchical'        => false,
		'supports'            => [ 'title', 'editor', 'thumbnail', 'excerpt', 'post-formats'], // 'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
		'taxonomies'          => ["skils"],
		'has_archive'         => false,
		'rewrite'             => true,
		'query_var'           => true,
	] );
}

// ФИЛЬТРЫ

add_filter('the_content', 'test_content');

function test_content($content){
	$content .= 'Спасибо за прочтение';

	return $content;
}