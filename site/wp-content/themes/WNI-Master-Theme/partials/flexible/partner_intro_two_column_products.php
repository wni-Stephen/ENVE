<?php
/**
 * Flexible layout: Partner Intro / Two Columns / Product Cards.
 */

$partner_name = get_sub_field('partner_name');
$intro_left = get_sub_field('intro_left');
$intro_right = get_sub_field('intro_right');
$cta_button = get_sub_field('cta_button');
$product_cards = get_sub_field('product_cards');
?>
<section class="flex-section flex-section--partner-intro-two-column-products bg-muted bg-shape grey">
	<div class="grid-container">
		<div class="grid-x grid-margin-x align-center">
			<div class="cell large-11">
		<div class="grid-x grid-margin-x paddingtopxlrg align-justify align-bottom">
			<div class="cell small-12 large-4">
				<?php if ($partner_name) : ?>
					<div class="heading plastof hmb0"><h2><?php echo ($partner_name); ?></h2></div>
				<?php endif; ?>
			</div>
			<div class="cell small-12 large-shrink">
				<?php if (!empty($cta_button['url']) && !empty($cta_button['title'])) : ?>
					<a class="button margintopxsml" href="<?php echo esc_url($cta_button['url']); ?>"<?php echo !empty($cta_button['target']) ? ' target="' . esc_attr($cta_button['target']) . '"' : ''; ?>>
						<?php echo esc_html($cta_button['title']); ?>
					</a>
				<?php endif; ?>
			</div>
			</div>
			<div class="grid-x grid-margin-x align-justify content-gap margintopsml">
			<div class="cell small-12 large-auto">
				<?php if ($intro_left) : ?>
					<div class="content plastof"><?php echo wpautop(wp_kses_post($intro_left)); ?></div>
				<?php endif; ?>
			</div>
			<div class="cell small-12 large-auto">
				<?php if ($intro_right) : ?>
					<div class="content plastof"><?php echo wpautop(wp_kses_post($intro_right)); ?></div>
				<?php endif; ?>

				</div>
			</div>
		</div>
		</div>


		<?php if ($product_cards) : ?>
			<div class="grid-x grid-padding-x medium-up-2 paddingtopmed paddingbottomxlrg">
				<?php foreach ($product_cards as $product) : ?>
					<?php
					$product_link = $product['product_link'] ?? null;
					$has_product_link = !empty($product_link['url']);
					$product_media_type = $product['product_media_type'] ?? 'image';
					$product_image = $product['product_image'] ?? null;
					$product_video = $product['product_video'] ?? null;
					$product_video_mime = !empty($product_video['mime_type']) ? (string) $product_video['mime_type'] : '';
					$product_video_url = !empty($product_video['url']) ? $product_video['url'] : '';
					$is_gif_file = $product_video_mime === 'image/gif' || str_ends_with(strtolower((string) $product_video_url), '.gif');
					$card_tag = $has_product_link ? 'a' : 'div';
					?>
					<div class="cell">
						<article class="flex-product-card">
							<<?php echo $card_tag; ?> class="flex-product-card-link"<?php echo $has_product_link ? ' href="' . esc_url($product_link['url']) . '"' : ''; ?><?php echo !empty($product_link['target']) ? ' target="' . esc_attr($product_link['target']) . '"' : ''; ?>>

							<?php if ($product_media_type === 'video' && !empty($product_video_url)) : ?>
								<div class="flex-product-card-media">
									<?php if ($is_gif_file) : ?>
										<img src="<?php echo esc_url($product_video_url); ?>" alt="<?php echo esc_attr($product['product_title'] ?? ''); ?>" />
									<?php else : ?>
										<video autoplay muted loop playsinline>
											<source src="<?php echo esc_url($product_video_url); ?>" type="<?php echo esc_attr($product_video_mime ?: 'video/mp4'); ?>">
										</video>
									<?php endif; ?>
								</div>
							<?php elseif (!empty($product_image['url'])) : ?>
								<div class="flex-product-card-media">
									<img src="<?php echo esc_url($product_image['url']); ?>" alt="<?php echo esc_attr($product_image['alt'] ?? ''); ?>" />
								</div>
							<?php endif; ?>

							<?php if (!empty($product['product_title'])) : ?>
								<h3><?php echo ($product['product_title']); ?></h3>
							<?php endif; ?>

							</<?php echo $card_tag; ?>>
						</article>
					</div>
				<?php endforeach; ?>
			</div>
		<?php endif; ?>
	</div>
	</div>
	
</section>
