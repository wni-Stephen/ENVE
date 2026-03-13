<?php
/**
 * Flexible layout: Text Left / Image Right / Content Under.
 */

$section_label = get_sub_field('section_label');
$section_heading = get_sub_field('section_heading');
$buttons = get_sub_field('buttons');
$image = get_sub_field('image');
$content = get_sub_field('content');
$company_phone = function_exists('get_field') ? get_field('phone_number', 'option') : '';
$company_phone_link = function_exists('get_field') ? get_field('phone_link', 'option') : '';

if (empty($company_phone_link) && !empty($company_phone)) {
	$company_phone_link = 'tel:+' . preg_replace('/\D+/', '', $company_phone);
}

$has_actions = $buttons || $company_phone;

?>
<section class="flex-section flex-section--text-left-image-right-content">
	<div class="grid-container">
		<div class="grid-x grid-padding-x align-middle paddingtopxlrg paddingbottomxlrg">
			<div class="cell small-12 large-5">
				<?php if ($section_label) : ?>
					<p class="section-label"><?php echo esc_html($section_label); ?></p>
				<?php endif; ?>

				<?php if ($section_heading) : ?>
					<div class="heading plastof"><?php echo wp_kses_post($section_heading); ?></div>
				<?php endif; ?>

				<?php if ($has_actions) : ?>
					<div class="flex-section-actions wni-flex wni-gap show-for-large">
						<?php if ($buttons) : ?>
							<?php foreach ($buttons as $button_row) : ?>
								<?php $button = $button_row['button'] ?? null; ?>
								<?php if (!empty($button['url']) && !empty($button['title'])) : ?>
									<a class="button grey" href="<?php echo esc_url($button['url']); ?>"<?php echo !empty($button['target']) ? ' target="' . esc_attr($button['target']) . '"' : ''; ?>>
										<?php echo esc_html($button['title']); ?>
									</a>
								<?php endif; ?>
							<?php endforeach; ?>
						<?php endif; ?>

						<?php if (!empty($company_phone)) : ?>
							<a class="phone" href="<?php echo esc_url($company_phone_link); ?>">
								<span class="phone-icon" aria-hidden="true">
									<img src="<?php echo get_template_directory_uri(); ?>/assets/images/header/phone-icon-yellow.svg" alt="" />
								</span>
								<span class="fw-bold"><?php echo esc_html($company_phone); ?></span>
							</a>
						<?php endif; ?>
					</div>
				<?php endif; ?>
			</div>
			<div class="cell small-12 large-6 large-offset-1">
				<?php if (!empty($image['url'])) : ?>
					<div class="image-wrap">
						<img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt'] ?? ''); ?>" />
					</div>
				<?php endif; ?>

				<?php if ($content) : ?>
					<div class="content plastof margintopxsml"><?php echo wp_kses_post($content); ?></div>
				<?php endif; ?>

				<?php if ($has_actions) : ?>
					<div class="flex-section-actions wni-flex wni-gap hide-for-large margintopxsml">
						<?php if ($buttons) : ?>
							<?php foreach ($buttons as $button_row) : ?>
								<?php $button = $button_row['button'] ?? null; ?>
								<?php if (!empty($button['url']) && !empty($button['title'])) : ?>
									<a class="button grey" href="<?php echo esc_url($button['url']); ?>"<?php echo !empty($button['target']) ? ' target="' . esc_attr($button['target']) . '"' : ''; ?>>
										<?php echo esc_html($button['title']); ?>
									</a>
								<?php endif; ?>
							<?php endforeach; ?>
						<?php endif; ?>

						<?php if (!empty($company_phone)) : ?>
							<a class="phone" href="<?php echo esc_url($company_phone_link); ?>">
								<span class="phone-icon" aria-hidden="true">
									<img src="<?php echo get_template_directory_uri(); ?>/assets/images/header/phone-icon-yellow.svg" alt="" />
								</span>
								<span class="fw-bold"><?php echo esc_html($company_phone); ?></span>
							</a>
						<?php endif; ?>
					</div>
				<?php endif; ?>
			</div>
		</div>
	</div>
</section>
