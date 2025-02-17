<?php

// Update Addresses in General Settings manually
//update_option('siteurl','http://codec.trembl.org');
//update_option('home','http://codec.trembl.org');

// remove wp header junk, Wordpress 3.0+
remove_action( 'wp_head', 'feed_links', 2 );					// Display the links to the general feeds: Post and Comment Feed
remove_action( 'wp_head', 'feed_links_extra', 3 );				// Display the links to the extra feeds such as category feeds
remove_action( 'wp_head', 'rsd_link' ); 						// Display the link to the Really Simple Discovery service endpoint, EditURI link
remove_action( 'wp_head', 'wlwmanifest_link' ); 				// Display the link to the Windows Live Writer manifest file.
remove_action( 'wp_head', 'index_rel_link' ); 					// index link
remove_action( 'wp_head', 'adjacent_posts_rel_link', 10, 0 ); 	// Display relational links for the posts adjacent to the current post.
remove_action( 'wp_head', 'wp_generator' );						// Display the XHTML generator that is generated on the wp_head hook, WP version
remove_action( 'wp_head', 'parent_post_rel_link', 10, 0 ); 		// prev link
remove_action( 'wp_head', 'start_post_rel_link', 10, 0 ); 		// start link
remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0 );


// Disable Auto<p>
remove_filter( 'the_content', 'wpautop' );
remove_filter( 'the_excerpt', 'wpautop' );

// Disable Autosave
function disable_autosave() {
  wp_deregister_script('autosave');
}
add_action('wp_print_scripts', 'disable_autosave');

// Disable Related Posts in Sidebar
function display_related($class="related") {
?>
  <li class="<?php echo $class; ?>"><strong><span class="id gray"><?php the_ID(); ?></span><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></strong>
  <div class="tags"><?php $posttags = get_the_tags($post->ID);
    if ($posttags) {
      foreach($posttags as $tag) {
        echo '<a href="' . site_url() . '/tag/' . str_replace(" ", "-", $tag->name) . '/">' . str_replace(array(" ", "-"), array("&nbsp;", "&#8209;"), $tag->name) . "</a> " ;
      }
    }
  ?></div>
  </li>
<?php
}

// Disable Public Access to WP-JSON
// https://stackoverflow.com/questions/41191655/safely-disable-wp-rest-api
add_filter('rest_authentication_errors', function($result) {
  if (true === $result || is_wp_error($result)) {
    return $result;
  }
  if (!is_user_logged_in()) {
    global $wp_query;
    $wp_query->set_404();
    status_header(404);
    get_template_part(404);
    exit();
  }
  return $result;
});

// Include Markdown Parser
include('includes/Parsedown.php');
$Parsedown = new Parsedown();

function the_markdown_content() {
  global $Parsedown;
  echo $Parsedown->text(get_the_content());
}



?>
