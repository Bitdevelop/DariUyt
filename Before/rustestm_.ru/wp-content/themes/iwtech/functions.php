!!!<?php
add_theme_support('menus');
register_nav_menu('hmenu', 'Горизонтальное меню');
add_theme_support( 'post-thumbnails' );
set_post_thumbnail_size(800, 900, false);
add_image_size('thumb159', 159,159,true); // Характерное изображение в контенте
add_image_size('thumb82', 82,111,true);
add_image_size('thumb400', 400,800,false);
function pchange($change=''){
	if($change and function_exists('get_roption')){
		return get_roption($change);
	}
}
$args = array(
	'name'          => __( 'Благодарственные письма', 'theme_text_domain' ),
	'id'            => 'letters',
	'description'   => '',
	'class'         => '',
	'before_widget' => '<div class="item">',
	'after_widget'  => '</div>',
	'before_title'  => '',
	'after_title'   => '');
register_sidebar ($args); 
function get_services($menu=false){
	$args = array( 'post_type' => 'services', 		
		'meta_key'=>'ordering',  
		'posts_per_page'=>999,
		'orderby' => 'meta_value_num', 
		'order' => ASC );
	$args['meta_query'][] = array(
		'key'=>'ordering',
		'value'=>0,
		'compare'=>'>='
		);
	if (isset($menu)){
		$args['meta_query'][] = array(
			'key' =>$menu,
			'value'=>1,
			'compare'=>'>='
			);
	}
	$posts = get_posts($args);
	$out ='';
	foreach ($posts as $service){
		$out.='<a href="'.get_post_permalink($service->ID).'">';
		$fields=get_post_custom($service->ID);
		if (isset($fields['menutitle'][0])) {
			$out.=$fields['menutitle'][0];
		} else {
			$out.=$service->post_title;
		}
		$out.='</a>';
	}
	return $out;
}
//add_filter( 'nmi_filter_menu_item_content','__return_false' );
function filter_search($query) {
	if ($query->is_search) {
		$query->set('post_type', array('post','page', 'services'));
	};
	return $query;
};
add_filter('pre_get_posts', 'filter_search');
class MFC_Walker_Nav_Menu extends Walker_Nav_Menu {
	/**
	 * @see Walker::start_el()
	 * @since 3.0.0
	 *
	 * @param string $output Passed by reference. Used to append additional content.
	 * @param object $item Menu item data object.
	 * @param int $depth Depth of menu item. Used for padding.
	 * @param int $current_page Menu item ID.
	 * @param object $args
	 */
	function start_el(&$output, $item, $depth, $args) {
		global $wp_query;           
		
		$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

		$class_names = $value = '';

		$classes = empty( $item->classes ) ? array() : (array) $item->classes;
		$classes[] = 'menu-item-' . $item->ID;
		$classes[]='nav-item';
		$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );
		$class_names = ' class="' . esc_attr( $class_names ) . '"';

		$id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args );
		$id = strlen( $id ) ? ' id="' . esc_attr( $id ) . '"' : '';

//		$output .= $indent . '<li' . $id . $value . $class_names .'>';
		
		$attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
		$attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
		$attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
		$attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';

		//print_r($item->ID);
                // new addition for active class on the a tag
		if(in_array('current-menu-item', $classes)) {
			$attributes .= ' class="active"';
		}
		else {
			$attributes.=' class=""';
		}


		$fields=get_post_custom((int)$item->object_id); 
		$img = $fields['menuimg'][0];
		$pic = wp_get_attachment_image_src($img,'original');
		if ($depth ==0){
			$item_output.='<div class="l-jcol">';
			$attributes = str_replace('class="', 'class="nav-item ', $attributes);
			$item_output .= '<a'. $attributes .'>';
			$item_output.='<div class="nav-pic">';
			$item_output.='<img src="'.$pic[0].'" alt="'.$item->attr_title.'"/>';
			$item_output.='</div>';
			$item_output.='<div class="nav-text">';		
			$item_output.='<u>'."\n\r";
			$item_output.='';
			$item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;

			$item_output.='</u></div>';
			$item_output .= '</a>';
			$item_output.='</div>';
		} else {
			$item_output .= '<a'. $attributes .'>';
			$item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
			$item_output.='</a>';
		}
		$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );

	}
}
function my_attachments( $attachments )
{
	$fields         = array(
		array(
      'name'      => 'title',                         // unique field name
      'type'      => 'text',                          // registered field type
      'label'     => __( 'Title', 'attachments' ),    // label to display
      'default'   => 'title',                         // default value upon selection
      ),
		array(
      'name'      => 'caption',                       // unique field name
      'type'      => 'textarea',                      // registered field type
      'label'     => __( 'Caption', 'attachments' ),  // label to display
      'default'   => 'caption',                       // default value upon selection
      ),
		);

	$args = array(    
		'label'         => 'Attachments',
		'post_type'     => array( 'works', 'services' ),
		'position'      => 'normal',
		'priority'      => 'high',
		'filetype'      => null,  
		'note'          => 'Attach files here!',
		'append'        => true,
		'button_text'   => __( 'Attach Files', 'attachments' ),
		'modal_text'    => __( 'Attach', 'attachments' ),
		'router'        => 'browse',
		'fields'        => $fields,
		);
  $attachments->register( 'attachments', $args ); // unique instance name
}
add_action( 'attachments_register', 'my_attachments' );
?>