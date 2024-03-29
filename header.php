<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width">
	<meta name="robots" content="noindex">

	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Bodoni+Moda:wght@400;700&display=swap" rel="stylesheet">

	<?php
	switch (wp_get_environment_type()) {
		case "staging":
			$color_primary = "59 130 246";
			$color_primary_light = "96 165 250";
			break;
		default:
			$color_primary = "255 82 113";
			$color_primary_light = "255 133 155";
			break;
	}
	?>
	<style>
		:root {
			--color-primary: <?php echo $color_primary; ?>;
			--color-primary-light: <?php echo $color_primary_light; ?>;
		}
	</style>

	<?php wp_head(); ?>
</head>

<body <?php body_class('bg-gray-100 text-gray-800 antialiased'); ?>>

	<?php do_action('passle_demo_site_before'); ?>

	<div id="page" class="min-h-screen flex flex-col">

		<?php do_action('passle_demo_header'); ?>

		<header class="bg-white fixed h-24 w-full flex items-center border-b-2 border-gray-100 z-20">
			<div class="mx-auto max-w-6xl w-full">
				<div class="flex justify-between items-center">
					<div class="flex justify-between items-center">
						<a href="<?php echo get_home_url(); ?>">
							<img class="-ml-2" src="https://passle-staging.s3.amazonaws.com/CustomDesign/6049eb3217b38b10b892935c/2021-03-11-10-31-46-143-6049f19217b38b10b89294e3.png" alt="Mercier and Velez">
						</a>
					</div>
				</div>
			</div>
		</header>

		<div id="content" class="site-content flex-grow pt-24">

			<?php do_action('passle_demo_content_start'); ?>

			<div class="mx-auto max-w-6xl">
				<div class="py-4 flex justify-between items-center">
					<a href="<?php echo get_home_url(); ?>" class="text-primary font-bodoni font-semibold">All posts</a>
					<div class="relative">
						<div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
							<i class="fas fa-search text-gray-400"></i>
						</div>
						<form action="<?php echo get_home_url(); ?>" method="get" role="search" autocomplete="off">
							<input type="text" placeholder="Search for posts" class="border border-gray-400 pl-10 p-2 w-72 focus:ring-primary focus:border-primary" value="<?php echo the_search_query() ?>" name="s" id="s" />
						</form>
					</div>
				</div>
			</div>

			<main>