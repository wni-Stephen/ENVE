<?php
/**
 * Flexible layout: Image Left / Content Right / CTA.
 */

$image = get_sub_field('image');
$section_label = get_sub_field('section_label');
$section_heading = get_sub_field('section_heading');
$content = get_sub_field('content');
$cta_button = get_sub_field('cta_button');
?>
<section class="flex-section flex-section--image-left-content-right-cta">
	<div class="grid-container">
		<div class="grid-x grid-padding-x align-middle paddingtopxlrg paddingbottomxlrg">
			<div class="cell small-12 large-6">
				<?php if (!empty($image['url'])) : ?>
					<div class="image-wrap">
						<img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt'] ?? ''); ?>" />
					</div>
				<?php endif; ?>
			</div>
			<div class="cell small-12 large-5 large-offset-1">
				<?php if ($section_label) : ?>
					<p class="section-label"><?php echo esc_html($section_label); ?></p>
				<?php endif; ?>

				<?php if ($section_heading) : ?>
					<div class="heading plastof"><?php echo wp_kses_post($section_heading); ?></div>
				<?php endif; ?>

				<?php if ($content) : ?>
					<div class="content plastof"><?php echo wp_kses_post($content); ?></div>
				<?php endif; ?>

				<?php if (!empty($cta_button['url']) && !empty($cta_button['title'])) : ?>
					<a class="button margintopxsml" href="<?php echo esc_url($cta_button['url']); ?>"<?php echo !empty($cta_button['target']) ? ' target="' . esc_attr($cta_button['target']) . '"' : ''; ?>>
						<?php echo esc_html($cta_button['title']); ?>
					</a>
				<?php endif; ?>
			</div>
		</div>
	</div>
</section>
