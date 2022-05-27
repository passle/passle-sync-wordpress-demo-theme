<?php

$author_id = get_the_author_meta("ID");
$avatar_url = get_avatar_url($author_id, ["default" => "https://images.passle.net/200x200/assets/images/no_avatar.png"]);
$tags = implode(", ", array_map(fn ($tag) => $tag->name, get_the_tags()));

?>

<article id="post-<?php the_ID(); ?>" <?php post_class("mb-8"); ?>>

  <div class="flex flex-col">
    <div class="flex flex-row justify-between max-w-6xl mx-auto bg-white py-10 px-8 w-full">
      <div class="flex flex-col justify-center gap-4">
        <h1 class="entry-title text-5xl font-extrabold !leading-[4rem] mr-4 font-bodoni"><?php the_title(); ?></h1>
        <div class="flex gap-1 text-sm">
          <time datetime="<?php echo get_the_date("j F Y"); ?>" itemprop="datePublished">
            <?php echo get_the_date("j F Y"); ?>
          </time>
        </div>
      </div>
      <div class="basis-1/2 shrink-0">
        <img src="<?php the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>" class="w-full aspect-video object-cover" />
      </div>
    </div>
    <div class="py-4 bg-primary text-white font-bodoni">
      <div class="max-w-6xl mx-auto px-8">
        <div class="flex gap-6">
          <img src="<?php echo $avatar_url; ?>" alt="<?php the_author_meta("display_name"); ?>" class="h-24 w-24 object-cover border border-gray-300" />
          <div class="flex flex-col justify-center gap-1">
            <span class="text-2xl font-medium"><?php the_author_meta("display_name"); ?></span>
          </div>
        </div>
      </div>
    </div>
    <div class="max-w-6xl mx-auto w-full">
      <div class="flex">
        <div class="post-content flex-grow bg-white ml-44 py-10 px-16 text-lg">
          <?php the_content(); ?>
          <?php if (!empty($tags)) { ?>
            <div>
              <h3 class="text-xl font-bodoni mb-2">Tags</h3>
              <div class="flex items-center gap-2">
                <i class="fas fa-tags"></i>
                <span class="text-primary"><?php echo $tags; ?></span>
              </div>
            </div>
          <?php } ?>
        </div>
      </div>
    </div>
  </div>
</article>