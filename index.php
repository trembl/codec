<?php get_header(); ?>

  <div id="content" class="narrowcolumn">
  <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
  <div class="post" id="post-<?php the_ID(); ?>">
    <h2>
      <span class="gray id"><?php /* the_time('F jS, Y') */ the_ID(); ?></span><a href="<?php the_permalink() ?>"><?php the_title(); ?></a><span class="edit"><?php edit_post_link('░', '', ''); ?></span>
    </h2>

    <div class="entry">
<?php


//if (get_field('enable_markdown_filter')) {
  the_markdown_content();
//} else {
//  the_content();
//}

?>

    </div>

    <div class="tags"><?php the_tags('', ' ', ''); ?></div>

<?php
// related
  $tags = wp_get_post_tags($post->ID);
  if ($tags) {
    $tag_ids = array();
    foreach($tags as $individual_tag) $tag_ids[] = $individual_tag->term_id;

    $args = array(
      'tag__in'          => $tag_ids,
      'post__not_in'     => array($post->ID),
      'showposts'        => 7, // Number of related posts that will be shown.
      'caller_get_posts' => 1
    );
    $tagQuery = new wp_query($args);
    if($tagQuery->have_posts()) {
      echo '<div class="gray related">' . "\n";
      while ($tagQuery->have_posts()) {
        $tagQuery->the_post();
        echo "\t\t\t\t". '<span class="id">' . get_the_ID() . '</span><a href="' . get_permalink() . '">' . get_the_title() . '</a><br />' . "\n";
      }
      echo "\t\t\t" . '</div>';
    }
  }

 ?>

    </div>

    <?php endwhile; ?>

    <div class="navigation">
      <div class="alignleft"><?php next_posts_link('☃&l a q◤ uo ; ◎lder EntriesOlɷ␖␔␥▁▓█') ?></div>
      <div class="alignright"><?php previous_posts_link('Ne☢wer Entr⚡ies &ra◗quo;ʭ₧⃝⃝ ⃜⃕ℳ⌚⅀') ?></div>
    </div>

  <?php else : ?>

    <h2 class="center">Not Found</h2>
    <p class="center">Sorry, but you are looking for something that isn't here.</p>

  <?php endif; ?>

  </div>

<?php get_sidebar(); ?>

<?php get_footer(); ?>
