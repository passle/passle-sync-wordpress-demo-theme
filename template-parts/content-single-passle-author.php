<?php

use Passle\PassleSync\Models\PassleAuthor;

global $post;
$passle_author = new PassleAuthor($post);
$first_name = explode(" ", $passle_author->name)[0];

?>

<article id="post-<?php the_ID(); ?>" <?php post_class("mb-8"); ?>>
	<div class="flex flex-col gap-12">
		<div class="flex max-w-6xl w-full mx-auto">
			<div class="w-1/3">
				<div class="flex flex-col gap-12">
					<div class="-ml-4 w-[calc(100%+theme(spacing.4))] relative aspect-square">
						<img class="w-full aspect-square object-cover border border-gray-300 absolute top-6 left-4" src="<?php echo $passle_author->get_avatar_url("https://images.passle.net/800x800/assets/images/no_avatar.png"); ?>" alt="<?php echo $passle_author->name; ?>" />
						<div class="absolute top-full -rotate-90 font-bodoni uppercase text-right origin-bottom-right -right-2 leading-none text-7xl text-gray-300 select-none whitespace-nowrap"><?php echo $first_name; ?></div>
					</div>
					<div class="pl-8 flex flex-col gap-12">
						<div class="flex gap-8 text-3xl mt-8">
							<?php if ($passle_author->twitter_screen_name) { ?>
								<a href="https://twitter.com/<?php echo $passle_author->twitter_screen_name; ?>" target="_blank" rel="noopener noreferrer">
									<i class="fab fa-twitter"></i>
								</a>
							<?php } ?>
							<?php if ($passle_author->linkedin_profile_link) { ?>
								<a href="https://<?php echo $passle_author->linkedin_profile_link; ?>" target="_blank" rel="noopener noreferrer">
									<i class="fab fa-linkedin-in"></i>
								</a>
							<?php } ?>
						</div>
						<?php if ($passle_author->location_full || $passle_author->email_address) { ?>
							<div class="flex flex-col gap-6">
								<?php if ($passle_author->location_full) { ?>
									<div class="flex gap-4 text-xl font-semibold items-center">
										<i class="fas fa-map-marker-alt text-xl w-4"></i>
										<?php echo $passle_author->location_full; ?>
									</div>
								<?php } ?>
								<?php if ($passle_author->email_address) { ?>
									<div class="flex gap-4 text-xl font-semibold items-center">
										<i class="fas fa-envelope text-xl w-4"></i>
										<?php echo $passle_author->email_address; ?>
									</div>
								<?php } ?>
							</div>
						<?php } ?>
						<?php foreach ($passle_author->personal_links as $link) { ?>
							<a class="flex gap-4 text-xl font-semibold text-primary" href="<?php echo $link->url; ?>" target="_blank" rel="noopener noreferrer">
								<span><?php echo $link->title; ?></span>
								<span>⟶</span>
							</a>
						<?php } ?>
					</div>
				</div>
			</div>
			<div class="w-2/3 bg-white border-t-4 border-primary min-h-[48rem] px-20 py-12">
				<h1 class="text-5xl font-extrabold mb-6 font-bodoni"><?php echo $passle_author->name; ?></h1>
				<div class="text-2xl font-bodoni mb-4"><?php echo $passle_author->role; ?></div>
				<div class="w-14 border-b-4 border-primary mb-14"></div>
				<?php if ($passle_author->description) { ?>
					<div class="text-2xl font-bodoni font-bold mb-4">About me</div>
					<div class="post-content text-lg">
						<?php echo $passle_author->description; ?>
					</div>
				<?php } ?>
			</div>
		</div>
		<?php
		$query = new WP_Query([
			"post_type" => "passle-post",
			"nopaging" => true,
			"meta_query" => [
				[
					"key" => "post_author_shortcodes",
					"value" => $passle_author->shortcode,
				],
			],
		]);

		if ($query->have_posts()) { ?>
			<div class="px-20 py-12 max-w-6xl mx-auto w-full bg-white">
				<div class="flex flex-col items-center gap-8">
					<div class="flex items-center gap-4">
						<div class="w-14 border-b-4 border-primary"></div>
						<div class="text-2xl font-semibold font-bodoni">
							<?php echo $first_name; ?>'s Posts
						</div>
						<div class="w-14 border-b-4 border-primary"></div>
					</div>
					<div class="grid grid-cols-2 gap-6 w-full">
						<?php
						while ($query->have_posts()) {
							$query->the_post();
							get_template_part('template-parts/content', get_post_type());
						}
						?>
					</div>
				</div>
			</div>
		<?php } ?>
	</div>
</article>