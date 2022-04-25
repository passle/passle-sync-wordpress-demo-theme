<article id="post-<?php the_ID(); ?>" <?php post_class("mb-8"); ?>>

	<?php
	global $post;
	$post_meta = get_post_meta($post->ID);
	$post_date = get_the_date("j F Y");

	$post_read_time_seconds = intval($post_meta["post_estimated_read_time"][0]);
	$post_read_time_minutes = max(ceil($post_read_time_seconds / 60), 1);

	$primary_author = unserialize($post_meta["post_authors"][0])[0];
	$tags = implode(", ", unserialize($post_meta["post_tags"][0]));
	$tweets = unserialize($post_meta["post_tweets"][0]);
	?>

	<div class="flex flex-col">
		<div class="flex flex-col gap-14 max-w-6xl mx-auto bg-white pt-10 pb-2 px-16 w-full">
			<?php the_title('<h1 class="entry-title text-2xl lg:text-5xl font-extrabold !leading-[4rem] mb-1 font-bodoni">', '</h1>'); ?>
			<div class="flex gap-1 text-sm">
				<time datetime="<?php echo $post_date; ?>" itemprop="datePublished">
					<?php echo $post_date; ?>
				</time>
				<span>|</span>
				<div><?php echo $post_read_time_minutes; ?> min read</div>
			</div>
		</div>
		<div class="py-4 bg-primary text-white font-bodoni">
			<div class="max-w-6xl mx-auto px-16">
				<div class="flex justify-between relative">
					<div class="flex gap-6">
						<a href="<?php echo $primary_author["profile_url"]; ?>">
							<img src="<?php echo $primary_author["image_url"]; ?>" alt="<?php echo $primary_author["name"]; ?>" class="h-24 w-24 object-cover" />
						</a>
						<div class="flex flex-col justify-center gap-1">
							<a href="<?php echo $primary_author["profile_url"]; ?>" class="text-2xl underline font-medium"><?php echo $primary_author["name"]; ?></a>
							<?php if ($primary_author["role"] != null) { ?>
								<div class="text-lg"><?php echo $primary_author["role"]; ?></div>
							<?php } ?>
						</div>
					</div>
					<div class="h-64 aspect-video absolute z-10 right-0 top-1/2 -translate-y-1/2 border border-gray-100 overflow-hidden">
						<?php if ($post_meta["post_featured_item_html"][0] != null) {
							echo htmlspecialchars_decode($post_meta["post_featured_item_html"][0]);
						} else { ?>
							<img src="<?php echo $post_meta["post_image_url"][0]; ?>" alt="<?php the_title(); ?>" class="h-full w-full object-cover" />
						<?php } ?>
					</div>
				</div>
			</div>
		</div>
		<div class="max-w-6xl mx-auto w-full">
			<div class="flex relative">
				<div class="absolute top-0 inset-x-0 bg-gray-400 bg-opacity-10 w-[calc(100%-theme(spacing.16))] py-1">
					<div class="ml-44">
						<div class="pl-16">
							<span class="istatoy-button-placeholder"></span>
						</div>
					</div>
				</div>
				<div class="w-44 pointer-events-none">
					<div class="-rotate-90 font-bodoni uppercase text-right origin-bottom-right leading-none text-7xl mt-48 -mr-2 text-gray-300 select-none">Insights</div>
				</div>
				<div class="post-content flex-grow bg-white pt-24 pb-10 px-16 text-lg min-h-[32rem]">
					<?php the_content(); ?>
					<?php if ($post_meta["post_quote_text"][0] != null) { ?>
						<div class="border-l-8 border-primary pl-8 my-8 min-h-[1rem] flex flex-col gap-2 items-start">
							<span class="text-2xl font-bodoni">
								<?php echo $post_meta["post_quote_text"][0]; ?>
							</span>
							<a href="<?php echo $post_meta["post_quote_url"][0]; ?>" target="_blank" rel="noopener noreferrer"><?php echo $post_meta["post_quote_url"][0]; ?></a>
						</div>
					<?php } ?>
					<?php if ($tags) { ?>
						<div class="mb-8">
							<h3 class="text-xl font-bodoni mb-2">Tags</h3>
							<div class="flex items-center gap-2">
								<i class="fas fa-tags"></i>
								<span class="text-primary"><?php echo $tags; ?></span>
							</div>
						</div>
					<?php } ?>
					<?php if ($tweets) { ?>
						<div class="mb-8">
							<h3 class="text-xl font-bodoni mb-2">Tweets</h3>
							<div class="grid grid-cols-3 gap-4">
								<?php foreach ($tweets as $tweet) { ?>
									<?php echo htmlspecialchars_decode($tweet["embed_code"]) ?>
								<?php } ?>
							</div>
						</div>
					<?php } ?>
				</div>
			</div>
		</div>
	</div>

	<!-- <header class="entry-header mb-4">
		<?php the_title(sprintf('<h1 class="entry-title text-2xl lg:text-5xl font-extrabold leading-tight mb-1"><a href="%s" rel="bookmark">', esc_url(get_permalink())), '</a></h1>'); ?>
		<time datetime="<?php echo get_the_date('c'); ?>" itemprop="datePublished" class="text-sm text-gray-700"><?php echo get_the_date(); ?></time>
	</header>

	<div class="entry-content">
		<?php the_content(); ?>

		<?php
		wp_link_pages(
			array(
				'before'      => '<div class="page-links"><span class="page-links-title">' . __('Pages:', 'tailpress') . '</span>',
				'after'       => '</div>',
				'link_before' => '<span>',
				'link_after'  => '</span>',
				'pagelink'    => '<span class="screen-reader-text">' . __('Page', 'tailpress') . ' </span>%',
				'separator'   => '<span class="screen-reader-text">, </span>',
			)
		);
		?>
	</div> -->

</article>