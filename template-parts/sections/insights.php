<?php

// Get the latest Passle posts, excluding the featured post
$query = new WP_Query([
  "post_type" => "passle-post",
  "posts_per_page" => 4,
  "meta_query" => [
    [
      "key" => "post_is_featured_on_passle_page",
      "compare" => "NOT EXISTS"
    ],
  ],
]);

if ($query->have_posts()) { ?>

  <div class="section">

    <h2 class="section__heading">Latest industry insights</h2>
    <div class="section__decoration">Insights</div>

    <?php get_template_part("template-parts/featured", "passle-post"); ?>

    <div class="grid grid-cols-2 gap-6">
      <?php
      while ($query->have_posts()) {
        $query->the_post();
        get_template_part('template-parts/content', get_post_type());
      }
      ?>
    </div>

    <div class="flex justify-center">
      <a href="<?php echo get_home_url(null, "/insights"); ?>" class="section__button">More insights</a>
    </div>

    <?php wp_reset_postdata(); ?>

  </div>

<?php } ?>