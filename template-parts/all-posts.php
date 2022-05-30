<?php if (have_posts()) { ?>

  <div class="grid grid-cols-2 gap-6">
    <?php
    while (have_posts()) {
      the_post();
      get_template_part("template-parts/content", get_post_type());
    }
    ?>
  </div>

  <?php if (paginate_links()) { ?>
    <div class="flex justify-center">
      <?php echo paginate_links(); ?>
    </div>
  <?php } ?>

<?php } else { ?>
  <div class="flex flex-col justify-center gap-2 h-24 text-center">
    <i class="fas fa-frown-open mx-auto text-xl text-primary"></i>
    <div class="flex flex-col">
      <h3 class="text-sm font-medium text-gray-900">No results</h3>
      <p class="text-sm text-gray-500">Try searching for something else.</p>
    </div>
  </div>
<?php }
