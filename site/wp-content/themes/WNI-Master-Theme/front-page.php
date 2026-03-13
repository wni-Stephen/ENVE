<?php

/**
 * WebsiteNI Joints - Front Page Template
 * WebsiteNI Starter Theme built on JointsWP
 * Created by WebsiteNI.
 */

get_header();
?>
<main id="content" class="front-page-main pagefadein">
	<?php get_template_part('partials/page-banner'); ?>
	<?php
	$video  = get_field('home_video');
	$poster = get_field('home_video_poster');
	$company_overview = get_field('company_overview') ?: array();
	$sectors_section  = get_field('sectors_section') ?: array();
	$projects         = get_field('projects') ?: array();
	$benefits_grid    = get_field('section_sustainability_benefits_grid') ?: array();
	$hybrid_section   = get_field('section_hybrid_drive_benefits') ?: array();
	$risks_section    = get_field('section_drive_efficiency_risks') ?: array();
	$enquire_section    = get_field('enquire_now_section') ?: array();
	$news_section    = get_field('news_section') ?: array();
	$global_phone     = get_field('phone_number', 'option');

	if (!empty($video['url'])) : ?>
		<section class="video home-video fade-in-up">
			<video class="video-media" autoplay muted loop playsinline <?php echo !empty($poster['url']) ? 'poster="' . esc_url($poster['url']) . '"' : ''; ?>>
				<source src="<?php echo esc_url($video['url']); ?>" type="video/mp4">
			</video>
		</section>
	<?php endif; ?>

	<?php if (!empty($company_overview['section_heading']) || !empty($company_overview['section_content']) || !empty($company_overview['section_image'])) : ?>
		<?php
		$company_phone = !empty($company_overview['phone_number']) ? $company_overview['phone_number'] : $global_phone;
		$company_phone_link = !empty($company_overview['phone_link']) ? $company_overview['phone_link'] : (!empty($company_phone) ? 'tel:+' . preg_replace('/\D+/', '', $company_phone) : '');
		?>
		<section class="grid-container full  company-overview section">
			<div class="grid-container">
				<div class="grid-x grid-padding-x paddingtopxlrg paddingbottomxlrg align-middle">
					<div class="small-12 large-6 xxlarge-5 xxlarge-offset-1 cell fade-in-up">
						<?php if (!empty($company_overview['section_label'])) : ?>
							<p class=" section-label"><?php echo esc_html($company_overview['section_label']); ?></p>
						<?php endif; ?>
						<?php if (!empty($company_overview['section_heading'])) : ?>
							<div class="heading"><?php echo wp_kses_post($company_overview['section_heading']); ?></div>
						<?php endif; ?>
						<div class="company-overview-actions-host company-overview-actions-host--desktop"></div>
					</div>
					<div class="small-12 large-6 xxlarge-5 cell overview-content fade-in-up">
						<?php if (!empty($company_overview['section_image']['url'])) : ?>
							<div class="image-wrap wni-flex wni-flex-justify-end">
								<img class="image" src="<?php echo esc_url($company_overview['section_image']['url']); ?>" alt="<?php echo esc_attr($company_overview['section_image']['alt'] ?? ''); ?>">
							</div>
						<?php endif; ?>
						<?php if (!empty($company_overview['section_content'])) : ?>
							<div class="content margintopxsml plastof"><?php echo wp_kses_post($company_overview['section_content']); ?></div>
						<?php endif; ?>
						<div class="company-overview-actions-host company-overview-actions-host--mobile"></div>
					</div>
					<div class="actions wni-flex wni-flex-align-center company-overview-actions">
						<?php if (!empty($company_overview['primary_cta']['url']) && !empty($company_overview['primary_cta']['title'])) : ?>
							<a class="button grey" href="<?php echo esc_url($company_overview['primary_cta']['url']); ?>" <?php echo !empty($company_overview['primary_cta']['target']) ? 'target="' . esc_attr($company_overview['primary_cta']['target']) . '"' : ''; ?>>
								<?php echo esc_html($company_overview['primary_cta']['title']); ?>
							</a>
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
				</div>
			</div>
		</section>
	<?php endif; ?>

	<?php if (!empty($sectors_section['section_heading']) || !empty($sectors_section['section_content'])) : ?>
		<section class="grid-container full sectors-section fontcolourwhite bg-shape">
			<div class="grid-container">
				<div class="grid-x grid-padding-x paddingtopxlrg align-right">
					<div class="small-12 large-8 cell text-right fade-in-up">
						<?php if (!empty($sectors_section['section_label'])) : ?>
							<p class=" section-label"><?php echo esc_html($sectors_section['section_label']); ?></p>
						<?php endif; ?>
						<?php if (!empty($sectors_section['section_heading'])) : ?>
							<div class="heading heading-right"><?php echo wp_kses_post($sectors_section['section_heading']); ?></div>
						<?php endif; ?>

					</div>
				</div>
				<div class="grid-x grid-padding-x align-middle">
					<div class="small-12 large-6 xxxlarge-4 cell text-right-sm plastof fade-in-up">
						<?php if (!empty($sectors_section['section_content'])) : ?>
							<div class="content"><?php echo wp_kses_post($sectors_section['section_content']); ?></div>
						<?php endif; ?>
					</div>
					<div class="small-12 large-auto cell show-for-large fade-in-up">
						<?php if (!empty($sectors_section['cta_link']['url']) && !empty($sectors_section['cta_link']['title'])) : ?>
							<div class="cta-right">
								<a class="button secondary right-lg" href="<?php echo esc_url($sectors_section['cta_link']['url']); ?>" <?php echo !empty($sectors_section['cta_link']['target']) ? 'target="' . esc_attr($sectors_section['cta_link']['target']) . '"' : ''; ?>>
									<?php echo esc_html($sectors_section['cta_link']['title']); ?>
								</a>
							</div>
						<?php endif; ?>
					</div>
				</div>

			</div>
			<div class="grid-x grid-padding-x sectors-cards-row paddingbottomxlrg medium-up-2 xxlarge-up-4">
				<div class="sectors-cards small-12 cell fade-in-up">
					<article class="sector-card" style="background-image:url('<?php echo esc_url(get_template_directory_uri() . '/assets/images/main/ports.jpg'); ?>');">
						<div class="sector-card-content">
							<h3 class="sector-card-title">Ports &amp; Terminals</h3>
							<p class="sector-card-description">infrastructure support supplying consistent materials for roads, bridges, and public projects.</p>
						</div>
						<a class="sector-card-cta" href="#">
							<span>Discover More</span>
							<span class="sector-card-arrow" aria-hidden="true">
								<img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/main/yellow-arrow.svg'); ?>" alt="">
							</span>
						</a>
					</article>
				</div>
				<div class="sectors-cards small-12 cell fade-in-up">
					<article class="sector-card" style="background-image:url('<?php echo esc_url(get_template_directory_uri() . '/assets/images/main/ports.jpg'); ?>');">
						<div class="sector-card-content">
							<h3 class="sector-card-title">Mining / Quarry &amp; Aggregates</h3>
							<p class="sector-card-description">infrastructure support supplying consistent materials for roads, bridges, and public projects.</p>
						</div>
						<a class="sector-card-cta" href="#">
							<span>Discover More</span>
							<span class="sector-card-arrow" aria-hidden="true">
								<img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/main/yellow-arrow.svg'); ?>" alt="">
							</span>
						</a>
					</article>
				</div>
				<div class="sectors-cards small-12 cell fade-in-up">
					<article class="sector-card" style="background-image:url('<?php echo esc_url(get_template_directory_uri() . '/assets/images/main/ports.jpg'); ?>');">
						<div class="sector-card-content">
							<h3 class="sector-card-title">Demolition Contractors</h3>
							<p class="sector-card-description">infrastructure support supplying consistent materials for roads, bridges, and public projects.</p>
						</div>
						<a class="sector-card-cta" href="#">
							<span>Discover More</span>
							<span class="sector-card-arrow" aria-hidden="true">
								<img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/main/yellow-arrow.svg'); ?>" alt="">
							</span> </a>
					</article>
				</div>
				<div class="sectors-cards small-12 cell fade-in-up">
					<article class="sector-card" style="background-image:url('<?php echo esc_url(get_template_directory_uri() . '/assets/images/main/ports.jpg'); ?>');">
						<div class="sector-card-content">
							<h3 class="sector-card-title">Recycling</h3>
							<p class="sector-card-description">infrastructure support supplying consistent materials for roads, bridges, and public projects.</p>
						</div>
						<a class="sector-card-cta" href="#">
							<span>Discover More</span>
							<span class="sector-card-arrow" aria-hidden="true">
								<img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/main/yellow-arrow.svg'); ?>" alt="">
							</span> </a>
					</article>
				</div>
			</div>
		</section>
	<?php endif; ?>

	<?php if (!empty($projects['section_heading']) || !empty($projects['section_content'])) : ?>
		<section class="grid-container full projects-section bg-shape">
			<div class="grid-container">
				<div class="grid-x grid-padding-x paddingtopxlrg align-right">
					<div class="small-12 large-7 cell text-right-lg fade-in-up">
						<?php if (!empty($projects['section_label'])) : ?>
							<p class=" section-label blue"><?php echo esc_html($projects['section_label']); ?></p>
						<?php endif; ?>
						<?php if (!empty($projects['section_heading'])) : ?>
							<div class="heading text-balance"><?php echo wp_kses_post($projects['section_heading']); ?></div>
						<?php endif; ?>

					</div>

				</div>
				<div class="grid-x grid-padding-x align-middle projects-minus-margin">
					<div class="small-12 large-6 xxxlarge-4 cell plastof fade-in-up">
						<?php if (!empty($projects['section_content'])) : ?>
							<div class="content"><?php echo wp_kses_post($projects['section_content']); ?></div>
						<?php endif; ?>
						<?php if (!empty($projects['cta_link']['url']) && !empty($projects['cta_link']['title'])) : ?>
							<a class="button spacingtop show-for-large" href="<?php echo esc_url($projects['cta_link']['url']); ?>" <?php echo !empty($projects['cta_link']['target']) ? 'target="' . esc_attr($projects['cta_link']['target']) . '"' : ''; ?>>
								<?php echo esc_html($projects['cta_link']['title']); ?>
							</a>
						<?php endif; ?>
					</div>
				</div>
				<div class="grid-x grid-padding-x projects-cards-row medium-up-2">
					<div class="small-12 cell fontcolourwhite">
						<a class="project-card" href="#" style="background-image:url('<?php echo esc_url(get_template_directory_uri() . '/assets/images/main/ports.jpg'); ?>');">
							<span class="project-card-arrow" aria-hidden="true">
								<img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/main/project-arrow.svg'); ?>" alt="">
							</span>
							<div class="project-card-content">
								<h3 class="project-card-title">Drumderg Demolition</h3>
								<p class="project-excerpt">At Drumderg Demolition, crushing and screening services are delivered with a commitment to sustainability and performance.</p>
							</div>
						</a>
					</div>
					<div class="small-12 cell">
						<a class="project-card" href="#" style="background-image:url('<?php echo esc_url(get_template_directory_uri() . '/assets/images/main/ports.jpg'); ?>');">
							<span class="project-card-arrow" aria-hidden="true">
								<img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/main/project-arrow.svg'); ?>" alt="">
							</span>
							<div class="project-card-content">
								<h3 class="project-card-title">Drumderg Demolition</h3>
								<p class="project-excerpt">At Drumderg Demolition, crushing and screening services are delivered with a commitment to sustainability and performance.</p>
							</div>
						</a>
					</div>
				</div>
				<?php if (!empty($projects['cta_link']['url']) && !empty($projects['cta_link']['title'])) : ?>
					<a class="button  hide-for-large" href="<?php echo esc_url($projects['cta_link']['url']); ?>" <?php echo !empty($projects['cta_link']['target']) ? 'target="' . esc_attr($projects['cta_link']['target']) . '"' : ''; ?>>
						<?php echo esc_html($projects['cta_link']['title']); ?>
					</a>
				<?php endif; ?>
			</div>
		</section>
	<?php endif; ?>

	<?php if (!empty($benefits_grid['benefit_cards'])) : ?>
		<section class="grid-container full benefits-grid ">
			<div class="grid-container">
				<div class="grid-x grid-padding-x paddingtopxlrg paddingbottomlrg align-center">
					<div class="cell medium-10 large-7 text-center fade-in-up">
						<?php if (!empty($benefits_grid['section_label'])) : ?>
							<p class="section-label"><?php echo esc_html($benefits_grid['section_label']); ?></p>
						<?php endif; ?>
						<?php if (!empty($benefits_grid['section_heading'])) : ?>
							<div class="hmb0"><?php echo wp_kses_post($benefits_grid['section_heading']); ?></div>
						<?php endif; ?>
					</div>
				</div>
			</div>
			<div class="benefits-grid-slider swiper benefitsSwiper">
				<div class="swiper-wrapper">
					<?php foreach ($benefits_grid['benefit_cards'] as $index => $card) : ?>
						<article class="benefit-card swiper-slide">
							<?php $card_inner_class = ($index % 2 === 0) ? 'card-inner-primary' : 'card-inner-tertiary'; ?>
							<div class="card-inner <?php echo esc_attr($card_inner_class); ?>">
								<div class="benefit-number">
									<?php if (!empty($card['benefit_number'])) : ?>
										<div class="benefits-grid-number"><?php echo esc_html($card['benefit_number']); ?></div>
									<?php endif; ?>
								</div>
								<div class="card-content">
									<?php if (!empty($card['benefit_icon']['url'])) : ?>
										<div class="benefits-grid-icon-wrap">
											<img class="benefits-grid-icon" src="<?php echo esc_url($card['benefit_icon']['url']); ?>" alt="<?php echo esc_attr($card['benefit_icon']['alt'] ?? ''); ?>">
										</div>
									<?php endif; ?>
									<?php if (!empty($card['benefit_title'])) : ?>
										<h3 class="benefits-grid-title"><?php echo ($card['benefit_title']); ?></h3>
									<?php endif; ?>
									<?php if (!empty($card['benefit_description'])) : ?>
										<div class="benefits-grid-description"><?php echo wp_kses_post($card['benefit_description']); ?></div>
									<?php endif; ?>
								</div>
							</div>
						</article>
					<?php endforeach; ?>
				</div>
			</div>
		</section>
	<?php endif; ?>

	<?php if (!empty($hybrid_section['section_heading']) || !empty($hybrid_section['section_image'])) : ?>
		<section class="grid-container full bg-primary generalformat hybrid-benefits-section">
			<div class="grid-container">
				<div class="grid-x grid-padding-x paddingtopxlrg paddingbottomxlrg margintopxlrg align-middle">
					<div class="small-12 large-5 xxlarge-4 xxlarge-offset-1 cell fontcolourwhite fade-in-up">
						<?php if (!empty($hybrid_section['section_label'])) : ?>
							<p class=" section-label"><?php echo esc_html($hybrid_section['section_label']); ?></p>
						<?php endif; ?>
						<?php if (!empty($hybrid_section['section_heading'])) : ?>
							<div class="heading"><?php echo wp_kses_post($hybrid_section['section_heading']); ?></div>
						<?php endif; ?>
						<?php if (!empty($hybrid_section['section_content'])) : ?>
							<div class="content plastof"><?php echo wp_kses_post($hybrid_section['section_content']); ?></div>
						<?php endif; ?>

					</div>
					<div class="small-12 large-6 large-offset-1 cell margintopsmlscreens fade-in-up">
						<?php if (!empty($hybrid_section['section_image']['url'])) : ?>
							<div class="image-wrap">
								<img class="image" src="<?php echo esc_url($hybrid_section['section_image']['url']); ?>" alt="<?php echo esc_attr($hybrid_section['section_image']['alt'] ?? ''); ?>">
							</div>
						<?php endif; ?>
					</div>
				</div>
			</div>
		</section>
	<?php endif; ?>

	<?php if (!empty($risks_section['section_heading']) || !empty($risks_section['section_image'])) :
	?>
		<section class="grid-container full generalformat risks-section">
			<div class="grid-container">
				<div class="grid-x grid-padding-x paddingtopxlrg paddingbottomxlrg align-middle">

					<div class="small-12 large-6 cell small-order-2 large-order-1 margintopsmlscreens fade-in-up">
						<?php if (!empty($risks_section['section_image']['url'])) : ?>
							<div class="image-wrap">
								<img class="image" src="<?php echo esc_url($risks_section['section_image']['url']); ?>" alt="<?php echo esc_attr($risks_section['section_image']['alt'] ?? ''); ?>">
							</div>
						<?php endif; ?>
					</div>
					<div class="small-12 large-5 xxlarge-4 large-offset-1 cell large-order-2 small-order-1 fade-in-up">
						<?php if (!empty($risks_section['section_label'])) : ?>
							<p class=" section-label"><?php echo esc_html($risks_section['section_label']); ?></p>
						<?php endif; ?>
						<?php if (!empty($risks_section['section_heading'])) : ?>
							<div class="heading"><?php echo wp_kses_post($risks_section['section_heading']); ?></div>
						<?php endif; ?>
						<?php if (!empty($risks_section['section_content'])) : ?>
							<div class="content"><?php echo wp_kses_post($risks_section['section_content']); ?></div>
						<?php endif; ?>

						<?php if (!empty($risks_section['cta_link']['url']) && !empty($risks_section['cta_link']['title'])) : ?>
							<a class="button " href="<?php echo esc_url($risks_section['cta_link']['url']); ?>" <?php echo !empty($risks_section['cta_link']['target']) ? 'target="' . esc_attr($risks_section['cta_link']['target']) . '"' : ''; ?>>
								<?php echo esc_html($risks_section['cta_link']['title']); ?>
							</a>
						<?php endif; ?>
					</div>
				</div>
			</div>
		</section>
	<?php endif; ?>
	<?php
	$enquire_background_image_url = !empty($enquire_section['background_image']) ? $enquire_section['background_image'] : '';

	if (!empty($enquire_section['section_heading'])) :
	?>
		<section class="grid-container full generalformat bg-primary enquire-section bg-center" <?php echo $enquire_background_image_url ? 'style="background-image: linear-gradient(225deg, rgba(38, 54, 118, 0.82) 0%, rgba(40, 81, 133, 0.82) 100%), url(\'' . esc_url($enquire_background_image_url) . '\');"' : 'style="background: linear-gradient(225deg, #263676 0%, #285185 100%);"'; ?>>
			<div class="grid-container">
				<div class="grid-x grid-padding-x paddingtopxlrg paddingbottomxlrg align-center">
					<div class="small-12 large-10 xxlarge-6 cell text-center fontcolourwhite fade-in-up">
						<?php if (!empty($enquire_section['section_label'])) : ?>
							<p class=" section-label"><?php echo esc_html($enquire_section['section_label']); ?></p>
						<?php endif; ?>
						<?php if (!empty($enquire_section['section_heading'])) : ?>
							<div class="heading text-balance"><?php echo wp_kses_post($enquire_section['section_heading']); ?></div>
						<?php endif; ?>
						<?php if (!empty($enquire_section['section_content'])) : ?>
							<div class="content"><?php echo wp_kses_post($enquire_section['section_content']); ?></div>
						<?php endif; ?>

						<?php if (!empty($enquire_section['cta_link']['url']) && !empty($enquire_section['cta_link']['title'])) : ?>
							<a class="button white spacingtop center" href="<?php echo esc_url($enquire_section['cta_link']['url']); ?>" <?php echo !empty($enquire_section['cta_link']['target']) ? 'target="' . esc_attr($enquire_section['cta_link']['target']) . '"' : ''; ?>>
								<?php echo esc_html($enquire_section['cta_link']['title']); ?>
							</a>
						<?php endif; ?>
					</div>
				</div>
			</div>
		</section>
	<?php endif; ?>



	<?php if (!empty($news_section['section_heading'])) : ?>
		<section class="grid-container full generalformat news-section">
			<div class="grid-container">
				<div class="grid-x grid-padding-x paddingtopxlrg paddingbottommed align-middle wni-flex-align-end">

					<div class="small-12 large-5 cell fade-in-up">
						<?php if (!empty($news_section['section_label'])) : ?>
							<p class=" section-label"><?php echo esc_html($news_section['section_label']); ?></p>
						<?php endif; ?>
						<?php if (!empty($news_section['section_heading'])) : ?>
							<div class="heading hmb0"><?php echo wp_kses_post($news_section['section_heading']); ?></div>
						<?php endif; ?>
						<?php if (!empty($news_section['section_content'])) : ?>
							<div class="content"><?php echo wp_kses_post($news_section['section_content']); ?></div>
						<?php endif; ?>
					</div>
					<div class="cell large-auto fade-in-up">
						<?php if (!empty($news_section['cta_link']['url']) && !empty($news_section['cta_link']['title'])) : ?>
							<a class="button secondary primary-border right-lg" href="<?php echo esc_url($news_section['cta_link']['url']); ?>" <?php echo !empty($news_section['cta_link']['target']) ? 'target="' . esc_attr($news_section['cta_link']['target']) . '"' : ''; ?>>
								<?php echo esc_html($news_section['cta_link']['title']); ?>
							</a>
						<?php endif; ?>
					</div>
				</div>
				<?php
				$recent_news_query = new WP_Query(
					array(
						'post_type'           => 'post',
						'posts_per_page'      => 3,
						'post_status'         => 'publish',
						'ignore_sticky_posts' => true,
					)
				);
				?>
				<?php if ($recent_news_query->have_posts()) : ?>
					<div class="grid-x grid-padding-x news-cards-row paddingbottomxlrg" data-equalizer data-equalize-by-row="true">
						<?php while ($recent_news_query->have_posts()) : $recent_news_query->the_post(); ?>
							<div class="small-12 medium-6 large-4 cell fade-in-up">
								<article class="news-card">
									<?php if (has_post_thumbnail()) : ?>
										<a class="news-card-image-link" href="<?php the_permalink(); ?>" aria-label="<?php echo esc_attr(sprintf(__('Read %s', 'WNI-Master-Theme'), get_the_title())); ?>">
											<div class="news-card-image-wrap">
												<?php the_post_thumbnail('large', array('class' => 'news-card-image')); ?>
											</div>
										</a>
									<?php endif; ?>
									<div class="news-card-content" data-equalizer-watch>
										<p class="news-card-date"><?php echo esc_html(get_the_date('jS F Y')); ?></p>
										<h3 class="news-card-title">
											<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
										</h3>
										<div class="news-card-excerpt">
											<?php echo esc_html(wp_trim_words(get_the_excerpt(), 26, '...')); ?>
										</div>
										<a class="button white news-card-link" href="<?php the_permalink(); ?>">Read More</a>
									</div>
								</article>
							</div>
						<?php endwhile; ?>
					</div>
					<?php wp_reset_postdata(); ?>
				<?php endif; ?>
			</div>
		</section>
	<?php endif; ?>



</main>
<?php get_footer(); ?>
