<?php
include('inc/custom-shortcodes.php');

function load_css_js() {
    wp_enqueue_style( 'foundation-css', get_template_directory_uri() . '/assets/css/foundation.css', false, NULL, 'all' );
    wp_enqueue_style( 'owl-carousel-theme', get_template_directory_uri() . '/assets/css/owl.theme.default.min.css', false, NULL, 'all' );
    wp_enqueue_style( 'owl-carousel', get_template_directory_uri() . '/assets/css/owl.carousel.min.css', false, NULL, 'all' );
    wp_enqueue_style( 'main-css', get_template_directory_uri() . '/assets/css/main.css', false, NULL, 'all' );
    wp_enqueue_style( 'main2-css', get_template_directory_uri() . '/assets/css/main2.css', false, NULL, 'all' );
    //////////
    wp_enqueue_style( 'flatpickr-css', get_template_directory_uri() . '/assets/css/flatpickr.min.css', false, NULL, 'all' );
    wp_enqueue_style( 'airbnb-css', get_template_directory_uri() . '/assets/css/airbnb.css', false, NULL, 'all' );
    wp_enqueue_script('flatpickr-js', get_template_directory_uri().'/assets/js/flatpickr.min.js', array('jquery'), '1.0.0');
    wp_enqueue_script('gr-js', get_template_directory_uri().'/assets/js/gr.js', array('jquery'), '1.0.0');
    ////////////
    wp_enqueue_script('jquery');
    wp_enqueue_script('app-js', get_template_directory_uri().'/assets/js/app.js', array('jquery'), '1.0.0');
    wp_enqueue_script('owl-carousel', get_template_directory_uri() . '/assets/js/owl.carousel.min.js', array('jquery'), '2.3.4', true );
}

add_action( 'wp_enqueue_scripts', 'load_css_js' ); 


// Acf - Options Page
if( function_exists('acf_add_options_page') ) {
    acf_add_options_page();
}

function theme_setup() {
    //require get_template_directory() . '/inc/customiser.php';
    /* Language Support */
    load_theme_textdomain( 'onisis', get_template_directory() . '/languages' );
    
    /* Supports */
    add_theme_support( 'title-tag' );
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'responsive-embeds' );
    remove_theme_support('core-block-patterns');
    /* Menus */
    register_nav_menus(
        array(
            'main' => esc_html__( 'Main Menu', 'onisis' ),
            'footer1' => esc_html__( 'Footer Menu1', 'onisis' ),
            'footer2' => esc_html__( 'Footer Menu2', 'onisis' ),
        )
    );

    if ( function_exists('register_sidebar') )

    register_sidebar(array(
        'id' => 'main-sidebar',
        'name' => 'Main Sidebar',
        'before_widget' => '',
        'after_widget' => '',
        'before_title' => '<h3>',
        'after_title' => '</h3>',
    ));
    register_sidebar(array(
        'id' => 'links-widget',
        'name' => 'Links',
        'before_widget' => '',
        'after_widget' => '',
        'before_title' => '<h3>',
        'after_title' => '</h3>',
    ));
    register_sidebar(array(
        'id' => 'sidebar1-widget',
        'name' => 'Sidebar1',
        'before_widget' => '',
        'after_widget' => '',
        'before_title' => '<h3>',
        'after_title' => '</h3>',
    ));
    register_sidebar(array(
        'id' => 'sidebar2-widget',
        'name' => 'Sidebar2',
        'before_widget' => '',
        'after_widget' => '',
        'before_title' => '<h3>',
        'after_title' => '</h3>',
    ));
    register_sidebar(array(
        'id' => 'sidebar3-widget',
        'name' => 'Sidebar3',
        'before_widget' => '',
        'after_widget' => '',
        'before_title' => '<h3>',
        'after_title' => '</h3>',
    ));

    register_sidebar(array(
        'id' => 'services1-widget',
        'name' => 'Services1',
        'before_widget' => '',
        'after_widget' => '',
        'before_title' => '<h3>',
        'after_title' => '</h3>',
    ));
    register_sidebar(array(
        'id' => 'services2-widget',
        'name' => 'Services2',
        'before_widget' => '',
        'after_widget' => '',
        'before_title' => '<h3>',
        'after_title' => '</h3>',
    ));
}
add_action( 'after_setup_theme', 'theme_setup' );



function makeUppercase( $str ) {
    return str_replace( ['Ά', 'Έ', 'Ή', 'Ί', 'Ό', 'Ύ', 'Ώ'], ['Α', 'Ε', 'Η', 'Ι', 'Ο', 'Υ', 'Ω'], mb_strtoupper($str));
}


//Clients
$clientslabels = array(
    'name'                  => _x( 'Clients', 'Post Type General Name', 'onisis' ),
    'singular_name'         => _x( 'Client', 'Post Type Singular Name', 'onisis' ),
    'menu_name'             => __( 'Clients Logos', 'onisis' ),
    'name_admin_bar'        => __( 'Client', 'onisis' ),
    'archives'              => __( 'Client Archives', 'onisis' ),
    'attributes'            => __( 'Client Attributes', 'onisis' ),
    'parent_item_colon'     => __( 'Parent Client:', 'onisis' ),
    'all_items'             => __( 'All Clients', 'onisis' ),
    'add_new_item'          => __( 'Add New Client', 'onisis' ),
    'add_new'               => __( 'Add New', 'onisis' ),
    'new_item'              => __( 'New Client', 'onisis' ),
    'edit_item'             => __( 'Edit Client', 'onisis' ),
    'update_item'           => __( 'Update Client', 'onisis' ),
    'view_item'             => __( 'View Client', 'onisis' ),
    'view_items'            => __( 'View Clients', 'onisis' ),
    'search_items'          => __( 'Search Client', 'onisis' ),
    'not_found'             => __( 'Not found', 'onisis' ),
    'not_found_in_trash'    => __( 'Not found in Trash', 'onisis' ),
    'featured_image'        => __( 'Featured Image', 'onisis' ),
    'set_featured_image'    => __( 'Set featured image', 'onisis' ),
    'remove_featured_image' => __( 'Remove featured image', 'onisis' ),
    'use_featured_image'    => __( 'Use as featured image', 'onisis' ),
    'insert_into_item'      => __( 'Insert into Client', 'onisis' ),
    'uploaded_to_this_item' => __( 'Uploaded to this Client', 'onisis' ),
    'items_list'            => __( 'Clients list', 'onisis' ),
    'items_list_navigation' => __( 'Clients list navigation', 'onisis' ),
    'filter_items_list'     => __( 'Filter Clients list', 'onisis' ),
);
$clientsargs = array(
    'label'                 => __( 'Client', 'onisis' ),
    'description'           => __( 'List of available Clients', 'onisis' ),
    'labels'                => $clientslabels,
    'show_in_rest'          => true,
    'supports'              => array( 'title', 'thumbnail' ),
    'hierarchical'          => false,
    'public'                => true,
    'show_ui'               => true,
    'show_in_menu'          => true,
    'menu_position'         => 5,
    'show_in_admin_bar'     => true,
    'show_in_nav_menus'     => true,
    'can_export'            => true,
    'has_archive'           => true,
    'exclude_from_search'   => false,
    'publicly_queryable'    => true,
    'capability_type'       => 'page',
);
register_post_type( 'client', $clientsargs );

//Industries
$industrieslabels = array(
    'name'                  => _x( 'Industries', 'Post Type General Name', 'onisis' ),
    'singular_name'         => _x( 'Industry', 'Post Type Singular Name', 'onisis' ),
    'menu_name'             => __( 'Industries Logos', 'onisis' ),
    'name_admin_bar'        => __( 'Industry', 'onisis' ),
    'archives'              => __( 'Industry Archives', 'onisis' ),
    'attributes'            => __( 'Industry Attributes', 'onisis' ),
    'parent_item_colon'     => __( 'Parent Industry:', 'onisis' ),
    'all_items'             => __( 'All Industries', 'onisis' ),
    'add_new_item'          => __( 'Add New Industry', 'onisis' ),
    'add_new'               => __( 'Add New', 'onisis' ),
    'new_item'              => __( 'New Industry', 'onisis' ),
    'edit_item'             => __( 'Edit Industry', 'onisis' ),
    'update_item'           => __( 'Update Industry', 'onisis' ),
    'view_item'             => __( 'View Industry', 'onisis' ),
    'view_items'            => __( 'View Industries', 'onisis' ),
    'search_items'          => __( 'Search Industry', 'onisis' ),
    'not_found'             => __( 'Not found', 'onisis' ),
    'not_found_in_trash'    => __( 'Not found in Trash', 'onisis' ),
    'featured_image'        => __( 'Featured Image', 'onisis' ),
    'set_featured_image'    => __( 'Set featured image', 'onisis' ),
    'remove_featured_image' => __( 'Remove featured image', 'onisis' ),
    'use_featured_image'    => __( 'Use as featured image', 'onisis' ),
    'insert_into_item'      => __( 'Insert into Industry', 'onisis' ),
    'uploaded_to_this_item' => __( 'Uploaded to this Industry', 'onisis' ),
    'items_list'            => __( 'Industries list', 'onisis' ),
    'items_list_navigation' => __( 'Industries list navigation', 'onisis' ),
    'filter_items_list'     => __( 'Filter Industries list', 'onisis' ),
);
$industriesargs = array(
    'label'                 => __( 'Industry', 'onisis' ),
    'description'           => __( 'List of available Industries', 'onisis' ),
    'labels'                => $industrieslabels,
    'show_in_rest'          => true,
    'supports'              => array( 'title', 'thumbnail' ),
    'hierarchical'          => false,
    'public'                => true,
    'show_ui'               => true,
    'show_in_menu'          => true,
    'menu_position'         => 5,
    'show_in_admin_bar'     => true,
    'show_in_nav_menus'     => true,
    'can_export'            => true,
    'has_archive'           => true,
    'exclude_from_search'   => false,
    'publicly_queryable'    => true,
    'capability_type'       => 'page',
);
register_post_type( 'industry', $industriesargs );


//Testimonials
$testimonialslabels = array(
    'name'                  => _x( 'Testimonials', 'Post Type General Name', 'onisis' ),
    'singular_name'         => _x( 'Testimonial', 'Post Type Singular Name', 'onisis' ),
    'menu_name'             => __( 'Testimonials', 'onisis' ),
    'name_admin_bar'        => __( 'Testimonial', 'onisis' ),
    'archives'              => __( 'Testimonial Archives', 'onisis' ),
    'attributes'            => __( 'Testimonial Attributes', 'onisis' ),
    'parent_item_colon'     => __( 'Parent Testimonial:', 'onisis' ),
    'all_items'             => __( 'All Testimonials', 'onisis' ),
    'add_new_item'          => __( 'Add New Testimonial', 'onisis' ),
    'add_new'               => __( 'Add New', 'onisis' ),
    'new_item'              => __( 'New Testimonial', 'onisis' ),
    'edit_item'             => __( 'Edit Testimonial', 'onisis' ),
    'update_item'           => __( 'Update Testimonial', 'onisis' ),
    'view_item'             => __( 'View Testimonial', 'onisis' ),
    'view_items'            => __( 'View Testimonials', 'onisis' ),
    'search_items'          => __( 'Search Testimonial', 'onisis' ),
    'not_found'             => __( 'Not found', 'onisis' ),
    'not_found_in_trash'    => __( 'Not found in Trash', 'onisis' ),
    'featured_image'        => __( 'Featured Image', 'onisis' ),
    'set_featured_image'    => __( 'Set featured image', 'onisis' ),
    'remove_featured_image' => __( 'Remove featured image', 'onisis' ),
    'use_featured_image'    => __( 'Use as featured image', 'onisis' ),
    'insert_into_item'      => __( 'Insert into Testimonial', 'onisis' ),
    'uploaded_to_this_item' => __( 'Uploaded to this Testimonial', 'onisis' ),
    'items_list'            => __( 'Testimonials list', 'onisis' ),
    'items_list_navigation' => __( 'Testimonials list navigation', 'onisis' ),
    'filter_items_list'     => __( 'Filter Testimonials list', 'onisis' ),
);
$testimonialsargs = array(
    'label'                 => __( 'Testimonial', 'onisis' ),
    'description'           => __( 'List of available Testimonials', 'onisis' ),
    'labels'                => $testimonialslabels,
    'show_in_rest'          => true,
    'supports'              => array( 'title', 'thumbnail', 'editor', 'excerpt' ),
    'hierarchical'          => false,
    'public'                => true,
    'show_ui'               => true,
    'show_in_menu'          => true,
    'menu_position'         => 5,
    'show_in_admin_bar'     => true,
    'show_in_nav_menus'     => true,
    'can_export'            => true,
    'has_archive'           => true,
    'exclude_from_search'   => false,
    'publicly_queryable'    => true,
    'capability_type'       => 'page',
);
register_post_type( 'testimonial', $testimonialsargs );

//Slides
$slideslabels = array(
    'name'                  => _x( 'Slides', 'Post Type General Name', 'onisis' ),
    'singular_name'         => _x( 'Slide', 'Post Type Singular Name', 'onisis' ),
    'menu_name'             => __( 'Slides', 'onisis' ),
    'name_admin_bar'        => __( 'Slide', 'onisis' ),
    'archives'              => __( 'Slide Archives', 'onisis' ),
    'attributes'            => __( 'Slide Attributes', 'onisis' ),
    'parent_item_colon'     => __( 'Parent Slide:', 'onisis' ),
    'all_items'             => __( 'All Slides', 'onisis' ),
    'add_new_item'          => __( 'Add New Slide', 'onisis' ),
    'add_new'               => __( 'Add New', 'onisis' ),
    'new_item'              => __( 'New Slide', 'onisis' ),
    'edit_item'             => __( 'Edit Slide', 'onisis' ),
    'update_item'           => __( 'Update Slide', 'onisis' ),
    'view_item'             => __( 'View Slide', 'onisis' ),
    'view_items'            => __( 'View Slides', 'onisis' ),
    'search_items'          => __( 'Search Slide', 'onisis' ),
    'not_found'             => __( 'Not found', 'onisis' ),
    'not_found_in_trash'    => __( 'Not found in Trash', 'onisis' ),
    'featured_image'        => __( 'Featured Image', 'onisis' ),
    'set_featured_image'    => __( 'Set featured image', 'onisis' ),
    'remove_featured_image' => __( 'Remove featured image', 'onisis' ),
    'use_featured_image'    => __( 'Use as featured image', 'onisis' ),
    'insert_into_item'      => __( 'Insert into Slide', 'onisis' ),
    'uploaded_to_this_item' => __( 'Uploaded to this Slide', 'onisis' ),
    'items_list'            => __( 'Slides list', 'onisis' ),
    'items_list_navigation' => __( 'Slides list navigation', 'onisis' ),
    'filter_items_list'     => __( 'Filter Slides list', 'onisis' ),
);
$slidesargs = array(
    'label'                 => __( 'Slide', 'onisis' ),
    'description'           => __( 'List of available Slides', 'onisis' ),
    'labels'                => $slideslabels,
    'show_in_rest'          => true,
    'supports'              => array( 'title', 'thumbnail', 'editor', 'excerpt' ),
    'hierarchical'          => false,
    'public'                => true,
    'show_ui'               => true,
    'show_in_menu'          => true,
    'menu_position'         => 5,
    'show_in_admin_bar'     => true,
    'show_in_nav_menus'     => true,
    'can_export'            => true,
    'has_archive'           => true,
    'exclude_from_search'   => false,
    'publicly_queryable'    => true,
    'capability_type'       => 'page',
);
register_post_type( 'slide', $slidesargs );




//Case Studies
$casestudieslabels = array(
    'name'                  => _x( 'Case Studies', 'Post Type General Name', 'onisis' ),
    'singular_name'         => _x( 'Case Study', 'Post Type Singular Name', 'onisis' ),
    'menu_name'             => __( 'Case Studies', 'onisis' ),
    'name_admin_bar'        => __( 'Case Study', 'onisis' ),
    'archives'              => __( 'Case Study Archives', 'onisis' ),
    'attributes'            => __( 'Case Study Attributes', 'onisis' ),
    'parent_item_colon'     => __( 'Parent Case Study:', 'onisis' ),
    'all_items'             => __( 'All Case Studies', 'onisis' ),
    'add_new_item'          => __( 'Add New Case Study', 'onisis' ),
    'add_new'               => __( 'Add New', 'onisis' ),
    'new_item'              => __( 'New Case Study', 'onisis' ),
    'edit_item'             => __( 'Edit Case Study', 'onisis' ),
    'update_item'           => __( 'Update Case Study', 'onisis' ),
    'view_item'             => __( 'View Case Study', 'onisis' ),
    'view_items'            => __( 'View Case Studies', 'onisis' ),
    'search_items'          => __( 'Search Case Study', 'onisis' ),
    'not_found'             => __( 'Not found', 'onisis' ),
    'not_found_in_trash'    => __( 'Not found in Trash', 'onisis' ),
    'featured_image'        => __( 'Featured Image', 'onisis' ),
    'set_featured_image'    => __( 'Set featured image', 'onisis' ),
    'remove_featured_image' => __( 'Remove featured image', 'onisis' ),
    'use_featured_image'    => __( 'Use as featured image', 'onisis' ),
    'insert_into_item'      => __( 'Insert into Case Study', 'onisis' ),
    'uploaded_to_this_item' => __( 'Uploaded to this Case Study', 'onisis' ),
    'items_list'            => __( 'Case Studies list', 'onisis' ),
    'items_list_navigation' => __( 'Case Studies list navigation', 'onisis' ),
    'filter_items_list'     => __( 'Filter Case Studies list', 'onisis' ),
);
$casestudiesargs = array(
    'label'                 => __( 'Case Study', 'onisis' ),
    'description'           => __( 'List of available Case Studies', 'onisis' ),
    'labels'                => $casestudieslabels,
    'show_in_rest'          => true,
    'supports'              => array( 'title', 'thumbnail', 'editor', 'excerpt' ),
    'hierarchical'          => false,
    'public'                => true,
    'show_ui'               => true,
    'show_in_menu'          => true,
    'menu_position'         => 5,
    'show_in_admin_bar'     => true,
    'show_in_nav_menus'     => true,
    'can_export'            => true,
    'has_archive'           => true,
    'exclude_from_search'   => false,
    'publicly_queryable'    => true,
    'capability_type'       => 'page',
);
register_post_type( 'case-study', $casestudiesargs );


//Main menu Walker
class Main_Menu_Walker extends Walker_Nav_Menu {
    function start_el(&$output, $item, $depth=0, $args=[], $id=0) {
		$output .= "<li class='" .  implode(" ", $item->classes) . "'>";
        $output .= '<a href="' . $item->url . '">' . $item->title . '</a>';
		if ($args->walker->has_children) {
            $output .= '<div class="mega-menu-wrapper"><div class="mega-menu-wrapper-inner"><div class="row"><div class="grid-x grid-padding-x">';
            $output .= '<div class="large-4 menu-item-info"><div class="item-title">'. $item->title .'</div>';
            $output .= '<div class="item-desc">'. $item->description .'</div></div><div class="large-1"></div>'; 
		} 
	}

    function start_lvl( &$output, $depth = 0, $arg = [] ) {
        $indent = str_repeat( "\t", $depth );
        $output .= "\n$indent<div class=\"submenu-container large-5 medium-12 small-12 force-larger cell\">\n<ul>";
    }
        
    function end_lvl( &$output, $depth = 0, $arg = [] ) { 
        $indent = str_repeat( "\t", $depth );
        $output .= "\n$indent</ul></div></div></div>";
    } 
}


function onisis_block_category( $categories, $post ) {
	return array_merge(
		$categories,
		array(
			array(
				'slug' => 'onisis',
				'title' => 'Onisis',
			),
		)
	);
}
add_filter( 'block_categories_all', 'onisis_block_category', 10, 2);

function onisis_acf_init_block_types() {

////////////////////////// SIMPLE TEXT BLOCK //////////////////////////
    //Simple Text Block
    acf_register_block_type(array(
        'name'              => 'simple-text',
        'title'             => __('Simple Text with Title'),
        'description'       => __('A contained text with heading'),
        'render_template'   => 'template-parts/blocks/simple-text.php',
        'category'          => 'onisis',
        'icon'              => 'layout',
        'keywords'          => array( 'text' ),
        'mode'				=> 'edit',
    ));

////////////////////////// RATE BLOCK //////////////////////////
    //Rate Block
    acf_register_block_type(array(
        'name'              => 'rate-text',
        'title'             => __('Rate with Description'),
        'description'       => __('A contained rate with description'),
        'render_template'   => 'template-parts/blocks/rate-text.php',
        'category'          => 'onisis',
        'icon'              => 'layout',
        'keywords'          => array( 'text' ),
        'mode'				=> 'edit',
    ));
	
////////////////////////// WHITE BLOCK //////////////////////////
	//White Block
    acf_register_block_type(array(
        'name'              => 'white',
        'title'             => __('White Block'),
        'description'       => __('A contained text'),
        'render_template'   => 'template-parts/blocks/white.php',
        'category'          => 'onisis',
        'icon'              => 'layout',
        'keywords'          => array( 'text' ),
        'mode'				=> 'edit',
    ));

////////////////////////// GRAY BLOCK //////////////////////////
	//Gray Block
    acf_register_block_type(array(
        'name'              => 'gray',
        'title'             => __('Gray Block'),
        'description'       => __('A contained text with heading'),
        'render_template'   => 'template-parts/blocks/gray.php',
        'category'          => 'onisis',
        'icon'              => 'layout',
        'keywords'          => array( 'text' ),
        'mode'				=> 'edit',
    ));
	
////////////////////////// RED BLOCK //////////////////////////
	//Red Block
    acf_register_block_type(array(
        'name'              => 'red',
        'title'             => __('Red Block'),
        'description'       => __('A contained text with heading'),
        'render_template'   => 'template-parts/blocks/red.php',
        'category'          => 'onisis',
        'icon'              => 'layout',
        'keywords'          => array( 'text' ),
        'mode'				=> 'edit',
    ));
}

add_action('acf/init', 'onisis_acf_init_block_types');

add_action('init', function() {
    if( function_exists('pll_register_string')) {
      pll_register_string('onisis', 'case_study_title');
      pll_register_string('onisis', 'case_study_subtitle1');
      pll_register_string('onisis', 'case_study_subtitle2');
	  pll_register_string('onisis', 'consulte_top');
      pll_register_string('onisis', 'title_footer');
      pll_register_string('onisis', 'description_footer');
	  pll_register_string('onisis', 'company_footer_menu');
	  pll_register_string('onisis', 'customer_care_footer_menu');
	  pll_register_string('onisis', 'ns_title_footer_menu');
	  pll_register_string('onisis', 'ns_text_footer_menu');
      pll_register_string('onisis', 'case_study_button');
      pll_register_string('onisis', 'read_now_button');
      pll_register_string('onisis', 'read_now_button');
      pll_register_string('onisis', 'case_study_shortcode_carousel_title');
      pll_register_string('onisis', 'related_consulting_services');
      pll_register_string('onisis', 'connect_with_us_title');
      pll_register_string('onisis', 'connect_with_us_description');
      pll_register_string('onisis', 'schedule_consultation');
    }
});

function myfavicon() {
    echo '<link rel="Shortcut Icon" type="image/x-icon" href="'.get_bloginfo('wpurl').'/fav_new.png" />';
}
add_action('wp_head', 'myfavicon');

function my_analytics() {
?>
<!-- Google tag (gtag.js) -->

<script async src="https://www.googletagmanager.com/gtag/js?id=G-HX844VT5V3"></script>

<script>

  window.dataLayer = window.dataLayer || [];

  function gtag(){dataLayer.push(arguments);}

  gtag('js', new Date());

 

  gtag('config', 'G-HX844VT5V3');

</script>

<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-MGVQLZ2');
</script>
<!-- End Google Tag Manager -->

<?php
}
add_action('wp_head','my_analytics', 20);


function add_gtm_to_footer() {
    ?>
    <!-- Google Tag Manager (noscript) -->
	<noscript><iframe src=https://www.googletagmanager.com/ns.html?id=GTM-MGVQLZ2
	height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
	<!-- End Google Tag Manager (noscript) -->
    <?php
}
add_action('wp_footer', 'add_gtm_to_footer');

// Custom Image Sizes
add_image_size( 'clients-industry-thumbnail', 168, 123, true );
add_image_size( 'testimonial-thumbnail', 80, 80, true );
add_image_size( 'carousel-vertical', 355, 420, true );

remove_filter( 'get_the_excerpt', 'wp_trim_excerpt'  );



