<?php

/**
 * Reusable page banner.
 */

$title       = get_field('banner_title');
$text        = get_field('banner_text');
$cta         = get_field('banner_cta');
$bg_type     = get_field('background_type');
$bg_img      = get_field('background_image');
$text_layout = get_field('banner_text_layout');

$style      = '';
$bg_class   = 'page-banner-default';
$banner_classes = array('page-banner', 'bg-shape', 'bg-center');
$cta_url    = '';
$cta_target = '_self';
$cta_title  = 'Learn more';

if (empty($text_layout)) {
	$text_layout = 'below';
}

if ('image' === $bg_type && ! empty($bg_img)) {
	$url = is_array($bg_img) ? $bg_img['url'] : wp_get_attachment_image_url($bg_img, 'full');
	if (! empty($url)) {
		$style    = "background-image:url('" . esc_url($url) . "');";
		$bg_class = 'page-banner-image';
	}
} elseif ('color' === $bg_type) {
	$style    = 'background: linear-gradient(225deg, #263676 0%, #285185 100%);';
	$bg_class = 'page-banner-color';
}

if (is_array($cta)) {
	$cta_url    = ! empty($cta['url']) ? $cta['url'] : '';
	$cta_target = ! empty($cta['target']) ? $cta['target'] : '_self';
	$cta_title  = ! empty($cta['title']) ? $cta['title'] : 'Learn more';
}

$has_banner_content = $title || $text || $cta_url || $style;

if (! $has_banner_content) {
	return;
}

$banner_classes[] = $bg_class;

if (!is_front_page() && 'page-banner-image' === $bg_class) {
	$banner_classes[] = 'page-banner--overlay';
}
?>
<section class="<?php echo esc_attr(implode(' ', $banner_classes)); ?>" style="<?php echo esc_attr($style); ?>">
	<div class="grid-container page-banner-inner fontcolourwhite">
		<?php if ('inline' === $text_layout && $title && $text) : ?>
			<div class="grid-x grid-margin-x align-bottom page-banner-row">
				<div class="cell large-8 small-12 fade-in-up">
					<?php echo wp_kses_post($title); ?>
				</div>
				<div class="cell large-4 small-12 text-right-lg fade-in-up">
					<p class="page-banner-text"><?php echo wp_kses_post($text); ?></p>
					<?php if ($cta_url) : ?>
						<a class="page-banner-cta button inverseoutline spacingtop right-lg" href="<?php echo esc_url($cta_url); ?>" target="<?php echo esc_attr($cta_target); ?>">
							<?php echo esc_html($cta_title); ?>
						</a>
					<?php endif; ?>
				</div>
			</div>
		<?php else : ?>
			<?php if ($title) : ?>
				<div class="grid-x grid-padding-x page-banner-row">
					<div class="cell large-8 small-12 fade-in-up">
						<h1 class="page-banner-title"><?php echo wp_kses_post($title); ?></h1>

					<?php endif; ?>

					<?php if ($text) : ?>

						<p class="page-banner-text"><?php echo wp_kses_post($text); ?></p>

					<?php endif; ?>

					<?php if ($cta_url) : ?>

						<a class="page-banner-cta button inverseoutline spacingtop" href="<?php echo esc_url($cta_url); ?>" target="<?php echo esc_attr($cta_target); ?>">
							<?php echo esc_html($cta_title); ?>
						</a>
					</div>
				</div>
			<?php endif; ?>
		<?php endif; ?>
	</div>
</section>
