<?php get_header(); ?>

<div class="max-w-6xl mx-auto mb-8 bg-white p-8">

	<?php if (have_posts()) : ?>
		<div class="grid grid-cols-2 gap-6">
			<?php

			while (have_posts()) :
				the_post();

				// $query = new WP_Query([
				// 	"post_type" => "passle_post"
				// ]);

				// while ($query->have_posts()) :
				// 	$query->the_post();
				// 
			?>

				<?php get_template_part('template-parts/content', get_post_format()); ?>

			<?php endwhile; ?>
		</div>

		<div class="flex justify-center mt-8">
			<?php
			echo paginate_links();
			?>
		</div>

	<?php endif; ?>

</div>

<?php
get_footer();
