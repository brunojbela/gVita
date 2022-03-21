<?php

DEFINE('CONTENT_URI', get_stylesheet_directory_uri());

require_once get_template_directory() . '/core/classes/class-bootstrap-nav.php';

if (!function_exists('odin_setup_features')) {
	function odin_setup_features()
	{
		register_nav_menus(
			array(
				'main-menu' => __('Main Menu', 'odin')
			)
		);
		add_theme_support('post-thumbnails');
		add_image_size('blog-thumbnails', 586, 350, array('center', 'center'));
		add_image_size('post-thumbnail', 200, 220, array('center', 'center'));
	}
}
add_action('after_setup_theme', 'odin_setup_features');

function odin_flush_rewrite()
{
	flush_rewrite_rules();
}

add_action('after_switch_theme', 'odin_flush_rewrite');

function odin_enqueue_scripts()
{
	$template_url = get_template_directory_uri();

	//CSS
	wp_enqueue_style('main-min-style', $template_url . '/assets/css/main.min.css?v='.rand(), array(), null, 'all');
	wp_enqueue_style('style-lgpd',  '//cdnjs.cloudflare.com/ajax/libs/cookieconsent2/3.0.3/cookieconsent.min.css', array(), null, 'all');
	wp_enqueue_style('style-aos',  '//unpkg.com/aos@2.3.1/dist/aos.css', array(), null, 'all');
	wp_enqueue_style('style-leaflet',  '//unpkg.com/leaflet@1.6.0/dist/leaflet.css', array(), null, 'all');

	//JS
	wp_enqueue_script('main-min-js', $template_url . '/assets/js/main.min.js', array(), null, true);
	wp_enqueue_script('lgpd', '//cdnjs.cloudflare.com/ajax/libs/cookieconsent2/3.0.3/cookieconsent.min.js', array(), null, true);
	wp_enqueue_script('masks', '//cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.0/jquery.mask.js', array(), null, false);
	wp_enqueue_script('maps', '//maps.googleapis.com/maps/api/js?key=AIzaSyDYMN6wpqf6Fvn1aMzQjFkT5-_X-Xp22WU&callback=initMap', array(), null, false);
}
add_action('wp_enqueue_scripts', 'odin_enqueue_scripts', 1);

function my_acf_init() {
	acf_update_setting('google_api_key', 'AIzaSyDYMN6wpqf6Fvn1aMzQjFkT5-_X-Xp22WU');
}

add_action('acf/init', 'my_acf_init');

if (function_exists('acf_add_options_page')) {
	acf_add_options_page(array(
		'page_title'  => 'Opções Gerais',
		'menu_title'  => 'Opções Gerais',
		'menu_slug'   => 'amdt-opcoes',
		'capability'  => 'edit_posts',
		'redirect'    => false
	));
}

function remove_menus()
{
	//  remove_menu_page( 'edit.php?post_type=acf-field-group' );    //ACF
	//  remove_menu_page( 'edit-comments.php' );    //Comentarios
	//  remove_menu_page( 'edit.php?post_type=rdcf7_integrations' );    //RD Station
	//  remove_menu_page( 'plugins.php' );    //Plugins
	//  remove_menu_page( 'options-general.php' );    //Configurações
	//  remove_menu_page( 'themes.php' );    //Aparência
	//  remove_menu_page( 'tools.php' );    //Ferramentas
	//  remove_menu_page( 'edit.php?page=wpcf7' );    //Contact form 7
	//  remove_menu_page( 'edit.php?page=wp-mail-smtp' );    //SMTP
	//  remove_menu_page( 'update-core.php' );    //Atualização
}
add_action('admin_menu', 'remove_menus');