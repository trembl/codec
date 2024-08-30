<?php
/**
 * @package Codec
 * @subpackage Default_Theme
 */
?>
  <div id="sidebar">
    <ul>
<?php 
rewind_posts();
$args = 'numberposts=7&orderby=rand';
if (is_single()) { $args = 'numberposts=7&offset=0'; }      // tag related posts on single pages only

$posts = get_posts($args);
foreach( $posts as $post ):
  setup_postdata($post);
  display_related("random");
endforeach;

/* 
<li>
  <a href="http://www.trembl.org/codec/tag/" class="gray bold">Tags</a>
  <span class="tags"><?php wp_tag_cloud('smallest=1.0&largest=1.0&unit=em&number=50');?></span>
</li>
*/

?>

    </ul>
  </div>

