<?php
/**
 * @package WordPress
 * @subpackage Classic_Theme
 */
if ( function_exists('register_sidebar') ) {
	register_sidebar(array(
		'name' => 'sidebar-1',
		'before_widget' => '<li id="%1$s" class="widget %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h3 class="widgettitle">',
		'after_title' => '</h3>',
	));
	
	register_sidebar(array(
		'name' => 'sidebar-2',
		'before_widget' => '<li id="%1$s" class="widget %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h3 class="widgettitle">',
		'after_title' => '</h3>',
	));
}

function new_headers($headers) {
    unset($headers['X-Pingback']);
	unset($headers['Server']);
	$headers['X-Xss-Protection'] = "1; mode=block";
	$headers['X-Content-Type-Options'] = "nosniff";
	
    return $headers;
}
add_filter('wp_headers', 'new_headers');

function change_avatar_css($class) {
	$class = str_replace("class='avatar", "class='avatar img-responsive", $class) ;
	return $class;
}
add_filter('get_avatar','change_avatar_css');


function wrap_embed_with_div($html, $url, $attr) {
     return '<div class="embed-responsive embed-responsive-16by9">' . $html . '</div>';
}
add_filter('embed_oembed_html', 'wrap_embed_with_div', 10, 3);

function add_responsive_class_img($html, $id, $caption, $title, $align, $url, $size, $alt) {
	$twitter_card_meta = '<meta name="twitter:image" content="' . wp_get_attachment_url($id) . '" />';

	$new_html_code = str_replace('class="', 'itemprop="image" class="img-responsive ', $html);
	$new_html_code = $twitter_card_meta . $new_html_code;
	return $new_html_code;
}
add_filter('image_send_to_editor', 'add_responsive_class_img', 10, 8);

function my_img_caption_shortcode( $empty, $attr, $content ){
	$attr = shortcode_atts( array(
		'id'      => '',
		'align'   => 'alignnone',
		'width'   => '',
		'caption' => ''
	), $attr );

	if ( 1 > (int) $attr['width'] || empty( $attr['caption'] ) ) {
		return '';
	}

	if ( $attr['id'] ) {
		$attr['id'] = 'id="' . esc_attr( $attr['id'] ) . '" ';
	}

	return '<div ' . $attr['id']
	. 'class="wp-caption ' . esc_attr( $attr['align'] ) . '" '
	. 'style="max-width: ' . ( (int) $attr['width'] ) . 'px;">'
	. do_shortcode( $content )
	. '<p class="wp-caption-text">' . $attr['caption'] . '</p>'
	. '</div>';

}
add_filter( 'img_caption_shortcode', 'my_img_caption_shortcode', 10, 3 );


// AM22 - Remove YARRP css files - START
function dequeue_header_styles_yapp()
{
  wp_dequeue_style('yarppWidgetCss');
}
add_action('wp_print_styles','dequeue_header_styles_yapp');

function dequeue_footer_styles_yapp()
{
  wp_dequeue_style('yarppRelatedCss');
  wp_dequeue_style('yarpp-thumbnails-yarpp-thumbnail');
}
add_action('get_footer','dequeue_footer_styles_yapp');
	
function get_category_menu($current_categories) {
	$categories = get_categories();
	$styled_category_html = null;
	$current_category_id = null;

	if ($_GET["id"]) {
		$current_category_id = $_GET["id"];
	}

	if (!$current_category_id) {
		$current_category_id = $current_categories[0]->cat_ID;	
	}

	$category_forum_url = '#';
	$category_loja_url = '#';
	$blogurl = get_bloginfo('url');
	
	foreach ($categories as $category) {
		switch ($category->cat_ID) {
			case 5: //Xbox 360 / Xbox
			$category_loja_url = esc_url('http://loja.newsinside.org/microsoft');
			$category_forum_url = esc_url('http://forums.newsinside.org/xbox/');
			break;

			case 17: //Nintendo DS / 3DS
			$category_loja_url = esc_url('http://loja.newsinside.org/nintendo/nintendo-ds-3ds');
			$category_forum_url = esc_url('http://forums.newsinside.org/nintendo-3ds/');
			break;

			case 197: //Smartphones
			$category_loja_url = esc_url('http://loja.newsinside.org/outros');
			$category_forum_url = esc_url('http://forums.newsinside.org/iphone-celulares/');
			break;

			case 1: //Outros
			$category_loja_url = esc_url('http://loja.newsinside.org/outros');
			$category_forum_url = esc_url('http://forums.newsinside.org/outros-sistemas/');
			break;

			case 13: //PC
			$category_loja_url = esc_url('http://loja.newsinside.org/outros');
			$category_forum_url = esc_url('http://forums.newsinside.org/pc-mac/');
			break;

			case 846: //Podcast
			$category_forum_url = esc_url('http://forums.newsinside.org/podcast/');
			break;

			case 92: //Playstation
			$category_loja_url = esc_url('http://loja.newsinside.org/sony/playstation');
			$category_forum_url = esc_url('http://forums.newsinside.org/playstation3/');			
			break;
			case 6: //PSP / PSVita
			$category_loja_url = esc_url('http://loja.newsinside.org/sony/psp-ps-vita');
			$category_forum_url = esc_url('http://forums.newsinside.org/psp/');			
			break;
			case 91: //Wii / WiiU
			$category_loja_url = esc_url('http://forums.newsinside.org/nintendo-wii/');
			$category_forum_url = esc_url('http://loja.newsinside.org/nintendo/nintendo-wii-wiiu');			
			break;
		}


		//Pre markup
		if (($category->cat_ID == $current_category_id) && !is_front_page()) {
			$styled_category_html .= '<li class="dropdown active">';
		} else {
			$styled_category_html .= '<li class="dropdown">';
		}
		$styled_category_html .= '<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">' .
								$category->name . ' <span class="caret"></span></a>';
		$styled_category_html .= '<ul class="dropdown-menu" role="menu">';

		//Item itself
		$styled_category_html .= '<li><a href="' . esc_url(get_category_link($category->cat_ID)) . '">Artigos</a></li>';
		$styled_category_html .= '<li><a href="' . $category_forum_url . '" target="_blank">F&#243;rum</a></li>';
		$styled_category_html .= '<li><a href="' . $category_loja_url . '" target="_blank">Loja</a></li>';
		$styled_category_html .= '<li><a href="' . esc_url($blogurl . '/arquivo?id=' . $category->cat_ID) . '">Arquivo</a></li>';

		//Post markup
		$styled_category_html .= '</ul>';
		$styled_category_html .= '</li>';
	}

	return $styled_category_html;
}

function get_terms_url () {
	return esc_url(get_bloginfo('url') . '/politicas');
}

//Para montagem das paginas de arquivos
function get_page_category ($category_id) {
	$cat = get_category($category_id);
	if ($cat) { return $cat; }
	return get_category(1);
}	

add_theme_support('post-thumbnails');
set_post_thumbnail_size(150, 150, true);
?>
