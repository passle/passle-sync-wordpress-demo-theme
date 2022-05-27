<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

  <div class="<?php echo $args["featured"] ?? false ? "h-[28rem]" : "h-80"; ?> relative group">
    <img class="w-full h-full object-cover" src="<?php the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>" />
    <div class="absolute inset-0 bg-black bg-opacity-50 group-hover:bg-primary group-hover:bg-opacity-100 transition-colors text-white">
      <a href="<?php echo the_permalink(); ?>" class="h-full p-16 flex flex-col gap-4">
        <?php the_title('<h2 class="entry-title font-bodoni text-3xl leading-tight mb-1 line-clamp-3">', '</h2>'); ?>
        <time datetime="<?php echo get_the_date("j F Y"); ?>" itemprop="datePublished" class="font-bodoni group-hover:hidden">
          <?php echo get_the_date("j F Y"); ?>
        </time>
        <span class="hidden group-hover:line-clamp-3">
          <?php the_excerpt(); ?>
        </span>
      </a>
    </div>
  </div>

</article>