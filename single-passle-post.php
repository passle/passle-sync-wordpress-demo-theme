<?php get_header(); ?>

<div class="mb-8 mx-auto">

	<?php if ($is_passle_preview) : ?>

		<?php get_template_part("template-parts/content", "single-passle-post"); ?>

	<?php elseif (have_posts()) : ?>

		<?php
		while (have_posts()) :
			the_post();
		?>

			<?php get_template_part("template-parts/content", "single-passle-post"); ?>

		<?php endwhile; ?>

	<?php endif; ?>

</div>

<?php
get_footer();
