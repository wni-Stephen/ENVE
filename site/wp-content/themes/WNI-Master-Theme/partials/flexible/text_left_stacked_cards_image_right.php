<?php
/**
 * Flexible layout: Text Left / Stacked Cards / Image Right.
 */

$section_label = get_sub_field('section_label');
$section_heading = get_sub_field('section_heading');
$feature_cards = get_sub_field('feature_cards');
$image = get_sub_field('image');
?>
<section class="flex-section flex-section--text-left-stacked-cards-image-right bg-muted bg-shape grey">
	<div class="grid-container">
		<div class="grid-x grid-padding-x align-middle paddingtopxlrg paddingbottomxlrg">
			<div class="cell small-12 large-5">
				<?php if ($section_label) : ?>
					<p class="section-label"><?php echo esc_html($section_label); ?></p>
				<?php endif; ?>

				<?php if ($section_heading) : ?>
					<div class="heading plastof"><?php echo wp_kses_post($section_heading); ?></div>
				<?php endif; ?>

				<?php if ($feature_cards) : ?>
					<ul class="accordion flex-card-stack" data-accordion data-allow-all-closed="true">
						<?php foreach ($feature_cards as $index => $card) : ?>
							<?php $is_active = !empty($card['highlight_first']) || 0 === $index; ?>
							<li class="accordion-item flex-card-stack-item<?php echo $is_active ? ' is-active' : ''; ?>" data-accordion-item>
								<?php if (!empty($card['card_title'])) : ?>
									<a href="#" class="accordion-title">
										<?php echo esc_html($card['card_title']); ?>
									</a>
								<?php endif; ?>

								<div class="accordion-content flex-card-stack-copy" data-tab-content<?php echo $is_active ? ' style="display:block;"' : ''; ?>>
									<?php if (!empty($card['card_content'])) : ?>
										<div class="plastof"><?php echo wpautop(wp_kses_post($card['card_content'])); ?></div>
									<?php endif; ?>
								</div>
							</li>
						<?php endforeach; ?>
					</ul>
				<?php endif; ?>
			</div>
			<div class="cell small-12 large-6 large-offset-1">
				<?php if (!empty($image['url'])) : ?>
					<div class="image-wrap">
						<img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt'] ?? ''); ?>" />
					</div>
				<?php endif; ?>
			</div>
		</div>
	</div>
</section>
