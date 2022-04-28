<?php get_header(); ?>

<div class="max-w-6xl mx-auto bg-white p-8">

	<?php if (have_posts()) : ?>
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
