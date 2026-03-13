<?php
/**
 * Flexible layout: Benefits Band / Icon Cards.
 */

$section_label = get_sub_field('section_label');
$section_heading = get_sub_field('section_heading');
$benefit_items = get_sub_field('benefit_items');
?>
<section class="flex-section flex-section--benefits-band-icon-cards fontcolourwhite">
	<div class="grid-container">
		<div class="grid-x grid-padding-x align-right paddingtopxlrg">
			<div class="cell small-12 large-8 text-right-lg">
				<?php if ($section_label) : ?>
					<p class="section-label"><?php echo esc_html($section_label); ?></p>
				<?php endif; ?>

				<?php if ($section_heading) : ?>
					<div class="heading plastof"><?php echo wp_kses_post($section_heading); ?></div>
				<?php endif; ?>
			</div>
		</div>

		<?php if ($benefit_items) : ?>
			<div class="grid-x grid-padding-x small-up-2 medium-up-3 xlarge-up-5 paddingtopmed paddingbottomxlrg">
				<?php foreach ($benefit_items as $item) : ?>
					<div class="cell">
						<article class="flex-benefit-item text-center">
							<?php if (!empty($item['item_icon']['url'])) : ?>
								<div class="flex-benefit-item-media">
									<img src="<?php echo esc_url($item['item_icon']['url']); ?>" alt="<?php echo esc_attr($item['item_icon']['alt'] ?? ''); ?>" />
								</div>
							<?php endif; ?>

							<?php if (!empty($item['item_title'])) : ?>
								<h3><?php echo esc_html($item['item_title']); ?></h3>
							<?php endif; ?>

							<?php if (!empty($item['item_text'])) : ?>
								<div class="content plastof"><?php echo wpautop(wp_kses_post($item['item_text'])); ?></div>
							<?php endif; ?>
						</article>
					</div>
				<?php endforeach; ?>
			</div>
		<?php endif; ?>
	</div>
</section>
