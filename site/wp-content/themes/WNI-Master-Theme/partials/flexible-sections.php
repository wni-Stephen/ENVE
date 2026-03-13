<?php
/**
 * Flexible content section renderer.
 */

if (!function_exists('have_rows') || !have_rows('page_sections')) {
	return;
}
?>
<div class="flexible-sections">
	<?php while (have_rows('page_sections')) : the_row(); ?>
		<?php
		$layout = get_row_layout();

		if (!$layout) {
			continue;
		}

		get_template_part('partials/flexible/' . $layout);
		?>
	<?php endwhile; ?>
</div>
