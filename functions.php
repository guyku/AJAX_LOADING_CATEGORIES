<?php


require_once('scripts.php');
require_once('example.php');
require_once('ajax.php');


							// LINK TO STYLESHEET 
	function b() {

		wp_enqueue_style('main_style', get_stylesheet_uri(),NULL,microtime());

	}

	add_action('wp_enqueue_scripts', 'b');



/**
 * Check if a loop has any more posts left.
 *
 * @global $wp_query
 *
 * @return bool True if there are any more posts in this loop, false if not.
 */
function wpdocs_has_more_posts() {
  global $wp_query;
  return $wp_query->current_post + 1 < $wp_query->post_count;
}




function category_id_class($classes) {
     global $post;
          foreach((get_the_category($post->ID)) as $category)
               $classes [] = 'cat-' . $category->cat_ID . '-id';
               
     return $classes;
}
add_filter('post_class', 'category_id_class');
add_filter('body_class', 'category_id_class');
add_shortcode('cat_link_ID', 'category_id_class');


							// NAVIGATION MENUS

function register_my_menus() {
  register_nav_menus(
    array(
      'primary' => __( 'Primary Menu' ), 					// LEFT MENU
      'top' => __( 'Top Menu' ), 							// TOP MENU
      'primary mobile' => __( 'Navigation Mobile' ) 		// MOBILE MENU
    )
  );
}
add_action( 'init', 'register_my_menus' );


add_filter( 'nav_menu_link_attributes', 'wpse121123_contact_menu_atts', 10, 3 );
function wpse121123_contact_menu_atts( $atts, $item, $args )
{  
  $menu_target = 16;

  if ($item->ID == $menu_target) {
    $atts['data-target'] = '/cat12/';
  }

  elseif ($item->ID == 18) {
    $atts['data-target'] = '/cat2/';
  }
  elseif ($item->ID == 20) {
    $atts['data-target'] = '/category/category-02-purple/';
  }
  elseif ($item->ID == 2372) {
    $atts['data-target'] = '/cat4/';
  }
  elseif ($item->ID == 19) {
    $atts['data-target'] = '/cat4/';
  }
  elseif ($item->ID == 31) {
    $atts['data-target'] = '/cat6/';
  }
  elseif ($item->ID == 32) {
    $atts['data-target'] = '/cat7/';
  }
  elseif ($item->ID == 33) {
    $atts['data-target'] = '/cat8/';
  }
  elseif ($item->ID == 34) {
    $atts['data-target'] = '/cat9/';
  }
  elseif ($item->ID == 35) {
    $atts['data-target'] = '/cat10/';
  }
  elseif ($item->ID == 36) {
    $atts['data-target'] = '/cat11/';
  }
  elseif ($item->ID == 23) {
    $atts['data-target'] = '/cat12/';
  }
  elseif ($item->ID == 24) {
    $atts['data-target'] = '/cat13/';
  }
  elseif ($item->ID == 25) {
    $atts['data-target'] = '/cat14/';
  }
  elseif ($item->ID == 26) {
    $atts['data-target'] = '/cat15/';
  }
  elseif ($item->ID == 27) {
    $atts['data-target'] = '/cat16/';
  }
  elseif ($item->ID == 28) {
    $atts['data-target'] = '/cat17/';
  }
  return $atts;
}


remove_filter( 'the_content', 'wpautop' );
remove_filter( 'the_excerpt', 'wpautop' );




function hide_admin_bar(){ return false; }
add_filter( 'show_admin_bar', 'hide_admin_bar' );





/**
 * Add a sidebar.
 */
function get_sidebar2() {
    register_sidebar( array(
        'name'          => __( 'Main Sidebar', 'textdomain' ),
        'id'            => 'sidebar-1',
        'description'   => __( 'Widgets in this area will be shown on all posts and pages.', 'textdomain' ),
        'before_widget' => '<li id="%1$s" class="widget %2$s">',
        'after_widget'  => '</li>',
        'before_title'  => '<h2 class="widgettitle">',
        'after_title'   => '</h2>',
    ) );
}
add_action( 'get_sidebar', 'get_sidebar2' );



/**
 * Add a sidebar.
 */
function register_rightsidebar( $args = array() ) {
    global $wp_registered_sidebars;
 
    $i = count( $wp_registered_sidebars ) + 1;
 
    $id_is_empty = empty( $args['id'] );
 
    $defaults = array(
        'name'          => sprintf( __( 'Sidebar %d' ), $i ),
        'id'            => "sidebar-$i",
        'description'   => '',
        'class'         => '',
        'before_widget' => '<li id="%1$s" class="widget %2$s">',
        'after_widget'  => "</li>\n",
        'before_title'  => '<h2 class="widgettitle">',
        'after_title'   => "</h2>\n",
    );
 
    $sidebar = wp_parse_args( $args, $defaults );
 
    if ( $id_is_empty ) {
        /* translators: 1: the id argument, 2: sidebar name, 3: recommended id value */
        _doing_it_wrong( __FUNCTION__, sprintf( __( 'No %1$s was set in the arguments array for the "%2$s" sidebar. Defaulting to "%3$s". Manually set the %1$s to "%3$s" to silence this notice and keep existing sidebar content.' ), '<code>id</code>', $sidebar['name'], $sidebar['id'] ), '4.2.0' );
    }
 
    $wp_registered_sidebars[ $sidebar['id'] ] = $sidebar;
 
    add_theme_support( 'widgets' );
 
    /**
     * Fires once a sidebar has been registered.
     *
     * @since 3.0.0
     *
     * @param array $sidebar Parsed arguments for the registered sidebar.
     */
    do_action( 'register_rightsidebar', $sidebar );
 
    return $sidebar['id'];
}
add_action( 'rightsidebar', 'register_rightsidebar' );













// MOBILE MENU
wp_enqueue_script( 'wpb_slidepanel', get_template_directory_uri() . '/slidepanel.js', array('jquery'), '20160909', true );




/**
* Customize the Favorites Button HTML
*/
add_filter( 'favorites/button/html', 'custom_favorites_button_html', 10, 4 );
function custom_favorites_button_html($html, $post_id, $favorited, $site_id)
{
	return $html;
}

/**
* Customize the Favorites Button CSS Classes
*/
add_filter( 'favorites/button/css_classes', 'custom_favorites_button_css_classes', 10, 3 );
function custom_favorites_button_css_classes($classes, $post_id, $site_id)
{
	return $classes;
}




// SHOW RANDOM POST 
function random_post_function( $title='Random Post' ) {
	// Get the URL of a random post and format it as a clickable link
	$posts = get_posts('post_type=post&orderby=rand&numberposts=1');
	foreach($posts as $post) {
		$link = '<div class="item-popup">        <div class="popup-content">    <a href="' . esc_url( get_permalink($post) ) . '" title="' . $title . '" class="popup-button"><</a>  <p>DISCOVER RANDOMLY</p></div></div>';
	}
	// Return the link to wherever this function is called
	return $link;
}
// Add the shortcode
add_shortcode('random-post','random_post_function');

function random_post_button_shortcode() {
	$content = '<div class="popup-wrapper">' . random_post_function( '' . $link . '' ) . '</div>';


	return $content;
}
// Add the shortcode
add_shortcode('random-post-button','random_post_button_shortcode');

// The shortcode is [vr-random-post-button]










add_shortcode( 'return_post_id', 'the_return_post_id' );

function the_return_post_id() {

	$postid = get_the_ID();
	
    return $postid;
}





function target_links_shortcode() {

	$print = 'en.wikipedia.org/wiki/Odyssey';
	$url = sprintf( 'https://'.$print.'');

	
	$links = '<div class="iframe-preview">
			    <iframe id="iframe-preview" src="'.$url.'" style="border:0px #FFFFFF none;" name="iframe-preview-content" scrolling="no" frameborder="0" marginheight="0px" marginwidth="0px" height="2000px" width="1000px"></iframe>
			 </div>';

	return $links;
}
// Add the shortcode
add_shortcode('target_links','target_links_shortcode');







// Get the current category id if we are on an archive/category page
function getCurrentCatID(){
  global $wp_query;
  if(is_category() || is_single()){
    $cat_ID = get_query_var('cat');
  }
  return $cat_ID;
}
// Add the shortcode
add_shortcode('cat_idtest','getCurrentCatID');






function the_return_cat_id() {
	
	global $cat_id;

	$categories = get_the_category();
    $cat_id = $categories[0]->term_id;
 
    if ( $echo )
        echo $cat;
 
    return $cat_id;
}
add_action( 'return_cat_id', 'the_return_cat_id' );
add_filter( 'return_cat_id', 'the_return_cat_id' );
add_shortcode( 'return_cat_id', 'the_return_cat_id' );



/* ------- Line Break Shortcode --------*/
function line_break_shortcode() {
	return '<br />';
}
add_shortcode( 'br', 'line_break_shortcode' );



/* ------- Line Break Shortcode --------*/
function the_content_shortcode() {

  $content = apply_filters('the_content', get_post_field('post_content', $my_postid));

  return $content;
}
add_shortcode( 'link_shortcode', 'the_content_shortcode' );












function the_output2_cat_id() {
	
	global $cat_id;
	global $postid;

	$categories = get_the_category();
    $cat_id = $categories[0]->term_id;
 
  $postid = '[return_post_id]';

    $output2 = '

    <strong>
<p>
[post_title]
</p>
</strong>

<p>
<div class="unfav">[favorites_button]</div>
&nbsp;
<div id="fav-link-container"><a id="link'. $postid .'" class="cat'. $cat_id .' " href="[post_excerpt]">[post_excerpt]</a>
</div>
</p>

<style>


  .page-id-536 div.saved-all-favs li a[id="link'. $postid .'"]:link {
  text-decoration: none;
        color: green;        /* Change Link Color */
}

.page-id-536 div.saved-all-favs li a[id="link'. $postid .'"]:visited {
  text-decoration: none;
        color: green;        /* Change Link Color */
}


.page-id-536 div.saved-all-favs li a[id="link'. $postid .'"]:hover {
  text-decoration: none;
        color: red;       /* Change Link Color */
}

.page-id-536 div#fav-list-all ul li div {
        display: inline-block;
        border: 0px solid purple;
}




</style>


    ';
 
    return $output2;
}

add_shortcode( 'return_output2_id', 'the_output2_cat_id' );




function pid() {

global $current_screen;
$type = $current_screen->post_type;

    ?>
    <script type="text/javascript">
    var post_id = '<?php global $post; echo $post->ID; ?>';
    </script>
    <?php

} 
add_action('wp_head','pid');



remove_filter ('the_content', 'wpautop');










add_shortcode('include', 'include_php_file');

function include_php_file()
{
    // Get absolute path to file.
    $file = locate_template('page-2281.php');

    // Check if file is found.
    if ($file) {
        // Return file contents.
        ob_start();
        include $file;
        return ob_get_clean();
    }

    return '';
}











function register_scripts() {

wp_enqueue_style( 'bootstrap', THEMEROOT . 'bootstrap.min.css' );

wp_enqueue_style( 'styles', get_stylesheet_uri() );

wp_register_Script('jquery', TEMPLATE . 'jquery.min.js', array(),'3.5.0', true);

wp_register_Script('bootstrap', TEMPLATE . 'bootstrap.min.js', array('jquery'),'4.3.1', true);

wp_enqueue_script('jquery');

wp_enqueue_script('bootstrap');

}

wp_enqueue_script('learningWordPress', get_template_directory_uri() . 'functions.js', array('jquery'), '20160412', true);

