<?php
/**
 * Flexible layout: Image Left / Partner Content Right.
 */
$image = get_sub_field('image');
$partner_name = get_sub_field('partner_name');
$content = get_sub_field('content');
$cta_button = get_sub_field('cta_button');
?>
<section class="flex-section flex-section--image-left-partner-content-right">
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
				<?php if ($partner_name) : ?>
					<div class="heading plastof"><h2><?php echo ($partner_name); ?></h2></div>
				<?php endif; ?>
				<?php if ($content) : ?>
					<div class="content plastof"><?php echo wp_kses_post($content); ?></div>
				<?php endif; ?>
				<?php if (!empty($cta_button['url']) && !empty($cta_button['title'])) : ?>
					<a class="button spacingtop" href="<?php echo esc_url($cta_button['url']); ?>"<?php echo !empty($cta_button['target']) ? ' target="' . esc_attr($cta_button['target']) . '"' : ''; ?>>
						<?php echo esc_html($cta_button['title']); ?>
					</a>
				<?php endif; ?>
			</div>
		</div>
	</div>
</section>
