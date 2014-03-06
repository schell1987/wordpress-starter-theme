<?php

// Main Nav
	register_nav_menus( array(
		'main_menu' => 'Main Menu',
	) );

// Hide Admin Bar
	add_filter('show_admin_bar', '__return_false');

// Remove Comments from Admin
	/*function remove_admin_menu_items() {
		$remove_menu_items = array(__('Comments'));
		global $menu;
		end ($menu);
		while (prev($menu)){
			$item = explode(' ',$menu[key($menu)][0]);
			if(in_array($item[0] != NULL?$item[0]:"" , $remove_menu_items)){
			unset($menu[key($menu)]);}
		}
	}
	add_action('admin_menu', 'remove_admin_menu_items');*/

// Register Dynamic Sidebar 'Sidebar'
	$side = array(
		'name'          => __( 'Sidebar' ),
		'id'            => 'post-page-sidebar',
		'description'		=> 'Widgets in this sidebar will be displayed on Posts & Pages.',
    'class'         => 'sidebar',
		'before_widget' => '<li id="%1$s" class="widget %2$s">',
		'after_widget'  => '</li>',
		'before_title'  => '<h2 class="widgettitle">',
		'after_title'   => '</h2>' );
  register_sidebar( $side );

// Edit the Excerpt Length & String
	function custom_excerpt_length( $length ) {
		return 50;
	}
		add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

	function new_excerpt_more( $more ) {
		return '...';
	}
		add_filter('excerpt_more', 'new_excerpt_more');

// Link Manager
	add_filter( 'pre_option_link_manager_enabled', '__return_true' );

// Add Custom Post Type - Slider
	function ahd_llc_cpt() {
	  $labels = array(
	    'name' => 'Slider',
	    'singular_name' => 'Slide',
	    'add_new' => 'Add New Slide',
	    'add_new_item' => 'Add New Slide',
	    'edit_item' => 'Edit Slide',
	    'new_item' => 'New Slide',
	    'all_items' => 'All Slides',
	    'view_item' => 'View Slide',
	    'search_items' => 'Search Slider',
	    'not_found' =>  'No Slides found',
	    'not_found_in_trash' => 'No Slides found in the Trash', 
	    'parent_item_colon' => '',
	    'menu_name' => 'Slider'
	  );
	  $args = array(
	    'labels' => $labels,
	    'public' => true,
	    'publicly_queryable' => true,
	    'show_ui' => true, 
	    'show_in_menu' => true, 
	    'query_var' => true,
	    'rewrite' => array( 'slug' => 'slider' ),
	    'capability_type' => 'post',
	    'has_archive' => true, 
	    'hierarchical' => false,
	    'menu_position' => null,
	    'supports' => array( 'title', 'thumbnail', 'custom-fields', 'editor', 'author', 'excerpt', 'trackbacks', 'comments', 'revisions', 'page-attributes' )
	  ); 
	  register_post_type( 'mainslider', $args ); }
	add_action( 'init', 'ahd_llc_cpt' );

// Featured Images
  add_theme_support( 'post-thumbnails' );
  /*add_image_size('960x400', 960, 400, true);
  add_image_size('300x230', 300, 230, true);
  add_image_size('240x100', 240, 100, true);*/

/****************** SHOW FEATURED IMAGES ON POST & PAGE ADMIN VIEW ***********************/

// Get the Featured Image
	function ahd_get_featured_image($post_ID) {
    $post_thumbnail_id = get_post_thumbnail_id($post_ID);
    if ($post_thumbnail_id) {
        $post_thumbnail_img = wp_get_attachment_image_src($post_thumbnail_id, '240x100');
      return $post_thumbnail_img[0];
    }
	}

// Add a New Column
	function ahd_columns_head($defaults) {
    $defaults['featured_image'] = 'Featured Image';
  return $defaults;
	}
 
// Show the Featured Image
	function ahd_columns_content($column_name, $post_ID) {
    if ($column_name == 'featured_image') {
        $post_featured_image = hh_get_featured_image($post_ID);
      if ($post_featured_image) {
          echo '<img src="' . $post_featured_image . '" />';
      }
    }
	}
	add_filter('manage_posts_columns', 'ahd_columns_head');
	add_action('manage_posts_custom_column', 'ahd_columns_content', 10, 2);

/**************************************************************************************/

// Load jQuery
	if ( !is_admin() ) {
	  wp_deregister_script('jquery');
	  wp_register_script('jquery', "//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js");
	  wp_enqueue_script('jquery');

		wp_deregister_script('fancybox');
		wp_register_script('fancybox', get_bloginfo('template_directory') . "/js/fancybox.js");
		wp_enqueue_script('fancybox');

		wp_deregister_script('global');
		wp_register_script('global', get_bloginfo('template_directory') . "/js/global.js");
		wp_enqueue_script('global');
	}

?>