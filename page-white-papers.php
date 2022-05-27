<?php

get_header();

$query = new WP_Query([
  "tag" => "white-papers",
]);

?>

<div class="flex flex-col gap-8 max-w-6xl mx-auto">
  <div class="section">

    <h2 class="section__heading">All white papers</h2>

    <?php get_template_part("template-parts/content-paginated", null, ["query" => $query]); ?>

  </div>
</div>

<?php

get_footer();
