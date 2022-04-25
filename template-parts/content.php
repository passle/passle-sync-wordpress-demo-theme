<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php
	global $post;
	$post_meta = get_post_meta($post->ID);
	$post_date = get_the_date("j F Y");
	?>

	<div class="h-80 relative group">
		<img class="w-full h-full object-cover" src="<?php echo $post_meta["post_image_url"][0] ?>" alt="<?php echo $post->title ?>" />
		<div class="absolute inset-0 bg-black bg-opacity-50 group-hover:bg-primary group-hover:bg-opacity-100 transition-colors text-white">
			<a href="<?php echo the_permalink() ?>" class="h-full p-16 flex flex-col gap-4">
				<?php the_title('<h2 class="entry-title font-bodoni text-3xl leading-tight mb-1 line-clamp-3">', '</h2>'); ?>
				<time datetime="<?php echo $post_date; ?>" itemprop="datePublished" class="font-bodoni group-hover:hidden">
					<?php echo $post_date; ?>
				</time>
				<span class="hidden group-hover:line-clamp-3">
					<?php echo the_excerpt(); ?>
				</span>
			</a>
		</div>

</article>