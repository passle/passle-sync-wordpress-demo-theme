<?php

// Get the Passle page featured post
$query = new WP_Query([
  "post_type" => "passle-post",
  "posts_per_page" => 1,
  "meta_query" => [
    [
      "key" => "post_is_featured_on_passle_page",
      "compare" => "EXISTS"
    ],
  ],
]);

if ($query->have_posts()) { ?>
  <?php
  while ($query->have_posts()) {
    $query->the_post();
    get_template_part('template-parts/content', get_post_type(), ["featured" => true]);
  }
  ?>
<?php }

wp_reset_postdata();
?>