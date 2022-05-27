<?php

// Get the latest Wordpress post with the "events" tag
$query = new WP_Query([
  "posts_per_page" => 1,
  "tag" => "events",
]);

if ($query->have_posts()) { ?>

  <div class="section">

    <h2 class="section__heading">Forthcoming events</h2>
    <div class="section__decoration">Events</div>

    <?php
    while ($query->have_posts()) {
      $query->the_post();
      get_template_part('template-parts/content', get_post_type(), ["featured" => true]);
    }
    ?>

    <?php wp_reset_postdata(); ?>

  </div>

<?php } ?>