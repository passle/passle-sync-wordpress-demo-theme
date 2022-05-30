<div class="section">

  <?php
  $tag = get_term_by("slug", get_query_var("tag"), "post_tag");
  ?>

  <h2 class="section__heading">
    All posts tagged with
    <span class="bg-gray-100 text-gray-700 text-base py-1 px-2 rounded-sm font-sans normal-case font-medium tracking-normal">
      <?php echo $tag->name; ?>
    </span>
  </h2>

  <?php get_template_part("template-parts/all-posts"); ?>

</div>