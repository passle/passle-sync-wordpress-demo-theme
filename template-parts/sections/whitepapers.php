<?php

// Get the latest Wordpress posts with the "white-papers" tag
$query = new WP_Query([
  "posts_per_page" => 2,
  "tag" => "white-papers",
]);

if ($query->have_posts()) { ?>

  <div class="section">

    <h2 class="section__heading">Latest white papers</h2>
    <div class="section__decoration">Papers</div>

    <div class="grid grid-cols-2 gap-6">
      <?php
      while ($query->have_posts()) {
        $query->the_post();
        get_template_part('template-parts/content', get_post_type());
      }
      ?>
    </div>

    <div class="flex justify-center">
      <a href="/white-papers" class="section__button">More white papers</a>
    </div>

    <?php wp_reset_postdata(); ?>

  </div>

<?php } ?>