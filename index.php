<?php get_header(); ?>

<div class="max-w-6xl mx-auto bg-white p-8">

	<?php if (have_posts()) : ?>
		<?php

		// Get the Passle page featured post
		$query = new WP_Query([
			"post_type" => "passle-post",
			"numberposts" => 1,
			"meta_query" => [
				[
					"key" => "post_is_featured_on_passle_page",
					"compare" => "EXISTS"
				],
			],
		]);

		if ($query->have_posts()) { ?>
			<div class="mb-8">
				<?php
				while ($query->have_posts()) {
					$query->the_post();
					get_template_part('template-parts/content', get_post_format(), ["featured" => true]);
				}
				?>
			</div>
		<?php }

		wp_reset_postdata();
		?>

		<div class="grid grid-cols-2 gap-6">
			<?php
			while (have_posts()) {
				the_post();
				get_template_part('template-parts/content', get_post_format());
			}
			?>
		</div>

		<?php if (paginate_links()) { ?>
			<div class="flex justify-center mt-8">
				<?php
				echo paginate_links();
				?>
			</div>
		<?php } ?>

	<?php endif; ?>

</div>

<?php
get_footer();
