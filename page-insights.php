<?php

get_header();

$query = new WP_Query([
  "post_type" => "passle-post",
  "paged" => get_query_var("paged"),
]);

?>

<div class="flex flex-col gap-8 max-w-6xl mx-auto">
  <div class="section">

    <h2 class="section__heading">All insights</h2>

    <?php get_template_part("template-parts/content-paginated", null, ["query" => $query]); ?>

  </div>
</div>

<?php

get_footer();
