<?php
/**
 * @package Codec
 * @subpackage Default_Theme
 */
?>
	<div id="sidebar">
		<ul>
			
			<?php 
			/*
			Show random posts a the first page, recent ones at single page
			*/

			/*
			if (is_single()) :		// tag related posts on single pages only
			
				
				
				// show related posts
				$tags = wp_get_post_tags($post->ID);
				if ($tags) :
					$tag_ids = array();
					foreach($tags as $individual_tag) $tag_ids[] = $individual_tag->term_id;
				
					$my_query = new wp_query(array('tag__in' => $tag_ids, 'post__not_in' => array($post->ID), 'showposts'=>5, 'caller_get_posts'=>1));
					
					if( $my_query->have_posts() ) :
						while ($my_query->have_posts()) :
							$my_query->the_post();
							display_related();
						endwhile; 
					endif;
					
				endif; 
			
				
			endif; 
			*/
			
			
			rewind_posts();
			
			
			$args = 'numberposts=7&orderby=rand';
			if (is_single()) { $args = 'numberposts=7&offset=0'; }			// tag related posts on single pages only
			
			$posts = get_posts($args);
			foreach( $posts as $post ) :
				setup_postdata($post);
 				display_related("random");
			endforeach;
			
			
			
			?>
			<?php /* 
			<li>
				<a href="http://www.trembl.org/codec/tag/" class="gray bold">Tags</a>
				<span class="tags"><?php wp_tag_cloud('smallest=1.0&largest=1.0&unit=em&number=50');?></span>
			</li>
			 */
			
			
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
			
			
			
			
			?>
						
	
		</ul>
	</div>

