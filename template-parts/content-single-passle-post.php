<?php

use Passle\PassleSync\Utils\Utils;

global $passle_post, $is_passle_preview;

function istatoy_share_url($passle_post)
{
	return Utils::sformat("https://www.passle.{domain_ext}/istatoy?postShortcode={post_shortcode}&istatoySource=ClientWeb", [
		"domain_ext" => PASSLESYNC_DOMAIN_EXT,
		"post_shortcode" => urlencode($passle_post->shortcode),
	]);
}

function linkedin_share_url($passle_post)
{
	return Utils::sformat("https://www.linkedin.com/sharing/share-offsite?mini=true&url={url}&title={post_title}&source=LinkedIn", [
		"url" => urlencode($passle_post->url),
		"post_title" => urlencode($passle_post->title),
	]);
}

function twitter_share_url($passle_post)
{
	$author_screen_names = implode(", ", array_map(fn ($author) => empty($author->twitter_screen_name) ? $author->name : $author->twitter_screen_name, $passle_post->authors));
	$tweet_content = "{$passle_post->title} by {$author_screen_names}";
	$hashtags = implode(", ", array_map(fn ($tag) => str_replace([" ", "-"], "", $tag), $passle_post->get_tag_names()));

	return Utils::sformat("https://twitter.com/intent/tweet?text={content}&url={url}&hashtags={hashtags}", [
		"content" => urlencode($tweet_content),
		"url" => urlencode($passle_post->url),
		"hashtags" => urlencode($hashtags),
	]);
}

function facebook_share_url($passle_post)
{
	return Utils::sformat("https://www.facebook.com/sharer.php?u={url}&quote={post_title}", [
		"url" => urlencode($passle_post->url),
		"post_title" => urlencode($passle_post->title),
	]);
}

function xing_share_url($passle_post)
{
	return Utils::sformat("https://www.xing.com/spi/shares/new?url={url}", [
		"url" => urlencode($passle_post->url),
	]);
}

?>

<article id="post-<?php the_ID(); ?>" <?php post_class("mb-8"); ?>>

	<div class="flex flex-col">
		<div class="flex flex-row justify-between max-w-6xl mx-auto bg-white py-10 px-8 w-full">
			<div class="flex flex-col justify-center gap-4">
				<h1 class="entry-title text-5xl font-extrabold !leading-[4rem] mr-4 font-bodoni"><?php echo $passle_post->title; ?></h1>
				<div class="flex gap-1 text-sm">
					<time datetime="<?php echo $passle_post->get_date("j F Y"); ?>" itemprop="datePublished">
						<?php echo $passle_post->get_date("j F Y"); ?>
					</time>
					<span>|</span>
					<div><?php echo $passle_post->estimated_read_time_minutes; ?> min read</div>
				</div>
			</div>
			<div class="basis-1/2 shrink-0 w-full aspect-video">
				<?php if ($passle_post->featured_item_html != null) {
					echo $passle_post->featured_item_html;
				} else { ?>
					<img src="<?php echo $passle_post->image_url; ?>" alt="<?php echo $passle_post->title; ?>" class="w-full aspect-video object-cover" />
				<?php } ?>
			</div>
		</div>
		<div class="py-4 bg-primary text-white font-bodoni">
			<div class="max-w-6xl mx-auto px-8">
				<div class="flex gap-6">
					<?php if ($passle_post->primary_author->synced && !empty($passle_post->primary_author->profile_url)) { ?>
						<a href="<?php echo $passle_post->primary_author->profile_url; ?>">
							<img src="<?php echo $passle_post->primary_author->get_avatar_url(); ?>" alt="<?php echo $passle_post->primary_author->name; ?>" class="h-24 w-24 object-cover border border-gray-300" />
						</a>
					<?php } else { ?>
						<img src="<?php echo $passle_post->primary_author->get_avatar_url(); ?>" alt="<?php echo $passle_post->primary_author->name; ?>" class="h-24 w-24 object-cover border border-gray-300" />
					<?php } ?>
					<div class="flex flex-col justify-center gap-1">
						<?php if ($passle_post->primary_author->synced && !empty($passle_post->primary_author->profile_url)) { ?>
							<a href="<?php echo $passle_post->primary_author->profile_url; ?>" class="text-2xl underline font-medium"><?php echo $passle_post->primary_author->name; ?></a>
						<?php } else { ?>
							<span class="text-2xl font-medium"><?php echo $passle_post->primary_author->name; ?></span>
						<?php } ?>
						<?php if ($passle_post->primary_author->role != null) { ?>
							<div class="text-lg"><?php echo $passle_post->primary_author->role; ?></div>
						<?php } ?>
					</div>
				</div>
			</div>
		</div>
		<div class="max-w-6xl mx-auto w-full">
			<div class="flex relative">
				<?php if (!$is_passle_preview) { ?>
					<div class="absolute top-0 inset-x-0 bg-gradient-to-r from-gray-400/20 to-white w-full py-1">
						<div class="ml-44">
							<div class="pl-16 h-6 flex items-center gap-6">
								<!-- ISTATOY button -->
								<a href="#" class="group" onclick="window.open('<?php echo istatoy_share_url($passle_post); ?>', '_blank', 'height=600, width=600, toolbar=no, menubar=no, scrollbars=yes, resizable=yes, location=no, directories=no, status=no');">
									<svg viewBox="0 0 362.6 361.2" class="h-4 w-4">
										<style>
											.st0 {
												fill: none;
											}

											.st1 {
												fill: #333;
												stroke: #cccccc75;
												stroke-width: 3;
												stroke-miterlimit: 10;
											}

											.st2 {
												fill: none;
												stroke: #333;
												stroke-width: 3;
												stroke-miterlimit: 10;
											}

											.st3 {
												fill: #333;
												stroke: #cccccc75;
												stroke-width: 24;
												stroke-miterlimit: 10;
											}

											.st4 {
												fill: #333;
												stroke: #cccccc75;
												stroke-width: 24;
												stroke-miterlimit: 10;
											}
										</style>
										<path class="st0" d="M70.1 271.5c-11.8-18.7-18.7-40.8-18.7-64.5v.1c0 23.7 6.9 45.7 18.7 64.4z" />
										<path class="st1 group-hover:fill-primary" d="M70.5 271.1c-11.9-18.7-18.9-40.8-19-64.6v.5c0 23.7 6.9 45.8 18.7 64.5l.3-.4zm205 .8c11.9-18.8 18.8-40.9 18.8-64.8v-.6c-.1 23.9-7.2 46.2-19.3 64.9l.5.5z" />
										<path class="st2" d="M70.1 271.5c21.4 34.3 59.4 57.1 102.8 57.1h.1c-43.4-.1-81.4-22.9-102.9-57.1z" />
										<path class="st1 group-hover:fill-primary" d="M172.9 327.4c-43.1 0-80.9-22.5-102.4-56.3l-.4.4c21.5 34.2 59.5 57.1 102.9 57.1 43.2 0 81-22.7 102.5-56.7l-.4-.4c-21.6 33.6-59.3 55.9-102.2 55.9z" />
										<path class="st2" d="M52.1 194c-.1.5-.1 1-.1 1.4.1-.4.1-.9.1-1.4z" />
										<path class="st2" d="M52.1 194c1.8-16.8 7.1-32.6 15.1-46.7 20.9-36.8 60.3-61.7 105.7-61.7 44.6 0 83.4 24.1 104.6 59.9 10.6 17.9 16.8 38.7 16.9 61v-.6c0-67.1-54.4-121.5-121.5-121.5S51.4 138.8 51.4 205.9v.6c0-3.7.2-7.4.6-11.1.1-.4.1-.9.1-1.4z" />
										<path class="st3 group-hover:fill-primary" d="M236.7 187.2c6.7 4.1 13 9 18.7 14.8l70.9 70.9c17.1-26.6 27.2-58.2 27.3-92.1-.2-31.6-8.9-61.1-23.9-86.6l-93 93zm-130.3 14.7c5.2-5.2 10.7-9.7 16.6-13.5L31.4 96.8c-11.3 20-18.8 42.3-21.4 66.2-.1.7-.1 1.3-.2 2-.5 5.2-.8 10.4-.8 15.7.2 33.7 10.1 65.1 27 91.6l70.4-70.4z" />
										<path class="st3 group-hover:fill-primary" d="M181.3 352.2c60.9 0 114.4-31.7 145-79.4l-70.9-70.9c-5.8-5.8-12.1-10.6-18.7-14.8l-43.2 43.2c-7.8 7.8-20.6 7.8-28.4 0l-42-42c-5.9 3.9-11.5 8.4-16.6 13.5L36 272.3c30.6 48 84.2 79.9 145.3 79.9z" />
										<path class="st4 group-hover:fill-primary" d="M329.9 94.1C299.9 43.2 244.7 9 181.3 9 116.9 9 60.8 44.4 31.1 96.7c0 0 136.6 137.5 148.1 137.2 11 .3 150.7-139.8 150.7-139.8z" />
									</svg>
								</a>
								<!-- Other social networks -->
								<a class="text-md leading-none hover:text-linkedin" href="<?php echo linkedin_share_url($passle_post); ?>" target="_blank" rel="noopener noreferrer">
									<i class="fab fa-linkedin-in" title="LinkedIn"></i>
								</a>
								<a class="text-md leading-none hover:text-twitter" href="<?php echo twitter_share_url($passle_post); ?>" target="_blank" rel="noopener noreferrer">
									<i class="fab fa-twitter" title="Twitter"></i>
								</a>
								<a class="text-md leading-none hover:text-facebook" href="<?php echo facebook_share_url($passle_post); ?>" target="_blank" rel="noopener noreferrer">
									<i class="fab fa-facebook-f" title="Facebook"></i>
								</a>
								<a class="text-md leading-none hover:text-xing" href="<?php echo xing_share_url($passle_post); ?>" target="_blank" rel="noopener noreferrer">
									<i class="fab fa-xing" title="XING"></i>
								</a>
							</div>
						</div>
					</div>
				<?php } ?>
				<div class="w-44 pointer-events-none">
					<div class="-rotate-90 font-bodoni uppercase text-right origin-bottom-right leading-none text-7xl -mr-2 text-gray-300 select-none <?php echo $is_passle_preview ? "mt-[8.5rem]" : "mt-48" ?>">Insights</div>
				</div>
				<div class="post-content flex-grow bg-white p-10 px-16 text-lg min-h-[32rem] flex flex-col gap-8<?php echo $is_passle_preview ? "" : " pt-24"; ?>">
					<div>
						<?php echo $passle_post->content ?>
					</div>
					<?php if ($passle_post->quote_text != null) { ?>
						<div class="border-l-8 border-primary pl-8 min-h-[1rem] flex flex-col gap-2 items-start">
							<span class="text-2xl font-bodoni">
								<?php echo $passle_post->quote_text; ?>
							</span>
							<a href="<?php echo $passle_post->quote_url; ?>" target="_blank" rel="noopener noreferrer"><?php echo $passle_post->quote_url; ?></a>
						</div>
					<?php } ?>
					<?php if (!empty($passle_post->tags)) { ?>
						<div>
							<h3 class="text-xl font-bodoni mb-2">Tags</h3>
							<div class="flex items-center gap-2">
								<i class="fas fa-tags"></i>
								<?php foreach ($passle_post->tags as $tag) { ?>
									<a href="<?php echo $tag->url; ?>" class="bg-gray-100 !text-gray-700 text-base py-1 px-2 rounded-sm font-sans normal-case font-medium hover:bg-primary hover:!text-white transition-colors">
										<?php echo $tag->name; ?>
									</a>
								<?php } ?>
							</div>
						</div>
					<?php } ?>
				</div>
			</div>
		</div>
	</div>
</article>