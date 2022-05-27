<?php

$query = $args["query"];
$pagination_links = paginate_links([
  "total" => $query->max_num_pages,
]);

if ($query->have_posts()) { ?>

  <div class="grid grid-cols-2 gap-6">
    <?php
    while ($query->have_posts()) {
      $query->the_post();
      get_template_part("template-parts/content", get_post_type());
    }
    ?>
  </div>

  <?php if ($pagination_links) { ?>
    <div class="flex justify-center">
      <?php echo $pagination_links; ?>
    </div>
  <?php } ?>

<?php }

wp_reset_postdata();

?>