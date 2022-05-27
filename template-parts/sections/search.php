<div class="section">

  <h2 class="section__heading">All posts matching '<?php the_search_query(); ?>'</h2>

  <?php if (have_posts()) { ?>

    <div class="grid grid-cols-2 gap-6">
      <?php
      while (have_posts()) {
        the_post();
        get_template_part('template-parts/content', get_post_type());
      }
      ?>
    </div>

    <?php if (paginate_links()) { ?>
      <div class="flex justify-center mt-8">
        <?php echo paginate_links(); ?>
      </div>
    <?php } ?>

  <?php } ?>

</div>