<?php

use Passle\PassleSync\Models\PasslePost;

global $post;
$passle_post = new PasslePost($post, [
	"load_authors" => false,
	"load_tags" => false,
]);

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<div class="<?php echo $args["featured"] ?? false ? "h-[28rem]" : "h-80"; ?> relative group">
		<img class="w-full h-full object-cover" src="<?php echo $passle_post->image_url; ?>" alt="<?php echo $passle_post->title; ?>" />
		<div class="absolute inset-0 bg-black bg-opacity-50 group-hover:bg-primary group-hover:bg-opacity-100 transition-colors text-white">
			<a href="<?php echo $passle_post->url; ?>" <?php echo ($passle_post->opens_in_new_tab ? 'target="_blank" rel="noopener noreferrer"' : '') ?> class="h-full p-16 flex flex-col gap-4">
				<h2 class="entry-title font-bodoni text-3xl leading-tight mb-1 line-clamp-3"><?php echo $passle_post->title; ?></h2>
				<time datetime="<?php echo $passle_post->get_date("j F Y"); ?>" itemprop="datePublished" class="font-bodoni group-hover:hidden">
					<?php echo $passle_post->get_date("j F Y"); ?>
				</time>
				<span class="hidden group-hover:line-clamp-3">
					<?php echo $passle_post->excerpt; ?>
				</span>
			</a>
		</div>
	</div>

</article>