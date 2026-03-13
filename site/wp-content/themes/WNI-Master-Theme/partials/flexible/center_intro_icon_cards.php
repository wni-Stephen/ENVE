<?php
/**
 * Flexible layout: Centered Intro / Icon Cards Grid.
 */

$section_label = get_sub_field('section_label');
$section_heading = get_sub_field('section_heading');
$cards = get_sub_field('cards');
?>
<section class="flex-section flex-section--center-intro-icon-cards">
	<div class="grid-container">
		<div class="grid-x grid-padding-x align-center paddingtopxlrg">
			<div class="cell small-12 large-8 xxlarge-7 text-center">
				<?php if ($section_label) : ?>
					<p class="section-label"><?php echo esc_html($section_label); ?></p>
				<?php endif; ?>

				<?php if ($section_heading) : ?>
					<div class="heading plastof"><?php echo wp_kses_post($section_heading); ?></div>
				<?php endif; ?>
			</div>
		</div>

		<?php if ($cards) : ?>
			<div class="grid-x grid-padding-x medium-up-2 large-up-3 paddingbottomxlrg card-grid">
				<?php foreach ($cards as $card) : ?>
					<div class="cell">
						<article class="flex-icon-card">
							<?php if (!empty($card['card_icon']['url'])) : ?>
								<div class="flex-icon-card-media">
									<img class="editsvg" src="<?php echo esc_url($card['card_icon']['url']); ?>" alt="<?php echo esc_attr($card['card_icon']['alt'] ?? ''); ?>" />
									
								</div>
							<?php endif; ?>

							<?php if (!empty($card['card_title'])) : ?>
								<h4 class="text-center"><?php echo ($card['card_title']); ?></h4>
							<?php endif; ?>

							<?php if (!empty($card['card_content'])) : ?>
								<div class="content plastof"><?php echo wpautop(wp_kses_post($card['card_content'])); ?></div>
							<?php endif; ?>
						</article>
					</div>
				<?php endforeach; ?>
			</div>
		<?php endif; ?>
	</div>
</section>
